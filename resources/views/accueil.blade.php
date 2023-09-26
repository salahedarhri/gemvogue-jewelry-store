@extends('layout')

@section('content')

<!-- Carrousel -->
<div class="flex justify-center items-center m-5">
  <div class="carousel w-screen">
    <div id="slide1" class="carousel-item relative w-full">
      <img src="/images/bg-bracelet.jpg" class="w-full" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide3" class="btn btn-circle">❮</a> 
        <a href="#slide2" class="btn btn-circle">❯</a>
      </div>
    </div> 
    <div id="slide2" class="carousel-item relative w-full">
      <p>du coup</p>
      <img src="/images/bg-ring.jpg" class="w-full" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide1" class="btn btn-circle">❮</a> 
        <a href="#slide3" class="btn btn-circle">❯</a>
      </div>
    </div> 
    <div id="slide3" class="carousel-item relative w-full">
      <p>ça marche</p>
      <img src="/images/bg-collier.jpg" class="w-full" />
      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
        <a href="#slide2" class="btn btn-circle">❮</a> 
        <a href="#slide1" class="btn btn-circle">❯</a>
      </div>
    </div> 
  </div>
</div>
<!-- New Collection Hero -->
<div class="hero min-h-min h-96 max-sm:h-80 " style="background-image: url(images/bg-hero.jpg);">
  <div class="hero-overlay bg-opacity-70"></div>
  <div class="hero-content text-center text-neutral-content">
    <div class="max-w-md">
      <h1 class="mb-4 text-4xl max-sm:text-3xl font-bold ">Nouvelles Arrivées !</h1>
      <p class="mb-5">Découvrez notre nouvelle collection pour fin 2023</p>
      <a href="/boutique"><button class="btn btn-primary">Découvrir</button></a>
    </div>
  </div>
</div>



@endsection