@extends('layouts.app') 
@section('content')

<section class="text-center border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Most Visited Stories</h1>
                <p>most viewed stories in last 7 days</p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($weekViews as $item)
                    @php
                        $story = \App\Models\Story::where('slug', $item['url'])->with('user')->first();
                    @endphp
                    @if ($story != NULL)
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="mb-0">{{$story->title}}</h5>
                                <span><small>Story by {{$story->user->name }}</small></span>
                                <p><small><a target="_blank" href="{{route('blog.show', $story->slug)}}">Read</a></small></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <h2>{{$item['views']}}</h2>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection