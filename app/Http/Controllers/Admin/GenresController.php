<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $genres = Genre::select(['id', 'name', 'slug', 'description', 'status', 'file_url'])->orderBy('id', 'desc');

            return DataTables::of($genres)
                ->addColumn('image', function ($row) {
                    if ($row->file_url) {
                        return '<img src="' . getImageUrl($row->file_url) . '" alt="Genre Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">';
                    } else {
                        return '<div style="width: 50px; height: 50px; background: #f8f9fa; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #6c757d; font-size: 12px;">No Image</div>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.genres.edit', $row->id);
                    $showUrl = route('admin.genres.show', $row->id);
                    $deleteUrl = route('admin.genres.destroy', $row->id);
                    return '
                    <a href="' . $showUrl . '" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="' . $editUrl . '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure?\');">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>';
                })
                ->editColumn('status', function ($genre) {
                    $checked = $genre->status ? 'checked' : '';
                    return '<div class="form-check form-switch"><input class="form-check-input movie-status-toggle" type="checkbox" ' . $checked . ' data-id="' . $genre->id . '"></div>';
                })
                ->editColumn('description', function ($genre) {
                    // Truncate description to 60 characters and append "..."
                    return strlen($genre->description) > 60
                        ? substr($genre->description, 0, 60) . '...'
                        : $genre->description;
                })
                ->rawColumns(['image', 'action', 'status'])
                ->make(true);
        }

        return view('genres.index');
    }


    public function search(Request $request)
    {
        $query = $request->input('q');

        $results = Genre::when($query, function ($qbuilder) use ($query) {
            $qbuilder->where('name', 'like', '%' . $query . '%');
        })
            ->limit(50)
            ->get(['id', 'name']);

        return response()->json($results);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_url' => 'nullable', // Add image validation if needed
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $file_url_value = null;
        if ($request->hasFile('file_url')) {
            $path = $request->file('file_url')->store('genres', 'spaces');
            $file_url_value = Storage::disk('spaces')->url($path);
        }

        Genre::create(array_merge(
            $request->only([
                'name',
                'description',
                'status',
            ]),
            [
                'file_url' => $file_url_value,
                'created_by' => auth()->id(),
            ]
        ));

        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genre = Genre::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'file_url' => 'nullable', // Added image validation
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file_url')) {
            // Delete old file if exists
            if ($genre->file_url) {
                $parsed = parse_url($genre->file_url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');
                if (!empty($oldPath) && Storage::disk('spaces')->exists($oldPath)) {
                    Storage::disk('spaces')->delete($oldPath);
                }
            }

            // Upload new file
            $path = $request->file('file_url')->store('genres', 'spaces');
            $genre->file_url = Storage::disk('spaces')->url($path);
        } else {
            // Keep existing file_url if no new file uploaded
            // Only update if existing_file_url is provided (when user wants to remove image)
            if ($request->has('existing_file_url')) {
                $genre->file_url = $request->input('existing_file_url');
            }
            // If neither new file nor existing_file_url, keep current file_url unchanged
        }

        $genre->name = $request->name ? $request->name : $genre->name;
        $genre->description = $request->description ? $request->description : $genre->description;
        $genre->status = $request->status ? $request->status : $genre->status;
        $genre->save();

        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        if ($genre->file_url) {
            $parsed = parse_url($genre->file_url, PHP_URL_PATH);
            $oldPath = ltrim($parsed, '/');
            if (!empty($oldPath) && Storage::disk('spaces')->exists($oldPath)) {
                Storage::disk('spaces')->delete($oldPath);
            }
        }
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->status = $request->state;
        $genre->save();
        return response()->json(['status' => $genre->status, 'message' => 'Status updated successfully']);
    }
}
