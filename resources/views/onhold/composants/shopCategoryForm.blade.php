<form action="{{ route('shopCategoryFilter')}}" class="flex flex-col gap-2 py-4 border-b border-amber-700 border-opacity-20">
  {{-- <p class="font-semibold">Catégorie :</p> --}}
  @csrf  

  <a href="{{ route('boutique')}}">
  <input type="radio" name="touslesproduits">&nbsp; Tous les produits</a>
  
  <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Anneau"
     onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($typeBijou)) {{ ($typeBijou == 'Anneau')?'checked' : ''}} @endif
     >&nbsp; Anneau</label>

  <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Collier"
     onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($typeBijou)) {{ ($typeBijou == 'Collier')?'checked' : ''}} @endif
     >&nbsp; Collier</label>

  <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Bracelet"
     onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($typeBijou)) {{ ($typeBijou == 'Bracelet')?'checked' : ''}} @endif
     >&nbsp; Bracelet</label>

    <label for="typeBijou">
    <input type="radio" name="typeBijou" value="Boucles oreilles"
      onchange="this.form.submit()" class="focus:ring-second text-second"
    @if(isset($typeBijou)) {{ ($typeBijou == 'Boucles oreilles')?'checked' : ''}} @endif
      >&nbsp; Boucles d'oreilles</label>

  {{-- <input type="submit" class="px-3 py-2 w-24 text-center bg-second text-third" value="Rechercher"> --}}
  
</form>