
<form action="{{ route('shopPrixRangeFilter')}}" class="flex flex-col gap-3 py-4 border-b border-amber-700 border-opacity-20">
  {{-- <p class="font-semibold">Prix Range :</p> --}}
  @csrf
  <p class="mx-2 my-1">Insérer la fourchette de prix :</p>

  <div class="flex mx-2">
    <label for="prixMin"><input type="number" class="w-20 py-1 [appearance:textfield] text-sm" min="0" name="prixMin" placeholder="Min(Dh)"
      @if(isset($prixMin)) value="{{ $prixMin }}" @endif>&#8722;</label>
    <label for="prixMax"><input type="number" class="w-20 py-1 [appearance:textfield] text-sm" min="0" name="prixMax" placeholder="Max(Dh)"
      @if(isset($prixMax)) value="{{ $prixMax }}" @endif></label>
  </div>
    
  <input type="submit" class="w-28 py-2 px-4 text-center bg-second text-white font-semibold mt-3 ml-2" value="Rechercher">



</form>