<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Http\Request;
use App\Models\Content\Place;
use App\Models\ACL\Permission;
use App\Models\Content\Gallery;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Database\Seeders\PermissionSeeder;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Content\PlaceRequest;
use App\Http\Requests\Admin\Content\PlacesGalleryRequest;
use Illuminate\View\View;

class PlaceController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:manage_places');
        $this->middleware('can:edit_places')->only('edit', 'update' , 'status');
        $this->middleware('can:create_places')->only('store', 'create');
        $this->middleware('can:delete_places')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $places = Place::query();

        if ($searchString = request('search'))
            $places->where('title', "LIKE" , "%{$searchString}%");

        if (request('status'))
            $places->where('status', 1);

        $places = $places->latest()->paginate(10);
        return view('admin.content.place.index' , compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.place.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceRequest $request , ImageService $imageService)
    {
        DB::transaction(function () use ($request , $imageService) {
            $inputs = $request->all();

            // save image
            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "places");
                $inputs['image'] = $imageService->save($inputs['image']);
            }
            

            Place::create($inputs);
        });

        return to_route('admin.content.places.index')->with('toast-success' , 'مکان گردشگری جدید اضافه گردید.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('admin.content.place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceRequest $request, Place $place , ImageService $imageService)
    {
        DB::transaction(function () use($request , $place , $imageService) {
            $inputs = $request->all();

            // save image
            if ($request->hasFile('image')) {
                if (!empty($place->image))
                    $imageService->deleteImage($place->image);

                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "places");
                $inputs['image'] = $imageService->save($inputs['image']);
            }

            $inputs['status'] = $inputs['status'] ?? 0;

            # update check inputs
            $place->update($inputs);
        });

        return to_route('admin.content.places.index')->with('toast-success' , 'تغییرات روی مکان گردشگری اعمال شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return back()->with('toast-success', 'مکان گردشگری حذف گردید.');
    }

    public function indexGallery(Place $place)
    {
        return view("admin.content.place.gallery.index", compact('place'));
    }

    public function createGallery(PlacesGalleryRequest $request,Place $place , ImageService $imageService)
    {
        $inputs = $request->all();


        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . "content" . DIRECTORY_SEPARATOR . "places-gallery");
            $inputs['image'] = $imageService->save($inputs['image']);
        }

        $place->gallerizable()->create($inputs);
        return to_route("admin.content.places.index-gallery", $place->id)->with('cute-success', 'تصویر جدید اضافه شد.');
    }



    public function destroyGallery(Gallery $gallery)
    {
        $gallery->delete();
        return back()->with('cute-success', 'تصویر حذف گردید.');
    }

    public function status(Place $place)
    {
        $place->status = $place->status == 0 ? 1 : 0;
        $result = $place->save();

        if ($result) {
            if ($place->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
