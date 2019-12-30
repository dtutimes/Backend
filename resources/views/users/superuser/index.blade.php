@extends('layouts.app')

@section('content')
    <section class="pt-5 pb-5 border--bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <h1>Hi, {{ auth()->user()->name }}</h1>
                    <p>
                        Welcome to Superuser's Dashboard.
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="space--sm border--bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="cta">
                        <h2>Users</h2>
                    </div>
                </div>
            </div>
            <!--end of row-->
            <div class="row text-center"> 
                @php
                    $photographer = \App\Role::where('name', 'photographer')->with('users')->first()->users->count();
                    $columnists = \App\Role::where('name', 'columnist')->with('users')->first()->users->count();
                    $councils = \App\Role::where('name', 'council')->with('users')->first()->users->count();
                @endphp  
                <div class="col-md-2 offset-md-1">
                    <img src="{{ asset('svg/team.svg') }}" alt="" class="image--sm">
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ \App\User::count() }}</h1>
                    <small>Users</small>
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ $columnists }}</h1>
                    <small>Columnists</small>
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ $photographer }}</h1>
                    <small>Photographers</small>
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ $councils }}</h1>
                    <small>Council</small>
                </div>
            </div>
        </div>
        <!--end of container-->
    </section>

    <section class="space--sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="cta">
                        <h2>Stories</h2>
                    </div>
                </div>
            </div>
            <!--end of row-->
            <div class="row text-center">  
                <div class="col-md-2 offset-md-1">
                    <img src="{{ asset('svg/type.svg') }}" alt="" class="image--sm">
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ \App\Models\Story::count() }}</h1>
                    <small>Total</small>
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ \App\Models\Story::where('status', 'published')->count() }}</h1>
                    <small>Published</small>
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ \App\Models\Story::where('status', 'pending')->count() }}</h1>
                    <small>Pending</small>
                </div>
                <div class="col-md-2">
                    <h1 class="mb-0">{{ \App\Models\Story::where('status', 'draft')->count() }}</h1>
                    <small>Draft</small>
                </div>
            </div>
        </div>
        <!--end of container-->
    </section>
@endsection