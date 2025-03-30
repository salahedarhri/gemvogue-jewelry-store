<div class="w-full bg-third">

    {{-- Banner --}}
    <div class="md:h-60 max-md:h-48 max-w-7xl mx-auto bg-cover bg-center rounded-b-xl"
      style="background-image:url({{asset('images/composants/compressed/bijoux-panier.jpg')}});">
      <div class="h-full w-full bg-gray-950 bg-opacity-40 rounded-b-xl">
        <div class="flex items-center justify-center h-full md:pt-36 max-md:pt-24">
          <p class="text-3xl text-third font-playfair font-semibold">Votre Panier</p>
        </div>
      </div>
    </div>
  
    {{-- Alertes Succès ou Refus --}}
    @if(session('success'))
      <div class="alert alert-success max-sm:fixed text-white inset-0 max-sm:mt-24 sm:max-w-xl max-sm:w-fit h-fit z-30 mx-auto max-sm:px-3 flex max-w-xl my-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success') }}</span>
      </div>
    @endif
    @if(session('error'))
      <div class="alert alert-error max-sm:fixed text-white inset-0 max-sm:mt-24 sm:max-w-xl max-sm:w-fit h-fit z-30 mx-auto max-sm:px-3 flex max-w-xl my-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('error') }}</span>
      </div>
    @endif
  
    @if ($produits->count() > 0)
  
    <div class="mx-auto sm:px-8 sm:py-14 max-sm:py-6 max-w-6xl flex sm:flex-row max-sm:flex-col font-dmsans">
  
      {{-- Section Produit --}}
      <div class="wrapper sm:mx-4 sm:w-2/3 max-sm:w-full">
        <p class="text-xl font-semibold p-4">Votre panier ({{ $qte_total }})</p>
  
        @foreach ($produits as $item)
          <div
            class="flex flex-row max-sm:flex-col items-center p-1 border-b border-second border-opacity-40 max-sm:gap-3 max-sm:mx-12">
            {{-- Photo --}}
            <div class="sm:w-1/4">
              <a wire:navigate href="{{ route('bijou',[ 'slug' => $item->model->slug]) }}" wire:key="{{ $item->id }}">
                <img src="{{ asset('images/produits/compressed/' . $item->model->photo1) }}" alt="{{ $item->model->photo1 }}"
                  class="sm:w-40 max-sm:w-52 aspect-square object-cover shadow-lg rounded-sm border-opacity-40">
              </a>
            </div>
            
            {{-- Infos du Produit --}}
            <div class="sm:w-3/4 max-sm:text-center sm:p-2 max-sm:py-2 items-center">
              <p class="text-lg font-semibold">{{ $item->name }}</p>
              <p class="text-sm mt-2 italic text-second pl-1">Prix : {{ $item->price }} Dh</p>
              <p class="text-sm mb-2 italic text-second pl-1">Qte : {{ $item->qty}}</p>
              <p class="text mb-2">Total : {{ $item->subtotal()}} Dh</p>
    
              {{-- Options --}}
              <div class="w-40 h-fit md:ml-auto max-md:mx-auto grid grid-cols-3 place-items-center justify-between rounded-lg shadow-xl bg-gradient-to-r from-second to-fourth max-sm:mt-4">
                <button wire:click="decrementerProduit('{{ $item->rowId }}')" class="w-full h-full flex items-center justify-center rounded-l-lg hover:bg-secondDarker transition-all">
                    <img src="{{ asset('images/composants/logo/moins.png')}}" alt="plus.png" class="w-4 h-4 object-contain invert">
                </button>
                <p class="text-center h-full w-full px-4 border-x border-second text-lg font-semibold bg-white text-black">{{ $item->qty }}</p>
                <button wire:click="incrementerProduit('{{ $item->rowId }}')" class="w-full h-full flex items-center justify-center rounded-r-lg hover:bg-fourthDarker transition-all">
                    <img src="{{ asset('images/composants/logo/plus.png')}}" alt="moins.png" class="w-4 h-4 object-contain invert">
                </button>
                {{-- <button wire:click="retirerProduit('{{ $item->rowId }}')" class="w-full h-full flex items-center justify-center bg-slate-400 rounded-r-lg">
                    <img src="{{ asset('images/composants/logo/delete.png')}}" alt="delete.png" class="w-5 h-5 object-contain invert">
                </button> --}}
              </div>
            
            </div>
    
          </div>
        @endforeach
      </div>
  
      {{-- Récapitulatif --}}
      <div class="min-w-64 w-1/3 p-4  max-sm:w-full max-sm:text-center 
            border-r border-l border-b border-opacity-70 border-second font-dmsans">
  
        <p class="font-bold mb-8 text-xl">Récapitulatif :</p>
  
        <div class="flex flex-col gap-16">
          <div class="grid grid-cols-2">
  
            @foreach ($produits as $item)
              <p class="text-left">{{ $item->model->type }} x {{ $item->qty }}</p>
              <p class="text-right text-second">{{ $item->price }} DH x {{ $item->qty }}</p>
            @endforeach
  
            <p class="text-left mt-3"> Livraison<i class="text-sm text-second"> / Pays : Maroc</i> </p>
            <p class="text-right text-second mt-3">{{ $livraison }} DH</p>
  
            <p class="text-left text-lg mt-3">Total TTC: </p>
            <p class="text-right text-lg mt-3">{{ $total }} DH</p>
          </div>
  
          <form action="{{route('checkout')}}" method="POST">
            @csrf
            <button
              class="w-full mx-auto px-4 py-2 text-center bg-gradient-to-r from-indigo-500 to-purple-700 hover:saturate-150 transition-all shadow-md hover:shadow-indigo-950 rounded-lg text-white">Payer
              en ligne via Stripe</button>
          </form>
        </div>
      </div>
  
    </div>
  
    @else
  
    <div class="max-w-4xl  mx-auto md:py-7  font-playfair">
      <p class="py-5 text-center md:text-xl text-lg">Votre panier est vide pour le moment.<br>
        Trouvez ce qui vous correspond en visitant notre humble sélection.</p>
      <p class="py-5 max-sm:p-2 font-semibold md:text-2xl max-md:text-lg">Nos sélections  </p>
  

      <div class="w-full grid lg:grid-cols-4 md:grid-cols-2 max-md:grid-cols-1 place-items-center gap-4 py-2 text-xl font-playfair">
  
        {{-- Onglet Anneaux --}}
        <div class="relative w-full flex flex-col shadow-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition duration-300 aspect-square"
          style="background-image:url({{ asset('images/produits/compressed/ring2.jpg') }})">
  
          <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Anneau'])}}" class="h-full w-full">
            <p class="absolute top-3/4 w-full text-center text-white">Anneaux</p>
            <div class="w-full h-full bg-stone-800 bg-opacity-40 shadow-lg hover:bg-opacity-10 transition">
            </div>
        </a>
        </div>
  
        {{-- Onglet Colliers --}}
        <div class="relative w-full flex flex-col shadow-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition duration-300 aspect-square"
          style="background-image:url({{ asset('images/produits/compressed/necklace2.jpg') }})">
  
          <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Collier'])}}" class="h-full w-full">
            <p class="absolute top-3/4 w-full text-center text-white">Colliers</p>
            <div class="w-full h-full bg-stone-800 bg-opacity-40 shadow-lg hover:bg-opacity-10 transition">
            </div>
        </a>     
        </div>
  
        {{-- Onglet Bracelets --}}
        <div class="relative w-full flex flex-col shadow-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition duration-300 aspect-square"
          style="background-image:url({{ asset('images/produits/compressed/bracelet2.jpg') }})">
  
          <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Bracelet'])}}" class="h-full w-full">
            <p class="absolute top-3/4 w-full text-center text-white">Bracelets</p>
            <div class="w-full h-full bg-stone-800 bg-opacity-40 shadow-lg hover:bg-opacity-10 transition">
            </div>
          </a>     
        </div>
  
        {{-- Onglet Boucles oreilles --}}
        <div class="relative w-full flex flex-col shadow-lg bg-cover bg-center h-full hover:transform hover:scale-105 transition duration-300 aspect-square"
          style="background-image:url({{ asset('images/produits/compressed/boucles2.jpg') }})">
  
          <a wire:navigate href="{{ route('boutiqueCategorie',['categorie'=>'Boucles oreilles'])}}" class="h-full w-full">
            <p class="absolute top-3/4 w-full text-center text-white">Boucles d'oreilles</p>
            <div class="w-full h-full bg-stone-800 bg-opacity-40 shadow-lg hover:bg-opacity-10 transition">
            </div>
          </a>     
        </div>
  
      </div>
    </div>
  
    @endif
  
  </div>