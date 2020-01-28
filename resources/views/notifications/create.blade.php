@extends('layouts.app') 
@section('content')
<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <h1>New Notification</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form action="{{ route('notifications.store') }}" class="row" method="POST" enctype="multipart/form-data">
                    @csrf @method('POST')

                    <div class="col-md-12">
                        <label>Title</label>
                        <input type="text" name="name" placeholder="Title" class="validate-required" value="{{ old('name') ? old('name') : "" }}" required />
                    </div>
                    <div class="col-md-12">
                        <label>Description</label>
                        <textarea name="description" placeholder="Description" class="validate-required" rows="4" required>{{ old('description') ? old('description') : "" }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label>Category</label>
                        <select name="category" class="text-dark">
                            <option value="event">New Event</option>
                            <option value="blog">New Blog</option>
                        </select>
                    </div>
                  
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn--sm bg--dark">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>

@endsection