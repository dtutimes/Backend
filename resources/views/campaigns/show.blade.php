@extends('layouts.app') 
@section('content')
<section class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1>{{ $campaign->name }}</h1>
                <p class="lead">
                   {{ $campaign->subject }}
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
            <div class="col-md-10 col-lg-8">
                {!! $campaign->html !!}
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <a href="" class="btn btn--sm type--uppercase">
                    <span class="btn__text">
                        Edit
                    </span>
                </a>
                <a href="{{ route('campaigns.send', $campaign->uuid ) }}" class="btn btn--sm type--uppercase">
                    <span class="btn__text">
                        Send
                    </span>
                </a>
                <a href="" class="btn btn--sm type--uppercase">
                    <span class="btn__text">
                        delete
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection