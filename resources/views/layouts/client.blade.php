<!DOCTYPE html>
<html lang="en" data-theme="autumn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/composants/logo/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/composants/logo/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/composants/logo/favicon-16x16.png') }}">

  <title>GemVogue</title>

  <!-- Tailwind & Fonts -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">

</head>
<body class="overflow-x-hidden antialiased font-swap">

    {{-- Banner --}}
  <div class="w-full text-center p-2 max-md:hidden bg-second text-third font-dmsans">
    <a href="{{ route('boutique') }}">
      <p class="text-sm animate-translate">L'hiver est là ! profitez d'un collier cadeau jusqu'au fin d'année pour tous vos achats (dernier délai le 30 décembre 2023)</p>
    </a>
  </div>

  <!-- Navbar -->
  <div class="w-full font-dmsans bg-third border-b border-second">
    <nav class="cabin flex justify-between px-6 py-3 max-w-5xl mx-auto text-first">
  
      <div class="flex gap-10 items-center max-md:hidden">
        <a href="{{ route('accueil') }}" class="text-md cursor-pointer">Accueil</a>
        <a href="{{ route('boutique') }}" class="text-md cursor-pointer">Boutique</a>
        <a href="{{ route('apropos') }}" class="text-md cursor-pointer">À propos</a>
      </div>
      <div class="flex items-center">
        <a href="{{ route('accueil')}}" class="flex">
          <p class="text-2xl font-playfair">GemVogue</p>
        </a>
      </div>

      <div class="flex items-center">

        <div class="indicator mx-4">
          <a href="{{ route('panier')}}">
            @if( Cart::instance('cart')->content()->count() > 0)
            <span class="indicator-item badge badge-secondary h-3 p-2">
              {{ Cart::instance('cart')->content()->count() }} </span> 
              @endif
              <img src="{{ asset('images/composants/logo/shoppingb.png')}}" alt="cart" srcset="" class="w-6 h-auto">
            </a>
        </div>
        
        @auth
        <a href="{{ route('dashboard')}}"><i class="ri-user-fill text-2xl px-4 border-x border-second"></i></a>
        @else
        <a href="{{ route('login') }}"><i class="ri-user-fill text-2xl px-4 border-x border-second"></i></a>
        @endauth



        <div class="dropdown dropdown-bottom dropdown-end md:hidden text-first">
          <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 ml-3 fill-first">
            <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-48">
            <li><a href="/" class="text-base" >Accueil</a></li>
            <li><a href="/boutique" class="text-base" >Boutique</a></li>
            <li><a href="/apropos" class="text-base">À propos</a></li>
            @auth
            <li><a href="/dashboard" class="text-base bg-emerald-200">Espace Client</a></li>
            @else
            <li><a href="{{ route('login') }}" class="text-base" >Connexion</a></li>
            <li><a href="{{ route('register') }}" class="text-base" >Inscription</a></li>
            @endauth
          </ul>
        </div>

        <a href="{{ route('register') }}" class=" pl-5 pr-3 max-md:hidden">S'inscrire</a>

      </div>


    </nav>
  </div>

  <!-- Contenu -->
  @yield('content')
  
  <!-- Footer -->
  <footer class="w-full border-t border-second bg-third font-martel">
    <div class="grid lg:grid-cols-5 md:grid-cols-2 max-md:grid-cols-1 max-lg:text-center max-w-7xl mx-auto max-md:p-3 md:gap-4 max-md:gap-2 md:p-6">

      <!-- Email -->
      <div class="lg:col-span-2 max-lg:col-span-1 p-4">
        <p class="text-xl font-semibold font-playfair text-second">Rejoignez notre NewsLetter</p>
        <p class="py-4 text-sm">S'abonner à GemVogue vous permet de rester informé(e) des dernières tendances et designs de l'industrie de la bijouterie.</p>
        <div class="flex max-lg:justify-center font-playfair">
          <input type="email" name="" id="" placeholder="Email" class="rounded-l-full max-md:w-36 py-2 appearance-none">
          <input type="submit" value="Envoyer" class="rounded-r-full py-2 px-5 bg-second text-third">
        </div>  
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">Boutique</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a href="">Collections</a>
          <a href="">Bagues</a>
          <a href="">Bracelets</a>
          <a href="">Collier</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">À propos</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a href="">À propos de nous</a>
          <a href="">Contact</a>
          <a href="">Politique de confidentialité</a>
          <a href="">FAQ</a>
        </div>
      </div>
    
      <div class="flex flex-col font-semibold">
        <p class="text-second text-xl py-2 font-playfair">Nos contacts</p>
        <div class="flex flex-col justify-evenly gap-2 text-sm p-2">
          <a href="mailto:arhri.salah@gmail.com">arhri.salah@gmail.com</a>
          <a href="">+212611223344</a>
        </div>
      </div>
    
    </div>
    
    {{-- <div class="grid lg:grid-cols-5 md:grid-cols-2 max-md:grid-cols-1 max-lg:text-center max-w-7xl mx-auto max-md:p-3 text-first md:gap-4 max-md:gap-2 md:p-6">
  
      <!-- Email -->
      <div class="lg:col-span-2 max-lg:col-span-1 p-4">
        <p class="text-xl font-semibold">Join our email list</p>
        <p class="py-4">Subscribing to Jewels allows you to stay updated on the latest trends and designs in the jewelry industry.</p>
        <div class="flex max-lg:justify-center">
          <input type="email" name="" id="" placeholder="Email" class="rounded-l-full max-md:w-36 py-2 appearence-none">
          <input type="submit" value="Send" class="rounded-r-full py-2 px-5 bg-second text-third">
        </div>  
      </div>
  
      <div class="flex flex-col">
        <p class="text-second text-xl py-2">Shop</p>
        <div class="flex flex-col justify-evenly">
          <a href="">Collections</a>
          <a href="">Rings</a>
          <a href="">Bracelets</a>
          <a href="">Chains</a>
          <a href="">Wedding Rings</a>
        </div>
      </div>
  
      <div class="flex flex-col">
        <p class="text-second text-xl py-2">About</p>
        <div class="flex flex-col justify-evenly">
          <a href="">About us</a>
          <a href="">Contact</a>
          <a href="">Privacy Policy</a>
          <a href="">FAQ's</a>
        </div>
      </div>
  
      <div class="flex flex-col">
        <p class="text-second text-xl py-2">Our Contacts</p>
        <div class="flex flex-col justify-evenly">
          <a href="mailto:arhri.salah@gmail.com">arhri.salah@gmail.com</a>
          <a href="">+212611223344</a>
        </div>
      </div>
  
    </div> --}}
  </footer>

</body>
</html>