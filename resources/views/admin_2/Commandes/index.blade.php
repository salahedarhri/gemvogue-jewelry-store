@extends('admin.layout')

@section('content')

  <div>

    <p class="text-lg max-md:text-md text-fourth p-3 mt-2">Liste des Commandes</p>
    
    {{-- Recherche --}}
    <div class="overflow-x-auto border border-second rounded-lg py-1 m-2">
      <table class="table md:table-sm max-md:table-xs md:px-1 text-center">
        <thead class="text-lightBlue">
          <tr class="border-b-third text-center text-fourth">
            <th>Id</th>
            <th>Statut</th>
            <th>Prix Total</th>
            <th>Session</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody >
          @foreach($commandes as $commande)
            <tr class="border-b-third hover:bg-third transition-all">
              <td>{{ $commande->id }}</td>
              <td>{{ $commande->status }}</td>
              <td>{{ $commande->prix_total }}</td>
              <td>{{ $commande->session_id }}</td>
              <td class="text-center"><a href=""><i class="ri-settings-2-line text-fourth text-2xl"></i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4 p-4">
      {{$commandes->links()}}
    </div>

  </div>

@endsection