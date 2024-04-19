@extends('admin.layout')

@section('content')

  <div>

    <p class="text-lg max-md:text-md text-fourth p-3 mt-2">Liste des bijoux</p>
    
    {{-- Recherche --}}
    <div class="overflow-x-auto border border-second rounded-lg py-1 m-2">
      <table class="table md:table-sm max-md:table-xs md:px-1 text-center">
        <thead class="text-lightBlue">
          <tr class="border-b-third text-center text-fourth">
            <th class="max-md:hidden text-center">Photo</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Qte Stock</th>
            <th class="max-md:hidden text-center p-1">Collection</th>
            <th class="max-md:hidden text-center p-1">Métal</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody >
          @foreach($bijoux as $bijou)
            <tr class="border-b-third hover:bg-third transition-all">
              <td class="max-md:hidden"><div class="avatar"><div class="mask h-8 w-8 rounded shadow-lg"><img src="{{ asset('images/produits/'.$bijou->photo1) }}" alt="bijou image"/></div></div></td>
              <td>{{ $bijou->nom }} </td>
              <td>{{ $bijou->prix }} Dh</td>
              <td>{{ $bijou->type }} </td>
              <td>{{ $bijou->qte_stock}} </td>
              <td class="max-md:hidden text-center"> {{ $bijou->collection}} </td>
              <td class="max-md:hidden text-center"> {{ $bijou->type_metal}} </td>
              <td class="text-center"><a href=""><i class="ri-settings-2-line text-fourth text-2xl"></i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4 p-4">
      {{$bijoux->links()}}
    </div>

  </div>

@endsection