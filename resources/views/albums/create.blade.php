@extends('layouts.app') 
@section('content')
<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Create New Album</h1>
                <p class="lead mb-0">
                    Build lean, beautiful websites with a clean and contemporary look to suit a range of purposes.
                </p>
                <hr>
                <form method="POST" action="{{ route('albums.store') }}" class="row mt-0" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : '' }}"
                            required />
                    </div>

                    <div class="col-md-12">
                        <label>Biliner</label>
                        <input type="text" name="biliner" placeholder="Biliner" class="validate-required" value="{{ old('biliner') ? old('biliner') : '' }}"
                            required />
                    </div>

                    <div class="col-md-12">
                        <label>Category</label>
                        <select name="album_id" id="">
                            <option value="">Make as main</option>
                            @foreach ($albums as $item)
                                <option value="{{$item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
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