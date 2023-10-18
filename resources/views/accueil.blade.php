@extends('layout')

@section('content')

<!-- New Collection Hero -->
<div class="hero min-h-min h-96 max-sm:h-80 " style="background-image: url(images/bg-hero.jpg);">
  <div class="hero-overlay bg-opacity-70"></div>
  <div class="hero-content text-center text-neutral-content">
    <div class="max-w-md">
      <h1 class="mb-4 text-4xl max-sm:text-3xl font-bold ">Nouvelles Arrivées !</h1>
      <p class="mb-5">Découvrez notre nouvelle collection pour fin 2023</p>
      <a href="/boutique"><button class="btn btn-secondary">Découvrir</button></a>
    </div>
  </div>
</div>



@endsection