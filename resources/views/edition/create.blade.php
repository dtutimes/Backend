@extends('layouts.app') 
@section('content')
<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Create New Edition</h1>
                <p class="lead mb-0">
                    Build lean, beautiful websites with a clean and contemporary look to suit a range of purposes.
                </p>
                <hr>
                <form method="POST" action="{{ route('edition.store') }}" class="row mt-0" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : '' }}"
                            required />
                    </div>

                    <div class="col-md-12">
                        <label>Link To Edition</label>
                        <input type="text" name="link" placeholder="Link" class="validate-required" value="{{ old('link') ? old('link') : '' }}"
                            required />
                    </div>
                    
                    <div class="col-md-12">
                        <label>AJAX Code</label>
                        <input type="text" name="ajax" placeholder="AJAX" class="validate-required" value="{{ old('ajax') ? old('ajax') : '' }}"
                            required />
                    </div>
                
                    <div class="col-md-12">
                        <label for="">Cover</label>
                        <input type="file" name="cover" id="">
                    </div>
                
                    <div class="col-md-12">
                        <br>
                    </div>
                
                    <div class="col-md-4">
                        <button type="submit" class="btn btn--sm type--upercase">Upload Image and Create</button>
                    </div>
                </form>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@endsection