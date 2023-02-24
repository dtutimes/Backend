@extends('layouts.app') 
@section('content') 
<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Create Multiple New Users</h1>
                <p class="lead">
                   It's time to welcome that new recruit to the DTU Times family.
                </p>
            </div>
        </div>
        <!--end of row-->
        
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form method="POST" action="{{ route('users.create-multipleUsers') }}" enctype="multipart/form-data" class="row mt-0">
                    @csrf
                    <div class="col-md-12">
                        <label>Select a CSV file to import</label>
                        <input type="file" name="file" placeholder="CSV file" class="validate-required" required />
                    </div>
                
                    <div class="col-md-4">
                        <button type="submit" class="btn btn--sm">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>
@endsection