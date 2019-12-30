@extends('layouts.app')

@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>
                    @if (Route::currentRouteName() == 'council.societies.index')
                        All Societies
                    @elseif (Route::currentRouteName() == 'council.societies.pending')
                        All Pending Societies
                    @else
                        Something else
                    @endif
                </h1>
                <p>
                    @if (Route::currentRouteName() == 'council.societies.index')
                        List of all the societies of the DTU.
                    @elseif (Route::currentRouteName() == 'council.societies.pending')
                        List of all the societies pending for approval.
                    @else
                        Something else
                    @endif
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
                @foreach ($societies as $item)
                <li>
                    <div class="accordion__title">
                        <span class="h5">{{$item->name}}
                            <small class="ml-3">
                                {{ $item->category }}                              
                            </small>
                        </span>
                    </div>
                    <div class="accordion__content">
                        <small>
                           Head - <strong>{{ $item->head_incharge }}</strong>, {{ $item->head_contact_number }}
                        </small>
                        <br>
                        {{ substr($item->description, 0, 90) }}
                        <br>
                        <small>
                            Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                        </small>
                        <div class="text-right d-block">
                            <a class="btn btn--sm type--uppercase" href="{{route('council.societies.show', $item->slug)}}">
                                <span class="btn__text">
                                    Show Society
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


