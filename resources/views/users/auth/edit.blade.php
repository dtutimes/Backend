@extends('layouts.app') 
@section('content')

<section class="cover bg--secondary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Update your info {{ $user->name }}</h1>
                <p class="lead">
                    Build lean, beautiful websites with a clean and contemporary look to suit a range of purposes.
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
                            <label>Username:</label>
                            <input type="text" name="username" placeholder="Username" class="validate-required" value="{{ old('username') ? old('username') : $user->username }}"
                                required/>
                        </div>
                        <div class="col-md-12">
                            <label>Email Address:</label>
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <input type="email" name="email" placeholder="Your Email" class="validate-required" value="{{ $user->email }}" disabled />
                        </div>
                        <div class="col-md-12">
                            <label>About You:</label>
                            <textarea name="bio" placeholder="This will be your public bio" class="validate-required" rows="4" required>{{ old('bio') ? old('bio') : $user->bio }}</textarea>
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
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label>Password:</label>
                        <input type="password" name="password" placeholder="Password" class="validate-required" />
                        <small>You can enter the same password or Update your password.</small>
                    </div>
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