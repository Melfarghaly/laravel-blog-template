@extends('layouts.index')

@section('page')
		Home
@endsection


@section('top-post-area')

		<div class="col-lg-8 top-post-left">
			<div class="feature-image-thumb relative">
				<div class="overlay overlay-bg"></div>
				<img class="img-fluid" src="img/top-post1.jpg" alt="">
			</div>
			<div class="top-post-details">
				<ul class="tags">
					<li><a href="#">Food Habit</a></li>
				</ul>
				<a href="image-post.html">
					<h3>A Discount Toner Cartridge Is Better Than Ever.</h3>
				</a>
				<ul class="meta">
					<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
					<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
					<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
				</ul>
			</div>
		</div>

		<div class="col-lg-4 top-post-right">
			<div class="single-top-post">
				<div class="feature-image-thumb relative">
					<div class="overlay overlay-bg"></div>
					<img class="img-fluid" src="img/top-post2.jpg" alt="">
				</div>
				<div class="top-post-details">
					<ul class="tags">
						<li><a href="#">Food Habit</a></li>
					</ul>
					<a href="image-post.html">
						<h4>A Discount Toner Cartridge Is Better Than Ever.</h4>
					</a>
					<ul class="meta">
						<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
						<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
						<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
					</ul>
				</div>
			</div>
			<div class="single-top-post mt-10">
				<div class="feature-image-thumb relative">
					<div class="overlay overlay-bg"></div>
					<img class="img-fluid" src="img/top-post3.jpg" alt="">
				</div>
				<div class="top-post-details">
					<ul class="tags">
						<li><a href="#">Food Habit</a></li>
					</ul>
					<a href="image-post.html">
						<h4>A Discount Toner Cartridge Is Better</h4>
					</a>
					<ul class="meta">
						<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
						<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
						<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-lg-12">
			<div class="news-tracker-wrap">
				<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
			</div>
		</div>
@endsection

@section('latest-post-wrap')
		<div class="latest-post-wrap">
			<h4 class="cat-title">Latest Posts</h4>

			@if(count($latest) > 0)
				@foreach ($latest as $post)
						<div class="single-latest-post row align-items-center">
							<div class="col-lg-5 post-left">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ asset('storage/posts') }}/{{ $post->image }}" alt="">
								</div>
								<ul class="tags">
									<li><a href="{{ url('/category') }}/{{ $post->category['id'] }}">{{ ucfirst($post->category['name']) }}</a></li>
								</ul>
							</div>
							<div class="col-lg-7 post-right">
								<a href="{{ url('/posts') }}/{{ $post->slug }}">
									<h4>{{ $post->title }}</h4>
								</a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-user"></span>{{ $post->user->name }}</a></li>
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at->toFormattedDateString() }}</a></li>
									<li>
										<a href="#">
											<span class="lnr lnr-bubble"></span>
												@if(count($post->comments) == 1)
													{{ count($post->comments) }} Comment
												@else
													{{ count($post->comments) }} Comments
												@endif
										</a>
									</li>
								</ul>
								<p class="excert">
									{!! substr(strip_tags($post->content), 0, 200) !!}
								</p>
							</div>
						</div>
				@endforeach

				<div class="load-more text-center">
					<a href="{{ url('/posts') }}" class="primary-btn">View All Posts</a>
					{{-- {!! $posts->render() !!} --}}
				</div>
		
			@else
				<div class="single-latest-post row align-items-center">
					<div class="col-lg-7 post-right">
						<a href="{{ route('create-post') }}">
							<h4>{{ 'No Posts' }}</h4>
							<p><a class="text-danger" href="{{ route('create-post') }}">Create a new post</a></p>
						</a>
					</div>
				</div>
			@endif
			
		</div>
@endsection