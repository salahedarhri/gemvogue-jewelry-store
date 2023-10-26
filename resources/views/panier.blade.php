@extends('layout')

@section('content')

<div class="container mx-auto p-6">
  <h1 class="text-2xl font-semibold mb-4">Votre panier</h1>

  @if ($cartItems->count() > 0)

  <div class="overflow-x-auto">
  <table class="max-w-2xl w-full border border-gray-300 table-fixed">
    <thead>
    <tr>
      <th class="w-1/6 p-2 max-sm:text-sm">Image</th>
      <th class="w-2/6 p-2 max-sm:text-sm">Nom du Produit</th>
      <th class="w-1/6 p-2 max-sm:text-sm">Prix</th>
      <th class="w-1/6 p-2 max-sm:text-sm">Qte</th>
      <th class="w-1/6 p-2 max-sm:text-sm">Total</th>
      <th class="w-1/6 p-2 max-sm:text-sm">Action</th>
    </tr>
    </thead>
  <tbody>

  @foreach ($cartItems as $item)
    <tr>
      <td class="p-2">
        <div class="flex justify-center items-center">
        <img src="{{ asset('images/' . $item->model->photo1) }}"
        alt="{{ $item->model->photo1 }}" class="w-16 h-16 object-cover rounded">
        </div>
      </td>

      <td class="p-2 text-center max-sm:text-sm">{{ $item->name }}</td>
      <td class="p-2 text-center max-sm:text-sm">{{ $item->price }} DH</td>
      <td class="p-2 text-center max-sm:text-sm">

        <!-- Quantity update -->
        <form method="post" action="{{ route('updatePanier', $item->rowId) }}">
          @csrf
          <input type="hidden" name="_method" value="put">
          <input type="number" name="quantity" value="{{ $item->qty }}" class="w-16">
          <button type="submit">Modifier</button>
        </form>

      </td>
      <td class="p-2 text-center max-sm:text-sm">{{ $item->subtotal() }} DH</td>

      <td class="p-2">
        <!-- Item delete -->
        <div class="flex justify-center items-center">
          <form method="post" action="{{ route('retirerPanier', $item->rowId) }}">
            @csrf
            @method('delete')
            <button type="submit">Retirer</button>
        </form>

        </div>
      </td>
    </tr>
  @endforeach

  </tbody>
  </table>
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
</div>

@endsection