@extends('layout')

@section('content')

  <div class="h-72 max-sm:h-60 w-screen bg-cover bg-fixed bg-right-bottom " style="background-image:url({{asset('images/bijoux-panier.jpg')}});">
    <div class="h-full w-full bg-slate-800 bg-opacity-40">
      <div class="flex items-center justify-center h-full pt-36">
        <p class="text-3xl text-white font-bold">Votre Panier</p>
      </div>
    </div>
  </div>

  <div class="mx-auto sm:px-8 py-4 my-6 max-w-6xl flex sm:flex-row max-sm:flex-col">
    @if ($cartItems->count() > 0)
        {{-- Section Produit --}}
      <div class="wrapper sm:mx-4 sm:w-2/3 max-sm:w-full">
        <p class="text-xl font-semibold p-4">Votre panier ({{ $cartItems->count() }})</p>

        @foreach ($cartItems as $item)
            <div class="flex sm:flex-row max-sm:flex-col items-center p-3 border-b border-neutral max-sm:gap-3 max-sm:mx-12">
                {{-- Photo --}}
                <div class="sm:w-1/4">
                  <img src="{{ asset('images/' . $item->model->photo1) }}" alt="{{ $item->model->photo1 }}" class="sm:w-40 max-sm:w-48 aspect-square object-cover">
                </div>
                {{-- Infos du Produit --}}
                <div class="sm:w-2/4 max-sm:text-center p-2 items-center">
                  <p class="text-lg">{{ $item->name }}</p>
                  <p class="text-sm mt-2">Prix : {{ $item->price }} Dh</p>
                  <p class="text-sm mb-2">Qte : {{ $item->qty}}</p>
                  <p class="text mb-2">Total : {{ $item->subtotal()}} Dh</p>
                </div>
                {{-- Options --}}
                <div class="sm:w-1/4">
                  {{-- Modifier Quantité --}}
                  <form method="post" action="{{ route('updatePanier', $item->rowId) }}">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <input type="number" name="quantity" value="{{ $item->qty }}" class="w-16">
                    <button type="submit">Modifier</button>
                  </form> 

                  {{-- Supprimer Produit --}}
                  <form method="post" action="{{ route('retirerPanier', $item->rowId) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="p-2">Supprimer &#11199</button>
                  </form>
                </div>
            </div>
        @endforeach
      </div>

          {{-- Récapitulatif --}}
          <div class="min-w-64 w-1/3 p-4  max-sm:w-full max-sm:text-center border-r border-l border-b border-neutral ">
            <p class="font-bold underline mb-8 text-xl">Récapitulatif :</p>
            <div class="grid grid-cols-2">
              <p class="text-left">Total HT:</p> 
              <p class="text-right">{{ Cart::instance('cart')->subtotal() }} DH</p>
              <p class="text-left">Tax: </p> 
              <p class="text-right">{{ Cart::instance('cart')->tax() }} DH</p>
              <p class="text-left text-lg mt-3">Total TTC: </p> 
              <p class="text-right text-lg mt-3">{{ Cart::instance('cart')->total() }} DH</p>
            </div>
          </div>
        
    @else
      <p>Votre panier est vide.</p>
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