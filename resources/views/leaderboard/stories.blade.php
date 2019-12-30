@extends('layouts.app')


@section('content')

@php
    $top = \App\User::whereUuid($res[0][1])->first();
@endphp

<section class="cover cover-fullscreen text-center imagebg" data-gradient-bg='#4876BD,#5448BD,#8F48BD,#BD48B1'>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-7 pt-5">
                <div class="cta">
                    <!-- <h1 class="mb-0" style="font-size:6rem;"><small>#</small>1</h1> -->
                    @if($top->getFirstMediaUrl('avatars', 'thumb'))
                        <img alt="avatar" style="max-width: 13rem;" src="{{ $top->getFirstMediaUrl('avatars', 'thumb') }}" class="border--round" />
                    @endif
                    <h2 class="mb-0">{{ $top->name }}</h2>
                    <a class="btn type--uppercase" href="{{ route('under.construction') }}">
                        <span class="btn__text">
                            View {{ $top->name }}'s work
                        </span>
                    </a>
                    <p class="type--fine-print">
                    {{ $top->name }} has published {{ $res[0][0] }} stories.
                    </p>
                </div>
            </div>
            <div class="col-md-5 text-white pt-5">
                @php $i = 1 @endphp
                <h1>Leaderboard</h1>
                <br>
                @while($i < count($res) && $i < 5)
                    @php $temp = \App\User::whereUuid($res[$i][1])->first(); @endphp
                    <div class="row justify-content-right m-2" style="font-size:1.2rem;">
                        <div class="col-md-3">
                            <span>#</span>
                            <span>{{ $i + 1 }}</span>
                        </div>
                        <div class="col-md-6">
                            <span>{{ $temp->name }}</span>
                        </div>
                        <div class="col-md-3">{{ $res[$i][0] }}</div>
                    </div>
                    <hr class="mr-4 ml-4 mt-3 mb-1">
                    @php $i++ @endphp
                @endwhile
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>

@endsection