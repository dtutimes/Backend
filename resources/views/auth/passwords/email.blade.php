@extends('layouts.app')

@section('content')

<section class="cover cover-fullscreen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h1>Recover Password</h1>
                <form action="{{ route('password.email') }}" method="post" class="row">
                    @csrf
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="class-validate">
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn--sm">Send Password reset link</button>
                    </div>
                </form>
                <br>
                <p>
                    <small>After Submitting the form please check your email address for password reset link. If you are still facing problem, mail us at dtutimes@dtu.ac.in.</small>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
