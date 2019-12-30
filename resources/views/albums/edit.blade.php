@extends('layouts.app')

@section('content')
<section class="switchable feature-large">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-4 col-sm-6">
                <img alt="Image" class="border--round" src="{{ $album->getFirstMediaUrl('covers', 'cover') }}" />
            </div>
            <div class="col-md-7 offset-md-1 col-lg-5">
                <div class="switchable__text">
                    <div class="text-block">
                        <h2>Edit {{ $album->name }}</h2>
                        <hr>
                    </div>
                    <p class="mt-0">
                        <form method="POST" action="{{ route('albums.update', $album->uuid) }}" class="row" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : $album->name }}"
                                />
                            </div>
                            <div class="col-md-12">
                                <label>Biliner</label>
                                <input type="text" name="biliner" placeholder="Biliner" class="validate-required" value="{{ old('biliner') ? old('biliner') : $album->biliner }}"
                                    />
                            </div>

                            <div class="col-md-12">
                                <label for="">Change Cover</label>
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