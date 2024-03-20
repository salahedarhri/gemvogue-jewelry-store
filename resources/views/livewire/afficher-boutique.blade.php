<div>
    <div class="w-full font-dmsans font-swap bg-third">

        {{-- Banner --}}
        <div class="max-w-7xl mx-auto md:h-60 max-md:h-48 bg-cover bg-center"
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

        {{-- Filtres et Ordre Sticky --}}
        <div class="max-w-7xl mx-auto flex flex-row px-2 py-4 justify-between text-sm">
            <div class="flex flex-row gap-4">
                <p>Filtre : </p>
                <p>Catégorie &#11033;</p>
                <p>Prix &#11033;</p>
                <p>Métal &#11033;</p>
            </div>
            <div class="flex flex-col gap-4">
                <p>Trier par : </p>

            </div>
        </div>
        
        <div class="max-w-7xl mx-auto justify-center ">
        
            {{-- Produits --}}
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

                <button wire:click="ChargerPlus" wire:loading.attr="disabled"
                    class="px-4 py-2 bg-second text-white w-52">
                    <p wire:loading.remove>Charger Plus</p>
                    <span wire:loading class="loading loading-dots loading-md"></span>
                </button>
                {{-- {{$bijoux->withQueryString()->links()}} --}}
            </div>
        
        </div>
    </div>
</div>
