<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fb = new \Facebook\Facebook([
          'app_id' => env('APP_ID'), 
          'app_secret' => env('APP_SECRET'),
          'default_graph_version' => 'v5.0',
          ]);

        try {
          // Returns a `FacebookFacebookResponse` object
          $response = $fb->get(
            '/me',
            env('ACCESS_TOKEN')
          );
        } catch(FacebookExceptionsFacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $fbpage = $response->getGraphNode();

        $req = strval($fbpage["id"])."/posts?fields=created_time,full_picture,story,message,status_type,permalink_url,id,shares&limit=10" ;

        try {
          // Returns a `FacebookFacebookResponse` object
          $response = $fb->get(
            $req,
            env('ACCESS_TOKEN')
          );
        } catch(FacebookExceptionsFacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

        $posts = $response->getGraphEdge();

        return view('facebook.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function info()
    {
        $fb = new \Facebook\Facebook([
          'app_id' => env('APP_ID'), 
          'app_secret' => env('APP_SECRET'),
          'default_graph_version' => 'v5.0',
          ]);

        try {
          // Returns a `FacebookFacebookResponse` object
          $response = $fb->get(
            '/me',
            env('ACCESS_TOKEN')
          );
        } catch(FacebookExceptionsFacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(FacebookExceptionsFacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
        $fbpage = $response->getGraphNode();

        $req = strval($fbpage["id"])."?fields=fan_count,category,description,cover,emails,id,link,location,members,name,release_date,website" ;

          try {
            // Returns a `FacebookFacebookResponse` object
            $response = $fb->get( $req, env('ACCESS_TOKEN'));

          } catch(FacebookExceptionsFacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(FacebookExceptionsFacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }
          $fbpage = $response->getGraphNode();

        return $fbpage;
    }
}
