<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSociety;
use Spatie\MediaLibrary\Models\Media;
use App\Models\Society;

class SocietyHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->society()->get()->count();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.society_head.create');
    }

    /**
     * Store a newly created resource in storage.
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSociety $request)
    {

        $society = auth()->user()->society()->create([
        'name' => $request->name, 
            'slug' => str_slug($request->name, "-"),
            'category' => $request->category,   
            'description' => $request->description, 
            'linkedin' => $request->linkedin, 
            'facebook' => $request->facebook, 
            'instagram' => $request->instagram, 
            'contact_mail' => $request->contact_mail, 
            'head_incharge' => $request->head_incharge, 
            'pr_incharge' => $request->pr_incharge, 
            'pr_contact_number' => $request->pr_contact_number,
            'head_contact_number' => $request->head_contact_number, 
            'website'  => $request->website 
        ]); 

        if ($request->hasFile('logo')) {
            $society->clearMediaCollection('soc_logo');
            $society->addMediaFromRequest('logo')->toMediaCollection('soc_logo');
        } 
        
        return redirect()->route('society.head.show', $society->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();

        return view('users.society_head.show', [
            'society' => $society,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();

        return view('users.society_head.edit', [
            'society' => $society
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();
        
        $society->update([
            'name' => $request->name, 
            'slug' => str_slug($request->name, "-"),
            'description' => $request->description, 
            'linkedin' => $request->linkedin, 
            'facebook' => $request->facebook, 
            'status' => 'draft',
            'instagram' => $request->instagram, 
            'contact_mail' => $request->contact_mail, 
            'head_incharge' => $request->head_incharge, 
            'pr_incharge' => $request->pr_incharge, 
            'pr_contact_number' => $request->pr_contact_number,
            'head_contact_number' => $request->head_contact_number, 
            'website'  => $request->website 
        ]); 
    
        if ($request->hasFile('logo')) {
            $society->clearMediaCollection('soc_logo');
            $society->addMediaFromRequest('logo')->toMediaCollection('soc_logo');
        } 
        
        return redirect()->route('society.head.show', $society->slug);
    }

    public function updateStatusToPending(Request $request, $slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();

        $society->update(['status' => 'pending']);

        $request->session()->flash('success', 'Pending for Approval');

        return redirect()->route('society.head.show', $society->slug);
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

    public function imageIndex($slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();

        $images = $society->getMedia('soc_images');

        return view('societies.images.index', [
            'society' => $society,
            'images'   => $images
        ]);
    }

    public function imageCreate($slug)
    {
        return view('societies.images.create');
    }

    public function imageStore(Request $request, $slug)
    {
        $society = auth()->user()->society()->whereSlug($slug)->firstOrFail();
        if ($request->hasFile('image'))
        {
            $society->addMediaFromRequest('image')->toMediaCollection('soc_images');
            $request->session()->flash('success', 'Image Uploaded :)');
            return redirect()->back();
        } else {
            $request->session()->flash('success','No Image');
            return redirect()->back();
        }
    }

    public function imageShow($slug, $id)
    {
        $society = Society::whereSlug($slug)->firstOrFail();

        $media = Media::find($id);

        return view('societies.images.show', ['image' => $media, 'society' => $society]);
    }   

    public function imageDelete(Request $request, $slug, $id)
    {
        $media = Media::find($id)->delete();

        return redirect()->route('dashboard');
    }
}
