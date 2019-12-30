@extends('layouts.app')

@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>Blocked Members</h1>
                <p>
                    List of all the blocked members of the DTU Times team.
                </p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul class="accordion accordion-2 accordion--oneopen">
                @foreach ($users as $item)
                <li>
                    <div class="accordion__title">
                        <span class="h5">{{$item->name}}
                            <small>
                                @foreach ($item->roles as $role)
                                 {{$role->display_name}} 
                                @endforeach                                
                            </small>
                        </span>
                    </div>
                    <div class="accordion__content">
                        <small>
                            {{ $item->email }}
                        </small>
                        <br>
                        {{ substr($item->bio, 0, 90) }}
                        <br>
                        <small>
                            Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                        </small>
                        <div class="text-right d-block">
                            <a class="btn btn--sm type--uppercase" href="{{route('users.show', $item->uuid)}}">
                                <span class="btn__text">
                                    Show User
                                </span>
                            </a>
                        </div>
                    </div>
                </li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="text-center ">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <div class="cta">
                    <a class="btn btn--gray btn type--uppercase" href="{{ route('users.blocked') }}" onclick="event.preventDefault();
                        document.getElementById('unblock-all-form').submit();">
                        <span class="btn__text">
                            Unblock All
                        </span>
                        <span class="label">{{  count($users) }}</span>
                    </a>
                
                    <form id="unblock-all-form" action="{{ route('users.unblock.all') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <p>
                        Unblock all the blocked users.
                    </p>
                    <p class="type--fine-print">Got any issues? Contact the 
                        <a class="text-primary" href="index.html">Developers</a>
                    </p>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>


@endsection


