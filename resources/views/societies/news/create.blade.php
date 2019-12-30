@extends('layouts.app')

@section('content')

<section class="pt-5 pb-5 border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <h2 class="mb-0">Create News</h2>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 offset-md-1">
                <form action="{{ route('society.head.news.store', $society->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf 

                    <!-- <h3><strong>Primary info</strong></h3> -->
                    <div class="row">
                        <div class="col-md-12">
                            <label>Title</label>
                            <input type="text" name="title" placeholder="Title" class="validate-required" value="{{ old('title') ? old('title') : '' }}" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea name="description" rows="8" placeholder="Description" class="validate-required" required >{{ old('description') ? old('description') : '' }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Event Picture</label>
                            <input type="file" class="validate-required" name="news_image" value="{{ old('news_image') ? old('news_image') : ''}}">                            
                        </div>
                    </div>  
                    
                    <div class="row">
                        <div class="col-md-4 mt-5">
                            <button type="submit" class="btn">Create Event News</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


@endsection