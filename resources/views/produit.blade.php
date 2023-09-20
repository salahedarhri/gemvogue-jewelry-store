@extends('layout')

@section('content')
    <div class="container mx-auto p-4">
        <div class="lg:flex lg:flex-row gap-6">
          
            <!-- Section des détails du produit -->
            <div class="lg:w-2/3">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-md:mx-12">
                    <div>
                        <img src="{{ asset('images/' . $bijou->photo1) }}" alt="Photo 1" class="w-full aspect-square object-cover rounded-lg shadow-md">
                    </div>
                    <div>
                        <img src="{{ asset('images/' . $bijou->photo2) }}" alt="Photo 2" class="w-full aspect-square object-cover rounded-lg shadow-md">
                    </div>

                </div>
                <h1 class="text-3xl font-semibold m-4">{{ $bijou->nom }}</h1>
                <p class="mt-4 text-gray-700">{{ $bijou->description }}</p>
                <div class="mt-4">
                    <p class="text-xl font-semibold text-gray-800">Détails du produit</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Type : {{ $bijou->type }}</li>
                        <li>Prix : {{ $bijou->prix }} €</li>
                        <li>Type de métal : {{ $bijou->type_metal }}</li>
                        <li>Gemme : {{ $bijou->gemme }}</li>
                    </ul>
                </div>

                <div class="mt-6 flex flex-row max-sm:flex-col gap-2">
                    <button class="bg-secondary hover:bg-secondary text-white font-semibold px-4 py-3 rounded-md max-sm:m-1 ">Ajouter au panier</button>
                    <button class="bg-neutral hover:bg-neutral text-white font-semibold px-4 py-3 rounded-md max-sm:m-1 ">Ajouter à la liste de souhaits</button>
                </div>
            </div>

            <!-- Section des produits similaires -->
            <div class="lg:w-1/3 mt-8 lg:mt-0">
                <h2 class="text-2xl font-semibold mb-4">Bijoux similaires</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 max-lg:mx-16 my-4">
                    @foreach ($bijouxSimilaires as $bijouSimilaire)

                    <a href="{{ route('bijou',[ 'id' => $bijouSimilaire->id]) }}">
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <img src="{{ asset('images/' . $bijouSimilaire->photo1) }}" alt="Produit similaire" class="w-full aspect-square object-cover rounded-md mb-2">
                            <h3 class="text-lg font-semibold">{{ $bijouSimilaire->nom }}</h3>
                            <p class="text-gray-700">{{ $bijouSimilaire->type_metal }}</p>
                            <p class="text-gray-700">{{ $bijouSimilaire->prix }} DH</p>

                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            

        </div>
    </div>

    <script>
        // Ajoutez ici des scripts JavaScript pour améliorer l'expérience utilisateur, par exemple, des animations ou des interactions
    </script>
@endsection
