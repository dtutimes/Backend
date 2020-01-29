@extends('layouts.app')

@section('content')
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <h1>Notifications</h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    
        
    

    @if ($notifications->count())
    <section class=" ">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($notifications as $item)
                <div class="col-md-12 col-lg-10">
                    <div class="masonry">
                        <div class="masonry__container row">
                            <div class="col-md-6 masonry__item">
                                <div class="card card-1 boxed boxed--sm boxed--border">
                                    <div class="card__top">
                                        <div class="card__avatar">
                                            {{-- <a href="#">
                                                <img alt="Image" src="{{ auth()->user()->getFirstMediaUrl('avatars', 'thumb') }}">
                                            </a> --}}
                                            <span>
                                                <strong>{{ $item->name }}</strong>
                                            </span>
                                        </div>
                                        <div class="card__meta">
                                            <span>{{ $item->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="card__body">
                                        <a href="#">
                                            <h4>
                                                {{ $item->description }}
                                            </h4>
                                        </a>
                                        <a class="btn btn--sm" href="{{ route('stories.index' )}}" onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();">
                                            <span class="btn__text">Delete</span>
                                        </a>
                                        <form id="delete-form" action="{{route('notifications.destroy', $item->id)}}" method="post">
                                            @csrf @method('DELETE')
                                        </form>
                                    </div>
                                    <div class="card__bottom">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <div class="card__action">
                                                    <a href="#">
                                                        <i class="material-icons">remove_red_eye</i>
                                                        <span>{{ $item->view_count }}</span>
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 offset-md-1 masonry__item">
                                <div class="boxed boxed--sm">
                                    <div>
                                        <small>created by,</small>
                                        <h3 class="d-inline">{{ $item->user->name }}</h3>
                                    </div>
                                    <small>created {{ $item->created_at->diffForHumans() }}</small> 
                                    <p>
                                        <small>views: {{ $item->view_count}} </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection