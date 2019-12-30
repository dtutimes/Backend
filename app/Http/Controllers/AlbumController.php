<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAlbum;
use App\Models\Album;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::where('album_id', NULL)->get();
        return view('albums.index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create')->withAlbums(Album::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbum $request)
    {
        $album = auth()->user()->album()->create([
            'name'      => $request->name,
            'biliner'   => $request->biliner,
            'slug'      => str_slug($request->name, "-").'-'.rand(100, 999),
            'album_id'  => isset($request->album_id) ? $request->album_id : NULL,
            'status'    => 'draft'
        ]); 

        if (isset($request['cover'])) {
            $album->addMediaFromRequest('cover')->toMediaCollection('covers');
        } 

        return redirect()->route('albums.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $album = Album::whereUuid($uuid)->firstOrFail();

        $images = $album->image()->where('status', '!=', 'draft')->get();

        $subs = $album->child()->with('user')->get();
        
        return view('albums.show', ['album' => $album, 'subs' => $subs, 'images' => $images ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $album = Album::whereUuid($uuid)->with(['image'])->firstOrFail();
        $subs = $album->child()->get();

        if($album->status != 'draft'){
            session()->flash('success', $album->title.', is '.$album->status.'. You cannot edit it right now.');
            return redirect()->route('albums.show', ['album' => $album, 'subs' => $subs]);
        }

        return view('albums.edit', ['album' => $album, 'subs' => $subs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {

        $album = Album::whereUuid($uuid)->firstOrFail();
        
        $album->update([
            'name'      => $request->name,
            'biliner'   => $request->biliner,
            'slug'      => str_slug($request->name, "-").'-'.rand(100, 999),
            'cover'     => $request->cover
        ]);

        if (isset($request['cover'])) {
            $album->clearMediaCollection('covers');
            $album->addMediaFromRequest('cover')->toMediaCollection('covers');
        } 

        return redirect()->route('albums.show', $album->uuid);
    }

    public function submit($uuid)
    {
        $album = Album::whereUuid($uuid)->firstOrFail();
        
        $album->update([
            'status' => 'pending'
        ]);

        session()->flash('success', $album->name.', Submitted for approval.');
        return redirect()->route('albums.show', $album->uuid);
    }

    public function publish($uuid)
    {
        $album = Album::whereUuid($uuid)->firstOrFail();

        if ($album->status == 'published') {
            session()->flash('success', $album->name.', Already Published.');
            return redirect()->route('albums.show', $album->uuid);
        }
        
        $album->update([
            'status' => 'published'
        ]);

        session()->flash('success', $album->name.', Published');
        return redirect()->route('albums.show', $album->uuid);
    }

    public function draft($uuid)
    {
        $album = Album::whereUuid($uuid)->firstOrFail();

        if ($album->status == 'draft') {
            session()->flash('success', $album->name.', Already In draft.');
            return redirect()->route('albums.show', $album->uuid);
        }
        
        $album->update([
            'status' => 'draft'
        ]);

        session()->flash('success', $album->name.', saved in drafts.');
        return redirect()->route('albums.show', $album->uuid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $album = Album::whereUuid($uuid)->firstOrFail();
        $name = $album->name;

        $album->delete();
        
        session()->flash('success', $name.', Deleted!');
        return redirect()->route('albums.index');
    }
}
