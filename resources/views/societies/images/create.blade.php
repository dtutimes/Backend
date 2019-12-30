@extends('layouts.app')

@section('content')

<div class="modal-container" data-show-on-exit=".element-to-exit">
	<div class="modal-content">
        <img class="m-3" id="preview" alt="">
	</div>
</div>


<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="mb-1">Add Images to {{ auth()->user()->society()->first()->name }}'s Page </h3>
                <span>
                    <small>
                    Please upload relevant pictures of your event/society.
                    <br> 
                    Make sure to maintain a dimension ratio of ‘____*____ .‘ and size <strong>< 1 MB</strong>. 
                    <br>
                    Note that pixelated images will be discarded immediately.
                    </small>
                </span>

                <p>
                    
                    <form id="file__form" class="row" action="{{ route('society.head.image.store', auth()->user()->society()->first()->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 mb-5">
                            <div class="file__container">
                                <span id="file--text" class="file__container--text">Drag and Drop Images here</span>
                                <input name="image" type="file" name="image" id="file-input">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Upload" class="btn btn--sm type--uppercase">
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
     <script>
        $(document).ready(function () {
            
           $('#file-input').change(function (e) {
                var file = e.target.files[0]
                if (file) {
                    var filename = file.name;
                    $('#file--text').text(`${filename} selected`);
                }
                else 
                $('#file--text').text(`Drag and Drop Images here.`);
           });

        });
    </script>
@endsection