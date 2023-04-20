@extends('front/common')
<section id="banner-section" style="background-image: url({{url('public/admin-assets/img/pages/banner/'.$result[0]->image)}});">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <div class="banner_description pt-3 pb-3">
            <div class="banner_heading">
              <h1 class="text-white font-weight-bold text-uppercase">{{$result[0]->heading}}</h1>
              <h3 class="text-purple font-weight-bold text-uppercase">{{$result[0]->content}}</h3>
            </div>
            <div class="banner-btns  text-uppercase text-white">
              <a href="#" class="text-white bg-purple border_purple text-center mt-3 text-decoration-none">find a tournament</a>
              <a href="#" class="text-purple bg-none border_purple text-center mt-3 text-decoration-none"><img src="resources/img/game-icon.png" alt="game-icon"class="game-icon">
              Join us on discord</a>
            </div>
          </div>

        </div>
      </div>  
    </div>
  </section>
  <section class="join-over-btn">
    <div class="container"> 
      <div class="joined_players_btn text-center">
        <a href="#" class="bg-purple text-white d-block text-uppercase font-weight-bold rounded-pill text-decoration-none">Join our 900,000 players</a>
      </div>  
    </div>
  </section>
  <section id="tournament-section" class="tournament-section-bg">
   <div class="container">
      <div class="section-title text-center">
        <h2 class="text-uppercase font-weight-bold">TOURNAMENTS</h2>
      </div>
      <div class="find_tournament text-center py-2">
        <h6 class="font-weight-bold">Find a tournament </h6>
      </div>
      <div class="row justify-content-center">
        <?php  foreach ($tournament as $key => $value){
          if($key%2 == 0){
          ?>
        <div class="col-lg-5 col-md-6 mt-3">
          <div class="bg-purple tournament ">
            <div class="tournaments_icons position-relative">
              <img src="resources/img/icon-1.png" alt="icon-1" class="position-absolute">
            </div>
            <div class="tournaments_main">  
              <div class="tournament-section_title text-center text-white pt-4 pb-4">
                <h6 class="font-weight-bold">{{$value->tournament_name}}</h6>
                <p class="font-weight-normal text-white">{{$value->tournament_date}}</p>
                <div class="team-expected pt-3 pb-3">
                  <a href="#" class="dark-purple text-white font-weight-normal rounded-pill text-decoration-none"> <i class="fa fa-star" aria-hidden="true"></i>{{$value->players}}</a>
                </div>
                <div class="pricing-perdivision pt-3 pb-3">
                  <h6>{{$value->amount}}</h6>
                  <p class="text-capitalize">Pre Division</p>
                </div>
               <div class="registered-btn">
                @if(!Session::has('userId'))
                <a href="{{ url('/signin')}}" class="text-white bg-none text-uppercase text-decoration-none">Register Now</a>
                @else
                <a href="{{ url('/payment/'.$value->tournament_id)}}" class="text-white bg-none text-uppercase text-decoration-none">Register Now</a>
             
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } else{?>
      
        <div class="col-lg-5 col-md-6 mt-3">
          <div class="bg-light-gray ">
            <div class="tournaments_icons-2 position-relative">
              <img src="resources/img/icon-2.png" alt="icon-2" class="position-absolute">
            </div>
            <div class="tournaments_main">  
              <div class="tournament-section_title text-center text-white pt-4 pb-4">
                <h6>{{$value->tournament_name}}</h6>
                <p>{{$value->tournament_date}}</p>
                <div class="team-expected pt-3 pb-3">
                  <a href="#" class="dark-gray text-white font-weight-normal rounded-pill text-decoration-none"><i class="fa fa-star" aria-hidden="true"></i>{{$value->players}}</a>
                </div>
                <div class="pricing-perdivision pt-3 pb-3">
                  <h6>{{$value->amount}}</h6>
                  <p class="text-capitalize">Pre Division</p>
                </div>
               <div class="registered-btn">
                @if(!Session::has('userId'))
                <a href="{{ url('/signin')}}" class="text-white bg-none text-uppercase text-decoration-none">Register Now</a>
                @else
                <a href="{{ url('/payment/'.$value->tournament_id)}}" class="text-white bg-none text-uppercase text-decoration-none">Register Now</a>
             
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }}?>
      </div>    
    </div>
  </div>
