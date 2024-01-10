@extends('layouts.client')

@section('content')

<div class="w-full bg-third md:py-24 p-2">

    <div class="max-w-7xl mx-auto bg-white bg-opacity-50 rounded-xl border border-secondDarker">

        {{-- Remerciements --}}
        <div class="flex flex-col text-center gap-8 p-8 pb-0">
            <h3 class="text-3xl font-semibold font-playfair">Merci pour votre achat,  {{ $client->name }}! </h3>
            <p class="font-dmsans">Nous tenons à vous remercier sincèrement pour votre récent achat sur notre site. C'est un plaisir de vous compter parmi nos clients.</p>
        </div>
    
        <div class="grid grid-cols-3 max-md:grid-cols-1 justify-center place-items-center gap-8 ">
    
            <div class="font-dmsans p-4 md:px-8 flex flex-col gap-4 max-md:text-center md:col-span-2">
                <p >Votre commande a été traitée avec soin, et nous sommes en train de la préparer pour l'expédition. Dès que votre commande sera prête à partir,  nous vous enverrons un email de confirmation  à cette adresse : <b class="text-softGreen underline">{{$client->email}}</b> avec tous les détails d'expédition.</p>
                <p class="">Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter. Nous sommes là pour vous aider!</p>
                <p class="">Merci encore pour votre confiance.</p>
                <p class="mt-8 text-secondDarker font-playfair">Cordialement,</p>
                <p class="italic text-secondDarker font-playfair">GemVogue</p>
    
            </div>

            <img src="{{asset('images/composants/confirm.png')}}" loading="lazy" alt="" srcset="" 
            class="object-center object-cover">
    
        </div>

        {{-- <div class="p-4">

            <h4 class="p-2">Articles achetées :</h4>
            <div class="max-w-4xl mx-auto grid grid-cols-2 max-md:grid-cols-1 gap-2">

                @foreach($produits as $produit)
                    <div class="p-4 border border-second bg-white bg-opacity-50">
                        <p>{{ $produit->description }}</p>
                        <p>{{ $produit->quantity }}</p>
                        <p>{{ number_format($produit->price->unit_amount / 100,2,',','.') }}&nbsp; <b class="uppercase">{{ $produit->price->currency }}</b></p>
                    </div>
                @endforeach 

            </div>
            
        </div> --}}

        <div class="flex flex-row max-sm:flex-col max-sm:text-center max-sm:gap-4 max-sm:w-full justify-between p-8">
            <a href="{{ route('accueil') }}" class=><button class="py-2 px-4 bg-second text-white font-dmsans rounded shadow-lg ">Rediriger vers l'accueil</button></a>
            <a href="{{ route('boutique') }}" class=><button class="py-2 px-4 bg-rose-500 text-white font-dmsans rounded shadow-lg ">Continuer vos achats</button></a>
        </div>


    </div>



</div>


@endsection

