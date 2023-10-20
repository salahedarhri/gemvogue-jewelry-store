@extends('layout')

@section('content')

@if( $cartItems -> count() > 0)

</table>
<div class="container mx-auto p-6 max-sm:p-0">
  <h1 class="text-2xl font-semibold m-4">Votre panier</h1>
  <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse">
          <thead>
              <tr>
                  <th class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">Nom</th>
                  <th class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">Prix</th>
                  <th class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">Qte</th>
                  <th class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">Total</th>
                  <th class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($cartItems as $item)
              <tr>
                <td class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">{{ $item->name }}</td>
                <td class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">{{ $item->price }} DH</td>
                <td class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">{{ $item->qty }}</td>
                <td class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">{{ $item->subtotal() }} DH</td>
                <td class="border border-gray-400 px-4 py-2 max-sm:text-sm max-sm:p-2">Delete</td>
              </tr>
            @endforeach
          </tbody>
      </table>

      <div class="m-5 p-2 rounded-md border-slate-950 border-2 border-dashed max-sm:text-center">
        <h1 class="text-lg font-semibold mb-1">Total HT : {{ Cart::instance('cart')->subtotal() }} DH</h1>
        <h1 class="text-lg font-semibold mb-1">Tax : {{ Cart::instance('cart')->tax() }} DH</h1>
        <h1 class="text-lg font-semibold mb-1">Total TTC : {{ Cart::instance('cart')->total() }} DH</h1>
      </div>

      <a href={{ route('boutique')}} class="flex justify-center m-3">
        <button class="btn btn-secondary">Retourner vers boutique</button></a>
  
    </div>
</div>

@else

  <div class="alert m-5 flex flex-col">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-center">Votre panier est vide pour le moment <br>Veuillez choisir vos articles en accédant à l'onglet Boutique.</span>
  
    <a href={{ route('boutique')}}>
      <button class="btn btn-primary">Voir la boutique</button></a>
  </div>
@endif

@endsection