@extends('layouts.app') 
@section('content')

<section class="border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1 class="mb-0">Category Section</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h3>Create New Category</h3>
                <form action="{{ route('categories.store' )}}" method="post" class="row">
                    @csrf
                    <div class="col-md-12">
                        <label for="email">Name of the Category</label>
                        <input type="text" name="name" id="" class="class-validate">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn--sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection