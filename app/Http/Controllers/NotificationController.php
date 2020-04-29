<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Events\NotificationEvent;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications =Notification::latest()->with('user')->get();
        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->notification()->create($request->all());

//         $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
//           "instanceId" => env('INSTANCE_ID'),
//           "secretKey" => env('SECRET_KEY'),
//         ));

//         $publishResponse = $beamsClient->publishToInterests(
//           array("hello", "donuts"),
//           array(
//             "fcm" => array(
//               "notification" => array(
//                 "title" => $request->name,
//                 "body" => $request->description,
//                 "category" => $request->category,
//                 "link" => $request->link
//               )
//             ),
//             "apns" => array("aps" => array(
//               "alert" => array(
//                 "title" => $request->name,
//                 "body" => $request->description,
//                 "category" => $request->category,
//                 "link" => $request->link
//               )
//             ))
 //       ));
        $header = ['Authorization' => 'key=AAAAVkYNnL8:APA91bFan9iVArecnDiDSvN37JpwAoh_lg4F6DuzJbdZk9TN9SocIiIZOO-DfJI2O-4U-kmhjh5GWMXLpmmx_Fcpa4xD1l9gNQ4ElUX9x9lnJl3jSihNRIQ9V2Cc9PKmgLY9crovI9qp'];
        $body = [
                "to"=> "/topics/all",
                    "notification"=> [
                      "title"=> "Check this Mobile (title)",
                      "body"=> "Rich Notification testing (body)",
                      "mutable_content"=> true,
                      "sound"=> "Tri-tone"
                      ]
              ]
        $request = new Request('POST', 'https://fcm.googleapis.com/fcm/send', $header, $body);
        $response = $client->send($request);

        return redirect()->route('notifications.index');
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
        $notif = Notification::whereid($id)->firstOrFail();
        
        $notif->delete();

        session()->flash('success','Notification Deleted!');

        return redirect()->route('notifications.index');
    }

    public function send($id)
    {
        $notification = auth()->user()->notification()->whereId($id)->first();

        broadcast(new NotificationEvent($notification))->toOthers();
    }
}
