@extends('front/common')
  <section class="bl-form signup-frm">
    <div class="container">
      <div class="row justify-content-center align-items-center ">
         <form role="form" method="post" action="{{url('/User-Signup')}}"
                            enctype="multipart/form-data">
                            @csrf
          <div class="AppForm bg-white row">
        <div class="AppFormLeft  col-md-8 mx-auto">
              <h1 class = "text-center">Register Now</h1>
              <div class="row my-5">
                <div div class="form-group col-md-6 px-2 position-relative">
                  <input type="text" class="form-control" name="name" placeholder="Username"
                  value="{{old('name')}}">
                   @error('name')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                 <i class="fa fa-user"></i>
                </div>
                <div class="form-group col-md-6 px-2 position-relative">
                  <input type="email" name = "email" class="form-control border-0 rounded-0" id="password" placeholder="Email">
                  <i class="fa fa-envelope"></i>
                  @error('email')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                </div>
                 <div class="form-group col-md-6 px-2 position-relative">
                  <input type="text" name = "phone" class="form-control border-0 rounded-0" id="phone" placeholder="Phone Number">
                  <i class="fa fa-phone"></i>
                  @error('phone')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                </div>
                 <div class="form-group col-md-6 px-2 position-relative">
                  <input type="password" name = "password" class="form-control border-0 rounded-0" id="password" placeholder="Password">
                  <i class="fa fa-lock"></i>
                  @error('password')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                </div>
                <div class="form-group col-md-12 px-2 position-relative">
                  <textarea name="address" id="" class="w-100 border-0 p-3" placeholder="Address"></textarea>
                  @error('address')
                   <div class="form-valid-error">{{$message}}</div>
                    @enderror 
                </div>
                <div class="col-md-12 text-left mt-2">
                 <input type="checkbox" name="checkbox" id="checkbox1"> <label  for="checkbox1"> Agree </label><a href="">terms & conditions</a>
                 @error('checkbox')
                   <div class="form-valid-error">{{ $message }}</div>
                    @enderror 
                </div>
              </div>              
              <button class="btn-block outline-none border-0 text-uppercase">Sign Up</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>

