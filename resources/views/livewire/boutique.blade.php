<div x-data="{
        filtresMobile: false,
        openModal: false,
        os: $refs.filtres.offsetTop,
        navH: document.getElementById('navbar')?.offsetHeight ?? 64
     }"
     x-init="openModal = window.innerWidth > 768"
     @scroll.window="filtresMobile = (window.pageYOffset > os - navH)">

    <div class="w-full font-dmsans bg-third">

        {{-- Banner --}}
        <div class="max-w-7xl mx-auto md:h-60 max-md:h-48 bg-cover bg-center rounded-b-xl"
             style="background-image:url({{ asset('images/composants/compressed/bg-hero.jpg')}});">
            <div class="h-full w-full bg-amber-950 bg-opacity-30 rounded-b-xl flex items-center justify-center md:pt-36 max-md:pt-24">
                <p class="md:text-4xl max-md:text-3xl text-third font-playfair font-semibold">Boutique</p>
            </div>
        </div>


        {{-- Barre mobile : Tri + Filtres --}}
        <div x-ref="filtres"
             :class="filtresMobile ? 'fixed top-14' : ''"
             class="w-full grid grid-cols-2 gap-2 bg-third z-30 md:hidden p-3 shadow-lg">
            <select wire:model.live="ordre"
                    class="w-full text-xs tracking-wide font-dmsans border border-second/20 focus:ring-second focus:border-second rounded-lg shadow-sm bg-white text-first px-3 py-2">
                <option value="desc">Prix décroissant</option>
                <option value="asc">Prix croissant</option>
            </select>

            <button @click="openModal = !openModal"
                    class="w-full flex items-center justify-center gap-2 text-xs tracking-widest uppercase font-medium text-first bg-white border border-second/30 rounded-lg px-3 py-2 hover:bg-second hover:text-white hover:border-second transition-all duration-300">
                <i class="ri-equalizer-2-line text-sm"></i>
                Filtres
            </button>
        </div>

        <div class="max-w-screen-2xl mx-auto flex flex-row max-md:flex-col justify-center gap-2 p-4 max-md:pt-0">

            {{-- Panneau Filtres --}}
            <div x-cloak x-show="openModal"
                 class="w-80 text-sm flex flex-col mx-auto max-md:w-full max-md:h-full z-30 max-md:fixed max-md:inset-0 max-md:bg-third max-md:p-2 max-md:overflow-auto">

                <div class="flex flex-col justify-between pt-4 w-full h-full">
                    <div>
                        <p class="text-2xl font-bold font-playfair mb-3 underline underline-offset-4">Affiner Par</p>

                        {{-- Catégorie --}}
                        <div x-data="{ open1: true }" class="py-1">
                            <button @click="open1 = !open1" class="w-full text-xl font-bold font-playfair flex justify-between items-center">
                                <span>Catégorie</span>
                                <i :class="open1 ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'" class="text-2xl"></i>
                            </button>
                            <div x-show="open1"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100">
                                <div class="flex flex-col gap-3 px-2 py-4 border-b border-amber-700/20 w-56">
                                    @foreach([
                                        ['value' => 'Anneau',          'label' => 'Bagues'],
                                        ['value' => 'Bracelet',        'label' => 'Bracelet'],
                                        ['value' => 'Collier',         'label' => 'Collier'],
                                        ['value' => 'boucles oreilles','label' => "Boucles d'oreilles"],
                                    ] as $cat)
                                        <label class="flex items-center gap-3 cursor-pointer">
                                            <input type="checkbox"
                                                   wire:model.live="categories"
                                                   value="{{ $cat['value'] }}"
                                                   class="focus:ring-second text-second rounded border-transparent shadow p-2">
                                            {{ $cat['label'] }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Métal --}}
                        <div x-data="{ open3: true }" class="py-1">
                            <button @click="open3 = !open3" class="w-full text-xl font-bold font-playfair flex justify-between items-center">
                                <span>Métal</span>
                                <i :class="open3 ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'" class="text-2xl"></i>
                            </button>
                            <div x-show="open3"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100">
                                <div class="flex flex-col gap-3 px-2 py-4 border-b border-amber-700/20 w-56">
                                    @foreach(['Or', 'Platine', 'Argent'] as $metal)
                                        <label class="flex items-center gap-3 cursor-pointer">
                                            <input type="checkbox"
                                                   wire:model.live="metaux"
                                                   value="{{ $metal }}"
                                                   class="focus:ring-second text-second rounded border-transparent shadow p-2">
                                            {{ $metal }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Prix --}}
                        <div x-data="{ open2: true }" class="py-1">
                            <button @click="open2 = !open2" class="w-full text-xl font-bold font-playfair flex justify-between items-center">
                                <span>Prix</span>
                                <i :class="open2 ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill'" class="text-2xl"></i>
                            </button>
                            <div x-show="open2"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100">
                                <div class="flex flex-col gap-3 px-2 py-4 border-b border-amber-700/20 w-56">
                                    @foreach([
                                        ['value' => 'all',         'label' => 'Tous les prix'],
                                        ['value' => '1 - 500',     'label' => '1 - 500 DH'],
                                        ['value' => '500 - 1000',  'label' => '500 - 1000 DH'],
                                        ['value' => '1000 - 2000', 'label' => '1000 - 2000 DH'],
                                        ['value' => '2000 - 4000', 'label' => '2000 - 4000 DH'],
                                    ] as $f)
                                        <label class="flex items-center gap-3 cursor-pointer">
                                            <input type="radio"
                                                   wire:model.live="fourchette"
                                                   name="fourchette"
                                                   value="{{ $f['value'] }}"
                                                   class="focus:ring-second text-second border-transparent shadow p-2">
                                            {{ $f['label'] }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Bouton appliquer (mobile) --}}
                    <div class="md:hidden pb-3 pt-4">
                        <button @click="openModal = false"
                                class="w-full p-2 bg-second text-white rounded shadow-lg">
                            Appliquer
                        </button>
                    </div>

                </div>
            </div>

            {{-- Grille produits --}}
            <div :class="{ 'mt-16': window.innerWidth <= 768 && filtresMobile }" class="w-fit py-2">

                {{-- Tri desktop --}}
                <div class="flex justify-between items-center px-3 py-2.5 max-md:hidden border-b border-second/10">

                    <p class="text-xs tracking-widest uppercase font-medium text-first/50">
                        {{ $bijoux->count() }} articles affichés
                    </p>

                    <div class="flex gap-2 items-center">
                        <p class="text-xs tracking-widest uppercase font-medium text-first/50">Trier par</p>
                        <select wire:model.live="ordre"
                                class="text-xs font-dmsans bg-white text-first border border-second/20 focus:ring-second focus:border-second rounded-lg shadow-sm px-3 py-2">
                            <option value="desc">Prix décroissant</option>
                            <option value="asc">Prix croissant</option>
                        </select>
                    </div>

                </div>

                {{-- Produits --}}
                <div class="grid lg:grid-cols-4 md:grid-cols-3 max-md:grid-cols-2 gap-2">
                    @foreach ($bijoux as $bijou)
                        <x-bijou-card :bijou="$bijou" wire:key="{{ $bijou->id }}" />
                    @endforeach
                </div>

                {{-- Chargement dynamique --}}
                <div x-intersect="$wire.ChargerPlus()" class="w-full flex justify-center p-4"></div>

            </div>

        </div>
    </div>
</div>