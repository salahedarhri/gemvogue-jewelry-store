<div  x-data="{filtresMobile: false, openModal:false, os:$refs.filtres.offsetTop}" 
      x-init="openModal=window.innerWidth > 768" 
      @scroll.window="filtresMobile=(window.pageYOffset > os)?true:false">
    <div  class="w-full font-dmsans font-swap bg-third ">

      {{-- Banner --}}
      <div  class="max-w-7xl mx-auto md:h-60 max-md:h-48 bg-cover bg-center rounded-b-xl"
            style="background-image:url({{ asset('images/composants/compressed/bg-hero.jpg')}});">
          <div class="h-full w-full bg-amber-950 bg-opacity-30 rounded-b-xl">
          <div class="flex items-center justify-center h-full md:pt-36 max-md:pt-24">
              <p class="md:text-4xl max-md:text-3xl text-third font-playfair font-semibold">Boutique</p>
          </div>
          </div>
      </div>
      
      {{-- Alerts succes ou refus --}}
      @if(session('success'))
          <div class="alert alert-success max-w-xl mx-auto my-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>{{ session('success') }}</span>
          </div>
      @endif
      @if(session('error'))
          <div class="alert alert-error max-w-xl mx-auto my-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>{{ session('error') }}</span>
          </div>
      @endif

      {{-- Format Mobile : Tri et Filtres --}}
      <div x-ref="filtres" x-bind:class="filtresMobile?'fixed top-0':''" class="w-full grid grid-cols-2 justify-center gap-2 align-center bg-third z-30 md:hidden p-3 max-md:shadow-lg">
        <select wire:model.live="ordre" class="w-full focus:ring-second text-sm border-transparent focus:border-second rounded-lg shadow">
          <option class="font-dmsans" value="desc">Prix Décroissant</option>
          <option class="font-dmsans" value="asc" selected>Prix Croissant</option>
        </select>
        <button @click="openModal=!openModal"
                class="w-full bg-second text-white rounded shadow-xl border-2 border-transparent">Afficher les filtres</button>
      </div>

      <div class="max-w-screen-2xl mx-auto flex flex-row max-md:flex-col justify-center gap-2 p-4 max-md:pt-0">

        {{-- Filtres --}}
        <div x-cloak x-show="openModal" class="w-80 text-sm flex flex-col dm-sans mx-auto max-md:overflow-auto max-md:w-full max-md:h-full z-30 max-md:fixed max-md:inset-0 max-md:bg-third max-md:p-2 max-md:border-second">
          
          <div class="text-sm flex flex-col justify-between pt-4 w-full h-full">
            <div>
              <p class="text-2xl font-bold font-playfair mb-3 underline-offset-4 underline ">Affiner Par</p>

              {{-- Catégorie --}}
              <div x-cloak x-data="{open1:true}" class="py-1">
                <button @click="open1 =! open1" class="w-full text-xl font-bold font-playfair">
                  <div class="flex flex-row justify-between">
                    <p>Catégorie</p>
                    <div class="w-fit">
                      <i x-show="!open1" class="ri-arrow-down-s-fill text-2xl"></i>
                      <i x-show="open1" class="ri-arrow-up-s-fill"></i>
                    </div>
                  </div>
                </button>
        
                <div x-cloak x-show="open1" 
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100">
  
                  <div class="flex flex-col gap-3 px-2 py-4 border-b border-amber-700 border-opacity-20 w-56">
                    <label for="Anneau">
                        <input  class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2"
                         type="checkbox" wire:model.live="categories" value="Anneau"
                          {{ (in_array('Anneau',$categories))?'checked':'' }}>Bagues</label>
                    <label for="Bracelet">
                        <input  class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2"
                         type="checkbox" wire:model.live="categories" value="Bracelet"
                          {{(in_array('Bracelet',$categories))?'checked':''}}>Bracelet</label>
                    <label for="Collier">
                        <input  class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2"
                         type="checkbox" wire:model.live="categories" value="Collier"
                          {{(in_array('Collier',$categories))?'checked':''}}>Collier</label>
                    <label for="Boucles">
                      <input  class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2"
                        type="checkbox" wire:model.live="categories" value="boucles oreilles"
                         {{ (in_array('boucles oreilles',$categories))?'checked':'' }}>Boucles d'oreilles</label>
                  </div>
                </div>
              </div>
        
              {{-- Métal --}}
              <div x-cloak x-data="{open3:true}" class="py-1">
        
                <button @click="open3 =! open3" class="w-full text-xl font-bold font-playfair">
                  <div class="flex justify-between">
                    <p>Métal</p>
                    <i x-show="!open3" class="ri-arrow-down-s-fill text-2xl"></i>
                    <i x-show="open3" class="ri-arrow-up-s-fill"></i>
                  </div>
                </button>
        
                <div x-cloak x-show="open3" x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100">
                
                  <div class="flex flex-col gap-3 px-2 py-4 border-b border-amber-700 border-opacity-20 w-56">
                    <label for="Or">
                      <input type="checkbox" @click="window.scrollTo({top: 200, behavior: 'smooth'})"  
                        wire:model.change="metaux" value="Or"
                        class="focus:ring-second text-second mr-3 p-2 rounded border-transparent shadow">Or</label>
                    <label for="Platine">
                      <input type="checkbox" @click="window.scrollTo({top: 200, behavior: 'smooth'})"  
                        wire:model.change="metaux" value="Platine"
                        class="focus:ring-second text-second mr-3 p-2 rounded border-transparent shadow">Platine</label>
                    <label for="Argent">
                      <input type="checkbox" @click="window.scrollTo({top: 200, behavior: 'smooth'})"  
                        wire:model.change="metaux" value="Argent"
                        class="focus:ring-second text-second mr-3 p-2 rounded border-transparent shadow">Argent</label>
                    </div>
                </div>
              </div>
  
              {{-- Prix --}}
              <div x-cloak x-data="{open2:true}" class="py-1">
        
                <button @click="open2 =! open2" class="w-full text-xl font-bold font-playfair">
                  <div class="flex justify-between">
                    <p>Prix</p>
                    <i x-show="!open2" class="ri-arrow-down-s-fill text-2xl"></i>
                    <i x-show="open2" class="ri-arrow-up-s-fill"></i>
                  </div>
                </button>
        
                <div x-cloak x-show="open2" x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100">
                  <div class="flex flex-col text-md gap-3 px-2 py-4 border-b border-amber-700 border-opacity-20 w-56">
                    <label for="fourchette">
                      <input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow"
                       type="radio" @click="window.scrollTo({top: 200, behavior: 'smooth'})"
                        wire:model.change="fourchette" name="fourchette" value="all">Toutes les prix</label>
                    <label for="fourchette">
                      <input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow"
                       type="radio" @click="window.scrollTo({top: 200, behavior: 'smooth'})"
                        wire:model.change="fourchette" name="fourchette" value="1 - 500">1 - 500 DH</label>
                    <label for="fourchette">
                      <input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow"
                       type="radio" @click="window.scrollTo({top: 200, behavior: 'smooth'})"
                        wire:model.change="fourchette" name="fourchette" value="500 - 1000">500 - 1000 DH</label>
                    <label for="fourchette">
                      <input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow"
                       type="radio" @click="window.scrollTo({top: 200, behavior: 'smooth'})"
                        wire:model.change="fourchette" name="fourchette" value="1000 - 2000">1000 - 2000 DH</label>
                    <label for="fourchette">
                      <input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow" 
                      type="radio" @click="window.scrollTo({top: 200, behavior: 'smooth'})"
                       wire:model.change="fourchette" name="fourchette" value="2000 - 4000">2000 - 4000 DH</label>
                  </div>
                </div>
        
              </div>
  
            </div>

            <div class="w-full flex justify-between self-end md:hidden pb-3">
              <button @click="openModal = !openModal" class="w-full p-2 bg-second focus:bg-secondDarker text-white rounded shadow-lg">Appliquer</button>
            </div>
    
          </div>

        </div>

        {{-- Bijoux & Tri --}}
        <div x-bind:class="{ 'mt-16': window.innerWidth <= 768 && filtresMobile }" class="w-fit py-2">
          <div class="flex max-md:gap-2 justify-between align-center items-center p-3 max-md:px-0 max-md:hidden">
            <p class="font-bold max-md:text-sm">{{ $bijoux->count()}} Articles Affichées</p>

            <div class="w-fit flex gap-1 place-items-center">
              <p class="font-bold text-sm max-md:hidden">Trier par</p>
              <select wire:model.live="ordre" class="focus:ring-second text-sm border-transparent focus:border-second rounded-lg shadow">
                  <option class="font-dmsans" value="desc">Prix Décroissant</option>
                  <option class="font-dmsans" value="asc">Prix Croissant</option>
              </select>
            </div>
    
          </div>
    
          {{-- Produits --}}
          <div class="grid lg:grid-cols-4 md:grid-cols-3 max-md:grid-cols-2 items-center gap-2">
    
            @foreach ($bijoux as $bijou)
    
              <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}" wire:key="{{ $bijou->id }}" wire:navigate>
      
                <div class="flex flex-col place-items-center relative shadow-lg rounded-2xl">
                  <img src="{{ asset('images/produits/compressed/'. $bijou->photo1 )}}" loading="eager"
                    class="z-20 w-full h-auto aspect-square object-cover object-center rounded-t-xl absolute hover:opacity-0 transition-all">
                  <img src="{{ asset('images/produits/compressed/'. $bijou->photo2 )}}" loading="lazy"
                    class="z-10 w-full h-auto aspect-square object-cover object-center rounded-t-xl">
                  <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                    <p class="truncate font-semibold">{{ $bijou->nom }}</p>
                    <p class="text-xs"> {{ $bijou->type_metal }}</p>
                    <p class="font-semibold text-amber-800">{{ $bijou->prix }} DH</p>
                  </div>
                </div>
      
              </a>
            @endforeach
          </div>

          <div x-intersect="$wire.ChargerPlus()" class="w-full mx-auto flex justify-center align-center p-4">
          </div>
          
        </div>
    
      </div>
    </div>
</div>

