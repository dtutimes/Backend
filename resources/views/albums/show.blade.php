@extends('layouts.app')

@section('content')
<section class="cover cover-fullscreen height-100 cover-features imagebg space--lg" data-overlay="2">
    <div class="background-image-holder">
        <img alt="background" src="{{ $album->getFirstMediaUrl('covers', 'fullscreen') }}" />
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6" >
                <h1>
                    {{ $album->name }}
                </h1>
                <p class="">
                    {{ $album->biliner }}

                    <br>
                    <small class="text-white">{{ $album->status }}</small>
                </p>

                
                
                <div>
                    <a class="btn btn--sm type--uppercase" href="{{ route('images.create', $album->uuid) }}">
                        <span class="btn__text">Add Images</span>
                    </a>

                    <a class="btn btn--sm type--uppercase" href="{{ route('images.index', $album->uuid) }}">
                        <span class="btn__text">Uploads</span>
                    </a>

                    @if (auth()->user()->can('publish-album') && $album->status != 'published')
                    <a class="btn btn--sm type--uppercase" href="{{ route('albums.publish', $album->uuid) }}">
                        <span class="btn__text">
                            Publish
                        </span>
                    </a>
                    @endif

                    @if (auth()->user()->can('publish-album') && $album->status == 'published')
                    
                    <a class="btn btn--sm type--uppercase" href="{{ route('albums.draft', $album->uuid) }}">
                        <span class="btn__text">
                            Save to drafts
                        </span>
                    </a>
                    @endif
                </div>
                <p></p>


                <div>
                    @if ($album->status != 'published')
                        @if (auth()->user()->can('update-album'))
                            <a class="btn btn--sm type--uppercase" href="{{ route('albums.edit', $album->uuid) }}">
                            <span class="btn__text">
                                Edit
                            </span>
                        </a>
                        @endif

                        @if (auth()->user()->can('delete-album'))
                        <a class="btn btn--sm type--uppercase" href="{{ route('albums.index') }}" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                                <span class="btn__text">
                                    Delete this Album 
                                </span>
                            </a>
                            
                        @endif
                    @endif
                </div>

           
            </div>
            
        </div>
        <!--end of row-->
         <form id="delete-form" action="{{route('albums.destroy', $album->uuid)}}" method="post">@csrf @method('DELETE')</form>
    </div>
    <!--end of container-->

</section>

@if ($subs->count())
    <section class="cover cover-fullscreen height-100 imagebg slider text-center" data-paging="true" data-arrows="true" data-timing="9000">
        <ul class="slides">
            @foreach ($subs as $item)
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
@endif

@if ($album->image)
<section class="unpad">
    <div class="masonry masonry--gapless">
        <div class="masonry__container">

            @php 
                $open = false;
                $first = true;
                $i = 0;
            @endphp
            
            @foreach ($images as $item)
                <div class="masonry__item {{ ($open) ? 'col-lg-8' : 'col-lg-4' }} col-md-6 col-12" data-masonry-filter="Digital">
                    <div class="project-thumb hover-element height-50">
                        <a href="{{ route('images.show', [$album->uuid, $item->uuid ])}}">
                            <div class="hover-element__initial">
                                <div class="background-image-holder">
                                    <img alt="background" src="{{ $item->getFirstMediaUrl('images', 'fullscreen') }}" />
                                </div>
                            </div>
                            <div class="hover-element__reveal" data-overlay="9">
                                <div class="project-thumb__title middle text-center">
                                    <h5>{{ $item->name }} </h5>
                                    <span>{{ $item->biliner }}</span>
                                    <br>
                                    <span><small>Posted by {{ $item->user->name}}</small></span>
                                    <br> {{ $item->status }}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            {{-- Dynamic width of col --}}
            @php
                if($first) {
                    $first = false;
                    $open = true;
                }
                else{
                    if ($loop->index == ($i + 2) ) { 
                        $open = !$open; 
                        $i += 2; 
                    } 
                } 
            @endphp
        @endforeach
        <!--end of masonry container-->
    </div>
    <!--end masonry-->
</section>
@endif
@endsection