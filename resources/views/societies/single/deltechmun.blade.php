@extends('layouts.main') 
@section('title')
<title>DeltechMUN</title>
@endsection
@section('content') 
		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Deltech MUN & Debating Society</h1>
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
									<div class="slide"><img src="/img/society/deltechmun/1.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/2.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/3.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/4.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/5.jpg" alt="Image"></div>
								</div>
							</div>
						</div>

						<div class="fslider customjs bottommargin-sm">
							<div class="flexslider" id="carousel">
								<div class="slider-wrap">
									<div class="slide"><img src="/img/society/deltechmun/1.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/2.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/3.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/4.jpg" alt="Image"></div>
									<div class="slide"><img src="/img/society/deltechmun/5.jpg" alt="Image"></div>
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
						<p>DelTech MUN and Debating society, the oldest debating society in DTU, is a collection of debating enthusiasts, to provide them a platform to showcase their skills. The society organises an array of events over the year, their main event being DelTech Model United Nations, which is one of the best in the Delhi Circuit. Other events include, weekly charchas, 'Youth ki Awaaz', mock MUNs, group discussions and intra MUN.</p>
						<!-- Portfolio Single - Description End -->

						<div class="line"></div>

						<!-- Portfolio Single - Meta
						============================================= -->
						<ul class="portfolio-meta bottommargin">
							<li><span><i class="icon-user"></i>Secretary General:</span> Dhruv Jain</li>
							<li><span><i class="icon-call"></i>Phone Number:</span> +91 9818111254</li>
						</ul>
						<!-- Portfolio Single - Meta End -->

						<!-- Portfolio Single - Share
						============================================= -->
						<div class="si-share clearfix">
							<span>Connect with them on social media:</span>
							<div>
								<a href="https://www.facebook.com/mundeltech/" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
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

