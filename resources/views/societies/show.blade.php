@extends('layouts.main') 
@section('title')
<title>{{$society->name}}</title>
@endsection
@section('content') 
		<!-- Page Title
		============================================= -->
		<section id="page-title" class="pt-5 pb-5 border--bottom">
	        <div class="container clearfix">
	            <div class="row justify-content-around">
	                <div class="col-md-5 col-lg-5">
	                    <h1>{{$society->name}}</h1>
	                </div>
	                <div class="col-md-3 col-lg-3">
	                    <img class="image--sm" src="{{$society->getFirstMediaUrl('soc_logo')}}" alt="">
	                </div>
	            </div>
	            <!--end of row-->
	        </div>
	        <!--end of container-->
    	</section>
    	<!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
					<br><br>
					<div class="col_half" style="padding-top:4%;">

						<div class="fslider customjs bottommargin-sm">
							<div class="flexslider" id="slider">
								<div class="slider-wrap">
									<div class="slide"><img src="{{$society->getFirstMediaUrl('soc_logo')}}" alt="Image"></div>
									@foreach ($images as $image)
									<div class="slide"><img src="{{$image->getUrl()}}" alt="Image"></div>
									@endforeach
								</div>
							</div>
						</div>

						<div class="fslider customjs bottommargin-sm">
							<div class="flexslider" id="carousel">
								<div class="slider-wrap">
									<div class="slide"><img src="{{$society->getFirstMediaUrl('soc_logo')}}" alt="Image"></div>
									@foreach ($images as $image)
									<div class="slide"><img src="{{$image->getUrl()}}" alt="Image"></div>
									@endforeach
								</div>
							</div>
						</div>

					</div>

					<!-- Portfolio Single Content
					============================================= -->
					<div class="col_half portfolio-single-content col_last nobottommargin">

						<!-- Portfolio Single - Description
						============================================= -->
						<div class="fancy-title title-bottom-border" style="position: relative; margin-bottom: 30px;">
							<h2 style="position: relative;
							display: inline-block;
							background-color: #FFF;
							padding-right: 15px;
							margin-bottom: 0;
							display: block;
							background: transparent;
							padding: 0 0 10px;
							border-bottom: 2px solid #1ABC9C;">Team Description:</h2>
						</div>
						<p>{{$society->description}}</p>
						<!-- Portfolio Single - Description End -->

						<div class="line"></div>

						<!-- Portfolio Single - Meta
						============================================= -->
						<ul class="portfolio-meta bottommargin">
							<li><span><i class="icon-user"></i>Head Incharge:</span> {{$society->head_incharge}}</li>
							<li><span><i class="icon-call"></i>Contact Number:</span> {{$society->head_contact_number}}</li>
							<li><span><i class="icon-user"></i>PR Incharge:</span> {{$society->pr_incharge}}</li>
							<li><span><i class="icon-call"></i>Contact Number:</span> {{$society->pr_contact_number}}</li>
						</ul>
						<!-- Portfolio Single - Meta End -->

						<!-- Portfolio Single - Share
						============================================= -->
						<div class="si-share clearfix">
							<span>Connect with them on social media:</span>
							<div>
								<a href="{{$society->facebook}}" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="mailto:{{$society->contact_mail}}" class="social-icon si-borderless si-email3">
									<i class="icon-email3"></i>
									<i class="icon-email3"></i>
								</a>
							</div>
						</div>
						<!-- Portfolio Single - Share End -->

					</div><!-- .portfolio-single-content end -->

					<div class="clear"></div>

					<div class="divider divider-center"><i class="icon-circle"></i></div>

				</div>

			</div>

		</section><!-- #content end -->
@endsection
@section('scripts')
	<script>
		jQuery(window).load(function() {
		  // The slider being synced must be initialized first
		  jQuery('#carousel').flexslider({
			selector: ".slider-wrap > .slide",
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			itemWidth: 130,
			itemMargin: 0,
			asNavFor: '#slider',
			start: function(slider){
				slider.parent().removeClass('preloader2');
				$('.flex-prev').html('<i class="icon-angle-left"></i>');
				$('.flex-next').html('<i class="icon-angle-right"></i>');
			}
		  });

		  jQuery('#slider').flexslider({
			selector: ".slider-wrap > .slide",
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#carousel",
			start: function(slider){
				slider.parent().removeClass('preloader2');
				$('.flex-prev').html('<i class="icon-angle-left"></i>');
				$('.flex-next').html('<i class="icon-angle-right"></i>');
			}
		  });
		});
	</script>
@endsection

