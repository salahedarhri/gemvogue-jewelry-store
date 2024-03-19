<form action="{{ route('shopPrixRangeFilter')}}"
  class="flex flex-col gap-3 py-4 border-b border-amber-700 border-opacity-20">
  @csrf
  <p class="mx-2 my-1">Insérer la fourchette de prix :</p>

  <div class="flex mx-2">
    <label for="prixMin"><input type="number" min="0" max="3000"
      class="w-20 p-1 mx-1 [appearance:textfield] text-sm rounded border-none" 
      name="prixMin" placeholder="Min(Dh)" @if(isset($prixMin)) value="{{ $prixMin }}" @endif>&#8722;
    </label>
    <label for="prixMax"><input type="number" min="0" max="3000"
      class="w-20 p-1 mx-1 [appearance:textfield] text-sm rounded border-none" 
      name="prixMax" placeholder="Max(Dh)" @if(isset($prixMax)) value="{{ $prixMax }}" @endif>
    </label>
  </div>

  <input type="submit" class="w-28 py-2 px-4 text-center bg-second text-white font-semibold mt-3 ml-2"
    value="Rechercher">



</form>