<div>
    {{-- Stop trying to control. --}}
    <div class="w-full bg-third pt-3">

        <div class="max-w-7xl mx-auto grid lg:grid-cols-3 md:grid-cols-2 max-md:grid-cols-1 gap-3">

          {{-- Medium/Big screen --}}
          <div class="grid lg:col-span-2 max-md:col-span-1 lg:grid-cols-2 md:grid-cols-1 gap-3 max-md:hidden p-4">
            
            <div><img src="{{ asset('images/produits/compressed/' . $bijou->photo1) }}" loading="lazy"
              alt="{{$bijou->nom}}-photo" class="w-full max-w-sm aspect-square object-cover shadow-lg">
            </div>
            <div><img src="{{ asset('images/produits/compressed/' . $bijou->photo2) }}" loading="lazy"
              alt="{{$bijou->nom}}-hover"class="w-full max-w-sm aspect-square object-cover shadow-lg">
            </div>
          </div>

          {{-- Mobile screen --}}
            <div class="max-w-sm mx-auto md:hidden pt-3" x-data="{ slide: 1 }">

                <div class="relative aspect-square shadow-lg overflow-hidden rounded-lg">
                    <img x-show="slide === 1"
                        src="{{ asset('images/produits/compressed/' . $bijou->photo1) }}"
                        alt="{{ $bijou->nom }}-photo"
                        class="w-full h-full object-cover object-center" loading="lazy"/>
                    <img x-show="slide === 2"
                        src="{{ asset('images/produits/compressed/' . $bijou->photo2) }}"
                        alt="{{ $bijou->nom }}-hover"
                        class="w-full h-full object-cover object-center" loading="lazy"/>
                    <button x-show="slide > 1"  @click="slide--"
                            class="absolute left-3 top-1/2 -translate-y-1/2 btn btn-circle btn-sm">❮</button>
                    <button x-show="slide < 2"  @click="slide++"
                            class="absolute right-3 top-1/2 -translate-y-1/2 btn btn-circle btn-sm">❯</button>

                </div>
            </div>

          {{-- Description et Ajout au panier --}}
{{-- Description et Ajout au panier --}}
<div class="flex flex-col font-playfair p-6 max-md:border-b max-md:border-second/20 max-md:mx-auto max-md:items-center">

    {{-- Nom --}}
    <h2 class="text-3xl font-bold tracking-wide text-first">{{ $bijou->nom }}</h2>

    {{-- Métal --}}
    <p class="text-xs tracking-widest uppercase text-first/40 font-dmsans mt-2">{{ $bijou->type_metal }}</p>

    {{-- Séparateur --}}
    <div class="w-12 h-px bg-second/30 my-4"></div>

    {{-- Prix --}}
    <p class="text-2xl font-semibold text-amber-800 font-dmsans">{{ $bijou->prix }} DH</p>

    {{-- Bouton panier --}}
    <button wire:click="ajouterProduit({{ $bijou->id }})"
            class="mt-6 flex items-center justify-center gap-3 px-8 py-3 mx-auto bg-second text-white text-sm tracking-widest uppercase font-dmsans font-medium rounded-lg shadow-md hover:bg-secondDarker hover:shadow-lg transition-all duration-300 w-full max-w-xs">
        <i class="ri-shopping-bag-line text-base"></i>
        Ajouter au panier
    </button>

    {{-- Séparateur --}}
    <div class="w-full h-px bg-second/50 my-6"></div>

    {{-- Détails --}}
    <div class="flex flex-col gap-2 font-dmsans text-sm w-full">
        <div class="flex justify-between">
            <span class="text-second tracking-wide uppercase text-xs">Collection</span>
            <span class="text-first font-medium">{{ $bijou->collection }}</span>
        </div>
        <div class="flex justify-between">
            <span class="text-second tracking-wide uppercase text-xs">Métal</span>
            <span class="text-first font-medium">{{ $bijou->type_metal }}</span>
        </div>
    </div>

    {{-- Description --}}
    @if($bijou->description)
        <p class="font-dmsans text-sm text-first leading-relaxed mt-6 max-w-xs max-sm:text-center">
            {{ $bijou->description }}
        </p>
    @endif

</div>

        </div>

        <div class="max-w-7xl mx-auto p-4">
          <p class="text-2xl font-semibold font-playfair py-2">Autres suggestions</p>
          <div class="grid md:grid-cols-4 max-md:grid-cols-2 items-center gap-2 p-2">
            
            @foreach ($bijouxSimilaires as $bijouSimilaire)
                <x-bijou-card :bijou="$bijouSimilaire" />
            @endforeach
          </div>
        </div>
    </div>
</div>
