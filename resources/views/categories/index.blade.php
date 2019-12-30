@extends('layouts.app') 
@section('content')
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>All Categories</h1>
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
                    @foreach ($categories as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->name}}
                        </span>
                        </div>
                        <div class="accordion__content">
                            <small>
                            Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
                            <div class="text-right d-block">
                                <a class="btn btn--sm m-0 type--uppercase"
                                    href="{{ route('categories.show', $item->slug) }}">
                                    <span class="btn__text">
                                        View
                                    </span>
                                </a>
                                @if (auth()->user()->can('update-category'))
                                    <a class="btn btn--sm m-0 type--uppercase"
                                        href="{{ route('categories.edit', $item->id) }}">
                                        <span class="btn__text">
                                            Edit
                                        </span>
                                    </a>
                                @endif @if (auth()->user()->can('delete-category'))
                                    <form id="delete-form" style="display:inline-block;" action="{{ route('categories.destroy', $item->id )}}" method="POST">
                                        @csrf @method('DELETE')
                                        <button style="padding: .4rem 2rem; margin-bottom: -1rem;" type="submit" class="btn btn--sm type--uppercase">
                                            Delete
                                        </button>
                                    </form>
                                @endif
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