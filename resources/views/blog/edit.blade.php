@section('page')
		Edit Post
@endsection

@section('head')
	<style>
		.contact-page-area .contact-wrap {
  		background: #fff;
  		padding: 30px 20px;
		}

		.contact-page-area .form-area input,
		.contact-page-area .form-area textarea {
			font-size: 14px !important;
			color: #333;
			border-color: #c5c5c5;
			-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
			-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
			box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
		}

		label{
			font-weight: bold;
			font-size: 16px;
			color: #333;
		}
	</style>

	<script type="text/javascript" src="{{ url('/js/plugins/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
		tinymce.init({ 
			selector:'#content',
			branding: false,
			menubar: "",
			theme: "modern",
			height: "220",
			plugins: 'wordcount lists textcolor code link table anchor preview autolink emoticons hr image media pagebreak spellchecker',
			// content_css: ['//fonts.googleapis.com/css?family=Lato:300,300i,400,400i', '//www.tinymce.com/css/codepen.min.css'],
			toolbar1: 'formatselect | undo redo | bold italic underline forecolor | link anchor emoticons image media pagebreak spellchecker',
			toolbar2: 'alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | table code preview',
			default_link_target: "_blank",
			spellchecker_languages: 'English=en'
		});
	</script>
@endsection

@include('include.header')
@include('include.link-head-menu')

		<div class="site-main-container">
			<!-- Start top-post Area -->
			<section class="top-post-area pt-10">
				<div class="container no-padding">
					<div class="row">
						<div class="col-lg-12">
							<div class="hero-nav-area">
								<h1 class="text-white">Create a New Post</h1>
								{{-- <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="{{ route('contact') }}">Contact Us </a></p> --}}
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End top-post Area -->
			<!-- Start contact-page Area -->
			<section class="contact-page-area pt-50 pb-80">
				<div class="container">
					<div class="row contact-wrap">

						{{-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> --}}

						<div class="col-lg-8">
							<form class="form-area contact-form" action="{{ url('/posts') }}/{{ $post->slug }}" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-12">

										@include('include.form-error')

										@csrf()

										@method('PATCH')

										<label for="title">Title:</label>
										<input name="title" placeholder="Post Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Post Title'" class="common-input mb-20 form-control" required="" type="text" value="{{ $post->title }}">

										<label for="slug">Slug:</label>
										<input name="slug" placeholder="Post Slug" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Post Slug'" class="common-input mb-20 form-control" required="" type="text" value="{{ $post->slug }}">

										<label for="category">Category:</label>
										<select name="category" id="category" class="common-input mb-20 form-control">
											<option value="{{ $post->category->id }}" selected="">{{ ucfirst($post->category->name) }}</option>
											<option value="1">-- Select a category --</option>
											@foreach($categories as $category)
												<option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
											@endforeach
										</select>

										<label for="tags">Tags:</label>
										<input name="tags" placeholder="Post Tags" pattern="^[a-zA-Z\+\-# ]+(?:[ ,]+[a-zA-Z\+\-# ]+){0,5}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Post Tags'" class="common-input mb-20 form-control" required="" type="text" value="@foreach($post->tags as $tag){{ $tag->name }}@if($loop->iteration != $post->tags->count()){{','}}@endif @endforeach">
										<p class="help-block">ex: one,two,three. Tag names must not contain spaces</p>

										<label for="image">Image:</label>
										<input name="image" type="file" class="common-input mb-20 form-control" value="">
										<p class="help-block">Image size must be greater than 2MB</p>
										<p><img class="img-thumbnail" style="width: 200px;background-color: grey;" alt="Post image" src="{{ asset('storage/posts') }}/{{ $post->image }}" alt=""></p>

										<label for="content">Content</label>
										<textarea class="common-textarea form-control" name="content" id="content">{{ $post->content }}</textarea>

										<div class="alert-msg" style="text-align: left;">
											{{-- Errors --}}
										</div>

										<button class="primary-btn primary mt-20" style="float: right;" type="submit">Update</button>

									</div>
								</div>
							</form>
						</div>

						<div class="col-lg-4 d-flex flex-column address-wrap">
							{{-- <div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5>Los Angeles, USA</h5>
									<p>
										56/8, Rocky beach road
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>00 (440) 9865 562</h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>support@colorlib.com</h5>
									<p>Send us your query</p>
								</div>
							</div> --}}
						</div>

					</div>
				</div>
			</section>
			<!-- End contact-page Area -->
		</div>
		
@include('include.link-footer-menu')

@include('include.footer')