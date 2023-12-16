@extends('layouts.client')

{{-- i'll clean things later  --}}
@section('content')

<div class="w-full font-dmsans font-swap bg-third">

  <div class="max-w-7xl mx-auto md:h-60 max-md:h-48 bg-cover bg-center" style="background-image:url({{ asset('images/composants/bg-hero.jpg')}});">
    <div class="h-full w-full bg-amber-950 bg-opacity-30">
      <div class="flex items-center justify-center h-full md:pt-36 max-md:pt-24">
        <p class="md:text-4xl max-md:text-3xl text-third font-playfair font-semibold">Boutique</p>
      </div>
    </div>
  </div>


  <div class="max-w-7xl mx-auto grid lg:grid-cols-4 md:grid-cols-3 justify-center gap-4 p-4">

    <div class="w-60 text-sm flex flex-col dm-sans p-2 max-md:mx-auto">
      <p class="text-2xl font-bold font-playfair mb-3 underline-offset-4 underline ">Affiner Par</p>

      <div x-data="{open1:false}" class="py-1">

        <button @click="open1 =! open1" class="text-xl font-bold font-playfair">
          <div class="flex gap-2 justify-between">
            <p>Catégorie</p>
            <div class="">
                <i x-show="!open1" class="ri-arrow-down-s-fill text-2xl"></i>
                <i x-show="open1" class="ri-arrow-up-s-fill"></i>
            </div>
        </div>
        
        </button>

        <div x-show="open1" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

          @include('composants/shopCategoryForm')
        </div>
      </div>

      <div x-data="{open2:false}" class="py-1">

        <button @click="open2 =! open2" class="text-xl font-bold font-playfair">
          <div class="flex gap-2">
            <p>Prix</p>
            <i x-show="!open2" class="ri-arrow-down-s-fill text-2xl"></i>
            <i x-show="open2" class="ri-arrow-up-s-fill"></i>
          </div>
        </button>

        <div x-show="open2" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

          @include('composants/shopPriceForm')
        </div>

      </div>

      <div x-data="{open3:false}" class="py-1">

        <button @click="open3 =! open3" class="text-xl font-bold font-playfair">
          <div class="flex gap-2">
            <p>Fourchette de prix</p>
            <i x-show="!open3" class="ri-arrow-down-s-fill text-2xl"></i>
            <i x-show="open3" class="ri-arrow-up-s-fill"></i>
          </div>
        </button>

        <div x-show="open3" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100">

          @include('composants/shopPriceRangeForm')
        </div>
      </div>

    </div>

    <div class="lg:col-span-3 md:col-span-2">

      <div class="flex
       {{-- max-sm:flex-col max-sm:gap-2 --}}
        items-center p-3">
        <p class=" font-bold">{{ $bijoux->total()}} Articles Trouvées</p>

        {{-- <form action="shopOrder" method="post" >
          <label for="order" class="text-sm">Trier par :</label>
          <select name="order" class="focus:ring-second text-sm border-second focus:border-second" >
            <option value="prixAsc">Prix (Croissant)</option>
            <option value="prixDesc">Prix (Décroissant)</option>
          </select>
        </form> --}}

      </div>


      <div class="grid lg:grid-cols-4 md:grid-cols-3 max-md:grid-cols-2 items-center gap-2">

        @foreach ($bijoux as $bijou)
    
          <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">

            <div class="flex flex-col place-items-center border border-second relative shadow">
              <img src="{{ asset('images/produits/'. $bijou->photo1 )}}" loading="lazy" alt="img bijou database" class="w-full h-auto aspect-square object-cover object-center absolute hover:opacity-0 transition-all">
              <img src="{{ asset('images/produits/'. $bijou->photo2 )}}" loading="lazy" alt="img bijou hover" class="w-full h-auto aspect-square object-cover object-center">
              <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                <p class="truncate font-semibold">{{ $bijou->nom }}</p>
                <p class="text-xs"> {{ $bijou->type_metal }}</p> 
                <p class="font-semibold text-amber-800" >{{ $bijou->prix }} DH</p>
              </div>
            </div>

          </a>
        @endforeach
      </div>

      <div class="mx-auto justify-center md:p-4 max-md:p-2">
        {{$bijoux->links()}}
      </div>

    </div>

  </div>
</div>

@endsection

      


  {{-- <div class="grid grid-cols-2 max-md:grid-cols-1 justify-center gap-4 max-w-5xl p-4">

    @foreach($bijoux as $bijou)
      <div class="font-dmsans text-sm p-2 border border-second rounded">
        <p> {{ $bijou->nom }} / {{ $bijou->id }}</p>
        <p class="font-semibold"> {{ $bijou->type }} </p>
        <p> {{ $bijou->type_metal }} </p>
        <p> {{ $bijou->prix }} DH</p>
      </div>
    @endforeach
  </div> --}}