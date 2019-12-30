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
                <form method="POST" action="{{ route('users.role.update', $user->uuid) }}" class="row mt-0">
                        @csrf


                        <div class="col-md-12">
                            <label>Roles</label>
                            <select name="role" id="">
                                @foreach ($allRole as $item)
                                    <option value="{{$item->name}}">{{ $item->display_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn--sm type--upercase">Change Role</button>
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
