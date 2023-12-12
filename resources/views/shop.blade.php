@extends('layouts.client')

{{-- i'll clean things later  --}}
@section('content')

<div class="w-full font-dmsans font-swap bg-third">

  <div class="max-w-7xl mx-auto md:h-80 max-md:h-60 bg-cover bg-center" style="background-image:url({{ asset('images/composants/bg-hero.jpg')}});">
    <div class="h-full w-full bg-amber-950 bg-opacity-30">
      <div class="flex items-center justify-center h-full pt-36">
        <p class="text-4xl text-third font-playfair font-semibold">Boutique</p>
      </div>
    </div>
  </div>


  <div class="max-w-7xl mx-auto grid md:grid-cols-4 justify-center gap-4 p-4">

    <div class="max-w-sm text-sm flex flex-col dm-sans p-4">
      <p class="text-xl font-bold font-playfair">Affiner Par</p>
      <form action="{{ route('shopCategoryFilter')}}" class="flex flex-col gap-2 py-4 border-b border-amber-700 border-opacity-20">
        <p class="font-semibold">Catégorie :</p>
        @csrf
        <label for="typeBijou"><input type="radio" name="typeBijou" value="Anneau"
          @if(isset($typeBijou)) {{ ($typeBijou == 'Anneau')?'checked' : ''}} @endif >&nbsp; Anneau</label>
        <label for="typeBijou"><input type="radio" name="typeBijou" value="Collier"
          @if(isset($typeBijou)) {{ ($typeBijou == 'Collier')?'checked' : ''}} @endif >&nbsp; Collier</label>
        <label for="typeBijou"><input type="radio" name="typeBijou" value="Bracelet"
          @if(isset($typeBijou)) {{ ($typeBijou == 'Bracelet')?'checked' : ''}} @endif >&nbsp; Bracelet</label>
        <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Rechercher">
      </form>

      <form action="{{ route('shopPrixFilter')}}" class="flex flex-col gap-2 py-4 border-b border-amber-700 border-opacity-20">
        <p class="font-semibold">Prix :</p>
        @csrf
        <label for="prixRange"><input type="radio" name="prixRange" value="0-500"
          @if(isset($prixRange)){{ ($prixRange == '0-500')?'checked':''}}@endif >&nbsp; 0-500</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="500-1000"
          @if(isset($prixRange)){{ ($prixRange == '500-1000')?'checked':''}}@endif >&nbsp; 500-1000</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="1000-1500"
          @if(isset($prixRange)){{ ($prixRange == '1000-1500')?'checked':''}}@endif >&nbsp; 1000-1500</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="1500-2000"
          @if(isset($prixRange)){{ ($prixRange == '1500-2000')?'checked':''}}@endif >&nbsp; 1500-2000</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="2000+"
          @if(isset($prixRange)){{ ($prixRange == '2000+')?'checked':''}}@endif >&nbsp; 2000+</label>
        <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Rechercher">

      </form>

      <form action="{{ route('shopPrixRangeFilter')}}" class="flex flex-col gap-2 py-4 border-b border-amber-700 border-opacity-20">
        <p class="font-semibold">Prix Range :</p>
        @csrf
        <div class="flex mx-2">
          <label for="prixMin"><input type="number" class="w-16 py-1" min="0" name="prixMin" 
            @if(isset($prixMin)) value="{{ $prixMin }}" @endif> - </label>
          <label for="prixMax"><input type="number" class="w-16 py-1" min="0" name="prixMax" 
            @if(isset($prixMax)) value="{{ $prixMax }}" @endif></label>
        </div>

        <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Rechercher">
      </form>

    </div>

    <div class="md:col-span-3 ">

      <div class="flex max-sm:flex-col max-sm:gap-2 justify-between items-center p-2">
        <p class=" font-bold">{{ $bijoux->total()}} Articles Trouvées</p>

        <form action="shopOrder" method="post" >
          <label for="order" class="text-sm">Trier par :</label>
          <select name="order" class="text-sm">
            <option value="prixAsc">Prix (Croissant)</option>
            <option value="prixDesc">Prix (Décroissant)</option>
          </select>
        </form>
      </div>


      <div class="grid md:grid-cols-4 max-md:grid-cols-2 items-center gap-2">

        @foreach ($bijoux as $bijou)
    
          <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">

            <div class="flex flex-col place-items-center border border-second relative">
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

      <div class="lg:max-w-xl max-w-md mx-auto justify-center p-4">
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