@extends('layouts.app')
@section('links')
@endsection

@section('content')

<section class="cover">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>Change {{ $user->name }}, Roles </h1>
                <p class="">
                    @foreach ($user->roles as $item)
                        {{ $item->display_name }}
                    @endforeach
                </p>
                <hr>
            </div>
        </div>
        <!--end of row-->

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <form method="POST" action="{{ route('users.position.update', $user->uuid) }}" class="row mt-0">
                        @csrf


                        <div class="col-md-12">
                            <label>Positions</label>
                            <select name="position" id="">
                              <option value="columnist">Columnist</option>
                              <option value="designer">Designer</option>
                              <option value="photographer">Photographer</option>
                              <option value="illustrator">Illustrator</option>
                              <option value="developer">Developer</option>
                              <option value="council">Council</option>
                              <option value="alumni">Alumni</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn--sm type--upercase">Change Position</button>
                        </div>

                    </form>
            </div>
        </div>
    </div>
    <!--end of container-->
</section>

@endsection

@section('scripts')
@endsection
