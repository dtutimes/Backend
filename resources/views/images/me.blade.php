@extends('layouts.app') 
@section('content')

@if ($images->count())
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <h1>All Uploads</h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
        <div class="masonry masonry--gapless">
            <div class="masonry-filter-container text-center align-items-center">
                <div class="masonry-filter-holder">
                    <div class="masonry__filters" data-filter-all-text="All Albums"></div>
                </div>
            </div>
            <div class="masonry__container ">
                @foreach ($images as $item)
                @if($item->album)
                    <div class="col-md-4 col-12 masonry__item" data-masonry-filter="{{ $item->album->name }}">
                        <div class="project-thumb hover-element height-40">
                            <a href="{{ route('images.show', [$item->album->uuid, $item->uuid] ) }}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="{{ $item->getFirstMediaUrl('images', 'fullscreen') }}" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="9">
                                    <div class="project-thumb__title">
                                        <h5>{{ $item->name }}</h5>
                                        <span>{{ $item->biliner }}</span>
                                        <br>
                                        <span>
                                            <small>
                                                {{ $item->status }}
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
            <!--end of masonry__container-->
        </div>
        <!--end of masonry-->
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