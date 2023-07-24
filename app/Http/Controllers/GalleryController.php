<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GalleryFormRequest;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->get();
        $images = Image::where('gallery_id', '>', 0)->get('gallery_id');
        return view('admin.gallery.index', compact('galleries', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.create', compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryFormRequest $request)
    {
        $validatedData = $request->validated();
        if (!$request->hasFile('cover_image')) {
            return redirect()->route('gallery.create');
        }
        $uploadedImage = $validatedData['cover_image'];
        $validatedData['cover_image'] = $uploadedImage->store('gallery/cover');

        Gallery::create($validatedData);
        return redirect()->route('gallery.index')->with('success', 'Gallery Created Succesfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit', compact('gallery'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryFormRequest $request, $id)
    {
        // update gallery image
        $gallery = Gallery::find($id);
        $validatedData = $request->validated();
        if ($request->hasFile('cover_image')) {
            $uploadedImage = $request['cover_image'];
            $validatedData['cover_image'] = $uploadedImage->store('gallery/cover');
        }

        if (!is_null($gallery->cover_image))
            Storage::delete($gallery->cover_image);
        // save to gallery
        $gallery->update($validatedData);
        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $images_under_gallery = DB::table('images')->where('gallery_id', $id)->get();
        if (!is_null($gallery->cover_image)) {
            Storage::delete($gallery->cover_image);
            foreach ($images_under_gallery as $image) {
                Storage::delete($image->image);
            }
        }

        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
