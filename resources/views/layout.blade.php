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
<body class="bg-lighterBeige min-h-screen">

  <!-- Barre Navigation -->
  <div class="navbar bg-lighterBeige">
    <div class="flex-1 ">
        <a href="/"><img src="{{asset('images/ring-logo (2).png')}}" class="h-9 w-auto ml-2 max-sm:h-7" alt="logo"></a>
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
            <img src="{{asset('images/shoppingb.png')}}" alt="Cart" class="h-7 w-auto">
          </a>
        </div>

      <!-- medium to small screen -->
      <div class="dropdown dropdown-bottom dropdown-end md:hidden">
        <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 m-2"><path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
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

  <!-- Alerts succes ou refus -->
  @if(session('success'))
    <div class="alert alert-success w-5/6 m-auto mt-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif
  @if(session('error'))
  <div class="alert alert-error">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span>{{ session('error') }}</span>
  </div>
  @endif

  <!-- Contenu -->
  @yield('content')
  
  <footer class="footer max-md:footer-center items-center p-4 bg-neutral text-neutral-content mt-auto">
    <aside class="items-center grid-flow-col">
      <img src="{{asset('images/ring-logo (2).png')}}" alt="logo" class="w-auto h-9 mx-1 invert">
      <p>gemVogue © 2023 - All right reserved</p>
    </aside> 
  </footer>

</body>
</html>