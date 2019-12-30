@extends('layouts.app')
@section('content')
<section class="bg--secondary space--sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="boxed boxed--lg boxed--border">
                    <div class="text-block text-center">
                        <img alt="avatar" src="{{ $user->getFirstMediaUrl('avatars', 'thumb') }}" class="image--md" />
                        <span class="h5">{{ $user->name }}</span>
                        <span>@foreach ($user->roles as $item) {{$item->name}} @endforeach</span>
                        <span class="label">
                            <a href="{{ route('users.role.edit', $user->uuid) }}" class="text-white">@foreach ($user->roles as $item) {{$item->name}} @endforeach</a>
                        </span>
                    </div>
                    <div class="text-block clearfix text-center">
                        <ul class="row row--list">
                            <li class="col-md-6">
                                <span class="type--fine-print block">Joined </span>
                                <span>{{ $user->created_at->diffForHumans() }}</span>
                            </li>
                            <li class="col-md-6">
                                <span class="type--fine-print block">Contact</span>
                                <a href="#">{{ $user->email }}</a>
                            </li>
                    </div>
                    </ul>
                </div>
                <div class="boxed bg--none text-center">
                    <a href="{{ route('users.index') }}" class="btn btn--sm" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();">
                        <span class="btn__text">Delete User</span>
                    </a>

                    <a href="{{ route('users.position', $user->uuid) }}" class="btn btn--sm" >
                        <span class="btn__text">Update Position</span>
                    </a>



                    @if($user->blocked)
                        <a href="" class="btn btn--sm" onclick="event.preventDefault();
                                                    document.getElementById('unblock-form').submit();">
                            <span class="btn__text">Unblock</span>
                        </a>

                        <form id="unblock-form" action="{{route('users.unblock.single', $user->uuid)}}" method="post">
                            @csrf @method('PUT')
                        </form>
                    @else
                        <a href="" class="btn btn--sm" onclick="event.preventDefault();
                                                    document.getElementById('block-form').submit();">
                            <span class="btn__text">Block</span>
                        </a>

                        <form id="block-form" action="{{route('users.block.single', $user->uuid)}}" method="post">
                            @csrf @method('PUT')
                        </form>
                    @endif

                    <form id="delete-form" action="{{route('users.destroy', $user->uuid)}}" method="post">
                        @csrf @method('DELETE')
                    </form>
                </div>
                <div class="boxed text-center">
                    <ul class="social-list list-inline list--hover">
                        <li>
                            <a href="#">
                                <i class="socicon socicon-mail icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="socicon socicon-twitter icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="socicon socicon-facebook icon icon--xs"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="socicon socicon-instagram icon icon--xs"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="boxed boxed--border">
                    <ul class="row row--list clearfix text-center">
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Likes</span>
                            <span class="h3">220</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Articles</span>
                            <span class="h3">14</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Comments</span>
                            <span class="h3">2,129</span>
                        </li>
                        <li class="col-md-3 col-6">
                            <span class="h6 type--uppercase type--fade">Following</span>
                            <span class="h3">119</span>
                        </li>
                    </ul>
                </div>

                <div class="boxed boxes--border">
                    <h4>Permissions</h4>
                    <span class="label">
                        <a class="text-white" href="{{route('users.permission.edit', $user->uuid)}}">
                            Edit Permissions
                        </a>
                    </span>
                    <ul>
                        @foreach ($user->allPermissions() as $item) <li class="">{{$item->name}}</li> @endforeach
                    </ul>
                </div>


            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
    {{-- <p>name: {{$user->name}} </p>
    <p>email: {{$user->email}} </p>
    <p>username: {{$user->username}} </p>
    <p>bio: {{$user->bio}} </p>
    <p>avatar: {{$user->avatar}} </p>
    <p>activated: {{$user->activated}} </p>
    <p>data_of_birth: {{$user->data_of_birth}} </p>
    <p>linkedin: {{$user->linkedin}} </p>
    <p>facebook: {{$user->facebook}} </p>
    <p>instagram: {{$user->instagram}} </p>
    <p>display_mail: {{$user->display_mail}} </p>
    <p>medium: {{$user->medium}} </p>
    <p>Role:

    </p>
    <p>Permissions:

    </p> --}}
@endsection
