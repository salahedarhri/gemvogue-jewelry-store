@extends('layout')

@section('content')
<div class="bg-slate-500">
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

</div>

<div class="bg-blue-500 text-white flex items-center justify-center h-screen">
  <div class="text-center">
    <h1 class="text-4xl md:text-6xl font-bold mb-4">Welcome to Our Site</h1>
    <p class="text-lg md:text-xl mb-8">Explore our amazing features and services.</p>
    <a href="#" class="bg-white text-blue-500 py-2 px-6 rounded-full text-lg md:text-xl font-semibold hover:bg-blue-700 hover:text-white transition duration-300">Get Started</a>
  </div>
</div>



@endsection