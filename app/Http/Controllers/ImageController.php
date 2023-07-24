<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageFormRequest;
use App\Http\Requests\ImageUpdateFormRequest;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Gallery $gallery)
    {
        $images = Image::all();
        return view('admin.gallery.images.index', compact('gallery', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Gallery $gallery)
    {
        $images = Image::all();
        return view('admin.gallery.images.create', compact('gallery', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageFormRequest $request, Gallery $gallery)
    {

        $validatedData =  $request->validated();

        $validatedImages = $validatedData["images"];
        $gallery_id = $gallery->id;

        foreach ($validatedImages as $validatedImage) {
            $image = new Image();;
            $path = $validatedImage->store('gallery/images');

            $image->image = $path;
            $image->gallery_id = $gallery_id;
            $image->save();
        }
        return redirect()->route('gallery.image.create', compact('gallery'))->with('success', 'Gallery Created Succesfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        return view('admin.gallery.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageFormRequest $request, $id)
    {
        $validatedData = $request->validated();
        $uploadedImage = $validatedData['image'];

        $image = Image::find($id);

        $gallery = Gallery::find($image->gallery_id);   

        $validatedData['image'] = $uploadedImage->store('gallery/images');

        if (!is_null($image->image)) {
            Storage::delete($image->image);
        }

        $image->update($validatedData);
        return redirect()->route('gallery.image.create', compact('gallery'))->with('info', 'Image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $gallery = Gallery::find($image->gallery_id);

        if (!is_null($image->image)) {
            Storage::delete($image->image);
        }
        $image->delete();
        return redirect()->route('gallery.image.create', compact('gallery'))->with('info', 'Image deleted successfully.');
    }
}
