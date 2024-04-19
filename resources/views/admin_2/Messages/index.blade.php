@extends('admin.layout')

@section('content')

  <div>

    <p class="text-lg max-md:text-md text-fourth p-3 mt-2">Liste des Messages</p>
    
    {{-- Recherche --}}
    <div class="overflow-x-auto border border-second rounded-lg py-1 m-2">
      <table class="table md:table-sm max-md:table-xs md:px-1 text-center">
        <thead class="text-lightBlue">
          <tr class="border-b-third text-center text-fourth">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Message</th>
            <th class="max-md:hidden">Telephone</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody >
          @foreach($messages as $message)
            <tr class="border-b-third hover:bg-third transition-all">
              <td>{{ $message->nom }}</td>
              <td>{{ $message->prenom }}</td>
              <td>{{ $message->email }}</td>
              <td>{{ $message->message }}</td>
              <td>{{ $message->telephone }}</td>
              <td class="text-center"><a href=""><i class="ri-settings-2-line text-fourth text-2xl"></i></a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4 p-4">
      {{$messages->links()}}
    </div>

  </div>

@endsection