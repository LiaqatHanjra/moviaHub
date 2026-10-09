<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CastCrew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CastCrewController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CastCrew::select(['id', 'file_url', 'name', 'type', 'designation', 'dob', 'place_of_birth']);
            return DataTables::of($data)
                ->order(function ($query) use ($request) {
                    $orderColumn = $request->input('order.0.column');
                    $orderDir = $request->input('order.0.dir');

                    if ($orderColumn !== null && $orderDir !== null) {
                        $columns = [
                            0 => 'id',
                            1 => 'name',
                            2 => 'type',
                            3 => 'designation',
                            4 => 'dob',
                            5 => 'place_of_birth',
                        ];

                        if (isset($columns[$orderColumn])) {
                            $column = $columns[$orderColumn];
                            $query->orderBy($column, $orderDir);
                        }
                    } else {
                        $query->orderBy('id', 'desc');
                    }
                })
                ->addColumn('image', function ($castCrew) {
                    return $castCrew->file_url
                        ? '<div class="image-container" style="height: 140px; width: 140px; background: #f0f0f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="' . $castCrew->file_url . '" style="height: 140px; width: 140px; object-fit: cover; border-radius: 6px;" />
                        </div>'
                        : '<div class="image-container" style="height: 140px; width: 140px; background: linear-gradient(135deg, #e0e0e0, #f5f5f5); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #888; font-size: 16px;">
                            No Image
                        </div>';
                })
                ->editColumn('dob', function ($castCrew) {
                    return $castCrew->dob ? $castCrew->dob->format('d M Y') : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('admin.cast-crews.edit', $row->id);
                    $showUrl = route('admin.cast-crews.show', $row->id);
                    $deleteUrl = route('admin.cast-crews.destroy', $row->id);
                    return '
                        <a href="' . $showUrl . '" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                        <a href="' . $editUrl . '" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                        <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="' . $row->id . '" data-url="' . $deleteUrl . '" data-name="' . htmlspecialchars($row->name) . '">
                            <i class="bi bi-trash"></i>
                        </button>';
                })
                ->orderColumn('name', function ($query, $order) {
                    $query->orderBy('name', $order);
                })
                ->orderColumn('type', function ($query, $order) {
                    $query->orderBy('type', $order);
                })
                ->orderColumn('designation', function ($query, $order) {
                    $query->orderBy('designation', $order);
                })
                ->orderColumn('place_of_birth', function ($query, $order) {
                    $query->orderBy('place_of_birth', $order);
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }
        return view('castcrew.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $type = $request->input('type');

        $results = CastCrew::when($query, function ($qbuilder) use ($query) {
            $qbuilder->where('name', 'like', '%' . $query . '%');
        })
            ->when($type, function ($qbuilder) use ($type) {
                $qbuilder->where('type', $type);
            })
            ->limit(50)
            ->get(['id', 'name']);

        return response()->json($results);
    }

    public function create()
    {
        return view('castcrew.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:actor,director',
            'file_url' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,webp',
            'tmdb_id' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'place_of_birth' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'designation' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('file_url')) {
            $path = $request->file('file_url')->store('cast-crews', 'spaces');
            $validated['file_url'] = Storage::disk('spaces')->url($path);
        }else{
            $validated['file_url'] = $request->file_url;
        }

        CastCrew::create($validated);

        return redirect()->route('admin.cast-crews.index')->with('success', 'Cast/Crew created successfully.');
    }

    public function show(string $id)
    {
        $castCrew = CastCrew::findOrFail($id);
        return view('castcrew.show', compact('castCrew'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $castCrew = CastCrew::findOrFail($id);
        return view('castcrew.edit', compact('castCrew'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $castCrew = CastCrew::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:actor,director',
            'file_url' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,webp',
            'tmdb_id' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'place_of_birth' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'designation' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('file_url')) {
            if ($castCrew->file_url) {
                $url = $castCrew->file_url;
                if (strpos($url, 'tmdb.org') !== false) {
                }
                elseif (strpos($url, 'digitaloceanspaces.com') !== false) {
                    $parsed = parse_url($url, PHP_URL_PATH);
                    $oldPath = ltrim($parsed, '/');

                    if (!empty($oldPath)) {
                        try {
                            if (Storage::disk('spaces')->exists($oldPath)) {
                                Storage::disk('spaces')->delete($oldPath);
                            }
                        } catch (\Exception $e) {
                        }
                    }
                }
                else {
                    $parsed = parse_url($url, PHP_URL_PATH);
                    $oldPath = ltrim($parsed, '/');

                    if (!empty($oldPath)) {
                        try {
                            if (Storage::disk('public')->exists($oldPath)) {
                                Storage::disk('public')->delete($oldPath);
                            }
                        } catch (\Exception $e) {
                        }
                    }
                }
            }
            $path = $request->file('file_url')->store('cast-crews', 'spaces');
            $validated['file_url'] = Storage::disk('spaces')->url($path);
        }else{
            $validated['file_url'] = $request->file_url;
        }

        $castCrew->update($validated);

        return redirect()->route('admin.cast-crews.index')->with('success', 'Cast/Crew updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $castCrew = CastCrew::findOrFail($id);

        if ($castCrew->file_url) {
            $url = $castCrew->file_url;
            if (strpos($url, 'tmdb.org') !== false) {
            }
            elseif (strpos($url, 'digitaloceanspaces.com') !== false) {
                $parsed = parse_url($url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');

                if (!empty($oldPath)) {
                    try {
                        if (Storage::disk('spaces')->exists($oldPath)) {
                            Storage::disk('spaces')->delete($oldPath);
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
            else {
                $parsed = parse_url($url, PHP_URL_PATH);
                $oldPath = ltrim($parsed, '/');

                if (!empty($oldPath)) {
                    try {
                        if (Storage::disk('public')->exists($oldPath)) {
                            Storage::disk('public')->delete($oldPath);
                        }
                    } catch (\Exception $e) {
                    }
                }
            }
        }
        $castCrew->delete();
        return redirect()->route('admin.cast-crews.index')->with('success', 'Cast/Crew deleted successfully.');
    }
}
