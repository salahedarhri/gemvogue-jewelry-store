@extends('layouts.client')

@section('content')

<div class="antialiased w-full bg-third pb-8">

    <div class="h-72 max-sm:h-60 max-w-7xl mx-auto bg-cover bg-center shadow-xl" style="background-image:url({{asset('images/composants/landing-md.jpg')}});">
        <div class="h-full w-full bg-slate-950 bg-opacity-30">
          <div class="flex items-center justify-center h-full pt-36">
            <p class="text-3xl text-third font-playfair font-semibold">Notre Histoire</p>
          </div>
        </div>
    </div>

        <!-- Alerts succes ou refus -->
        @if(session('success'))
        <div class="alert alert-success max-w-xl mx-auto my-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif
    
        @if(session('error'))
        <div class="alert alert-error max-w-xl mx-auto my-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('error') }}</span>
        </div>
        @endif

    {{-- 1er section --}}
    <div class="w-full">
        <div class="max-w-6xl mx-auto grid grid-cols-5 max-md:grid-cols-1 place-items-center">
            <div class="md:col-span-2 p-8 max-md:p-6">
                <img class="w-96 h-auto object-center object-cover aspect-square border-2 border-second shadow-xl rounded-tr-3xl rounded-bl-3xl" src="{{ asset('images/composants/shop (1).jpg')}}" alt="shop(1)">
            </div>

            <div class="md:col-span-3 flex flex-col gap-4 max-md:text-center justify-center text-black font-dmsans md:px-4 max-md:p-4 max-md:h-96">
                <p class="text-2xl max-md:text-xl font-bold font-playfair">Qui sommes-nous ?</p>
                <p class="text-lg max-md:text-md">Nous sommes une entreprise de bijouterie basée à Agadir, au Maroc, spécialisée dans la création et la vente de bijoux uniques depuis plus de 10 ans.
                    Notre passion pour l'art de la bijouterie nous a conduit à développer des collections exceptionnelles qui captivent nos clients à travers le monde.
                </p>
            </div>

        </div>
    </div>

    {{-- 2e section --}}
    <div class="w-full bg-gradient-to-r from-second to-secondDarker shadow-xl">
        <div class="max-w-6xl mx-auto grid grid-cols-3 max-md:grid-cols-1 place-items-center">

            <div class="flex flex-col gap-4 justify-center max-md:text-center  md:col-span-2 text-third font-dmsans md:px-12 max-md:p-4 max-md:h-72">
                <p class="text-lg max-md:text-md">Au cœur d'Agadir, notre atelier réunit des artisans talentueux maîtrisant l'art traditionnel de la bijouterie tout en intégrant des techniques innovantes.
                        Chaque pièce que nous produisons est le résultat d'un travail minutieux, alliant expertise artisanale et créativité contemporaine.
                </p>
            </div>

            <div class="p-4 max-md:p-6">
                <img class="object-center object-cover w-80 h-auto border-4 rounded-t-full border-third shadow-xl " src="{{ asset('images/composants/element (1).jpg')}}" alt="shop(1)">
            </div>

        </div>
    </div>

    {{-- 3e section --}}
    <div class="w-full">
        <div class="max-w-6xl mx-auto grid grid-cols-5 max-md:grid-cols-1 place-items-center">
            <div class="md:col-span-2 p-8 max-md:p-6">
                <img class="w-96 h-auto object-center object-cover aspect-square border-2 border-secondDarker shadow-xl rounded-tr-3xl rounded-bl-3xl" src="{{ asset('images/composants/shop (2).jpg')}}" alt="shop(1)">
            </div>

            <div class="md:col-span-3 flex flex-col gap-4 max-md:text-center justify-center text-black font-dmsans md:px-4 max-md:p-4 max-md:h-96">
                <p class="text-2xl max-md:text-xl font-bold font-playfair">Notre engagement</p>
                <p class="text-lg max-md:text-md">Notre engagement envers l'éthique et la durabilité guide toutes nos initiatives.
                        Des matériaux de la plus haute qualité, des métaux précieux aux pierres exceptionnelles,
                        sont soigneusement sélectionnés pour garantir à nos clients des bijoux esthétiques et durables.
                        Nous suivons des pratiques responsables du processus de fabrication à l'emballage.
                </p>
            </div>

        </div>
    </div>

    {{-- 4e section --}}
    <div class="w-full bg-gradient-to-r from-fourth to-fourthDarker shadow-xl">
        <div class="max-w-6xl mx-auto grid grid-cols-3 max-md:grid-cols-1 place-items-center">

            <div class="flex flex-col justify-center gap-5 max-md:text-center md:col-span-2 text-third font-dmsans md:px-12 max-md:px-4 max-md:py-6">
                <p class="text-2xl max-md:text-xl font-bold font-playfair">Nos Collections</p>
                <p class="text-lg max-md:text-md">La diversité de notre collection reflète notre volonté de satisfaire tous les goûts et occasions.
                     Que ce soit des bijoux de mariage élégants, des pièces délicates pour le quotidien,
                     ou des créations audacieuses pour des événements spéciaux, notre gamme complète incarne la richesse de l'art joaillier.
                </p>

                <a href="{{route('boutique')}}" class="text-center"><button class="py-3 px-5 bg-third text-secondDarker hover:bg shadow-xl rounded font-playfair font-semibold text-xl hover:bg-fourthDarker hover:text-third transition">Découvrir nos collections</button></a>
            </div>

            <div class="p-4 max-md:p-6">
                <img class="object-center object-cover w-80 h-auto border-4 border-third shadow-xl rounded-tl-3xl rounded-br-3xl" src="{{ asset('images/composants/shop (3).jpg')}}" alt="shop(1)">
            </div>

        </div>
    </div>

</div>



@endsection