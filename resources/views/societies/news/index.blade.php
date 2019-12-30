@extends('layouts.app')

@section('links')     
<link href="{{ asset('css/slider.css') }}" rel="stylesheet">
@endsection

@section('content')

@if (count($news))
<section class="height-100 p-0 d-none d-lg-block">
      @foreach ($news as $item)

      <div class="slide {{ ($loop->index == 0) ? 'active' : ''}}">
            <div class="card row">
                  <div class="card-img col-md-8"  style="background-image: url('{{ $item->getFirstMediaUrl('soc_news_images')}}');" id="img01"></div>
                  <div class="card-content col-md-4">
                        <p class="">
                              <small>{{$item->created_at->diffForHumans()}}</small>
                        </p>
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <p class="card-para">
                              {{ $item->description }}
                        </p>
                        <small class="">
                              Views {{ $item->view }} 
                              <br>
                              Status - {{ $item->status}} 
                        </small>
                        <p class="p-0">
                              <a href="" class="card-link">Edit</a>

                              @if ($item->status == 'draft')
                                    <a href="{{ route('society.head.news.approval', [$slug, $item->uuid] )}}" class="card-link">Submit for approval</a>
                              @endif
                        </p>
                  </div>
            </div>
      </div>
      @endforeach

      <div class="prevnext">
            <button class="pn-btn" id="prev"></button>
            <button class="pn-btn" id="next"></button>
      </div>
</section>

@else
<section class="space--lg">
      <div class="container">
      <div class="text-center">
            <img width="150" src="{{ asset('svg/albums.svg') }}" alt="" srcset="">
            <h3>Nothing here</h3>
      </div>
      </div>
</section>
@endif

@endsection



@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>

      <script type="text/javascript">

      var $activeSlide = $('.active'),
      $homeSlide = $(".slide"),
      $slideNavPrev = $("#prev"),
      $slideNavNext = $("#next");

      function init() {
            TweenMax.set($homeSlide.not($activeSlide), {autoAlpha: 0});
            TweenMax.set($slideNavPrev, {autoAlpha: 0.2});
      }

      init();

      function goToNextSlide(slideOut, slideIn, slideInAll) {
            var t1 = new TimelineLite(),
            slideOutContent = slideOut.find('.card-content'),
            slideInContent = slideIn.find('.card-content'),
            slideOutImg = slideOut.find('.card-img'),
            slideInImg = slideIn.find('.card-img'),
            index = slideIn.index(),
            size = $homeSlide.length;
            console.log(index);

            if(slideIn.length !== 0) {
            t1
            .set(slideIn, {autoAlpha: 1, className: '+=active'})
            .set(slideOut, {className: '-=active'})
            .to(slideOutContent, 0.65, {y: "+=40px", ease: Power3.easeInOut}, 0)
            .to(slideOutImg, 0.65, {backgroundPosition :'bottom', ease: Power3.easeInOut}, 0)
            .to(slideInAll, 1, {y: "-=100%", ease: Power3.easeInOut}, 0)
            .fromTo(slideInContent, 0.65, {y: '-=40px'}, {y : 0, ease: Power3.easeInOut}, "-=0.7")
            .fromTo(slideInImg, 0.65, {backgroundPosition: 'top'}, {backgroundPosition: 'bottom', ease: Power3.easeInOut}, '-=0.7')
            }

            TweenMax.set($slideNavPrev, {autoAlpha: 1});

            if(index === size - 1){
                  TweenMax.to($slideNavNext, 0.3, {autoAlpha: 0.2, ease:Linear.easeNone});
            }
      };

      $slideNavNext.click(function(e) {
            e.preventDefault();

            var slideOut = $('.slide.active'),
            slideIn = $('.slide.active').next('.slide'),
            slideInAll = $('.slide');

            goToNextSlide(slideOut, slideIn, slideInAll);

      });

      function goToPrevSlide(slideOut, slideIn, slideInAll) {
            var t1 = new TimelineLite(),
            slideOutContent = slideOut.find('.card-content'),
            slideInContent = slideIn.find('.card-content'),
            slideOutImg = slideOut.find('.card-img'),
            slideInImg = slideIn.find('.card-img'),
            index = slideIn.index(),
            size = $homeSlide.length;

            if(slideIn.length !== 0) {
            t1
            .set(slideIn, {autoAlpha: 1, className: '+=active'})
            .set(slideOut, {className: '-=active'})
            .to(slideOutContent, 0.65, {y: "-=40px", ease: Power3.easeInOut}, 0)
            .to(slideOutImg, 0.65, {backgroundPosition :'top', ease: Power3.easeInOut}, 0)
            .to(slideInAll, 1, {y: "+=100%", ease: Power3.easeInOut}, 0)
            .fromTo(slideInContent, 0.65, {y: '+=40px'}, {y : 0, ease: Power3.easeInOut}, "-=0.7")
            .fromTo(slideInImg, 0.65, {backgroundPosition: 'bottom'}, {backgroundPosition: 'top', ease: Power3.easeInOut}, '-=0.7')
            }

            TweenMax.set($slideNavPrev, {autoAlpha: 1});

            if(index === 0){
                  TweenMax.to($slideNavPrev, 0.3, {autoAlpha: 0.2, ease:Linear.easeNone});
            }
      };

      $slideNavPrev.click(function(e) {
            e.preventDefault();

            var slideOut = $('.slide.active'),
            slideIn = $('.slide.active').prev('.slide'),
            slideInAll = $('.slide');

            goToPrevSlide(slideOut, slideIn, slideInAll);
      
      });


      </script>

@endsection