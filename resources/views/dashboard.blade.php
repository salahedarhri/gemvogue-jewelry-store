<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg font-dmsans text-center">
                <p class="text-3xl font-bold py-6 text-transparent bg-clip-text bg-gradient-to-r from-fourthDarker to-red-400">Bienvenue, {{ $user->name }}</p>

                @if( isset( $commande ))
                    
                @else
                    @auth
                        <p class="text-base">Vous avez aucune commande pour le moment.<br>
                        Veuillez visiter nos fines sélections de bijouteries ici .<br></p>
                    @endauth
                @endif

                <div class="max-w-4xl mx-auto grid lg:grid-cols-4 md:grid-cols-2 max-md:grid-cols-1 place-items-center gap-4 px-6 py-12 text-xl font-playfair">
  
                    {{-- Onglet Anneaux --}}
                    <div class="relative w-full flex flex-col rounded-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition aspect-square"
                      style="background-image:url({{ asset('images/produits/compressed/ring2.jpg') }})">
              
                      <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Anneau'])}}" class="h-full w-full">
                        <p class="absolute top-3/4 w-full text-center text-white">Anneaux</p>
                        <div class="w-full h-full bg-stone-800 bg-opacity-40 rounded-lg hover:bg-opacity-10 transition">
                        </div>
                    </a>
                    </div>
              
                    {{-- Onglet Colliers --}}
                    <div class="relative w-full flex flex-col rounded-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition aspect-square"
                      style="background-image:url({{ asset('images/produits/compressed/necklace2.jpg') }})">
              
                      <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Collier'])}}" class="h-full w-full">
                        <p class="absolute top-3/4 w-full text-center text-white">Colliers</p>
                        <div class="w-full h-full bg-stone-800 bg-opacity-40 rounded-lg hover:bg-opacity-10 transition">
                        </div>
                    </a>     
                    </div>
              
                    {{-- Onglet Bracelets --}}
                    <div class="relative w-full flex flex-col rounded-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition aspect-square"
                      style="background-image:url({{ asset('images/produits/compressed/bracelet2.jpg') }})">
              
                      <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Bracelet'])}}" class="h-full w-full">
                        <p class="absolute top-3/4 w-full text-center text-white">Bracelets</p>
                        <div class="w-full h-full bg-stone-800 bg-opacity-40 rounded-lg hover:bg-opacity-10 transition">
                        </div>
                    </a>     
                    </div>
              
                    {{-- Onglet Boucles oreilles --}}
                    <div class="relative w-full flex flex-col rounded-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition aspect-square"
                      style="background-image:url({{ asset('images/produits/compressed/boucles2.jpg') }})">
              
                      <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Boucles oreilles'])}}" class="h-full w-full">
                      <p class="absolute top-3/4 w-full text-center text-white">Boucles d'oreilles</p>
                      <div class="w-full h-full bg-stone-800 bg-opacity-40 rounded-lg hover:bg-opacity-10 transition">
                    </div>
                    </a>     
                    </div>
              
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
