<?php 

//$count = count($images);
$count=0;
?>
<!-- slider start -->
<div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        @for($i=0; $i < $count; $i++)
        <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ ($i == 0) ? 'active' : '' }}"></li>
        @endfor
    </ol>
    <div class="carousel-inner">
       <div class="item {{ ($i == 0) ? 'active' : '' }}">
        <div class="fill">
            <center><img class="img-responsive" src="{{asset('assets/images/logo1.jpg')}}" /></center>
        </div>
            <div class="carousel-caption">
                <h1></h1>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
<!-- slider end -->