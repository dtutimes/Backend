@extends('layouts.app') 
@section('content') @if ($stories->count())
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>
                    @if (Route::currentRouteName() == 'stories.index')
                        All Stories
                    @else
                        All Pending Stories
                    @endif
                    </h1>
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
                    @foreach ($stories as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->title}}
                                <small>
                                    <span class="badge
                                        @if($item->status == 'draft') text-warning
                                        @elseif($item->status == 'published') text-success
                                        @else badge-dark @endif">
                                    {{ $item->status }}
                                </span>
                            </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            {{ substr($item->biliner, 0, 90) }}
                            <br>
                            <small>
                                    Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                                </small>
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{route('council.stories.show', $item->uuid)}}">
                                        <span class="btn__text">
                                            Read Story
                                        </span>
                                    </a>
                            </div>
                        </div>
                    </li>
                    {{-- Delete button --}} {{-- @if ($item->status == 'draft')
                    <a class="btn btn--danger" href="{{ route('stories.index') }}" onclick="event.preventDefault();
                                                                document.getElementById('delete-form').submit();">
                                                                <i class="material-icons">close</i>
                                                            </a>
                    <form id="delete-form" class="" action="{{route('stories.destroy', $item->uuid)}}" method="post">
                        @csrf @method('DELETE')
                    </form>
                    @endif --}} {{--
                    <div class="col-md-1 pt-2">

                    </div>
                    <div class="col pt-2 text-center">
                        <span class="badge p-1 @if($item->status == 'draft') badge-primary @elseif($item->status == 'published') badge-success @else badge-dark @endif">{{ $item->status }}</span>
                    </div> --}} {{--
                    <div>{{ $item->slug }}</div>
                    <div>{!! substr($item->body, 0, 90) !!}{{ strlen(strip_tags($item->body)) > 250 ? '...' : "" }}</div>
                    --}} @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

@else
<section class="space--lg">
    <div class="container">
        <div class="text-center">
            <img width="150" src="{{ asset('svg/pencil.svg') }}" alt="" srcset="">
            <h3>Nothing here,</h3>
        </div>
    </div>
</section>
@endif
@endsection