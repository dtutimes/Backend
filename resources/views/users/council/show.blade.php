@extends('layouts.app') 
@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <article> 
                    <div class="article__title">
                        <h1 class="h2">{{ $story->title }}</h1>
                        Created By 
                        <strong>
                            @if ($story->user)
                                {{$story->user->name}}
                            @endif,
                        </strong> {{ $story->created_at->diffForHumans()}}
                        <span class="
                                @if($story->status == 'draft') text-warning
                                @elseif($story->status == 'published') text-success
                                @else badge-dark @endif">
                            {{ $story->status }}
                        </span>
                    </div>

                    <div class="article__body">
                        <p class="small">
                            <small>{{ $story->biliner }}</small>
                        </p>

                        <div>
                            <img src="{{ $story->getFirstMediaUrl('blog_images', 'fullscreen') }}" alt="">
                        </div>
                        <p>
                            {!! $story->body !!}
                        </p>

                        @if ($story->status == 'pending')
                        <div>
                            <a class="btn btn--sm" href="{{ route('council.stories.edit', $story->uuid)}}">
                                <span class="btn__text">Edit</span>
                            </a>
                            <a class="btn btn--sm" href="{{ route('council.stories.publish', $story->uuid)}}">
                                <span class="btn__text">Publish</span>
                            </a>
                            <a class="btn btn--sm" href="{{ route('stories.index' )}}" onclick="event.preventDefault();
                                                            document.getElementById('draft-form').submit();">
                                <span class="btn__text">Save back To draft</span>
                            </a>
                            <form id="draft-form" class="d-inline" action="{{ route('council.stories.draft', $story->uuid)}}" method="post">
                                @csrf @method('PUT')
                            </form>
                        </div>                            
                        @endif
                        
                        <hr>
                        @if ($story->category)
                            <small>
                                Posted in <a href="{{ route('categories.show', $story->category->slug)}}">{{ $story->category->name }}</a>
                            </small>
                        @endif
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection

