@extends('layouts.app') 
 
@section('content')

<section class="pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h2>Create Campaign</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form action="{{ route('campaigns.store') }}" method="post" class="row">
                    @csrf
                    <div class="col-md-12">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="class-validate">
                    </div>

                    <div class="col-md-12">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="class-validate">
                    </div>

                    <div class="col-md-12">
                        <textarea class="body border-n" id="html-editor" name="html">{!! old('html') ? old('html'): '' !!}</textarea>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn--sm">Save and Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        var editor;
        ClassicEditor
				.create(document.getElementById('html-editor'), {
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
                    console.log(e)
                    editor = e;
				} )
				.catch( error => {
					console.error( 'error' );
                } );
        
        });

</script>
@endsection