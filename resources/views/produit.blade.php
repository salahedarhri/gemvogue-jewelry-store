@extends('layout')

@section('content')
    <div class="container mx-auto p-4">
        <div class="lg:flex lg:flex-row gap-6">
          
            <!-- Section des détails du produit -->
            <div class="lg:w-2/3">
                
                <!-- for meduim / big screen -->
                <div class="grid grid-cols-2 gap-4 max-sm:hidden">
                    <div><img src="{{ asset('images/' . $bijou->photo1) }}" alt="Photo 1" class="w-full aspect-square object-cover shadow-lg">
                    </div>
                    <div><img src="{{ asset('images/' . $bijou->photo2) }}" alt="Photo 2" class="w-full aspect-square object-cover shadow-lg">
                    </div>
                </div>

                <!-- for mobile format -->
                <div class="carousel w-full aspect-square object-cover sm:hidden shadow-lg">
                    <div id="slide1" class="carousel-item relative w-full">
                      <img src="{{ asset('images/' . $bijou->photo1) }}" class="w-full" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❯</a>
                      </div>
                    </div> 
                    <div id="slide2" class="carousel-item relative w-full">
                      <img src="{{ asset('images/' . $bijou->photo2) }}" class="w-full" />
                      <div class="absolute flex justify-between transform -translate-y-1/2 left-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a> 
                      </div>
                    </div> 
                </div>

                <h1 class="text-3xl font-semibold m-4 max-sm:text-xl max-sm:text-center">{{ $bijou->nom }}</h1>
                <p class="mt-4 text-gray-700 max-sm:text-center max-sm:px-2">{{ $bijou->description }}</p>
                <div class="mt-4">
                    <p class="text-xl font-semibold text-gray-800 max-sm:text-base">Détails du produit</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Type : {{ $bijou->type }}</li>
                        <li>Prix : {{ $bijou->prix }} DH</li>
                        <li>Type de métal : {{ $bijou->type_metal }}</li>
                    </ul>
                </div>

                <div class="mt-6 flex flex-row max-sm:flex-col gap-2">
                    <button class="bg-secondary hover:bg-secondary text-white font-semibold px-4 py-3 rounded-md max-sm:m-1 "><a href="#">Ajouter au panier</a></button>
                    <button class="bg-neutral hover:bg-neutral text-white font-semibold px-4 py-3 rounded-md max-sm:m-1 ">Ajouter à la liste de souhaits</button>
                </div>
            </div>

            <!-- Section des produits similaires -->
            <div class="lg:w-1/3 mt-8 lg:mt-0">
                <h2 class="text-2xl font-semibold mb-4 max-sm:text-lg">Bijoux similaires</h2>
                <div class="grid grid-cols-2 gap-4 my-4">
                    @foreach ($bijouxSimilaires as $bijouSimilaire)

                    <a href="{{ route('bijou',[ 'slug' => $bijouSimilaire->slug]) }}">
                        <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                            <img src="{{ asset('images/' . $bijouSimilaire->photo1) }}" alt="Produit similaire" class="w-full aspect-square object-cover rounded-md mb-2">
                            <h3 class="text-base font-semibold max-sm:text-sm text-center">{{ $bijouSimilaire->nom }}</h3>
                            <p class="text-gray-700 max-sm:text-sm text-center">{{ $bijouSimilaire->type_metal }}</p>
                            <p class="text-gray-700 max-sm:text-sm text-center">{{ $bijouSimilaire->prix }} DH</p>

                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            

        </div>
    </div>
@endsection
