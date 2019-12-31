@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{ $category->name }}
                    </div>

                    <div class="card-body pl-0 pr-0 pb-0">
                        @foreach ($stories as $item)
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    {{$item->title}}
                                </div>
                                <div class="col">
                                    <a href="{{ route('stories.show', $item->slug)}}">view</a>
                                </div>
                                <div class="col">
                                    {{ $item->created_at}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection