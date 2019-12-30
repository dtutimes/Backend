<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {
        $images = \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->where('user_id', auth()->user()->id)->get();

        return view('images.index')->withImages($images);
    }

    public function me()
    {
        $images = auth()->user()->image()->get();

        return view('images.me')->withImages($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uuid)
    {
        return view('images.create',  [ 'album_uuid' => $uuid ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImage $request, $uuid)
    {
        $image = \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->create([
            'user_id' => auth()->user()->id,
            'name'    => $request->name,
            'biliner' => $request->biliner,
            'slug'      => str_slug($request->name, "-").'-'.rand(100, 999),
            'status'  => 'draft'
        ]);

        if($request->hasFile('image')) {
            $image->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('images.show', [$uuid, $image->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($uuid /** Album Uuid */, $image /** Image Uuid */)
    {
        $item = \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->whereUuid($image)->with('user', 'album')->firstOrFail();
    
        return view('images.show', ['image' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid, $image)
    {
        if (auth()->user()->can('publish-story')) {
            $image = Image::whereUuid($image)->firstOrFail();
        }
        else {
            $image = auth()->user()->image()->whereUuid($image)->firstOrFail();
        }
        return view('images.edit', ['image' => $image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid, $image)
    {
        if($request->has('name') && $request->has('biliner')){
            $temp = \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->whereUuid($image);
        
            $temp->update([
                'name'    => $request->name,
                'biliner' => $request->biliner
            ]);
        }
        

        return redirect()->route('images.show', [$uuid, $image]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }

    public function submit($uuid, $image)
    {
        auth()->user()->image()->whereUuid($image)->firstOrFail()->update([
            'status'    => 'pending'
        ]);

        return redirect()->route('albums.show', $uuid);
    }

    public function publish($uuid, $image)
    {
        \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->whereUuid($image)->firstOrFail()->update([
            'status'    => 'published'
        ]);

        return redirect()->route('albums.show', $uuid);
    }

    public function draft($uuid, $image)
    {
        \App\Models\Album::whereUuid($uuid)->firstOrFail()->image()->whereUuid($image)->firstOrFail()->update([
            'status'    => 'draft'
        ]);

        return redirect()->back();
    }
}
