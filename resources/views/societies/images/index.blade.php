@extends('layouts.app') 
@section('content')

@if ($images->count())
    <section class="pt-5 pb-5 border--bottom">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-5 col-lg-5">
                    <h1>All Images</h1>
                </div>
                <div class="col-md-3 col-lg-3">
                    <img class="image--sm" src="{{$society->getFirstMediaUrl('soc_logo')}}" alt="">
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="unpad">
        <div class="masonry masonry--gapless">
            <div class="masonry__container">
                @foreach ($images as $item)
                    <div class="masonry__item col-lg-4 col-md-6 col-12" data-masonry-filter="Digital">
                        <div class="project-thumb hover-element height-50">
                            <a href="{{ route('society.head.image.show', [$society->slug, $item->id]) }}">
                                <div class="hover-element__initial">
                                    <div class="background-image-holder">
                                        <img alt="background" src="{{ $item->getUrl() }}" />
                                    </div>
                                </div>
                                <div class="hover-element__reveal" data-overlay="9">
                                </div>
                            </a>
                        </div>
                    </div>
            @endforeach
            <!--end of masonry container-->
        </div>
        <!--end masonry-->
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
