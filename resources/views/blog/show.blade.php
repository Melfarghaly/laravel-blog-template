@section('page')
		{{ $post->title }}
@endsection
@section('head')
	<style type="text/css">
		@media (max-width: 768px) {
			#form-cover .primary-btn{
				display: block;
			}
		}
	</style>
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
									<img class="img-fluid" src="{{ asset('storage/posts') }}/{{ $post->image }}" alt="">
								</div>
								<div class="content-wrap">
									<ul class="tags mt-10">
										<li><a href="{{ url('/category') }}/{{ $post->category->id }}">{{ ucfirst($post->category->name) }}</a></li>
									</ul>
									{{-- <a href="#"> --}}
										<h3>{{ $post->title }}</h3>
									{{-- </a> --}}
									<ul class="meta">
										<li>
											<span class="lnr lnr-tag"  style="font-size: 14px;"></span>
											@foreach($post->tags as $tag)
												<a class="badge text-dark" style="font-size: 12px;" href="{{ url('/posts/tags/'.$tag->name) }}">
													{{ $tag->name }}@if($loop->iteration != $post->tags->count()){{','}}@endif
												</a>
											@endforeach

										</li>
									</ul>

									<ul class="meta pb-10">
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


									@if(Auth::check())	
									<div class="pb-20">

										@if(auth()->user()->can('edit all posts') || (auth()->user()->id == $post->user->id))
											<a href="{{ url('/posts') }}/{{ $post->slug }}/edit" class="btn btn-warning btn-sm" style="border-radius: 0;">Edit</a>
										@endif

										@if(auth()->user()->can('delete all posts') || (auth()->user()->id == $post->user->id))
											<a class="btn btn-danger btn-sm" style="border-radius: 0;" href="" 
											    onclick="event.preventDefault();
											             document.getElementById('delete-post').submit();">
											    Delete
											</a>
											<form id="delete-post" action="{{ url('/posts') }}/{{ $post->slug }}" method="POST" style="display: none;">
											    {{ csrf_field() }}
											    @method('DELETE')
											</form>
										@endif

										@role('admin|editor')
											@if ($recommended)
												<a class="btn btn-secondary btn-sm" style="border-radius: 0;" href="" 
												    onclick="event.preventDefault();
												             document.getElementById('unrecommend-post').submit();">
												    Don't Recommend
												</a>
												<form id="unrecommend-post" action="{{ url('/recommended/posts') }}/{{ $post->slug }}" method="POST" style="display: none;">
												    {{ csrf_field() }}
												    @method('DELETE')
												</form>
											@else
												<a class="btn btn-success btn-sm" style="border-radius: 0;" href="" 
												    onclick="event.preventDefault();
												             document.getElementById('recommend-post').submit();">
												    Recommend
												</a>
												<form id="recommend-post" action="{{ url('/recommended/posts') }}/{{ $post->slug }}" method="POST" style="display: none;">
												    {{ csrf_field() }}
												</form>
											@endif
										@endrole

									</div>
									@endif


									<div class="post-content">
										{!! $post->content !!}
									</div>

									<div class="mt-20">
										<!-- AddToAny BEGIN -->
										<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
										{{-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> --}}
										<a class="a2a_button_email"></a>
										<a class="a2a_button_facebook"></a>
										<a class="a2a_button_twitter"></a>
										<a class="a2a_button_google_plus"></a>
										<a class="a2a_button_linkedin"></a>
										<a class="a2a_button_whatsapp"></a>
										<a class="a2a_button_pocket"></a>
										</div>
										<script async src="https://static.addtoany.com/menu/page.js"></script>
										<style type="text/css">
											.a2a_svg, .a2a_count { border-radius: 0 !important;padding: 2px;}
										</style>
										<!-- AddToAny END -->
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
																		{{-- <img src="{{ asset('img/blog/c3.jpg') }}" alt=""> --}}
																		<img src="{{ "https://www.gravatar.com/avatar/" . md5($comment->user->email) }}?d=mp&size=50" alt="Profile">
																	</div>
																	<div class="desc">
																		<h5><a href="#">{{ $comment->user->name }}</a></h5>
																		{{-- <p class="date">December 4, 2017 at 3:12 pm </p> --}}
																		<p class="date">{{ $comment->created_at->toFormattedDateString() }}</p>
																		<p class="comment">
																			{{ $comment->body }}
																		</p>
																	</div>
																</div>

																<div class="reply-btn">
																	@role('admin|editor')
																		<a href="#delete-comment" class="btn-reply btn-danger text-uppercase" onclick="event.preventDefault();
																		             document.getElementById('delete-comment').submit();">Delete</a>
																		<form id="delete-comment" action="{{ url('/posts') }}/{{ $post->slug }}/comments/{{ $comment->id }}/delete" method="POST" style="display: none;">
																		    {{ csrf_field() }}
																		    @method('DELETE')
																		</form>
																	@endrole
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
								<form method="POST" action="/posts/{{ $post->slug }}/comments" style="position: relative;">
									
									@guest
										<div id="form-cover" class="text-center" style="z-index: 100;position: absolute;top: 0;right: 0;left: 0;bottom: 0;background-color: #bdbdbdba;padding: 10% 10%;">
											<h4 class="text-center">Only Logged in users can comment on this post</h4>
											<p class="text-center">
												<a href="{{ route('login') }}" class="primary-btn text-uppercase" style="margin-bottom: 5px;">Login</a>
												<span style="color: #333; font-weight: bold;margin-left: 10px;margin-right: 10px;">OR</span> 
												<a href="{{ route('register') }}" class="primary-btn text-uppercase" style="margin-bottom: 5px;">Signup</a>
											</p>
										</div>
									@endguest

									<div class="form-group form-inline">
										@csrf()

										<div class="form-group col-lg-6 col-md-12 name">
											<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" value="{{ auth()->check()? auth()->user()->name : "" }}" {{ auth()->check()? "readonly=''": "" }}">
										</div>
										<div class="form-group col-lg-6 col-md-12 email">
											<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" value="{{ auth()->check()? auth()->user()->email : "" }}" {{ auth()->check()? "readonly=''": "" }}">
										</div>
									</div>

									<div class="form-group">
										<textarea class="form-control mb-10" rows="5" name="body" placeholder="Comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comment'" required=""></textarea>

										<p class="help-text"><b style="color: red;">Disclaimer*</b> The Moderator reserves the right to delete any inapropriate comment without trace.</p>
									</div>
									@auth
									<button type="submit" class="primary-btn text-uppercase">Submit</button>
									@endauth
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