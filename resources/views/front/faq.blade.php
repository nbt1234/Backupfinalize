@extends('front/common')
<section class="faq-banner align-items-center" style="background-image: url('resources/img/faq-banner.png'); ">
  <div class="container">
    <div class="faq-banner-text ">
      <h1 class="text-white text-uppercase">Faq</h1>
    </div>
  </div>
</section>

<section class="faq-questions">
  <div class="container">
  <div class="faq-questions-heading text-center">
    <h4 class="font-weight-bold text-uppercase">Frequently Asked Questions</h4>
  </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-12 col-12">
          <div class=" faq-question-section">
            <div class="container">
              <div id="accordion" class="accordion">
                <div class="card mb-0">
              <?php foreach ($result as $key => $value){ ?>    
            <div class="card-header  bg-white collapsed" data-toggle="collapse" href="#collapseOne{{$value->id}}">
                <a class="card-title text-dark font-weight-normal text-decoration-none">
                 {{$value->heading}}
                </a>
            </div>
            <div id="collapseOne{{$value->id}}" class="card-body collapse show" data-parent="#accordion" >
                <p class="collapse_description font-weight-normal">{{$value->content}}</p>
            </div>
             <hr>
             <?php }?>
        </div>
              </div>          
            </div>
    
          </div>

    </div>

</div>
</section>

