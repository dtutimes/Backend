@extends('layouts.app') 
@section('content') 
<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Create New Roles</h1>
                <p class="lead">
                   It's time to welcome that new recruit to the DTU Times family.
                </p>
            </div>
        </div>
        <!--end of row-->
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form method="POST" action="{{ route('roles.store') }}" class="row mt-0">
                    @csrf
                    <div class="col-md-12">
                        <br>
                    </div>

                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : '' }}" required />
                    </div>
                    
                    <div class="col-md-4">
                        <button type="submit" class="btn btn--sm">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>
@endsection