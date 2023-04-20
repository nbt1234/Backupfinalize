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

  <link rel="stylesheet" href="{{ asset('public/admin-assets/css/style.css') }}">
  <!-- Google Font: Source Sans Pro -->

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- TOASTR -->
  <link rel="stylesheet" href="{{ asset('public/template/plugins/toastr/toastr.min.css') }} ?>">

</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('finalize-admin-login/login')}}"><b>finalize</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

        <form action="{{url('finalize-admin-login/forget-password/verify')}}" method="post">
          @csrf
          @if ( session('flash-error'))
          <p class="admin-toastr" onclick="toastr_danger('{{session()->get('flash-error')}}')"></p>
          @endif
          @if ( session('flash-success'))
          <p class="admin-toastr" onclick="toastr_danger('{{session()->get('flash-success')}}')"></p>
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <div class="form-valid-error">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="{{url('finalize-admin-login/login')}}">Login</a>
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
    $(".admin-toastr").click();
  });

  function toastr_danger(msg) {
    toastr.error(msg)
  }

</script>