</section>
<section id="score-section" class="score-section-bg">
  <div class="container">
    <div class="section-title text-center">
      <h2 class="text-white text-uppercase">Live Scoring</h2>
      <p class="py-4">Play games in public lobbies and track how your team is doing with our live scoreboard.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
         <table>
            <tr>
                <th class="font-weight-normal">Find a tournament </th>
                <th class="font-weight-normal text-center">Best 2 Placement Points</th>
                <th class="font-weight-normal text-center">Best 2 Kils</th>
                <th class="font-weight-normal text-center">Total Points</th>
                <th class="font-weight-normal text-center">Total Wins</th>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td class = "table-column">1’95 Chicago Bulls</td>
                <td class="text-center">16</td>
                <td class="text-center">40</td>
                <td class="text-center">56</td>
                <td class="text-center">4</td>
            </tr>
            <tr>
                <td class = "table-column">1’95 Chicago Bulls</td>
                <td class="text-center">16</td>
                <td class="text-center">40</td>
                <td class="text-center">56</td>
                <td class="text-center">4</td>
            </tr>
            <tr>
                <td class = "table-column">1’95 Chicago Bulls</td>
                <td class="text-center">16</td>
                <td class="text-center">40</td>
                <td class="text-center">56</td>
                <td class="text-center">4</td>
            </tr>
        </table>
    </div>
  </div>
</div>
</section>
<section id="creator-section" class="creator-section">
  <div class="container">  
    <div class="section-title text-center">
      <h2 class="text-uppercase font-weight-bold">Trusted by top content creators</h2>
      <p class="text-center py-4 font-weight-normal">We are endorsed by some of the biggest names in gaming.</p>
    </div>
    <div class="row">
    <?php foreach ($creator as $key => $value){ 
        $image = $value->imgs;
       ?>
      <div class="col-lg-4 col-md-6 col-12">
        <div class="members py-3">
          <div class="creators-profile position-relative">
            <img src="{{ url('public/admin-assets/img/pages/content-creators/' .$image)}}" class="img-fluid" alt="creator-1-img">
          </div>
          <div class="members_info position-absolute">
            <h5 class="font-weight-bold text-white">{{$value->title}}</h5>
            <p class="font-weight-bold text-white">{{$value->sub_title}}</p>
          </div>
        </div>
      </div>
      <?php  } ?>
    </div>
  </div>
</section>
<section id="divisions-section" class="divisions-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="division_main">
          <div class="division_image position-relative">
            <img src="resources/img/division-img.png" class="img-fluid position-absolute" alt="division-img">
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <div class="division-info">
          <h5 class="text-white font-weight-bold text-uppercase">Divisions for  all skill levels</h5>
          <p class="font-weight-normal">We are endorsed by some of the biggest names in gaming.</p>
        </div>
        <div class="read_more_btn mt-5">
          <a href="#" class="bg-purple text-white text-uppercase font-weight-bold text-decoration-none">Read more</a>
        </div>
      </div>
    </div>
  </div>  
</section>
<section id="bolg-section" class="blogs-section">
  <div class="container">
    <div class="section-title pb-3">
      <h2 class="text-uppercase text-center font-weight-bold">Blog & news</h2>
      <p class="text-center font-weight-normal">We are endorsed by some of the biggest names in gaming.</p>
    </div>
    <div class="row">
      <?php foreach ($blog as $key => $value) { 
        $images = json_decode($value->imgs,TRUE);
        ?>
      <div class="col-lg-4 col-md-6 col-12 mt-3">
        <div class="justify-content-center align-items-center">
          <div class="blog-image">
            <img src="{{ url('public/admin-assets/img/pages/blogs/' .$images[0])}}" class="img-fluid d-block m-auto" alt="blog-img-3">
          </div>
          <div class="blog-description">
            <h4 class="py-2 font-weight-bold">{{$value->heading}}</h4>
            <p class="font-weight-normal">{{strip_tags($value->content)}}</p>
          </div>
        </div>
      </div>
       <?php } ?>
  </div>
</section>
