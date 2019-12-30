@extends('layouts.app') 
@section('content')
<section id="start" class="cover cover-fullscreen height-100 cover cover-features imagebg space--lg" data-overlay="2">
    <div class="background-image-holder">
        <img alt="background" src="{{ asset('img/back.jpg')}}" />
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h1>
                    Welcome To DTU Times
                </h1>
                <p class="lead">
                Happy to have you on board! <br>
                <small>Get started by entering the details below to update your info as the Society head. Make sure to fill out all the details correctly.</small>
                </p>
                <a class="btn btn--primary type--uppercase inner-link" href="#update-section" data-scroll>
                    <span class="btn__text">
                        Update Your Info
                    </span>
                </a>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section id="update-section" class="cover text-center bg--secondary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h1>About Us</h1>
                <p class="lead">
                    <small>
                    DTU Times is the official newsletter of Delhi Technological University, formerly known as Delhi College of Engineering, credited with the responsibility of complete reportage of developments in the college, complete account of which can be found on our website at dtutimes.dtu.ac.in.
                    </small>
                </p>
            </div>
            <div class="col-md-8">
                <div class="triptych border--round">
                    <img alt="Image" src="{{ asset('img/gallery/codtu/8.jpg') }}" />
                    <img alt="Image" src="{{ asset('img/gallery/codtu/23.jpg') }}" />
                    <img alt="Image" src="{{ asset('img/gallery/codtu/26.jpg') }}" />
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section class="cover bg--secondary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Update your info <span>@foreach ($user->roles as $item) {{$item->display_name}} @endforeach</span></h1>
                <p class="lead">
                   <small>
                    Please enter the relevant details below. <br> Note that the image uploaded should not be more than  <strong>1 MB.</strong> 
                   </small>
                </p>
                <hr>
            </div>
        </div>
        <!--end of row-->
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form action="{{ route('me.update', $user->uuid) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <h3><strong>Primary info</strong></h3>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="validate-required" value="{{ $user->name }}" required />
                        </div>
                        <div class="col-md-6">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username" class="validate-required" value="{{ old('username') ? old('username') : $user->username }}"
                                required/>
                            <span class="text-danger"><small>Required</small></span>
                        </div>
                        <div class="col-md-12">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Your Email" class="validate-required" value="{{ $user->email }}" disabled />
                            <span><small>This will not be your public email.</small></span>
                            <input type="hidden" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-12">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" class="validate-required" />
                        </div>
                        <div class="col-md-12">
                            <label>About You:</label>
                            <textarea name="bio" placeholder="This will be your public bio" class="validate-required" rows="4" required>{{ old('bio') ? old('bio') : $user->bio }}</textarea>
                            <span><small>Your Formal Introduction.</small></span>
                        </div>
                    </div>

                    <br>
                    <h3><strong>Social info</strong></h3>
                    <div class="row">
                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-linkedin icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="linkedin" value="{{ old('linkedin') ? old('linkedin') : $user->linkedin }}"
                                required>
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-facebook icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="facebook" value="{{ old('facebook') ? old('facebook') : $user->facebook }}"
                                required>
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-instagram icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="instagram" value="{{ old('instagram') ? old('instagram') : $user->instagram }}"
                                required>
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-medium icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="medium" value="{{ old('medium') ? old('medium') : $user->medium }}" />
                        </div>

                        <div class="col-md-2 text-center pt-2">
                            <i class="socicon socicon-mail icon icon--xs"></i>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="validate-required" name="display_mail" value="{{ old('display_mail') ? old('display_mail') : $user->display_mail }}"
                                required />
                                <span><small>This will be your public email.</small></span>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-4 text-center pt-2">
                            Profile pic
                        </div>
                        <div class="col-md-8">
                            <input id="avatar" type="file" class="validate-required" name="avatar" value="{{ old('avatar') ? old('avatar') : $user->avatar}}">                            
                            <span><small>Max size - 1 MB, file type - JPG|JPEG</small></span>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-4 ">
                        <button type="submit" class="btn btn--primary type--uppercase">Update your info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>

@endsection