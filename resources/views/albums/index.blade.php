@extends('layouts.app') 
@section('content')

{{-- <div class="notification pos-right pos-bottom custom__notification" data-animation="from-bottom" data-autoshow="200" data-autohide="5000">
    <div class="boxed boxed--border border--round box-shadow">
        <div class="text-block">
            <h5>Notification</h5>
            <p>
                {{$albums->count()}} albums found
            </p>
        </div>
    </div>
</div> --}}


@if ($albums->count())
    <section class="cover cover-fullscreen height-100 imagebg slider text-center" data-paging="true" data-arrows="true" data-timing="9000">
        <ul class="slides">
            @foreach ($albums as $item)
            <li class="imagebg col-lg-4 col-md-6 col-12" data-overlay="1">
                <div class="background-image-holder">
                    <img alt="background" src="{{ $item->getFirstMediaUrl('covers', 'cover')}}" />
                </div>
                <div class="pos-vertical-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>{{ $item->name }}</h4>
                            <a href="{{ route('albums.show', $item->uuid) }}">
                                Explore Gallery
                            </a> 
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </li>
            @endforeach
        </ul>
    </section>

 
@else
    <section class="space--lg">
        <div class="container">
            <div class="text-center">
                <img width="150" src="{{ asset('svg/albums.svg') }}" alt="" srcset="">
                <h3>Nothing here</h3>
            </div>
        </div>
    </section>
@endif
@endsection