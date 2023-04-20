@extends('front/common')
<section class="bl-form login-frm">
    <div class="container">
      <div class="row justify-content-center align-items-center ">
      <form role="form" method="post" action="{{url('/User-Signin')}}"
                            enctype="multipart/form-data">
                            @csrf
          <div class="AppForm bg-white">
            <div class="AppFormLeft text-center">
              <h1>Log In</h1>
              <div class="row my-3">
              <div div class="form-group col-md-12 px-2 position-relative">
                  <input type="email" class="form-control" name="username" placeholder="Username"
                  value="{{old('username')}}">
                   @error('username')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                 <i class="fa fa-user"></i>
                </div>
                <div class="form-group col-md-12 px-2 position-relative">
                  <input type="password" name = "password" class="form-control border-0 rounded-0" id="password" placeholder="Password">
                  <i class="fa fa-lock"></i>
                  @error('password')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                    <div class="my-2 text-left">
                      <a href="{{url('/Forgot-Password')}}"> Forgot Password</a>
                    </div>
                    <div class="my-2 text-right">
                      <a href="{{url('/signup')}}">signup</a>
                    </div>
               </div>
              </div>
              <button class="btn-block outline-none border-0 text-uppercase">Log in</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
