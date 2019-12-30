@if (auth()->user()->society()->get()->count() == 0)
    <section class="space--sm border--bottom"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 pl-5">
                    <h3>Hi, You haven't created your society page.</h3>             
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="process-stepper clearfix" data-process-steps="3">
                        <li class="active">
                            <span>Create your society page</span>
                        </li>
                        <li class="active">
                            <span>Images</span>
                        </li>
                        <li class="active">
                            <span>Bulletin </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature feature-3 boxed boxed--lg boxed--border">
                                <span class="h1 h1--large">1.</span>
                                <h4>Create your society page</h4>
                                <p>
                                    Enter the details of your society including a high-resolution logo to create the society’s page. 
                                </p>
                            </div>
                            <!--end boxed-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-3 boxed boxed--lg boxed--border">
                                <span class="h1 h1--large">2.</span>
                                <h4>Images</h4>
                                <p>
                                    Only upload high-resolution and relevant images only. Note that the size of the image < 1 MB. Pixelated images will be discarded.
                                </p>
                            </div>
                            <!--end boxed-->
                        </div>
                        <div class="col-md-4">
                            <div class="feature feature-3 boxed boxed--lg boxed--border">
                                <span class="h1 h1--large">3.</span>
                                <h4>Bulletin</h4>
                                <p>
                                    Upload appropriate news regarding your society. All the news would have to be first submitted for approval before being published. 
                                </p>
                            </div>
                            <!--end boxed-->
                        </div>
                    </div>
                    <!--end of row-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <div>
                        <a class="btn btn--sm type--uppercase" href="{{ route('society.head.create')}}" data-scroll>
                            <span class="btn__text">
                                Create Here
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@else
    @php
        $society = auth()->user()->society()->first();
        $images = $society->getMedia('soc_images');
    @endphp
    <section class="pt-5 pb-5 border--bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <img class="image--sm" src="{{$society->getFirstMediaUrl('soc_logo')}}" alt="">
                    <p>
                        Welcome to backdoor of {{ $society->name }}'s Page ;)
                    </p>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class="text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 text-left">
                    <h3 class="animated fadeInUp duration-2s delay-1s">Hi, {{ auth()->user()->name }}</h3>
                    
                </div>
                <div class="col-md-4 col-lg-4">
                    <h1 class="mb-0 animated fadeInUp duration-2s delay-2s">{{ $society->referrals }}</h1>
                    <span class="animated fadeInUpBig duration-2s delay-1s">Referrals</span> <br>
                    <span class="animated fadeInUpBig duration-2s delay-1s" style="font-size: .8rem;">
                        We like recommending good people.
                    </span>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endif

