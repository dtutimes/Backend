@extends('layouts.main') 
@section('title')
<title>Panache</title>
@endsection
@section('content') 

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Panache</h1>
			</div>

		</section><!-- #page-title end -->

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
									<div class="slide"><img src="/img/society/panache/1.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/2.png" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/3.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/4.png" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/5.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/6.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/7.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/8.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/9.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/10.jpg" alt="Image"></div>
								</div>
							</div>
						</div>

						<div class="fslider customjs bottommargin-sm">
							<div class="flexslider" id="carousel">
								<div class="slider-wrap">
									<div class="slide"><img src="/img/society/panache/1.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/2.png" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/3.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/4.png" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/5.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/6.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/7.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/8.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/9.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/panache/10.jpg" alt="Image"></div>
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
							border-bottom: 2px solid #1ABC9C;">Society Description:</h2>
						</div>
						<p>Panache, the Fashion and Designing Society DTU aims to provide an opportunity to it's members to develop their personality and enhance their confidence.</p>
						<!-- Portfolio Single - Description End -->

						<div class="line"></div>

						<!-- Portfolio Single - Meta
						============================================= -->
						<ul class="portfolio-meta bottommargin">
							<li><span><i class="icon-user"></i>Student Head:</span> Nayan Bansal</li>
							<li><span><i class="icon-call"></i>Phone Number:</span> +91 9416029025</li>

						</ul>
						<!-- Portfolio Single - Meta End -->

						<!-- Portfolio Single - Share
						============================================= -->
						<div class="si-share clearfix">
							<span>Connect with them on social media:</span>
							<div>
								<a href="https://www.facebook.com/PanacheDTU/" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="https://www.instagram.com/panachedtu/" class="social-icon si-borderless si-instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>
								<a href="mailto:sushantkharthol@gmail.com" class="social-icon si-borderless si-email3">
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
