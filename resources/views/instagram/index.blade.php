@extends('layouts.app')
 
@section('content')
<!-- Page Title
        ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Instagram Posts</h1>
    </div>

</section>
<!-- #page-title end -->

<!-- Content
        ============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Posts
                    ============================================= -->
            <div id="posts" class="post-grid grid-container post-masonry post-timeline grid-2 clearfix">
                <br><br>
                <div class="timeline-border"></div>
                @foreach ($posts as $post)

                <div class="wow slideInUp entry clearfix " data-wow-delay=".5s">
                    <div class="entry-timeline">
                        <div class="timeline-divider"></div>
                    </div>
                    <div class="entry-image">
                        <a href="{{ $post['media_url'] }}" data-lightbox="image"><img src="{{ $post['media_url'] }}" class="image_fade"></a>
                    </div>
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i>{{ $post['timestamp']}}</li>

                        <li><i class="icon-camera-retro"></i></li>
                    </ul>
                    <div class="entry-content" style="overflow-wrap: break-word;">
                        <p>{{ $post['caption'] }}</p>
                        <a rel="noopener noreferrer" target="_blank" href="{{$post['permalink']}}" class="more-link">Read More</a>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- #posts end -->

        </div>

    </div>

</section>
<!-- #content end -->
@endsection
 
@section('scripts')
<script src="/js/main/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script type="text/javascript">
    jQuery(window).load(function(){

            var $container = $('#posts');

            $container.isotope({
                itemSelector: '.entry',
                masonry: {
                    columnWidth: '.entry:not(.entry-date-section)'
                }
            });

            $container.infinitescroll({
                loading: {
                    finishedMsg: '<i class="icon-line-check"></i>',
                    msgText: '<i class="icon-line-loader icon-spin"></i>',
                    img: "images/preloader-dark.gif",
                    speed: 'normal'
                },
                state: {
                    isDone: false
                },
                nextSelector: "#load-next-posts a",
                navSelector: "#load-next-posts",
                itemSelector: "div.entry",
                behavior: 'portfolioinfiniteitemsloader'
            },
            function( newElements ) {
                $container.isotope( 'appended', $( newElements ) );
                var t = setTimeout( function(){ $container.isotope('layout'); }, 2000 );
                SEMICOLON.initialize.resizeVideos();
                SEMICOLON.widget.loadFlexSlider();
                SEMICOLON.widget.masonryThumbs();
                var t = setTimeout( function(){
                    SEMICOLON.initialize.blogTimelineEntries();
                }, 2500 );
            });

            var t = setTimeout( function(){
                SEMICOLON.initialize.blogTimelineEntries();
            }, 2500 );

            $(window).resize(function() {
                $container.isotope('layout');
                var t = setTimeout( function(){
                    SEMICOLON.initialize.blogTimelineEntries();
                }, 2500 );
            });

        });
</script>
@endsection