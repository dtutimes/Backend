@extends('layouts.app')

@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>All Members</h1>
                <p>
                    List of all the members of the DTU Times team.
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



@endsection


