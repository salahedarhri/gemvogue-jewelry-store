@extends('layout')

@section('content')

@if(session('cart'))
<div class="grid grid-cols-2 grid-gap-2 gap-2">

  @foreach(session('cart') as $id => $details)
  <div class="p-4">
    <img src="{{ asset('images') }}/{{ $details['photo1'] }}" alt="{{ $details['nom_produit'] }}"
    class="w-32 aspect-square">
    <div class="flex flex-column">
      <p>{{ $details['nom_produit'] }} /</p>
      <p>Prix : {{ $details['prix'] }}DH /</p>
      <p>Qte : {{ $details['qte'] }} /</p>
    </div>
  
    //form for modification
    <form action="{{ route('panier-update' /* , $details->id_produit */ )}}" method="POST">
      @csrf
      @method('PUT')
      <input type="text" name="title" value="">
      <button class="btn btn-accent p-1" type="submit">Modifier</button>
    </form>
  
    //form for deletion
    <form action="{{ route('panier-delete' /* ,$details->id_produit */ )}}" method="POST" >
      @csrf
      <button class="btn btn-accent p-1">Supprimer</button>
    </form>
  </div>

  @endforeach

</div>


@endif

@endsection