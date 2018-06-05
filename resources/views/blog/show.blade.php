@section('page')
		{{ $post->title }}
@endsection
@include('include.header')
@include('include.link-head-menu')
		
		<div class="site-main-container">
			<!-- Start top-post Area -->
			{{-- <section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">{{ $post->title }}</h1>
								<p class="text-white link-nav">
									<a href="index.html">Home </a>
								  <span class="lnr lnr-arrow-right"></span>
								  <a href="{{ url('/posts') }}">Posts</a>
								  <span class="lnr lnr-arrow-right"></span>
								  <a href="#">{{ $post->title }}</a>
								</p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="news-tracker-wrap">
								<h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
							</div>
						</div>
					</div>
				</div>
			</section> --}}
			<!-- End top-post Area -->
			<!-- Start latest-post Area -->
			<section class="latest-post-area pb-120">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-8 post-list">
							<!-- Start single-post Area -->
							<div class="single-post-wrap">
								<div class="feature-img-thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ asset('img/f1.jpg') }}" alt="">
								</div>
								<div class="content-wrap">
									<ul class="tags mt-10">
										<li><a href="#">Food Habit</a></li>
									</ul>
									{{-- <a href="#"> --}}
										<h3>{{ $post->title }}</h3>
									{{-- </a> --}}
									<ul class="meta pb-20">
										<li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span>{{ $post->created_at->toFormattedDateString() }}</a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
									<div class="post-content">
										{!! $post->content !!}
									</div>
								
								<div class="navigation-wrap justify-content-between d-flex">
									<a class="prev" href="#"><span class="lnr lnr-arrow-left"></span>Prev Post</a>
									<a class="next" href="#">Next Post<span class="lnr lnr-arrow-right"></span></a>
								</div>
								


								<div class="comment-sec-area">
									<div class="container">
										<div class="row flex-column">

											<h6>

												@if(count($post->comments) == 1)
													{{ count($post->comments) }} Comment
												@else
													{{ count($post->comments) }} Comments
												@endif

											</h6>

											@if (count($post->comments))

													@foreach($post->comments->reverse() as $comment)
														<div class="comment-list">
															<div class="single-comment justify-content-between d-flex">
																<div class="user justify-content-between d-flex">
																	<div class="thumb">
																		<img src="{{ asset('img/blog/c3.jpg') }}" alt="">
																	</div>
																	<div class="desc">
																		<h5><a href="#">Emilly Blunt</a></h5>
																		{{-- <p class="date">December 4, 2017 at 3:12 pm </p> --}}
																		<p class="date">{{ $comment->created_at->toFormattedDateString() }}</p>
																		<p class="comment">
																			{{ $comment->body }}
																		</p>
																	</div>
																</div>
																<div class="reply-btn">
																	<a href="" class="btn-reply text-uppercase">reply</a>
																</div>
															</div>
														</div>
													@endforeach
											@else
												<div class="comment-list">
													<div class="single-comment justify-content-between d-flex">
														<div class="user justify-content-between d-flex">
															<div class="desc">
																<h5>No comments yet</h5>
																<p class="comment">
																	Be the first to comment.
																</p>
															</div>
														</div>
													</div>
												</div>
											@endif

										</div>
									</div>
								</div>
							</div>

							<div class="comment-form">
								<h4>Post Comment</h4>
								<form method="POST" action="/posts/{{ $post->id }}/comments">
									<div class="form-group form-inline">
										@csrf()

										<div class="form-group col-lg-6 col-md-12 name">
											<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
										</div>
										<div class="form-group col-lg-6 col-md-12 email">
											<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
										</div>
									</div>
									{{-- <div class="form-group">
										<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
									</div> --}}
									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="body" placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comment'" required=""></textarea>
									</div>
									<button type="submit" class="primary-btn text-uppercase">Post Comment</button>
								</form>
							</div>

						</div>
						<!-- End single-post Area -->
					</div>
					

					<div class="col-lg-4">
						{{-- The SideBar --}}
						@include('include.sidebar')
					</div>


				</div>
			</div>
		</section>
		<!-- End latest-post Area -->
	</div>
	
@include('include.link-footer-menu')

@include('include.footer')