@extends('layouts.app')
@section('content') @if ($stories->count())
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>
                    Published Stories
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
                                <a class="btn btn--sm type--uppercase" target="_blank" href="{{route('council.stories.show', $item->uuid)}}">
                                    <span class="btn__text">
                                        Read Story
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase"
                                    href="{{ route('council.stories.published') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('delete-form--{{$item->id}}').submit(); "
                                    >
                                    <span class="btn__text">
                                        Delete
                                    </span>
                                </a>
                                <form id="delete-form--{{$item->id }}" action="{{ route('council.stories.destory', $item->uuid )}}" method="POST">
                                    @csrf @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        {{ $stories->links() }}
    </div>
    <!--end of container-->
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
