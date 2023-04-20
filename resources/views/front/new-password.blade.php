@extends('front/common')
<section class="bl-form login-frm">
    <div class="container">
      <div class="row justify-content-center align-items-center ">
      <form role="form" method="post" action="{{url('/new-password')}}"
                            enctype="multipart/form-data">
                            @csrf
          <div class="AppForm bg-white">
            <div class="AppFormLeft text-center">
              <h1>New Password</h1>
              <p style="color: gray; font-size: 13px">Lorem ipsum dolor sit amet, consectetur, adipisicing elit.</p>
              <div class="row my-3">
              <div div class="form-group col-md-12 px-2 position-relative">
                  <input type="text" class="form-control" name="otp" placeholder="OTP">
                   @error('otp')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                 <i class="fa fa-user"></i>
                </div>
                <div div class="form-group col-md-12 px-2 position-relative">
                  <input type="password" class="form-control" name="password" placeholder="New Password">
                   @error('password')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                    <i class="fa fa-lock"></i>
                </div>
                <div div class="form-group col-md-12 px-2 position-relative">
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                   @error('password_confirmation')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                    <i class="fa fa-lock"></i>
                </div>
              </div>
              <button class="btn-block outline-none border-0 text-uppercase">save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
