@extends('front/common')
<section class="bl-form login-frm">
    <div class="container">
      <div class="row justify-content-center align-items-center ">
      <form role="form" class="col-md-8 mx-auto" method="post" action="{{url('/reset-password')}}"
                            enctype="multipart/form-data">
                            @csrf
          <div class="AppForm bg-white">
            <div class="AppFormLeft text-center">
              <h1>Forgot Password</h1>
              <div class="row my-3">
              <div div class="form-group col-md-12 px-2 position-relative">
                  <input type="text" class="form-control" name="username" placeholder="Email"
                  value="{{old('username')}}">
                     <i class="fa fa-user"></i>
                   @error('username')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                </div>
              </div>
              <button class="btn-block outline-none border-0 text-uppercase">send otp</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
