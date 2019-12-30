@extends('layouts.app') 
@section('content')
<section id="start" class="cover cover-fullscreen height-100 cover cover-features imagebg space--lg" data-overlay="7">
    <div class="background-image-holder">
        <img alt="background" src="{{ asset('img/oat.jpg')}}" />
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h1>
                    Welcome To Your Society Page
                </h1>
                <p class="">
                After the successful creation of your society page, you will be able to upload news and other relevant images to your page. To create the society page, follow the instructions below.
                </p>
                <a class="btn btn--primary type--uppercase inner-link" href="#instructions" data-scroll>
                    <span class="btn__text">
                        view Instructions
                    </span>
                </a>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class=" " id="instructions">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-center">Instructions</h2>
                <div class="process-1">
                    <div class="process__item">
                        <h4>Basic Information</h4>
                        <p>
                            Please fill out the details correctly, including the name of the society, 
                            society’s head’s name and contact number, the society’s PR head’s name and contact number, 
                            website link of the society and other social info.
                            <hr>
                            Make sure the social logo to be uploaded is of the dimension <strong>1056x640</strong> and size  <strong> < 1MB</strong>.
                            <hr>
                            It is mandatory to fill out all the fields.  
                        </p>
                    </div>
                    <div class="process__item">
                        <h4>Images</h4>
                        <p>
                            For uploading images to your society page, only upload high-resolution pictures of the dimension “____.” 
                            <hr>
                            Note that the image size is less than 1MB.
                        </p>
                    </div>
                    <div class="process__item">
                        <h4>News</h4>
                        <p>
                            Please add only the relevant news, supported by high-resolution pictures of size < 1MB. 
                            <hr>
                            All the news would have to be first submitted for approval before being published.
                        </p>
                    </div>
                </div>
                <!--end process-->
                <div class="text-center mt-4">
                    <a class="text-dark type--uppercase inner-link" href="#soc-form" data-scroll>
                        Go to Form
                    </a>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


<section class="cover bg--secondary" id="soc-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form action="{{ route('society.head.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 

                    <h3><strong>Primary info</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Name of the Society.</label>
                            <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ old('name') ? old('name') : '' }}" required />
                        </div>

                        <div class="col-md-12">
                            <label for="">Category</label>
                            <br>
                            <div class="input-radio input-radio--innerlabel">
                                <input id="tech" type="radio" name="category" value="tech" />
                                <label for="tech">Technical</label>
                            </div>

                            <div class="input-radio input-radio--innerlabel">
                                <input id="team" type="radio" name="category" value="team" />
                                <label for="team">Tech Team</label>
                            </div>

                            <div class="input-radio input-radio--innerlabel">
                                <input id="cultural" type="radio" name="category" value="cultural" />
                                <label for="cultural">Cultural</label>
                            </div>

                            <div class="input-radio input-radio--innerlabel">
                                <input id="misc" type="radio" name="category" value="misc" />
                                <label for="misc">Misc.</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Head</label>
                            <input type="text" name="head_incharge" placeholder="Name of the society head" class="validate-required" value="{{ old('head_incharge') ? old('head_incharge') : '' }}" />
                        </div>

                        <div class="col-md-12">
                            <label>Society's Head Contact no.</label>
                            <input type="text" name="head_contact_number" placeholder="Contact no of the society head" class="validate-required" value="{{ old('head_contact_number') ? old('head_contact_number') : '' }}" />
                        </div>

                        <div class="col-md-12">
                            <label>PR Head</label>
                            <input type="text" name="pr_incharge" placeholder="Name of the society's PR Incharge" class="validate-required" value="{{ old('pr_incharge') ? old('pr_incharge') : '' }}" />
                        </div>

                        <div class="col-md-12">
                            <label>Society's PR Head Contact no.</label>
                            <input type="text" name="pr_contact_number" placeholder="Contact no of the society's PR Incharge" class="validate-required" value="{{ old('pr_contact_number') ? old('pr_contact_number') : '' }}" />
                        </div>

                        <div class="col-md-12">
                            <label>Link to Website</label>
                            <input type="text" name="website" placeholder="Link to society's website (eg. Like www.dtutimes.dtu.ac.in)" class="validate-required" value="{{ old('website') ? old('website') : '' }}" />
                        </div>                        

                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea name="description" placeholder="About your society" class="validate-required" rows="4" required>{{ old('description') ? old('description') : '' }}</textarea>
                        </div>
                    </div>

                    <br>
                    <h3><strong>Social info</strong></h3>
                    <div class="row">
                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-linkedin icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="linkedin" value="{{ old('linkedin') ? old('linkedin') : '' }}">
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-facebook icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="facebook" value="{{ old('facebook') ? old('facebook') : '' }}">
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-instagram icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="instagram" value="{{ old('instagram') ? old('instagram') : '' }}">
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-medium icon icon--xs"></i>
                        </div>

                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="contact_mail" value="{{ old('contact_mail') ? old('contact_mail') : '' }}"
                                required />
                                <span><small>This will be your society's public email.</small></span>
                        </div>
                    </div>

                    <br>
                    <h3><strong>Society Logo</strong></h3>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="file" class="validate-required" name="logo" value="{{ old('logo') ? old('logo') : '' }}">
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn--primary">Create Society</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>

@endsection