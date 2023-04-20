<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>finalize</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <meta name="google-signin-client_id" content="500325140520-ceurh1j60hddp76ofgh0gu234se38qqa.apps.googleusercontent.com"> -->

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
    <style>
    .abcRioButton{
        display:inline !important;
    }
    .abcRioButtonContentWrapper{
        color:#fff;
        padding: 1px;
    }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>finalize</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ url('vendor/signup-insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (session('flash-error'))
                        <p class="vendor-toastr" onclick="toastr_danger('{{ session()->get('flash-error') }}')"></p>
                    @endif
                    @if (session('flash-success'))
                        <p class="vendor-toastr" onclick="toastr_success('{{ session()->get('flash-success') }}')">
                        </p>
                    @endif

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="name"
                            value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="username" name="username"
                            value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('username')
                            <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email"
                            value="{{ old('email') }}">
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
                        <input type="password" class="form-control" placeholder="Password" name="password" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password"
                            name="password_confirmation" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="form-valid-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="profile-img-block">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="profile-img" name="img">
                                <label class="custom-file-label" for="profile-img">Profile Image</label>
                            </div>
                        </div>
                        @error('img')
                            <div class="form-valid-error mb-3">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="row my-2">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" checked name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                            @error('terms')
                                <div class="form-valid-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <a href="{{ route('login.facebook') }}" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="{{ route('login.google') }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                    <!-- <div class="btn btn-block btn-danger py-0 g-signin2" width="100%"  onclick="google_login()" data-onsuccess="onSignIn">
                      <i class="fab fa-google-plus mr-2">
                      </i> Sign up using Google+
                    </div> -->

                </div>

                <a href="{{ url('vendor/login') }}" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('public/template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }} "></script>
    <script src="{{ asset('public/template/dist/js/demo.js') }} "></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <script src="{{ asset('public/template/plugins/toastr/toastr.min.js') }} "></script>

    <script src="{{ asset('public/template/dist/js/adminlte.min.js') }}"></script>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $(".vendor-toastr").click();
        bsCustomFileInput.init();
    });

    function toastr_danger(msg) {
        toastr.error(msg)
    }

    function toastr_success(msg) {
        toastr.success(msg)
    }

    var google_login_status = false;

    function google_login() {
        google_login_status = true;
    }

    // function onSignIn(googleUser) {
    //     if (google_login_status == true) {

    //         let csrf = $('input[name="_token"]').val();
    //         let profile = googleUser.getBasicProfile();
    //         let id = profile.getId();
    //         let name = profile.getName();
    //         let username=profile.getGivenName();
    //         let img = profile.getImageUrl();
    //         let email = profile.getEmail();
    //         $.ajax({
    //             url: "{{ url('vendor/google-login') }}",
    //             type: "POST",
    //             data: {
    //                 id: id,
    //                 username:username,
    //                 name: name,
    //                 img: img,
    //                 email: email,
    //                 _token: csrf
    //             },
    //             success: $.proxy(function(response) {
    //                 if (response == 'success') {
    //                     window.location.href = "{{ url('vendor/dashboard') }}"
    //                 } else {
    //                     toastr_danger('Some error occured in login')
    //                 }
    //             }, this)
    //         });
    //     }
    // }

</script>
