@extends('layouts.client')

{{-- i'll clean things later  --}}
@section('content')

<div class="bg-third text-center font-dmsans w-full">


  <div class="grid grid-rows-4 max-w-7xl mx-auto gap-4">
      <form action="{{ route('shopCategoryFilter')}}" class="">
        <p>Catégorie :</p>
        @csrf

        <label for="typeBijou"><input type="radio" name="typeBijou" value="Anneau"
          @if(isset($typeBijou)) {{ ($typeBijou == 'Anneau')?'checked' : ''}} @endif >Anneau</label>
        <label for="typeBijou"><input type="radio" name="typeBijou" value="Collier"
          @if(isset($typeBijou)) {{ ($typeBijou == 'Collier')?'checked' : ''}} @endif >Collier</label>
        <label for="typeBijou"><input type="radio" name="typeBijou" value="Bracelet"
          @if(isset($typeBijou)) {{ ($typeBijou == 'Bracelet')?'checked' : ''}} @endif >Bracelet</label>
        <input type="submit" class="px-3 py-2 mx-2 bg-second text-third font-dmsans" value="Rechercher">
      </form>

      <form action="{{ route('shopPrixFilter')}}">
        <p>Prix :</p>
        @csrf
        <label for="prixRange"><input type="radio" name="prixRange" value="0-500"
          @if(isset($prixRange)){{ ($prixRange == '0-500')?'checked':''}}@endif >0-500</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="500-1000"
          @if(isset($prixRange)){{ ($prixRange == '500-1000')?'checked':''}}@endif >500-1000</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="1000-1500"
          @if(isset($prixRange)){{ ($prixRange == '1000-1500')?'checked':''}}@endif >1000-1500</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="1500-2000"
          @if(isset($prixRange)){{ ($prixRange == '1500-2000')?'checked':''}}@endif >1500-2000</label>
        <label for="prixRange"><input type="radio" name="prixRange" value="2000+"
          @if(isset($prixRange)){{ ($prixRange == '2000+')?'checked':''}}@endif >2000+</label>
        <input type="submit" class="px-3 py-2 mx-2 bg-second text-third font-dmsans" value="Rechercher">

      </form>

      <form action="{{ route('shopPrixRangeFilter')}}">
        <p>Prix Range :</p>
        @csrf
        <label for="prixMin">Prix Min : <input type="number" class="w-24" name="prixMin" 
          @if(isset($prixMin)) value="{{ $prixMin }}" @endif></label>
        <label for="prixMax">Prix Max : <input type="number" class="w-24" name="prixMax" 
          @if(isset($prixMax)) value="{{ $prixMax }}" @endif></label>
        <input type="submit" class="px-3 py-2 mx-2 bg-second text-third font-dmsans" value="Rechercher">
      </form>

      <form action="{{ route('shopSortingOrder')}}">
        <p>Trier par :</p>
        @csrf
    
      </form>
  </div>
  <p class="p-2">Articles Trouvées : {{ $bijoux->total()}}</p>
</div>

<div class="w-full bg-third">
  <div class="grid grid-cols-2 max-md:grid-cols-1 justify-center gap-4 max-w-5xl mx-auto p-4">

    @foreach($bijoux as $bijou)
      <div class="font-dmsans text-sm p-2 border border-second rounded">
        <p> {{ $bijou->nom }} / {{ $bijou->id }}</p>
        <p class="font-semibold"> {{ $bijou->type }} </p>
        <p> {{ $bijou->type_metal }} </p>
        <p> {{ $bijou->prix }} DH</p>
      </div>
    @endforeach
  </div>

  <div class="max-w-3xl mx-auto justify-center">
    {{$bijoux->links()}}
  </div>


</div>

@endsection