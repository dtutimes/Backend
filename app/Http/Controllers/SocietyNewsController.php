<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SocietyNews};

class SocietyNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $news = auth()->user()->society()->whereSlug($slug)->firstOrFail()->news()->latest()->get();
        return view('societies.news.index', ['slug' => $slug, 'news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();
        return view('societies.news.create')->withSociety($society);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $news = auth()->user()->society()->whereSlug($slug)->firstOrFail()->news()->create($request->all());
        if ($request->hasFile('news_image'))
        {
            $news->addMediaFromRequest('news_image')->toMediaCollection('soc_news_images');
        }

        $request->session()->flash('success', 'News Created.');
        return redirect()->route('society.head.news.index', $slug);
    }

    public function submitForApproval(Request $request, $slug, $uuid)
    {
        $news = auth()->user()->society()->whereSlug($slug)->firstOrFail()->news()->whereUuid($uuid)->firstOrFail();
        
        $news->update([
            'status' => 'pending'
        ]);
        
        $request->session()->flash('success', 'Your news was submitted for approval');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
