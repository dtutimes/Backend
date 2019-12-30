@extends('layouts.app') 
@section('content')

<section class="border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <h1 class="mb-0">Subscribers Section</h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="border--bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <h3>Create New Subscriber</h3>
                <form action="{{ route('subscribers.store' )}}" method="post" class="row">
                    @csrf
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="" class="class-validate">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn--sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>All Subscriber - {{ count($subscribers) }}</h3>
                <ul class="accordion accordion-2 accordion--oneopen">
                    @foreach ($subscribers as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->email}} 
                                <small>
                                    {{ $item->status }}                              
                                </small>
                            </span>
                        </div>
                        <div class="accordion__content">
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{route('subscribers.show', $item->uuid)}}">
                                    <span class="btn__text">
                                        Show User
                                    </span>
                                </a>
                                <a class="btn btn--sm type--uppercase"
                                    href="{{ route('subscribers.destroy', $item->uuid )}}" >
                                    <span class="btn__text">
                                        Delete 
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