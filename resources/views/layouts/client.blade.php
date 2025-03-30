<!DOCTYPE html>
<html lang="en" data-theme="autumn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/composants/logo/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/composants/logo/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/composants/logo/favicon-16x16.png') }}">

  
  {!! SEO::generate() !!}

  <title>GemVogue</title>

  {{-- Tailwind & Fonts --}}
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

</head>
<body class="overflow-x-hidden antialiased font-swap">

  {{-- Banner --}}
  <div class="w-full text-center p-2 max-md:hidden bg-fourthDarker text-white font-dmsans">
    <a wire:navigate href="{{ route('boutique') }}">
      <p class="text-sm animate-translate">L'hiver est là ! profitez d'un collier cadeau jusqu'au fin d'année pour tous vos achats (dernier délai le 30 août 2024)</p>
    </a>
  </div>

  {{-- Navbar  --}}
  <nav class="w-full font-dmsans bg-third border-b border-second" x-data="{ nav:'{{request()->route()->getName()}}' }">
    <nav class="cabin flex justify-between p-3 max-w-7xl mx-auto text-first">
  
      <div class="md:w-1/3 md:justify-start flex gap-10 max-lg:gap-4 items-center max-md:hidden">
        <a wire:navigate href="{{ route('accueil') }}" x-bind:class="{ 'underline decoration-fourth': nav==='accueil' }"
        class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">Accueil</a>
        <a wire:navigate href="{{ route('boutique') }}" x-bind:class="{ 'underline decoration-fourth': nav==='boutique' }"
        class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">Boutique</a>
        <a wire:navigate href="{{ route('apropos') }}" x-bind:class="{ 'underline decoration-fourth': nav==='apropos' }"
        class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">À propos</a>
      </div>
      <div class="md:w-1/3 md:justify-center flex items-center">
        <a href="{{ route('accueil')}}" class="flex">
          <p class="text-2xl font-playfair">GemVogue</p>
        </a>
      </div>

      <div class="md:w-1/3 md:justify-end flex items-center">

        <div class="indicator mx-4">
          <a wire:navigate href="{{ route('panier')}}">
            @if( Cart::instance('cart')->content()->count() > 0)
              <span class="indicator-item badge badge-secondary text-white h-3 p-2">
                {{ Cart::instance('cart')->content()->count() }} </span> 
            @endif
            <img src="{{ asset('images/composants/logo/shoppingb.png')}}" alt="cart" class="w-7 h-auto hover:translate-x-1 transition-transform duration-300 ease-in-out">
          </a>
        </div>
      
        @auth
          <div class="dropdown dropdown-end max-md:hidden">
            <div tabindex="0" role="button" class="m-1 hover:translate-x-1 transition"><i class="ri-user-fill text-2xl p-1 border-2 border-second border-opacity-20 rounded-lg shadow"></i></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="{{ route('dashboard')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">Espace Client</a></li>
              <li><a href="{{ route('register')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">S'inscrire</a></li>
            </ul>
          </div>  
        @else
          <div class="dropdown dropdown-end max-md:hidden">
            <div tabindex="0" role="button" class="m-1 hover:translate-x-1 transition"><i class="ri-user-fill text-2xl p-1 border-2 border-second border-opacity-20 rounded-lg shadow"></i></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="{{ route('login')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">Connexion</a></li>
              <li><a href="{{ route('register')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">S'inscrire</a></li>
            </ul>
          </div>  
        @endauth

        <div class="dropdown dropdown-bottom dropdown-end md:hidden text-first">
          <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 ml-3 fill-first">
            <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-48">
            <li><a href="/" class="text-base focus:bg-second" >Accueil</a></li>
            <li><a href="/boutique" class="text-base focus:bg-second" >Boutique</a></li>
            <li><a href="/apropos" class="text-base focus:bg-second">À propos</a></li>
            @auth
            <li><a href="/dashboard" class="text-base bg-emerald-200 focus:bg-second">Espace Client</a></li>
            @else
            <li><a href="{{ route('login') }}" class="text-base focus:bg-second" >Connexion</a></li>
            <li><a href="{{ route('register') }}" class="text-base focus:bg-second" >Inscription</a></li>
            @endauth
          </ul>
        </div>

      </div>


    </nav>
  </nav>

  {{-- Contenu  --}}
  @yield('content')
  
  <!-- Footer -->
  <footer class="w-full border-t-2 border-second bg-third font-martel">
    <div class="grid lg:grid-cols-3 md:grid-cols-3 max-md:grid-cols-1 max-lg:text-center max-w-7xl mx-auto max-md:p-3 md:gap-4 max-md:gap-2 md:p-6">

       {{-- Email --}}
      {{-- <div class="lg:col-span-2 max-lg:col-span-1 p-4">
        <p class="text-xl font-semibold font-playfair text-second">Rejoignez notre NewsLetter</p>
        <p class="py-4 text-sm">S'abonner à GemVogue vous permet de rester informé(e) des dernières tendances et designs de l'industrie de la bijouterie.</p>
        <div class="flex max-lg:justify-center font-playfair">

          <form action="{{ route('Newsletter')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" class="rounded-l-full max-md:w-36 py-2 appearance-none">
            <input type="submit" value="Envoyer" class="rounded-r-full py-2 px-5 bg-second text-third hover:bg-secondDarker hover:text-white transition ">
          </form>
        </div>  
      </div> --}}
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">Boutique</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'boucles oreilles'])}}">Boucles d'oreilles</a>
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'Anneau'])}}">Bagues</a>
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'Bracelet'])}}">Bracelets</a>
            <a wire:navigate href="{{ route('boutiqueCategorie',['categorie' =>'Collier'])}}">Collier</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">À propos</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a wire:navigate href="{{ route('apropos')}}">À propos de nous</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">Nos contacts</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
        <a href="mailto:arhri.salah@gmail.com" target="_blank">arhri.salah@gmail.com</a>
        </div>
      </div>
    
    </div>
  </footer>

</body>
</html>