@extends('layouts.client')

@section('content')

    <div class="w-screen bg-third pt-3">

        <!-- Alerts succes ou refus -->
        @if(session('success'))
        <div class="alert alert-success w-5/6 mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-error w-5/6 mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('error') }}</span>
        </div>
        @endif
        

        <div class="max-w-screen-2xl mx-auto md:p-8 max-md:p-4 font-dmsans text-first">

            <div class="lg:flex lg:flex-row gap-6">
            
                <!-- Section des détails du produit -->
                <div class="lg:w-2/3">
                    <!-- for meduim / big format -->
                    <div class="grid md:grid-cols-2 gap-4 max-sm:hidden ">
                        <div><img src="{{ asset('images/produits/' . $bijou->photo1) }}" alt="Photo 1" class="w-full aspect-square object-cover shadow-lg"></div>
                        <div><img src="{{ asset('images/produits/' . $bijou->photo2) }}" alt="Photo 2" class="w-full aspect-square object-cover shadow-lg"></div>
                    </div>

                    <!-- for mobile format -->
                    <div class="carousel max-w-sm aspect-square object-cover md:hidden shadow-lg">
                        <div id="slide1" class="carousel-item relative w-full">
                        <img src="{{ asset('images/produits/' . $bijou->photo1) }}" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 right-5 top-1/2">
                            <a href="#slide2" class="btn btn-circle">❯</a>
                        </div>
                        </div> 
                        <div id="slide2" class="carousel-item relative w-full">
                        <img src="{{ asset('images/produits/' . $bijou->photo2) }}" class="w-full" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 top-1/2">
                            <a href="#slide1" class="btn btn-circle">❮</a> 
                        </div>
                        </div> 
                    </div>

                    <h1 class="text-3xl font-semibold m-4 max-sm:text-xl max-sm:text-center">{{ $bijou->nom }}</h1>
                    <p class="mt-4 text-gray-700 max-sm:text-center max-sm:px-2">{{ $bijou->description }}</p>
                    
                    <div class="mt-4">
                        <p class="text-xl font-semibold text-gray-800 max-sm:text-base font-playfair">Détails du produit</p>
                        <ul class="list-disc pl-6 mt-2">
                            <li>Type : {{ $bijou->type }}</li>
                            <li>Prix : {{ $bijou->prix }} DH</li>
                            <li>Type de métal : {{ $bijou->type_metal }}</li>
                        </ul>
                    </div>

                    <!-- Section panier / Wishlist -->
                    <div class="mt-6 flex flex-row max-sm:flex-col gap-2">

                        <!-- Panier -->
                        <form id="ajouterPanier" action="{{ route('ajouterProduitPanier') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $bijou->id }}">
                            <input type="hidden" name="quantity" id="qty" value="1">
                            <input type="submit" value="Ajouter au panier" class="bg-secondary text-white font-semibold rounded-md max-sm:w-full px-3 py-3">
                        </form>


                        <!-- Wishlist -->
                        <button class="bg-neutral text-white font-semibold px-4 py-3 rounded-md max-sm:m-1 ">
                            Ajouter à la liste de souhaits
                        </button>
                        
                    </div>
                </div>

                <!-- Section des produits similaires -->
                <div class="lg:w-1/3 grid lg:grid-cols-2 max-lg:grid-cols-4 items-center gap-2 p-3">

                    @foreach ($bijouxSimilaires as $bijouSimilaire)
                
                    <a href="{{ route('bijou',[ 'slug' => $bijouSimilaire->slug]) }}">
            
                        <div class="flex flex-col place-items-center border border-second relative">
                        <img src="{{ asset('images/produits/'. $bijouSimilaire->photo1 )}}" loading="lazy" alt="img bijou database" class="w-full h-auto aspect-square object-cover object-center absolute hover:opacity-0 transition-all">
                        <img src="{{ asset('images/produits/'. $bijouSimilaire->photo2 )}}" loading="lazy" alt="img bijou hover" class="w-full h-auto aspect-square object-cover object-center">
                        <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
                            <p class="truncate font-semibold">{{ $bijouSimilaire->nom }}</p>
                            <p class="text-xs"> {{ $bijouSimilaire->type_metal }}</p> 
                            <p class="font-semibold text-amber-800" >{{ $bijouSimilaire->prix }} DH</p>
                        </div>
                        </div>
            
                    </a>
                    @endforeach
                </div>

            </div>
        </div>

    </div>      
@endsection
