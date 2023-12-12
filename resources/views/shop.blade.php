@extends('layouts.client')

{{-- i'll clean things later  --}}
@section('content')

<div class="w-full bg-third">
  <div class="max-w-7xl mx-auto grid lg:grid-cols-4 md:grid-cols-3 justify-center gap-4 p-4">

    <div class="max-w-sm text-sm flex flex-col gap-6 dm-sans p-4 border border-second shadow rounded-xl">
      <form action="{{ route('shopCategoryFilter')}}" class="flex flex-col gap-2">
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

      <form action="{{ route('shopPrixFilter')}}" class="flex flex-col gap-2">
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

      <form action="{{ route('shopPrixRangeFilter')}}" class="flex flex-col gap-2">
        <p class="font-semibold">Prix Range :</p>
        @csrf
        <div class="flex mx-2">
          <label for="prixMin"><input type="number" class="w-24" name="prixMin" 
            @if(isset($prixMin)) value="{{ $prixMin }}" @endif> - </label>
          <label for="prixMax"><input type="number" class="w-24" name="prixMax" 
            @if(isset($prixMax)) value="{{ $prixMax }}" @endif></label>
        </div>

        <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Rechercher">
      </form>
    </div>

    <div class="lg:col-span-3 md:col-span-2">
      
      {{-- <p class="p-2">Articles Trouvées : {{ $bijoux->total()}}</p> --}}

      <div class="grid grid-cols-2 max-md:grid-cols-1 justify-center gap-4 max-w-5xl p-4">

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

  </div>
</div>

@endsection