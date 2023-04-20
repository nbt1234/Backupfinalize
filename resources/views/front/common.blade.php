<!DOCTYPE html>
<html lang="en">
<head>
  <title>FINALIZE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="resources/css/style.css">
  <!-- toastr css -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
@if(Session::has('flash-success'))
<p class="toastr_success" onclick="toastr_success('{{ session()->get('flash-success') }}')"></p>
@elseif(Session::has('flash-error'))
<p class="toastr_danger" onclick="toastr_danger('{{ session()->get('flash-error') }}')"></p>
@endif
<header class="header fixed-top">
    <nav class="navbar navbar-expand-xl  py-3">
        <div class="container">
          <a href="#" class="navbar-brand text-uppercase font-weight-bold">
            <div class="header-logo">
              <a href = "{{url('/home')}}"><img src="resources/img/logo.png" align="header-logo" class="header-logo img-fluid"></a>
            </div>
        </a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button> 
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                   <li class="nav-item">
                      <a href="{{url('/home')}}" class="nav-link text-capitalize font-weight-normal text-white">Home</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link text-capitalize font-weight-normal text-white">About</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link text-capitalize font-weight-normal text-white">Tournaments</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link text-capitalize font-weight-normal text-white">Divisions</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link text-capitalize font-weight-normal text-white">Rules</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('/faq')}}" class="nav-link text-capitalize font-weight-normal text-white">FAQ</a>
                    </li>
                </ul>
                <div class="account-info d-flex">
                     @if(!Session::has('userId'))
                    <a href="{{url('/signin')}}" class="nav-link text-uppercase font-weight-bold text-purple">Login</a>
                    <a href="{{url('/signup')}}" class="nav-link sign-up text-uppercase font-weight-bold text-white bg-purple">Sign up</a>
                     @else
                    <a href="{{url('/sign-out')}}" class="nav-link sign-up ml-4 text-uppercase font-weight-bold text-white bg-purple">Sign Out</a>
                    @endif 
                </div>
            </div>
        </div>
    </nav>
</header>

<footer id="footer-section" class="footer-section">
  <div class="container">
    <div class="row">
      
    <div class="footer-main d-flex border-bottom">
      <div class="col-md-3">
        <div class="footer-logo">
          <img src="resources/img/footer-logo.png" class="img-fluid">
        </div>
      </div>
      <div class="col-md-6">
        <div class="footer-links">
          <ul>
            <li class="footer-links"><a href="#" class="text-white text-decoration-none font-weight-normal">About</a></li>
            <li class="footer-links"><a href="#" class="text-white text-decoration-none font-weight-normal">Privacy Policy</a></li>
            <li class="footer-links"><a href="{{url('terms-conditions')}}" class="text-white text-decoration-none font-weight-normal">Terms & Conditions</a></li>
            <!-- <li class="footer-links"><a href="#" class="text-white text-decoration-none font-weight-normal">Tournaments</a></li> -->
            <!-- <li class="footer-links"><a href="#" class="text-white text-decoration-none font-weight-normal">Divisions</a></li> -->
            <!-- <li class="footer-links"><a href="#" class="text-white text-decoration-none font-weight-normal">Rules</a></li> -->
            <li class="footer-links"><a href="{{url('/faq')}}" class="text-white text-decoration-none font-weight-normal">FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="social-links float-right">
          <ul>
            <li class="social-links">
              <a href="{{$footer[0]->facebook_url}}" class="text-white text-decoration-none font-weight-normal">
                <i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li class="social-links">
              <a href="{{$footer[0]->telegram_url}}"class="text-white text-decoration-none font-weight-normal">
                <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
            </li>
            <li class="social-links">
              <a href="{{$footer[0]->linkedin_url}}" class="text-white text-decoration-none font-weight-normal">
                <i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
            <li class="social-links">
              <a href="{{$footer[0]->instagram_url}}" class="text-white text-decoration-none font-weight-normal">
                <i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12">
      <div class=" subscription-form d-block m-auto pt-5">
        <form action="" method="post" class="rounded-pill d-block m-auto position-relative mt-5">
          <input type="email" placeholder="Email address" class="text-white">
          <input type="submit" value="Subscribe" class="text-white position-absolute rounded-pill">
        </form>
        <div class="copyright-text text-center pt-5 pt-5">
          <a href="#" class="text-decoration-none font-weight-normal">@Copyright 2021 All Rights Reserved.</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="resources/js/jquery.min.js"></script>
<script src="resources/js/popper.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<!-- toastr js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
</html>


<script type="text/javascript">
$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});

$('.toastr_danger').click();

function toastr_danger(msg){
  toastr.error(msg);
}

$('.toastr_success').click();

function toastr_success(msg){
  toastr.success(msg);
}
</script>
