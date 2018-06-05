@extends('layouts.blog')

@section('page')
		Archives
@endsection

@section('latest-post-wrap')
		<div class="latest-post-wrap">
			<h4 class="cat-title">Latest Posts</h4>

			@foreach ($posts as $post)
					<div class="single-latest-post row align-items-center">
						<div class="col-lg-5 post-left">
							<div class="feature-img relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="{{ asset('img/l1.jpg') }}" alt="">
							</div>
							<ul class="tags">
								<li><a href="#">Lifestyle</a></li>
							</ul>
						</div>
						<div class="col-lg-7 post-right">
							<a href="{{ url('/posts') }}/{{ $post->id }}">
								<h4>{{ $post->title }}</h4>
							</a>
							<ul class="meta">
								<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
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
								{!! strip_tags($post->content) !!}
							</p>
						</div>
					</div>
			@endforeach

			<div class="load-more">
				<a href="#" class="primary-btn">Load More Posts</a>
			</div>
			
		</div>
@endsection