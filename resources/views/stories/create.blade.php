@extends('layouts.app')

@section('links')
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
@endsection

@section('content')
<section id="" class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <span id="status"></span>
                <form action="{{ route('stories.update', $story->uuid) }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="col-md-12">
                        <input type="text" class="custom__input custom__input--text size--1" placeholder="Give this story some title" autocomplete="off" name="title"
                            value="{{ old('title') ? old('title'): $story->title }}" required>
                    </div>

                    <div class="col-md-12">
                        <textarea type="text" id="biliner" class="custom__input custom__input--resize-n" rows="2" placeholder="Byliner sells the story, give this a byliner."
                            autocomplete="off" name="biliner" required>{{ old('biliner') ? old('biliner'): $story->biliner }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <textarea class="body border-n" id="body" name="body">{!! old('body') ? old('body'): $story->body !!}</textarea>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <h3>SEO Details</h3>
                    </div>
                    <div class="col-md-12">
                        <label>Category</label>
                        <select name="category" class="text-dark">
                            <option value="">Give this story a Category</option>
                            @if ($story->category)
                                <option value="{{ $story->category->name }}">{{$story->category->name}}</option>
                            @endif

                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="created_at">Created at?</label>
                        <input required type="datetime-local" id="created_at" name="created_at" value="{{ $story ? $story->created_at->format('Y-m-d\TH:i:s') : now()->format('Y-m-d\TH:i:s') }}">
                    </div>

                    <div class="col-md-12">
                        <label>Blog image</label>
                        <input id="cover" type="file" class="validate-required" name="blog_image" value="{{ old('blog_image') ? old('blog_image') : ''}}">
                    </div>


                    <div class="col-md-12">
                        <textarea name="meta_description" id="" cols="30" rows="3" class="form-control" placeholder="Meta Description here" required>{{ old('meta_description') ? old('meta_description'): $story->meta_description }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <textarea name="meta_title" id="" cols="30" rows="3" class="form-control" placeholder="Meta Title here" required>{{ old('meta_title') ? old('meta_title'): $story->meta_title }}</textarea>
                    </div>

                    <div class="col-sm-6 col-xs-6 col-md-4">
                        <button class="btn btn--primary btn--icon d-inline" type="submit" name="status" value="draft">
                            <span class="btn__text"><i class="icon-Add-File"></i>Save as Draft</span>
                        </button>
                    </div>

                    <div class="col-sm-6 col-xs-6 col-md-4">
                        <button class="btn btn-success text-white btn--icon d-inline" type="submit" name="status" value="pending">
                            <span class="btn__text"><i class="icon-Add-File"></i>Submit for approval</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->

</section>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        var editor;
        ClassicEditor
				.create(document.querySelector( '#body' ), {
                    removePlugins: [
                        'Image', 'EasyImage', 'ImageCaption', 'ImageCaption', 'TableToolbar', 'Table',
                        'MediaEmbed', 'ImageUpload', 'CKFinderUploadAdapter'
                    ],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'alignment',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            'imageUpload',
                            'blockQuote',
                            'undo',
                            'redo'
                        ]
                    }

                } )
				.then( e => {
                    editor = e;
				} )
				.catch( error => {
					console.error( 'error' );
                } );

        });
</script>
@endsection
