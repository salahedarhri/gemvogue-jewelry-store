@extends('layouts.client')

@section('content')
<div class="w-full bg-third">

  <div class="h-72 max-sm:h-60 max-w-7xl mx-auto bg-cover bg-center" style="background-image:url({{asset('images/composants/bijoux-panier.jpg')}});">
    <div class="h-full w-full bg-slate-800 bg-opacity-40">
      <div class="flex items-center justify-center h-full pt-36">
        <p class="text-3xl text-third font-playfair font-semibold">Votre Panier</p>
      </div>
    </div>
  </div>

    <!-- Alerts succes ou refus -->
    @if(session('success'))
      <div class="alert alert-success max-w-5xl mx-auto my-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
      </div>
    @endif
    @if(session('error'))
    <div class="alert alert-error max-w-5xl mx-auto my-4">
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>{{ session('error') }}</span>
    </div>
    @endif

  @if ($cartItems->count() > 0)

    <div class="mx-auto sm:px-8 py-2 mt-6 max-w-6xl flex sm:flex-row max-sm:flex-col">

          {{-- Section Produit --}}
        <div class="wrapper sm:mx-4 sm:w-2/3 max-sm:w-full">
          <p class="text-xl font-semibold p-4">Votre panier ({{ $cartItems->count() }})</p>

          @foreach ($cartItems as $item)
              <div class="flex flex-row max-sm:flex-col items-center p-1 border-b border-neutral max-sm:gap-3 max-sm:mx-12">
                  {{-- Photo --}}
                  <div class="sm:w-1/4">
                    <img src="{{ asset('images/produits/' . $item->model->photo1) }}" alt="{{ $item->model->photo1 }}" class="sm:w-40 max-sm:w-48 aspect-square object-cover">
                  </div>
                  {{-- Infos du Produit --}}
                  <div class="sm:w-3/4 max-sm:text-center sm:p-2 max-sm:py-2 items-center">
                    <p class="text-lg">{{ $item->name }}</p>
                    <p class="text-sm mt-2">Prix : {{ $item->price }} Dh</p>
                    <p class="text-sm mb-2">Qte : {{ $item->qty}}</p>
                    <p class="text mb-2">Total : {{ $item->subtotal()}} Dh</p>

                                      {{-- Options --}}
                  <div class="w-fit mx-auto flex flex-row gap-2 items-center pt-3">
                    {{-- Modifier Quantité --}}
                    <form method="post" action="{{ route('updatePanier', $item->rowId) }}">
                      @csrf
                      <input type="hidden" name="_method" value="put">
                      <div class="flex flex-row gap-2 items-center">
                        <input type="number" name="quantity" value="{{ $item->qty }}" class="w-16 h-fit py-1">
                        <button type="submit" class="p-2 bg-second shadow rounded text-sm text-white font-semibold">Modifier</button>
                      </div>
                    </form> 

                    {{-- Supprimer Produit --}}
                    <form method="post" action="{{ route('retirerPanier', $item->rowId) }}">
                      @csrf
                      @method('delete')
                      <button type="submit" class="p-2 bg-red-500 shadow rounded text-sm text-white font-semibold">Supprimer&nbsp;&#11199</button>
                    </form>
                  </div>

                  </div>

              </div>
          @endforeach
        </div>

            {{-- Récapitulatif --}}
            <div class="min-w-64 w-1/3 p-4  max-sm:w-full max-sm:text-center border-r border-l border-b border-neutral ">
              <p class="font-bold mb-8 text-xl">Récapitulatif :</p>
              <div class="grid grid-cols-2">
                <p class="text-left">Total HT:</p> 
                <p class="text-right">{{ Cart::instance('cart')->subtotal() }} DH</p>
                <p class="text-left">Tax: </p> 
                <p class="text-right">{{ Cart::instance('cart')->tax() }} DH</p>
                <p class="text-left text-lg mt-3">Total TTC: </p> 
                <p class="text-right text-lg mt-3">{{ Cart::instance('cart')->total() }} DH</p>
              </div>
            </div>
          


    </div>

  @else
  
  <div class="max-w-4xl  mx-auto md:py-7  font-playfair">
    <p class="py-5 text-center md:text-xl text-lg">Votre panier est vide pour le moment.<br> Trouvez ce qui vous correspond en visitant notre humble sélection.</p>
    <p class="py-5 max-sm:p-2 font-semibold underline md:text-2xl max-md:text-lg">Nos sélections :</p>

    <div class="flex md:flex-row max-md:flex-col items-center gap-2 p-4 text-xl">

      {{-- Onglet Anneaux --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-sm:w-3/4" 
          style="background-image:url({{ asset('images/produits/ring2.jpg') }})">

            <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
            <a href="{{ route('boutique') }}" class="h-full w-full absolute"></a></div>
            <p class="absolute top-3/4 w-full text-center text-white">Anneaux</p>
        </div>

      {{-- Onglet Colliers --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-sm:w-3/4" 
          style="background-image:url({{ asset('images/produits/necklace2.jpg') }})">

            <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
            <a href="{{ route('boutique') }}" class="h-full w-full absolute"></a></div>
            <p class="absolute top-3/4 w-full text-center text-white">Colliers</p>
        </div>

      {{-- Onglet Bracelets --}}
        <div class="relative w-1/3 flex flex-col bg-cover bg-center h-full aspect-square max-sm:w-3/4" 
        style="background-image:url({{ asset('images/produits/bracelet2.jpg') }})">

          <div class="w-full h-full bg-stone-800 bg-opacity-40 hover:bg-opacity-10 transition">
          <a href="{{ route('boutique') }}" class="h-full w-full absolute"></a></div>
          <p class="absolute top-3/4 w-full text-center text-white">Bracelets</p>
        </div>

    </div>
  </div>
    
@endif

</div>
@endsection

{{-- <td class="p-2 text-center max-sm:text-sm">
  <!-- Quantity update -->
  <form method="post" action="{{ route('updatePanier', $item->rowId) }}">
    @csrf
    <input type="hidden" name="_method" value="put">
    <input type="number" name="quantity" value="{{ $item->qty }}" class="w-16">
    <button type="submit">Modifier</button>
  </form> 
</td> --}}

{{-- <h1 class="text-2xl font-semibold m-4">Votre panier</h1>

<div class="container grid grid-cols-3 gap-5 m-2">

  @if ($cartItems->count() > 0)

    @foreach ($cartItems as $item)
      <div class="inline-flex flex-row border-1 border-orange-500 shadow-md rounded">
        <img src="{{ asset('images/' . $item->model->photo1) }}" alt="{{ $item->model->photo1 }}" class="w-36 aspect-square object-cover">
        <div class="flex flex-col">
          <p class="p-2 text-center max-sm:text-sm">{{ $item->name }} DH</p>
          <p class="p-2 text-center max-sm:text-sm">{{ $item->price }} DH</p>
          <p class="p-2 text-center max-sm:text-sm">{{ $item->subtotal() }} DH</p>
        </div>
        <!-- Item delete -->
        <form method="post" action="{{ route('retirerPanier', $item->rowId) }}">
          @csrf
          @method('delete')
          <button type="submit" class="p-2">&#11199</button>
        </form>
      </div>
    @endforeach
  </div>

  <div class="mt-4 p-2 rounded border border-gray-300 text-center">
    <h1 class="text-lg font-semibold mb-2">Total HT: {{ Cart::instance('cart')->subtotal() }} DH</h1>
    <h1 class="text-lg font-semibold mb-2">Tax: {{ Cart::instance('cart')->tax() }} DH</h1>
    <h1 class="text-lg font-semibold mb-2">Total TTC: {{ Cart::instance('cart')->total() }} DH</h1>
  </div>
  <div class="mt-4 flex justify-center">
    <a href="{{ route('boutique') }}" class="btn btn-secondary">Continue Shopping</a>
  </div>

  @else
  <div class="alert mt-4 text-center">
    <i class="fas fa-info-circle text-info text-4xl mb-2"></i>
    <p>Votre panier est actuellement vide. Veuillez choisir vos produits en visitant la boutique.</p>
    <a href="{{ route('boutique') }}" class="btn btn-primary mt-2">Visiter la Boutique</a>
  </div>
  @endif
</div> --}}