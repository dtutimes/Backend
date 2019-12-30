@extends('layouts.app') 
@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>All Roles</h1>
                <p class="lead">
                    Everyone has a different role in Times. Hence different usage of the website.
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
                    @foreach ($roles as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5"> {{$item->display_name}}
                        </span>
                        </div>
                        <div class="accordion__content">
                            <small>{{$item->name}}</small>
                            <br> {{$item->description}} <br>
                            <small>
                                Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                            </small>
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
        <div class="row">
            <div class="col-md-12">
                <div class="pagination">
                    <ol>
                        <li>
                            <a href="#">&laquo;</a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li class="pagination__current">3</li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">&raquo;</a>
                        </li>
                    </ol>

                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
@endsection