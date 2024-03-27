<div>
    <div class="w-full font-dmsans font-swap bg-third">

        {{-- Banner --}}
        <div class="max-w-screen-2xl mx-auto md:h-60 max-md:h-48 bg-cover bg-center"
            style="background-image:url({{ asset('images/composants/bg-hero.jpg')}});">
            <div class="h-full w-full bg-amber-950 bg-opacity-30">
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
        <div id="filtres2" class="w-full grid grid-cols-2 justify-center gap-2 align-center bg-third z-50 md:hidden p-3">
          <select wire:model.live="ordre" class="w-full focus:ring-second text-sm border-transparent focus:border-second rounded-lg shadow">
            <option class="font-dmsans" value="desc">Prix Décroissant</option>
            <option class="font-dmsans" value="asc">Prix Croissant</option>
        </select>
        <button class="w-full bg-second text-white rounded shadow-xl border-2 border-transparent">Afficher les filtres</button>
        </div>

        <div class="max-w-screen-2xl mx-auto flex flex-row max-md:flex-col justify-center gap-2 p-4 max-md:pt-0">

          {{-- Filtres --}}
          <div class="w-80 text-sm flex flex-col dm-sans mx-auto max-md:hidden">
            
            <div id="filtres" class="text-sm flex flex-col pt-8">
              <p class="text-2xl font-bold font-playfair mb-3 underline-offset-4 underline ">Affiner Par</p>

              {{-- Catégorie --}}
              <div x-cloak x-data="{open1:false}" x-init=" open1=window.innerWidth > 768" class="py-1">
                <button @click="open1 =! open1" class="text-xl font-bold font-playfair">
                  <div class="flex gap-2 justify-between">
                    <p>Catégorie</p>
                    <div class="">
                      <i x-show="!open1" class="ri-arrow-down-s-fill text-2xl"></i>
                      <i x-show="open1" class="ri-arrow-up-s-fill"></i>
                    </div>
                  </div>
                </button>
        
                <div x-cloak x-show="open1" x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100">

                  <div class="flex flex-col gap-3 py-4 border-b border-amber-700 border-opacity-20 w-56">
                    <label for="Anneau">
                        <input @click="window.scrollTo({top:0, behavior:'smooth'})" class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2" type="checkbox" wire:model.live="categories" value="Anneau" {{ (in_array('Anneau',$categories))?'checked':'' }}>Anneau</label>
                    <label for="Bracelet">
                        <input @click="window.scrollTo({top:0, behavior:'smooth'})" class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2" type="checkbox" wire:model.live="categories" value="Bracelet" {{(in_array('Bracelet',$categories))?'checked':''}}>Bracelet</label>
                    <label for="Collier">
                        <input @click="window.scrollTo({top:0, behavior:'smooth'})" class="focus:ring-second text-second mr-3 rounded border-transparent shadow p-2" type="checkbox" wire:model.live="categories" value="Collier" {{(in_array('Collier',$categories))?'checked':''}}>Collier</label>
                  </div>
                </div>
              </div>
        
              {{-- Métal --}}
              <div x-cloak x-data="{open3:false}" x-init=" open3=window.innerWidth > 768" class="py-1">
        
                <button @click="open3 =! open3" class="text-xl font-bold font-playfair">
                  <div class="flex gap-2">
                    <p>Métal</p>
                    <i x-show="!open3" class="ri-arrow-down-s-fill text-2xl"></i>
                    <i x-show="open3" class="ri-arrow-up-s-fill"></i>
                  </div>
                </button>
        
                <div x-cloak x-show="open3" x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100">
                
                  <div class="flex flex-col gap-3 py-4 border-b border-amber-700 border-opacity-20 w-56">
                      <label for="Or"><input type="checkbox" @click="window.scrollTo({top: 0, behavior: 'smooth'})"  class="focus:ring-second text-second mr-3 p-2 rounded border-transparent shadow" wire:model.live="metaux" value="Or">Or</label>
                      <label for="Platine"><input type="checkbox" @click="window.scrollTo({top: 0, behavior: 'smooth'})"  class="focus:ring-second text-second mr-3 p-2 rounded border-transparent shadow" wire:model.live="metaux" value="Platine">Platine</label>
                      <label for="Argent"><input type="checkbox" @click="window.scrollTo({top: 0, behavior: 'smooth'})"  class="focus:ring-second text-second mr-3 p-2 rounded border-transparent shadow" wire:model.live="metaux" value="Argent">Argent</label>
                    </div>
                </div>
              </div>

              {{-- Prix --}}
              <div x-cloak x-data="{open2:false}" x-init=" open2=window.innerWidth > 768" class="py-1">
        
                <button @click="open2 =! open2" class="text-xl font-bold font-playfair">
                  <div class="flex gap-2">
                    <p>Prix</p>
                    <i x-show="!open2" class="ri-arrow-down-s-fill text-2xl"></i>
                    <i x-show="open2" class="ri-arrow-up-s-fill"></i>
                  </div>
                </button>
        
                <div x-cloak x-show="open2" x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100">
                  <div class="flex flex-col text-md gap-3 py-4 border-b border-amber-700 border-opacity-20 w-56">
                    <label for="fourchette"><input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow" type="radio" @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:model.live="fourchette" name="fourchette" value="">Toutes les prix</label>
                    <label for="fourchette"><input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow" type="radio" @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:model.live="fourchette" name="fourchette" value="1 - 500">1 - 500 DH</label>
                    <label for="fourchette"><input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow" type="radio" @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:model.live="fourchette" name="fourchette" value="500 - 1000">500 - 1000 DH</label>
                    <label for="fourchette"><input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow" type="radio" @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:model.live="fourchette" name="fourchette" value="1000 - 2000">1000 - 2000 DH</label>
                    <label for="fourchette"><input class="focus:ring-second text-second mr-3 p-2 border-transparent shadow" type="radio" @click="window.scrollTo({top: 0, behavior: 'smooth'})" wire:model.live="fourchette" name="fourchette" value="2000 - 4000">2000 - 4000 DH</label>
                  </div>
                </div>
        
              </div>
      
            </div>

          </div>

          {{-- <div id="filtres2" class="md:hidden w-fit mx-auto">
            <button class="w-fit mx-auto p-2 bg-second text-third shadow-bg ">Afficher Les Filtres</button>

          </div> --}}

          {{-- Bijoux & Tri --}}
          <div class="w-fit">

      
            <div class="flex max-md:gap-2 justify-between align-center items-center p-3 max-md:px-0 max-md:hidden">
              <p class="font-bold max-md:text-sm">{{ $bijoux->count()}} Articles Trouvées</p>

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
      
              <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">
      
                <div class="flex flex-col place-items-center relative shadow-lg rounded-2xl">
                  <img src="{{ asset('images/produits/'. $bijou->photo1 )}}" loading="eager"
                    class="w-full h-auto aspect-square object-cover object-center rounded-t-xl absolute hover:opacity-0 transition-all">
                  <img src="{{ asset('images/produits/'. $bijou->photo2 )}}" loading="lazy"
                    class="w-full h-auto aspect-square object-cover object-center rounded-t-xl">
                  <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                    <p class="truncate font-semibold">{{ $bijou->nom }}</p>
                    <p class="text-xs"> {{ $bijou->type_metal }}</p>
                    <p class="font-semibold text-amber-800">{{ $bijou->prix }} DH</p>
                  </div>
                </div>
      
              </a>
              @endforeach
            </div>

            <div class="w-full mx-auto flex justify-center align-center p-4">
              @if($charger == true)
                  <button wire:click="ChargerPlus" wire:loading.attr="disabled"
                      class=" bg-second text-third w-52 flex justify-center align-center px-4 py-2 rounded shadow-lg hover:bg-third border-2 border-transparent hover:border-second hover:text-second transition-all">
                      <p wire:loading.remove class="max-sm:text-sm">Charger Plus</p>
                      <span wire:loading class="loading loading-dots loading-md"></span>
                  </button>
              @endif

            </div>

      
          </div>
      
        </div>

        {{-- Filtres et Ordre Sticky --}}
        {{-- <div class="max-w-7xl mx-auto flex flex-col px-2 py-4 justify-center align-center place-items-center text-sm">
            <div class="flex flex-col p-2 justify-center align-center">
                <p class="px-2 font-bold">Catégorie</p>
                <label for="Anneau"><input type="checkbox" wire:model.live="categories" value="Anneau">Anneau</label>
                <label for="Bracelet"><input type="checkbox" wire:model.live="categories" value="Bracelet">Bracelet</label>
                <label for="Collier"><input type="checkbox" wire:model.live="categories" value="Collier">Collier</label>
            </div>
            <div class="flex flex-col p-2 justify-center align-center">
                <p class="px-2 font-bold">Métal</p>
                <label for="Or"><input type="checkbox" wire:model.live="metaux" value="Or">Or</label>
                <label for="Platine"><input type="checkbox" wire:model.live="metaux" value="Platine">Platine</label>
                <label for="Argent"><input type="checkbox" wire:model.live="metaux" value="Argent">Argent</label>
            </div>
            <div class="flex flex-col p-2 justify-center align-center">
                <p class="px-2 font-bold">Prix</p>
                <label for="prix" class="flex flex-col">
                    <input type="radio" wire:model.live="fourchette" name="fourchette" value="">Toutes les prix
                    <input type="radio" wire:model.live="fourchette" name="fourchette" value="1 - 500">1 - 500 DH
                    <input type="radio" wire:model.live="fourchette" name="fourchette" value="500 - 1000">500 - 1000 DH
                    <input type="radio" wire:model.live="fourchette" name="fourchette" value="1000 - 2000">1000 - 2000 DH
                    <input type="radio" wire:model.live="fourchette" name="fourchette" value="2000 - 4000">2000 - 4000 DH
                </label>
            </div>
            <div class="flex flex-col p-2 justify-center align-center">
                <p class="px-2 font-bold">Trier par</p>
                <select wire:model.live="ordre">
                    <option value="desc">Prix Décroissant</option>
                    <option value="asc">Prix Croissant</option>
                </select>
            </div>
            <div class="">
                <p>Filtres</p>
                @foreach ($categories as $categorie)
                    <button wire:click="effacerCategorie('{{ $categorie }}')">
                        <span>&times;</span>{{ $categorie }}
                    </button>
                @endforeach
                @foreach ($metaux as $metal)
                    <button wire:click="effacerMetal('{{ $metal }}')">
                        <span>&times;</span>{{ $metal }}
                    </button>
                @endforeach
                @if ($fourchette)
                    <button wire:click="effacerFourchette()">
                        <span>&times;</span>{{ $fourchette }} DH
                    </button>
                @endif
            </div>
            
        </div> --}}
        
        {{-- Produits --}}
        {{-- <div class="max-w-7xl mx-auto justify-center ">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 max-md:grid-cols-2 items-center gap-2 p-3">
        
                @foreach ($bijoux as $bijou)
                    <a href="{{ route('bijou',[ 'slug' => $bijou->slug]) }}">
                        <div class="flex flex-col place-items-center relative shadow-lg rounded-2xl">
                            <img src="{{ asset('images/produits/'. $bijou->photo1 )}}" loading="lazy" alt="img bijou database"
                                class="w-full h-auto aspect-square object-cover object-center rounded-t-xl absolute hover:opacity-0 transition-all">
                            <img src="{{ asset('images/produits/'. $bijou->photo2 )}}" loading="lazy" alt="img bijou hover"
                                class="w-full h-auto aspect-square object-cover object-center rounded-t-xl">
                            <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                                <p class="truncate font-semibold">{{ $bijou->nom }}</p>
                                <p class="text-xs"> {{ $bijou->type_metal }}</p>
                                <p class="font-semibold text-amber-800">{{ $bijou->prix }} DH</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
    
            <div class="w-full mx-auto flex justify-center align-center md:p-4 max-md:p-2">
                @if($charger == true)
                    <button wire:click="ChargerPlus" wire:loading.attr="disabled"
                        class=" bg-second text-third w-52 flex justify-center align-center px-4 py-2 rounded shadow hover:bg-third border-2 border-transparent hover:border-second hover:text-second transition-all">
                        <p wire:loading.remove class="max-sm:text-sm">Charger Plus</p>
                        <span wire:loading class="loading loading-dots loading-md"></span>
                    </button>
                @endif

            </div>
        
        </div> --}}
    </div>
</div>
