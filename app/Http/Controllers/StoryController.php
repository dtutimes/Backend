<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Tag, Story};
use App\{User, Role};
use App\Http\Requests\StoreStory;
use App\Events\StorySubmittedForApproval as SubmitEvent;
use Session;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Log;


class StoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $stories = auth()->user()->story()->latest()->paginate(20);
        
        return view('stories.index', ['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'New Story';

        $story = auth()->user()->story()->create([
            'title' => '',
            'slug' => str_slug($title, "-").'-'.rand(10, 9999)
        ]);

        return redirect()->route('stories.edit', $story->uuid );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $gi
     * @return \Illuminate\Http\Response
     */
    // public function autoSave(Request $request)
    // {
    //     $data = [
    //         'title'             => $request->title,
    //         'body'              => $request->body,
    //         'meta_title'        => $request->meta_title,
    //         'meta_description'  => $request->meta_description,
    //         'biliner'           => $request->biliner,
    //     ];

    //     $story = auth()->user()->story()->update($data);

    //     return response()->json('saved');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->with(['user', 'category'])->firstOrFail();            

        return view('stories.show', ['story' => $story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->with(['user', 'category'])->firstOrFail();

        if($story->status != 'draft'){
            session()->flash('success', $story->title.', is '.$story->status.'. You cannot edit it right now.');
            return redirect()->route('stories.show', $story->uuid );
        }

        $categories = Category::all();

        return view('stories.create', ['story' => $story, 'categories' => $categories ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStory $request, $uuid)
    {
        $data = [
            'title'             => $request->title,
            'body'              => $request->body,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'category_id'       => $request->category,
            'biliner'           => $request->biliner,
            'slug'              => str_slug($request->title, "-").'-'.rand(100, 999),
            'cover'             => $request->cover,
            'status'            => $request->status,
            'created_at'        => \Carbon\Carbon::parse($request->created_at)->toDateTimeString(),
            'updated_at'        => \Carbon\Carbon::parse($request->created_at)->toDateTimeString(),
        ];

        $story = auth()->user()->story()->where('uuid' , $uuid)->firstOrFail();
        
        $story->update($data);

        if (isset($request['blog_image'])) {
            $story->clearMediaCollection('blog_images');
            $story->addMediaFromRequest('blog_image')->toMediaCollection('blog_images');
        } 
        
        if($data['status'] == 'pending') 
            $this->callSubmitEvent($uuid);

        $request->session()->flash('success', $data['title'].', Updated!');
        
        return redirect()->route('stories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->firstOrFail();
        $title = $story->title;
        $story->clearMediaCollection('blog_images');
        
        $story->delete();

        session()->flash('success', $title.', Deleted!');
        return redirect()->route('stories.index');
    }

    public function submit($uuid)
    {
        $story = auth()->user()->story()->whereUuid($uuid)->firstOrFail();

        if($story->status != 'draft')
        {
            session()->flash('success', $story->title.', is '.$story->status );
            return redirect()->route('stories.index');
        }
        
        $story->update([
            'status' => 'pending'
        ]);

        $this->callSubmitEvent($uuid);

        session()->flash('success', $story->title.', Submitted for approval.');

        return redirect()->route('stories.index');
    }

    public function callSubmitEvent($uuid)
    {
        return event(new SubmitEvent($uuid));
    }

    public function columnistLeaderboardIndex()
    {
        $res = [];
        $users = User::has('story')->get();
        
        foreach($users as $user){
            $temp = $user->story()->where('status', 'published')->count();
            array_push($res, [$temp, $user->uuid]);
        }

        usort($res, function ($a, $b) {
            return $a[0] < $b[0];
        });
        
        return view('leaderboard.stories', ['res' => $res]);
    }
}
