@extends('front/common')
  <section class="Account-info-section align-items-center mt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 bg-white p-5  profile-section-column">
          <div class="row">
            <div class=" col-lg-6 col-md-6">
              <div class="profile-name">
                <h1 class="text-capitalize font-weight-bold mt-5">{{$result[0]->heading}}</h1>
              </div>
            </div>
            <div class=" col-lg-3 col-md-3 border-right">
              <div class="fund-detials text-center text-capitalize">
                <h4 class="font-weight-bold pb-1">{{$result[0]->cash_blance}}</h4>
                <p class="pb-2 font-weight-normal ">cash balance</p>
                <a href="#" class="text-uppercase border p-3 text-decoration-none font-weight-bold">Withdraw founds</a>
              </div>
            </div>
            <div class=" col-lg-3 col-md-3">
              <div class="fund-detials text-center text-capitalize">
                <h4 class="font-weight-bold pb-1">{{$result[0]->credit_price}}</h4>
                <p class="pb-2 font-weight-normal ">Credit</p>
                <a href="#" class="text-uppercase border p-3 text-decoration-none font-weight-bold">Refere Friends</a>
              </div>
            </div>
          </div>
         </div>
      <div class="col-lg-12 col-md-12 p-5 bg-white mt-5">
        <div class="account-title">
          <h2 class="personal-info font-weight-bold text-capitalize">personal info</h2>
        </div>
        <div class="row">
          <div class="col-md-7">         
            <form action="" method="post"class="pt-3 pb-3">
              <div class="form-row">
                <div class="form-group position-relative col-md-12 mt-3">
                  <i class="fa fa-user position-absolute" aria-hidden="true"></i>
                  <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
              </div>
              <div class="form-row">
              <div class="form-group position-relative col-md-6 mt-2">
                 <i class="fa fa-user position-absolute" aria-hidden="true"></i>
                <input type="text" class="form-control" placeholder="First name" name="firstname">
              </div>
              <div class="form-group col-md-6 mt-2">
                 <i class="fa fa-user position-absolute" aria-hidden="true"></i>
                <input type="text" class="form-control" placeholder="Last name" name="lastname">
              </div>
              </div>
              <div class="form-row">
                <div class="form-group position-relative col-md-6 mt-3">
                  <select class="form-control">
                    <option selected>Country</option>
                    <option value="America">America</option>
                  </select>
                </div>
                 <div class="form-group col-md-6 mt-3 ">
                  
                  <select type="date" class="form-control select-box">
                    <option selected>Dob</option>
                    <option value="2000">2000</option>
                    
                  </select>
                </div>
              </div>
              <button type="submit" class=" btn-bg-purple text-white mt-3 font-weight-bold text-uppercase">Update Account</button>
            </form>
          </div>
        </div>
      </div>
      <div class=" col-lg-12 col-md-12 p-5 bg-white">
        <div class="platform-management-heading">
          <h4 class="text-capitalize font-weight-bold">platform management</h4>
            <div class="row">
              <div class="col-lg-7 col-md-6 mt-3">
                <div class="warzone-title">
                  <p>warzone</p>
                </div>
                <div class="row mt-3">
                  <div class=" col-lg-6 col-md-6 col-12 mt-3">
                    <div class="bg-grey text-center p-2 rounded">
                      <p class="text-capitalize">Platform</p>
                      <h6 class="text-purple font-weight-bold text-uppercase">psn</h6>
                    </div>
                  </div>
                  <div class=" col-lg-6 col-md-6 col-12 mt-3">
                    <div class="bg-grey text-center p-2 rounded">
                      <p class="text-capitalize">username</p>
                      <h6 class="text-purple font-weight-bold">mr_demo_01</h6>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="change-platform text-center pt-5">
                      <a href="#" class="text-dark text-decoration-none">
                      <span>
                        <img src="resources/img/back-icon.png" alt="back-icon">
                      </span>
                      <span class="text-capitalize font-weight-bold pl-1">change platform Id</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-6 mt-3">
                <div class="fornite-title mb-3">
                  <p class="text-capitalize">fornite</p>
                </div>
                <div class="mt-3 pt-3">
                  <div class="bg-grey text-center pt-4 pb-4 rounded">
                    <div class="add-paltform p-2 ">
                      <a href="#" class="text-dark text-decoration-none">
                      <span><img src="resources/img/add-icon.png" alt="add-icon" class="add-icon"></span>
                      <span class="text-capitalize font-weight-bold pl-1">Add platform id</span>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
      </div>
    </div>
  </section>
