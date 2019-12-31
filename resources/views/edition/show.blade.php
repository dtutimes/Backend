@extends('layouts.app')

@section('content')
<section class="cover cover-fullscreen height-100 cover-features imagebg space--lg" data-overlay="2">
    <div class="background-image-holder">
        <img alt="background" src="{{ $edition->getFirstMediaUrl('covers', 'cover') }}" />
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6" >
                <h1>
                    {{ $edition->name }}
                </h1>
                <p class="">
                    <a href="{{ $edition->link }}">Go to Edition</a>
                </p>

                <p></p>


                <div>
                            <a class="btn btn--sm type--uppercase" href="{{ route('edition.edit', $edition->id) }}">
                            <span class="btn__text">
                                Edit
                            </span>
                        </a>

                        <a class="btn btn--sm type--uppercase" href="{{ route('edition.index') }}" onclick="event.preventDefault();
                            document.getElementById('delete-form').submit();">
                                <span class="btn__text">
                                    Delete this Edition
                                </span>
                            </a>

                </div>

           
            </div>
            
        </div>
        <!--end of row-->
         <form id="delete-form" action="{{route('edition.destroy', $edition->id)}}" method="post">@csrf @method('DELETE')</form>
    </div>
    <!--end of container-->

</section>


@endsection