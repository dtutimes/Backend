@extends('layouts.main')
@section('title')
<title>Societies | DTU Times</title>
@endsection
@section('content')
<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>societies/teams</h1>
			<span>List of all societies and team in DTU</span>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Portfolio Filter
					============================================= -->
					<ul id="portfolio-filter" class="portfolio-filter clearfix" data-container="#portfolio">

						<li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
						<li><a href="#" data-filter=".pf-tech">Technical</a></li>
						<li><a href="#" data-filter=".pf-team">Tech Teams</a></li>
						<li><a href="#" data-filter=".pf-cultural">Cultural</a></li>
						<li><a href="#" data-filter=".pf-misc">Miscellaneous</a></li>


					</ul><!-- #portfolio-filter end -->

					<div id="portfolio-shuffle" class="portfolio-shuffle" data-container="#portfolio">
						<i class="icon-random"></i>
					</div>

					<div class="clear"></div>

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">

						@foreach ($societies as $item)
						
						<article class="portfolio-item pf-media pf-{{$item->category}}">
							<div class="portfolio-image">
								<a href="/societies/{{$item->slug}}">
									<img src="{{$item->getFirstMediaUrl('soc_logo')}}" alt="{{$item->slug}}">
								</a>
								<div class="portfolio-overlay">
									<a href="{{$item->getFirstMediaUrl('soc_logo')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
									<a href="/societies/{{$item->slug}}" class="right-icon"><i class="icon-line-ellipsis"></i></a>
								</div>
							</div>
							<div class="portfolio-desc" style="text-align: center;">
								<h3 style="display: inline-block;"><a href="/societies/{{$item->slug}}">{{$item->name}}</a></h3>
							</div>
						</article>

						@endforeach

					</div><!-- #portfolio end -->

				</div>

			</div>

		</section><!-- #content end -->

    @endsection