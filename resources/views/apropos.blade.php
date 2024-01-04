@extends('layouts.client')

@section('content')

<div class="w-full bg-third">

    <div class="h-72 max-sm:h-60 max-w-7xl mx-auto bg-cover bg-top" style="background-image:url({{asset('images/composants/landing-md.jpg')}});">
        <div class="h-full w-full bg-slate-950 bg-opacity-30">
          <div class="flex items-center justify-center h-full pt-36">
            <p class="text-3xl text-third font-playfair font-semibold">Notre Histoire</p>
          </div>
        </div>
    </div>

    {{-- 1er section --}}
    <div class="w-full pt-5">
        <div class="max-w-5xl mx-auto grid grid-cols-2 max-md:grid-cols-1">
            <div class="md:bg-gradient-to-r from-third to-second max-md:bg-gradient-to-b p-4 max-md:p-6">
                <img class="object-center object-cover aspect-square  border-4 rounded border-third shadow-xl" src="{{ asset('images/composants/shop (1).jpg')}}" alt="shop(1)">
            </div>

            <div class="flex flex-col justify-center md:bg-gradient-to-r max-md:bg-gradient-to-b from-second to-secondDarker text-third font-martel md:px-12 max-md:p-4 max-md:h-96">
                <p class="text-lg max-md:text-center">Nous sommes une entreprise de bijouterie basée à Agadir, au Maroc, spécialisée dans la création et la vente de bijoux uniques depuis plus de 10 ans.
                    Notre passion pour l'art de la bijouterie nous a conduit à développer des collections exceptionnelles qui captivent nos clients à travers le monde.
                </p>
            </div>

        </div>
    </div>

        {{-- 2e section --}}
        <div class="w-full">
            <div class="max-w-6xl mx-auto grid grid-cols-3 max-md:grid-cols-1">

                <div class="flex flex-col justify-center md:bg-gradient-to-l max-md:bg-gradient-to-t from-cyan-600 to-cyan-700 md:col-span-2 text-third font-martel md:px-12 max-md:p-4 max-md:h-96">
                    <p class="text-lg max-md:text-center">Nous sommes une entreprise de bijouterie basée à Agadir, au Maroc, spécialisée dans la création et la vente de bijoux uniques depuis plus de 10 ans.
                        Notre passion pour l'art de la bijouterie nous a conduit à développer des collections exceptionnelles qui captivent nos clients à travers le monde.
                    </p>
                </div>

                <div class="md:bg-gradient-to-l from-third to-cyan-600 max-md:bg-gradient-to-t p-4 max-md:p-6">
                    <img class="object-center object-cover aspect-square  border-4 rounded border-third shadow-xl" src="{{ asset('images/composants/element (1).jpg')}}" alt="shop(1)">
                </div>
    

    
            </div>
        </div>

</div>



@endsection