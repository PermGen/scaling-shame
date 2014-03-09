@extends('frontend/_layout/layout')
@section('content')
{{ HTML::style('assets/bootstrap/css/modern-business.css') }}
{{ HTML::style('assets/bootstrap/css/font-awesome.min.css') }}

@if(isset($images))
    @include('frontend/_layout/slider', $images)
@else
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="fill" style="background-image:url('{{asset('assets/images/logo1.jpg')}}');"></div>
           <!--  <div class="carousel-caption">
              <h1>Modern Business - A Bootstrap 3 Template</h1>
            </div> -->
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
            <div class="carousel-caption">
              <h1>Ready to Style &amp; Add Content</h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
            <div class="carousel-caption">
              <h1>Additional Layout Options at <a href="http://startbootstrap.com">http://startbootstrap.com</a></h1>
            </div>
          </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
    </div>
@endif
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-ok-circle"></i> INDUSTRY PARTNERS RECOGNITION DAY: Celebrating Old and New Partnerships</h3>
                <p>
                  Fellowship and Camaraderie Towards Strategizing A New Education Paradigm”.  The university in its second phase of new education paradigm took advantage of the momentous affair to showcase UMak’s various prestigious partner industries and conduct Memorandum of Agreement (MOA) signing of new ones.
                </p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-pencil"></i>UMAK, UMEDFI AND BAUAN MUNICIPALITY SIGN MOA</h3>
                <p>
                  Signifying their common and strong belief in the value of partnership and collaboration to achieve synergy and innovation in offering and delivering capacity building programs, initiatives and interventions in education, training and research to help achieve community developmental goals and objectives, UMak President Tomas Lopez, Jr., University of Makati Educational Development Foundation, Inc. (UMEDFI) Chair Edita Chan, and the Municipality of Bauan, Batangas represented by Mayor Ryanh Dolor, signed a Memorandum of Agreement last November 15.
                </p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3><i class="icon-folder-open-alt"></i>ALL FIRED UP!</h3>
                <p>
                  Eight under-23 football teams are all set to battle for the coveted top spot of the 3rd MAKATI FOOTBALL CHALLENGE, while premier clubs, Kaya FC and Green Archers United, are raring to take on each other in the much-awaited friendly match of the VP BINAY INVITATIONAL GAMES 2013 on November 22 at the University of Makati Oval.
                 </p>
            </div>
        </div>
    </div>
</div>
@stop
