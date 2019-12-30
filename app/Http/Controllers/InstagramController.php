<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
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

        $req = strval($fbpage["id"])."?fields=instagram_business_account" ;

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

        $fbpage = $response->getGraphNode();

        $igUserId = strval($fbpage['instagram_business_account']['id']);

        $req = $igUserId.'/media?fields=caption,comments_count,id,like_count,media_url,permalink,timestamp&limit=10';

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

        return view('instagram.index', ['posts' => $posts]);
        
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

    public function postIndex()
    {
          
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

        $req = strval($fbpage["id"])."?fields=instagram_business_account" ;

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

        $fbpage = $response->getGraphNode();

        $igUserId = strval($fbpage['instagram_business_account']['id']);

        $req = $igUserId.'?fields=biography,followers_count,follows_count,id,media_count,name,profile_picture_url,username,website';

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

        $instapage = $response->getGraphNode();

        return $instapage;
    }
}
