@extends('layouts.app')

@section('content')
    <section class="cover cover-fullscreen height-100 cover-features imagebg space--lg" data-overlay="2">
        <div class="background-image-holder">
            <img alt="background" src="{{ $image->getFullUrl() }}" />
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <h1 class="mb-0">
                        {{ $society->name }}
                    </h1>
                    <p>
                        <span><small>uploaded by {{ $society->user->name }} <br> </small></span>
                    </p>
                    <div>
                        <a class="btn btn--sm type--uppercase" href="" onclick="event.preventDefault();
                            document.getElementById('image-delete-form').submit();">
                            <span class="btn__text">
                                Delete
                            </span>
                        </a>
                    
                        <form id="image-delete-form" action="{{ route('society.head.image.delete', [$society->slug, $image->id] )}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection