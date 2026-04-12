  <footer class="w-full border-t-2 border-second bg-third font-martel">
    <div class="grid lg:grid-cols-3 md:grid-cols-3 max-md:grid-cols-1 max-lg:text-center max-w-7xl mx-auto max-md:p-3 md:gap-4 max-md:gap-2 md:p-6">
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">Boutique</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'boucles oreilles'])}}">Boucles d'oreilles</a>
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'Anneau'])}}">Bagues</a>
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'Bracelet'])}}">Bracelets</a>
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'Collier'])}}">Collier</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">À propos</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a wire:navigate href="{{ route('apropos')}}">À propos de nous</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">Nos contacts</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
        <a href="mailto:arhri.salah@gmail.com" target="_blank">arhri.salah@gmail.com</a>
        </div>
      </div>
    
    </div>
  </footer>