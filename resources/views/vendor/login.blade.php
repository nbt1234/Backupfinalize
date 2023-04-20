<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>finalize</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/template/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/template/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('public/vendor-assets/css/style.css') }}">
  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- TOASTR -->
  <link rel="stylesheet" href="{{ asset('public/template/plugins/toastr/toastr.min.css') }} ?>">

</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('vendor/login')}}"><b>finalize</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign In</p>
        <form action="{{ url('vendor/login-insert') }}" method="post">
          @csrf
          @if ( session('flash-error'))
          <p class="vendor-toastr" onclick="toastr_danger('{{session()->get('flash-error')}}')"></p>
          @endif
          @if ( session('flash-success'))
          <p class="vendor-toastr" onclick="toastr_success('{{session()->get('flash-success')}}')"></p>
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <div class="form-valid-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="form-valid-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            
          </div>
        </form>

        <p class="mb-1">
          <a href="{{url('vendor/forget-password')}}">I forgot my password</a>
        </p>

        <p class="mb-1">
          New Member ?
          <a href="{{url('vendor/signup')}}">Signup</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('public/template/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->

  <script src="{{ asset('public/template/plugins/toastr/toastr.min.js') }} "></script>

  <script src="{{ asset('public/template/dist/js/adminlte.min.js') }}"></script>

</body>
</html>

<script type="text/javascript">

  $(document).ready(function () {
    $(".vendor-toastr").click();
  });

  function toastr_danger(msg) {
    toastr.error(msg)
  }

  function toastr_success(msg) {
    toastr.success(msg)
  }


</script>