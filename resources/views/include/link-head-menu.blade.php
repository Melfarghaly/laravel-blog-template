<header>
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
					<ul>
						<li><a href="tel:+234 814 7638 236"><span class="lnr lnr-phone-handset"></span><span>+234 814 7638 236</span></a></li>
						<li><a href="mailto:weybansly@gmail.com"><span class="lnr lnr-envelope"></span><span>weybansky@gmail.com</span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="logo-wrap">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
					<a href="{{ route('home') }}">
						<img class="img-fluid" src="img/logo.png" alt="">
						{{-- <h2>Solve All Problem</h2> --}}
					</a>
				</div>

				<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
					<img class="img-fluid" src="img/banner-ad.jpg" alt="">
				</div>
			</div>
		</div>
	</div>

	<div class="container main-menu" id="main-menu">
		<div class="row align-items-center justify-content-between">
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/posts') }}">Archive</a></li>
					<li class="menu-has-children"><a href="javascript:;">Post Types</a>
						<ul>
							<li><a href="{{ url('/template/standard-post') }}">Standard Post</a></li>
							<li><a href="{{ url('/template/image-post') }}">Image Post</a></li>
							<li><a href="{{ url('/template/gallery-post') }}">Gallery Post</a></li>
							<li><a href="{{ url('/template/video-post') }}">Video Post</a></li>
							<li><a href="{{ url('template/audio-post') }}">Audio Post</a></li>
						</ul>
					</li>
					<li><a href="{{ url('/about') }}">About</a></li>
					<li><a href="{{ url('/contact') }}">Contact</a></li>

					@if(!Auth::guest())
						<li class="menu-has-children"><a href="javascript:;">Welcome, Guest</a>
							<ul>
								<li><a href="{{ url('/login') }}">Login</a></li>
								<li><a href="{{ url('/register') }}">Register</a></li>
							</ul>
						</li>
					@else
						<li class="menu-has-children"><a href="javascript:;">Welcome, User</a>
							<ul>
								<li><a href="{{ route('create-post') }}">Create Post</a></li>

								<li><a href="{{ route('home')}}">Dashboard</a></li>
								<li>
								  <a href="{{ route('logout') }}"
								      onclick="event.preventDefault();
								               document.getElementById('logout-form').submit();">
								      Logout
								  </a>
								  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								      {{ csrf_field() }}
								  </form>
								</li>
							</ul>
						</li>
					@endif


			</ul>
			</nav><!-- #nav-menu-container -->

			<div class="navbar-right">
				<form class="Search" method="GET" action="{{ url('/search') }}">
					{{-- @csrf --}}
					<input type="text" class="form-control Search-box" name="search" id="Search-box" placeholder="Search">
					<label for="Search-box" class="Search-box-label">
						<span class="lnr lnr-magnifier"></span>
					</label>
					<span class="Search-close">
						<span class="lnr lnr-cross"></span>
					</span>
				</form>
			</div>
		</div>
	</div>
</header>