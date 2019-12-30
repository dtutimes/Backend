<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Email\Subscriber;
use App\Http\Requests\StoreSubscriber;


class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subscribers.index')->withSubscribers(Subscriber::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($email)
    {
        setcookie("DTUnewsletter",$email,time()+(10 * 365 * 24 * 60 * 60));
        return Subscriber::create([
            'email' => $email
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriber $request)
    {
        $this->create($request->email);

        return redirect()->route('subscribers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        return Subscriber::whereUuid($uuid)->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //x
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
        return Subscriber::whereUuid($uuid)->firstOrFail()->update([
            'email' => $request->email
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $cemail=Subscriber::whereUuid($uuid)->firstOrFail();
        setcookie("DTUnewsletter",$cemail,time()-(100));
        $cemail->delete();
        return redirect()->back();
    }

    public function join(StoreSubscriber $request)
    {
        $this->create($request->email);
        return response()->json(['message' => 'Subscribed']);   
    }

}
