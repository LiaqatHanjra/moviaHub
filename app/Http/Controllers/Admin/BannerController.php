<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entertainment;
use Illuminate\Http\Request;
use App\Models\Banner;
use Yajra\DataTables\DataTables;

class BannerController extends Controller
{
    public function banners(Request $request)
    {
        if ($request->ajax()) {
            // Fetch all banners or apply specific filters if needed
            $banners = Banner::select(['id', 'thumbnail_url', 'type', 'type_name', 'status', 'type_id'])
            ->whereIn('type', ['movie','tvshow']);

            return DataTables::of($banners)
                ->addColumn('image', function ($banner) {
                    $imageUrl = $banner->thumbnail_url
                        ? $banner->thumbnail_url
                        : asset('backend/assets/images/default_banner.png');
                    return '<img src="' . $imageUrl . '" alt="' . e($banner->type_name) . '" class="rounded" width="100" height="110">';
                })
                ->addColumn('type', function ($banner) {
                    return e($banner->type) ?: '--';
                })
                ->addColumn('type_name', function ($banner) {
                    return e($banner->type_name) ?: '--';
                })
                ->addColumn('status', function ($banner) {
                    $checked = $banner->status ? 'checked' : '';
                    return '
                        <div class="form-check form-switch">
                            <input class="form-check-input banner-status-toggle" type="checkbox" data-id="' . $banner->id . '" ' . $checked . '>
                        </div>';
                })
                ->addColumn('action', function ($banner) {
                    $editUrl = route('admin.site.banners.edit', $banner->id);
                    $deleteUrl = route('admin.site.banners.delete', $banner->id);
                    return '
                        <a href="' . $editUrl . '" class="btn btn-sm btn-primary me-1" title="Edit"><i class="bi bi-pencil"></i></a>
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Are you sure you want to delete this movie?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger delete-btn" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>';
                })
                ->rawColumns(['image', 'status', 'action']) // Ensure all HTML columns are included
                ->toJson();
        }

        return view('settings.banners.index');
    }
    public function searchEntertainment(Request $request)
    {
        $query = $request->input('query');
        if($request->type == 'movie_page'){
            $request['type'] = 'movie';
        }
        $entertainmentData = Entertainment::where('status', 1)
            ->where('type', $request->type)
            ->where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name','poster_url', 'thumbnail_url')
            ->get();

        return response()->json($entertainmentData);
    }

    public function bannerCreate()
    {
        return view('settings.banners.create');
    }

    public function bannerStore(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required',
            'type_id' => 'required',
            'type_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'poster_url_existing'=> 'required',
            'thumbnail_url_existing'=> 'required',
        ]);

        $validate = [
            'title' => $request->title,
            'type' => $request->type,
            'type_id' => $request->type_id,
            'type_name' => $request->type_name,
            'status' => $request->status,
            'poster_url'=> $request->poster_url_existing,
            'thumbnail_url'=> $request->thumbnail_url_existing,
        ];

        Banner::create($validate);

        return redirect()->route('admin.site.banners')->with('Banner added successfully.');
    }
    public function banneredit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('settings.banners.edit', compact('banner'));
    }

    public function bannerUpdate(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        // dd($request->all());
        $validate = $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required|in:movie,tvshow',
            'type_id' => 'required',
            'type_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'poster_url' => 'nullable',
            'thumbnail_url' => 'nullable',
            'poster_url_existing' => 'nullable|string',
            'thumbnail_url_existing' => 'nullable|string',
        ]);


        $validate['poster_url'] = $request->poster_url_existing;
        $validate['thumbnail_url'] = $request->thumbnail_url_existing;

        // Update the banner
        $banner->update($validate);

        return redirect()->route('admin.site.banners')->with('success', 'Banner updated successfully.');
    }

    public function bannerDelete(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('admin.site.banners')->with('success', 'Banner deleted successfully.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $season = Banner::findOrFail($id);
        $season->status = $request->status;
        $season->save();
        return response()->json(['success' => true]);
    }
}
