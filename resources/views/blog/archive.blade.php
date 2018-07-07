@extends('layouts.blog')

@section('page')
		Archives
@endsection

@section('head')
		<style>
			.pagination {
				display: -webkit-box;
			  display: -moz-box;
			  display: -ms-flexbox;
		    display: flex;
		    padding-left: 0;
		    list-style: none;
		    border-radius: 0.25rem;
		    margin-top: 5px;
		    margin-bottom: 5px;
		    justify-content: center;
		    align-items: center;
		    font-size: 14px;
			}
			.page-link {
		    position: relative;
		    display: block;
		    padding: 0.5rem 0.75rem;
		    margin-left: -1px;
		    line-height: 1.25;
		    color: #222;
		    background-color: #ecf0f1;
		    border: 1px solid #dee2e6;
		    -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
			}
			.page-link:focus {
			    z-index: 2;
			    outline: 0;
			    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
			}
			.page-link:hover {
			    color: #fff;
			    text-decoration: none;
			    background-color: #f6214b;
			    border-color: #dee2e6;
			}
			.page-item.active .page-link {
		    z-index: 1;
		    color: #fff;
		    background-color: #f6214b;
		    border-color: #f6214b;
			}
		</style>
@endsection

@section('latest-post-wrap')
		<div class="latest-post-wrap">
			<h4 class="cat-title">
				@isset($tag)
					Tag :: {{ ucfirst($tag->name) }}
				@else
					Latest Posts
				@endisset
			</h4>

			@if(count($posts) > 0)
				@foreach ($posts as $post)
						<div class="single-latest-post row align-items-center">
							<div class="col-lg-5 post-left">
								<div class="feature-img relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="{{ asset('storage/posts') }}/{{ $post->image }}" alt="">
								</div>
								<ul class="tags">
									<li><a href="#">{{ ucfirst($post->category['name']) }}</a></li>
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
					{{-- <a href="#" class="primary-btn">Load More Posts</a> --}}
					{!! $posts->render() !!}
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