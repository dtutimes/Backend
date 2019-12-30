@extends('layouts.app') 
@section('content')
<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Upload New Image</h1>
                <p class="lead">
                    Build lean, beautiful websites with a clean and contemporary look to suit a range of purposes.
                </p>
                <hr>
            </div>
        </div>
        <!--end of row-->

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form method="POST" action="{{ route('images.update', [$image->album->uuid, $image->uuid] ) }}" class="row mt-0" >
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : $image->name }}"
                            required />
                    </div>

                    <div class="col-md-12">
                        <label>Biliner</label>
                        <input type="text" name="biliner" placeholder="Biliner" class="validate-required" value="{{ old('biliner') ? old('biliner') : $image->biliner }}"
                            required />
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn--sm type--uppercase" href="#update-section" data-scroll>
                            <span class="btn__text">
                                Edit
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>
@endsection