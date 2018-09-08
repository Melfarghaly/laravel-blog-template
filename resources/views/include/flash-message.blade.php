<div class="row">
<div id="flash-message" class="col-lg-12">
	@if ($flash = session("success"))
	  <div class="alert alert-success alert-dismissible show text-center" role="alert">
	      {{ $flash }}<br>
	      @if ($msg = session("message"))
	        <strong>{{ $msg }}</strong>
	      @endif
	      <button style="top: -18px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	  </div>
	@endif

	@if ($flash = session("error"))
	  <div class="alert alert-danger alert-dismissible show text-center" role="alert">
	      {{ $flash }}<br>
	      @if ($msg = session("message"))
	        <strong>{{ $msg }}</strong>
	      @endif
	      <button style="top: -18px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	  </div>
	@endif
</div>
</div>