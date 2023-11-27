<!DOCTYPE html>
<html lang="en" data-theme="autumn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>GemVogue</title>

  <!-- Tailwind & Fonts -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

</head>
<body class="noise min-h-screen overflow-x-hidden antialiased ">
    {{-- Banner --}}
  <div class="w-full bg-rose-900 text-whiteShade text-center p-2 max-md:hidden">
    <a href="{{ route('boutique') }}">
      <p class="text-sm animate-translate">L'hiver est là ! profitez d'un collier cadeau jusqu'au fin d'année pour tous vos achats (dernier délai le 30 décembre 2023)</p>
    </a>
  </div>

  <!-- Barre Navigation -->
  <div class="navbar bg-transparent py- absolute text-whiteShade z-10">
    <div class="flex-1 ">
        <a href="/"><img src="{{asset('images/composants/logo/ring-logo (2).png')}}" class="h-9 w-auto ml-2 max-sm:h-7 invert" alt="logo"></a>
        <a href="/" class="font-semibold normal-case text-xl max-sm:text-md p-2">GemVogue</a>
    </div>

    <div class="flex-none">
      <!-- for medium and big screen -->
      <ul class="menu menu-horizontal px-2 max-md:hidden">
        <li><a href="/" class="text-base">Accueil</a></li>
        <li><a href="/boutique" class="text-base">Boutique</a></li>
        <li><a href="/apropos" class="text-base">À propos</a></li>
        @auth
        <li><a href="/dashboard" class="text-base bg-emerald-600 hover:bg-emerald-500 bg-opacity-40">Espace Client</a></li>
        @else
        <li><a href="{{ route('login') }}" class="text-base">Connexion</a></li>
        <li><a href="{{ route('register') }}" class="text-base">Inscription</a></li>
        @endauth
      </ul>

      <!-- Systeme de Panier : -->

        <div class="indicator m-2">
          <a href="{{ route('panier')}}">
            @if( Cart::instance('cart')->content()->count() > 0)
            <span class="indicator-item badge badge-secondary h-3 p-2">
              {{ Cart::instance('cart')->content()->count() }} </span> 
              @endif
            <img src="{{asset('images/composants/logo/shoppingb.png')}}" alt="Cart" class="h-7 w-auto invert">
          </a>
        </div>

      <!-- medium to small screen -->
      <div class="dropdown dropdown-bottom dropdown-end md:hidden text-black">
        <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 m-2 fill-whiteShade">
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
    </div>

  </div>

  <!-- Contenu -->
  @yield('content')
  
  <footer class="footer max-md:footer-center items-center p-4 bg-darkShade text-whiteShade mt-auto">
    <aside class="items-center grid-flow-col">
      <img src="{{asset('images/composants/logo/ring-logo (2).png')}}" alt="logo" class="w-auto h-9 mx-1 invert">
      <p>gemVogue © 2023 - All right reserved</p>
    </aside> 
  </footer>

</body>
</html>