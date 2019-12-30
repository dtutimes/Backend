@extends('layouts.app') 
@section('content')

<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8">
                <h1>All Campaigns</h1>
                <p>
                    Campaigns are an essential part of DTU Times. Online campaigns are done in order to reach to a wider audience, and deliver
                    content apart from the edition. It is because of the campaigns that DTUites talk about Times.
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
                    @foreach ($campaigns as $item)
                    <li>
                        <div class="accordion__title">
                            <span class="h5">{{$item->name}}
                            <small>
                                {{ $item->status }}                              
                            </small>
                        </span>
                        </div>
                        <div class="accordion__content">
                            {{ $item->subject }}
                            <br>
                            <small>
                            Created <strong>{{ $item->created_at->diffForHumans() }}</strong>
                        </small>
                            <div class="text-right d-block">
                                <a class="btn btn--sm type--uppercase" href="{{route('campaigns.show', $item->uuid)}}">
                                <span class="btn__text">
                                    Show Campaign
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