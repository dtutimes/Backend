@extends('layouts.app')

@section('content') 

<section class="cover cover-fullscreen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h1>Reset Your Password</h1>
                <form action="{{ route('password.update') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="class-validate">
                    </div>

                    <div class="col-md-12">
                        <label for="email">Password</label>
                        <input id="password" type="password" class="class-validate" name="password" required>
                    </div>

                    <div class="col-md-12">
                        <label for="email">Confirm Password</label>
                        <input id="password-confirm" type="password" class="class-validate" name="password_confirmation" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn--sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
