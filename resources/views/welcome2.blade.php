@extends('layouts.app')
@section('content')
  @include('partials._hero')
<section class="block">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="d-block w-100" src="http://touristspotsfinder.com/wp-content/uploads/2015/01/General-Emilio-Aguinaldo-Shrine-Cavite.jpg" alt="Slide1" style="height:700px;">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="http://www.lakwatseradeprimera.com/wp-content/uploads/2010/02/g2.jpg" alt="Slide3" style="height:700px;">
  </div>
  <div class="carousel-item">
    <img class="d-block w-100" src="https://www.vigattintourism.com/assets/images/photo_library/optimize/1348034999M10Z3pOn.jpg" alt="Slide2" style="height:700px;">
  </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</section>
@endsection
