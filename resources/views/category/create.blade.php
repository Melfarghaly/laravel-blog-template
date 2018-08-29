@section('page')
		Create Category
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
								<h1 class="text-white">Create Category</h1>
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
							<form class="form-area contact-form" action="{{ url('/category') }}" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-12">

										@include('include.form-error')

										@csrf()

										<label for="name">Name:</label>
										<input name="name" placeholder="Category Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Category Name'" class="common-input mb-20 form-control" required="" type="text" value="{{ old('name') }}">

										<label for="description">Description:</label>
										<textarea class="common-textarea form-control" name="description" id="description" placeholder="Write a short description here...">{{ old('description') }}</textarea>

										<button class="primary-btn primary mt-20" style="float: right;" type="submit">Create</button>

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