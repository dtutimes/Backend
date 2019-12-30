@extends('layouts.app') 

@section('content')

<section class="space--xs mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edit {{ $society->name }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form action="{{ route('society.head.update', $society->slug) }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    @method('PUT')
                    <h3><strong>Primary info</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : $society->name }}" required />
                        </div>

                        <div class="col-md-12">
                            <label>Head Incharge</label>
                            <input type="text" name="head_incharge" placeholder="Name of the society head" class="validate-required" value="{{ old('head_incharge') ? old('head_incharge') : $society->head_incharge }}" />
                        </div>

                        <div class="col-md-12">
                            <label>Society Incharge's Contact no.</label>
                            <input type="text" name="head_contact_number" placeholder="Contact no of the society head" class="validate-required" value="{{ old('head_contact_number') ? old('head_contact_number') : $society->head_contact_number }}" />
                        </div>

                        <div class="col-md-12">
                            <label>PR Incharge</label>
                            <input type="text" name="pr_incharge" placeholder="Name of the society's PR Incharge" class="validate-required" value="{{ old('pr_incharge') ? old('pr_incharge') : $society->pr_incharge }}" />
                        </div>

                        <div class="col-md-12">
                            <label>PR Incharge's Contact no.</label>
                            <input type="text" name="pr_contact_number" placeholder="Contact no of the society's PR Incharge" class="validate-required" value="{{ old('pr_contact_number') ? old('pr_contact_number') : $society->pr_contact_number }}" />
                        </div>

                        <div class="col-md-12">
                            <label>Link to Website</label>
                            <input type="text" name="website" placeholder="Link to society's website (eg. Like www.dtutimes.dtu.ac.in)" class="validate-required" value="{{ old('website') ? old('website') : $society->website }}" />
                        </div>                        

                        <div class="col-md-12">
                            <label>Description:</label>
                            <textarea name="description" placeholder="About your scoiety" class="validate-required" rows="4" required>{{ old('description') ? old('description') : $society->description }}</textarea>
                        </div>
                    </div>

                    <br>
                    <h3><strong>Social info</strong></h3>
                    <div class="row">
                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-linkedin icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="linkedin" value="{{ old('linkedin') ? old('linkedin') : $society->linkedin }}">
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-facebook icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="facebook" value="{{ old('facebook') ? old('facebook') : $society->facebook }}">
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-instagram icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="instagram" value="{{ old('instagram') ? old('instagram') : $society->instagram }}">
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-medium icon icon--xs"></i>
                        </div>

                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="contact_mail" value="{{ old('contact_mail') ? old('contact_mail') : $society->contact_mail }}"
                                required />
                                <span><small>This will be your society's public email.</small></span>
                        </div>
                    </div>

                    <br>
                    <h3><strong>Social Logo</strong></h3>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="file" class="validate-required" name="logo" value="{{ old('logo') ? old('logo') : '' }}">
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn--primary">Update your info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>

@endsection