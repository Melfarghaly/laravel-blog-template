<div class="form-group mt-20">
  @if(count($errors))
    <div class="alert alert-danger alert-dismissible show">
      <ul>
        @foreach ($errors->all() as $error)
          <li class="text-center">{{ $error }}</li>
        @endforeach
      </ul>

      <button style="top: -18px !important;" type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
</div>