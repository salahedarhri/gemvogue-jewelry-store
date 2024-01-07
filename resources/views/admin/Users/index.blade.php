@extends('admin.layout')

@section('content')

  <div>
    <p class="text-lg max-md:text-md text-cyan-900 p-3 mt-2">Liste des utilisateurs</p>

    {{-- Recherche --}}

    <div class="overflow-x-auto border border-rose-700 rounded-lg py-1 m-2">
      <table class="table md:table-sm max-md:table-xs md:px-1">

        <thead class="text-lightBlue">
          <tr class="border-b-rose-700">
            <th>Nom</th>
            <th>Email</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody >

          @foreach($utilisateurs as $utilisateur)
            <tr class="border-b-rose-700 hover:bg-sky-100">
              <td> {{ $utilisateur->name }}</td>
              <td> {{ $utilisateur->email }}</td>
              <td class="text-center"><a href=""><i class="ri-settings-2-line text-cyan-900 text-2xl"></i></a></td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    <div class="mt-4 p-4">
      {{$utilisateurs->links()}}
    </div>

  </div>

@endsection