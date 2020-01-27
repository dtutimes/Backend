@extends('layouts.app')

@section('content')
<section class="switchable feature-large">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-4 col-sm-6">
                <img alt="Image" class="border--round" src="{{ $edition->getFirstMediaUrl('covers', 'cover') }}" />
            </div>
            <div class="col-md-7 offset-md-1 col-lg-5">
                <div class="switchable__text">
                    <div class="text-block">
                        <h2>Edit {{ $edition->name }}</h2>
                        <hr>
                    </div>
                    <p class="mt-0">
                        <form method="POST" action="{{ route('edition.update', $edition->id) }}" class="row" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="{{$edition->name}}" class="validate-required" value="{{ old('name') ? old('name') : $edition->name }}"
                                />
                            </div>
                            <div class="col-md-12">
                                <label>Link</label>
                                <input type="text" name="link" placeholder="{{$edition->link}}" class="validate-required" value="{{ old('link') ? old('link') : $edition->link }}"
                                    />
                            </div>
                            
                             <div class="col-md-12">
                                <label>AJAX Code</label>
                                <input type="text" name="ajax" placeholder="{{$edition->ajax}}" class="validate-required" value="{{ old('ajax') ? old('ajax') : $edition->ajax }}"
                                    />
                            </div>

                            <div class="col-md-12">
                                <label>Period of Edition</label>
                                <input type="text" name="period" placeholder="{{$edition->period}}" class="validate-required" value="{{ old('period') ? old('period') : $edition->period }}"
                                    />
                            </div>

                            <div class="col-md-12">
                                <label for="">Cover</label>
                                <input type="file" name="cover" id="">
                            </div>

                            

                            <div class="col-md-4">
                                <br>
                                <button type="submit" class="btn btn--sm type--upercase">
                                    Save
                                </button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


@endsection