@extends('layouts.client')

@section('content')

<div class="lg:mx-24 xl:mx-48">

  <!-- Section Anneau -->
  <div class="hero h-48 max-sm:h-28 shadow-md" style="background-image: url(images/composants/bg-ring.jpg);">
    <div class="hero-overlay bg-yellow-800 bg-opacity-70"></div>
    <div class="hero-content text-center text-white ">
      <div class="max-w-md">
        <h1 class="mb-4 text-xl md:text-2xl font-bold ">Notre sélection d'anneaux</h1>
      </div>
    </div>
  </div>

  <div class="grid gap-2 max-sm:gap-0 p-6 max-sm:p-2 place-items-center max-sm:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
    @foreach ($bijoux as $bijou)

      @if ( $bijou->type =='Anneau')
      <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">
        <div class="card w-50 bg-base-100 shadow-xl flex flex-col items-center m-1">
          <figure class="px-2 pt-2">
            <img src="{{ asset('images/produits/'. $bijou->photo1 )}}" loading="lazy"
            alt="img bijou database"
            class="rounded-lg h-48 w-48 max-sm:h-36 max-sm:w-36 object-cover">
          </figure>

          <h2 class="font-semibold text-sm text-center py-0.5 mx-1">{{ $bijou->nom }}</h2>
          <p class="text-sm "> {{ $bijou->type_metal }}</p> 
          <p class="text-sm pb-1.5" >{{ $bijou->prix }} DH</p>
        </div>
      </a>
      @endif
    @endforeach
  </div>

  <!-- Section Collier -->
  <div class="hero h-48 max-sm:h-28 mt-8 shadow-md" style="background-image: url(images/composants/bg-collier.jpg);">
    <div class="hero-overlay bg-amber-800 bg-opacity-70"></div>
    <div class="hero-content text-center text-white">
      <div class="max-w-md">
        <h1 class="mb-4 text-xl md:text-2xl font-bold ">Notre sélection de colliers</h1>
      </div>
    </div>
  </div>

  <div class="grid gap-2 max-sm:gap-0 p-6 max-sm:p-2  place-items-center  max-sm:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
    @foreach ($bijoux as $bijou)
      @if ($bijou->type =='Collier')

      <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">
        <div class="card w-50 bg-base-100 shadow-xl flex flex-col items-center m-1">
          <figure class="px-2 pt-2">
            <img src="{{ asset('images/produits/'. $bijou->photo1 )}}" loading="lazy"
            alt="img bijou database"
            class="rounded-lg h-48 w-48 max-sm:h-36 max-sm:w-36 object-cover">
          </figure>

          <h2 class="font-semibold text-sm text-center py-0.5 mx-1">{{ $bijou->nom }}</h2>
          <p class="text-sm "> {{ $bijou->type_metal }}</p> 
          <p class="text-sm pb-1.5" >{{ $bijou->prix }} DH</p>
        </div>
      </a>
      @endif
    @endforeach
  </div>

  <!-- Section Bracelet -->
  <div class="hero h-48 max-sm:h-28 mt-8 shadow-md" style="background-image: url(images/composants/bg-bracelet.jpg);">
    <div class="hero-overlay bg-yellow-800 bg-opacity-70"></div>
    <div class="hero-content text-center text-white">
      <div class="max-w-md">
        <h1 class="mb-4 text-xl md:text-2xl font-bold ">Notre sélection de bracelets</h1>
      </div>
    </div>
  </div>

  <div class="grid gap-2 max-sm:gap-0 p-6 max-sm:p-2  place-items-center  max-sm:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
    @foreach ($bijoux as $bijou)
      @if ($bijou->type =='Bracelet')

      <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">
        <div class="card w-50 bg-base-100 shadow-xl flex flex-col items-center m-1">
          <figure class="px-2 pt-2">
            <img src="{{ asset('images/produits/'. $bijou->photo1 )}}" loading="lazy"
            alt="img bijou database"
            class="rounded-lg h-48 w-48 max-sm:h-36 max-sm:w-36 object-cover">
          </figure>

          <h2 class=" font-semibold text-sm text-center py-0.5 mx-1">{{ $bijou->nom }}</h2>
          <p class="text-sm "> {{ $bijou->type_metal }}</p> 
          <p class="text-sm pb-1.5" >{{ $bijou->prix }} DH</p>
        </div>
      </a>
      @endif
    @endforeach
  </div>

</div>

@endsection