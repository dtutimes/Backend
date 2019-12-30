@extends('layouts.app') 
@section('content')

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <article> 
                    <div class="article__title">
                        <h1 class="h2">{{ $story->title }}</h1>
                        Created By <strong>{{$story->user->name}},</strong> {{ $story->created_at->diffForHumans()}}
                        <span class="
                                @if($story->status == 'draft') text-warning
                                @elseif($story->status == 'published') text-success
                                @else badge-dark @endif">
                            {{ $story->status }}
                        </span>
                    </div>

                    <div class="text-center">
                        @if ($story->getFirstMediaUrl('blog_images', 'fullscreen'))
                             <img alt="background" src="{{ $story->getFirstMediaUrl('blog_images', 'fullscreen') }}" />
                        @endif
                       
                    </div>
                    
                    <br>

                    <div class="article__body">
                        <p class="small">
                            <small>{{ $story->biliner }}</small>
                        </p>
                        <p>
                            {!! $story->body !!}
                        </p>
                        @if ($story->status == 'draft')
                        <div>
                            <a class="btn btn--sm" href="{{ route('stories.edit', $story->uuid)}}">
                                <span class="btn__text">Edit</span>
                            </a>
                            <a class="btn btn--sm" href="{{ route('stories.submit', $story->uuid )}}">
                                <span class="btn__text">Submit for Approval</span>
                            </a>
                            <a class="btn btn--sm" href="{{ route('stories.index' )}}" onclick="event.preventDefault();
                                                            document.getElementById('delete-form').submit();">
                                <span class="btn__text">Delete</span>
                            </a>
                            <form id="delete-form" action="{{route('stories.destroy', $story->uuid)}}" method="post">
                                @csrf @method('DELETE')
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


