<div class="sidebars-area">

	@isset ($tagcloud)
		<div class="single-sidebar-widget newsletter-widget">
			<h6 class="title">Tag Cloud</h6>
			<p>
				    @foreach ($tagcloud as $tag)
				    	<a href="{{ url('/posts/tags') }}/{{ $tag->name }}">{{ $tag->name }}</a>&nbsp;
				    @endforeach
			</p>
		</div>
	@endisset



	@isset ($editorsPick)
		<div class="single-sidebar-widget editors-pick-widget">
			<h6 class="title">Editor’s Pick</h6>
			<div class="editors-pick-post">
				@foreach ($editorsPick as $post)
					@if ($loop->iteration == 1)
						<div class="feature-img-wrap relative">
							<div class="feature-img relative">
								<div class="overlay overlay-bg"></div>
								<img class="img-fluid" src="{{ asset('storage/posts') }}/{{ $post->image }}" alt="">
							</div>
							<ul class="tags">
								<li><a href="{{ url('/category') }}/{{ $post->category['id'] }}">{{ ucfirst($post->category['name']) }}</a></li>
							</ul>
						</div>
						<div class="details">
							<a href="{{ url('/posts') }}/{{ $post->slug }}">
								<h4 class="mt-20">{{ $post->title }}</h4>
							</a>
							<ul class="meta">
								<li><a href="#"><span class="lnr lnr-user"></span>{{ $post->user->name }}</a></li>
								<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at->toFormattedDateString() }}</a></li>
								<li>
									<a href="#"><span class="lnr lnr-bubble"></span>
										@if(count($post->comments) < 10)
											0{{ count($post->comments) }}
										@else
											{{ count($post->comments) }}
										@endif
									</a>
								</li>
							</ul>
							<p class="excert">
								{!! substr(strip_tags($post->content), 0, 100) !!}..
							</p>
						</div>
					<div class="post-lists">
					@else
						<div class="single-post d-flex flex-row">
							<div class="thumb">
								{{-- <img src="{{ asset('img/e2.jpg') }}" alt=""> --}}
								<img src="{{ asset('storage/posts') }}/{{ $post->image }}" alt="" style="width: 100px;">
							</div>
							<div class="detail">
								<a href="{{ url('/posts') }}/{{ $post->slug }}"><h6>{{ $post->title }}</h6></a>
								<ul class="meta">
									<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at->toFormattedDateString() }}</a></li>
									<li>
										<a href="#"><span class="lnr lnr-bubble"></span>
											@if(count($post->comments) < 10)
												0{{ count($post->comments) }}
											@else
												{{ count($post->comments) }}
											@endif
										</a>
									</li>
								</ul>
							</div>
						</div>
					@endif
				@endforeach
					</div>
			</div>
		</div>	    
	@endisset



	<div class="single-sidebar-widget ads-widget">
		<img class="img-fluid" src="{{ asset('img/sidebar-ads.jpg') }}" alt="">
	</div>

	<div class="single-sidebar-widget newsletter-widget">
		<h6 class="title">Newsletter</h6>
		<p>
			Here, I focus on a range of items
			andfeatures that we use in life without
			giving them a second thought.
		</p>
		<form method="POST" action="/blog/subscribe">
			<div class="form-group d-flex flex-row">
				<div class="col-autos">
					<div class="input-group">
						<input class="form-control" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" type="email" required="">
					</div>
				</div>
				<button type="submit" class="btn bbtns">Subcribe</button>
			</div>
		</form>
		<p>
			You can unsubscribe us at any time
		</p>
	</div>

	<div class="single-sidebar-widget most-popular-widget">
		<h6 class="title">Most Popular</h6>
		<div class="single-list flex-row d-flex">
			<div class="thumb">
				<img src="{{ asset('img/m1.jpg') }}" alt="">
			</div>
			<div class="details">
				<a href="image-post.html">
					<h6>Help Finding Information
					Online is so easy</h6>
				</a>
				<ul class="meta">
					<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
					<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
				</ul>
			</div>
		</div>
		<div class="single-list flex-row d-flex">
			<div class="thumb">
				<img src="{{ asset('img/m2.jpg') }}" alt="">
			</div>
			<div class="details">
				<a href="image-post.html">
					<h6>Compatible Inkjet Cartr
					world famous</h6>
				</a>
				<ul class="meta">
					<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
					<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
				</ul>
			</div>
		</div>
		<div class="single-list flex-row d-flex">
			<div class="thumb">
				<img src="{{ asset('img/m3.jpg') }}" alt="">
			</div>
			<div class="details">
				<a href="image-post.html">
					<h6>5 Tips For Offshore Soft
					Development </h6>
				</a>
				<ul class="meta">
					<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
					<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
				</ul>
			</div>
		</div>
		<div class="single-list flex-row d-flex">
			<div class="thumb">
				<img src="{{ asset('img/m4.jpg') }}" alt="">
			</div>
			<div class="details">
				<a href="image-post.html">
					<h6>5 Tips For Offshore Soft
					Development </h6>
				</a>
				<ul class="meta">
					<li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
					<li><a href="#"><span class="lnr lnr-bubble"></span>06</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="single-sidebar-widget social-network-widget">
		<h6 class="title">Social Networks</h6>
		<ul class="social-list">
			<li class="d-flex justify-content-between align-items-center fb">
				<div class="icons d-flex flex-row align-items-center">
					<i class="fa fa-facebook" aria-hidden="true"></i>
					<p>983 Likes</p>
				</div>
				<a href="#">Like our page</a>
			</li>
			<li class="d-flex justify-content-between align-items-center tw">
				<div class="icons d-flex flex-row align-items-center">
					<i class="fa fa-twitter" aria-hidden="true"></i>
					<p>983 Followers</p>
				</div>
				<a href="#">Follow Us</a>
			</li>
			<li class="d-flex justify-content-between align-items-center yt">
				<div class="icons d-flex flex-row align-items-center">
					<i class="fa fa-youtube-play" aria-hidden="true"></i>
					<p>983 Subscriber</p>
				</div>
				<a href="#">Subscribe</a>
			</li>
			<li class="d-flex justify-content-between align-items-center rs">
				<div class="icons d-flex flex-row align-items-center">
					<i class="fa fa-rss" aria-hidden="true"></i>
					<p>983 Subscribe</p>
				</div>
				<a href="#">Subscribe</a>
			</li>
		</ul>
	</div>

</div>