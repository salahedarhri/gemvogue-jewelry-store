<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>GemVogue | Espace Admin</title>

  <!-- Roboto Font + icons -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet"> 
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

  <!-- Tailwind + JS -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  
</head>
<body class="bg-neutral-100 min-h-screen text-black">

  {{-- SideBar --}}
  <div class="fixed left-0 top-0 w-64 h-full p-4 max-md:hidden bg-gradient-to-b from-secondDarker to-second">
    <a href="#" class="flex items-center pb-4 border-b border-b-third">
      <img src="{{ asset('images/composants/logo/ring-logo (2).png') }}" alt="logo" class="w-8 h-auto invert">
      <span class="text-lg font-bold text-third ml-3 font-sans">GemVogue</span>
    </a>
    <ul>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-whiteShade focus:bg-rose-700 focus:text-white rounded">
          <i class="ri-home-2-line mr-3 text-xl"></i>
          <span class="">Dashboard</span></a></li>
      <li>
        <a href="{{route('admin.utilisateurs.index')}}" class="flex items-center py-2 px-4 text-whiteShade focus:bg-rose-700 focus:text-white rounded">
          <i class="ri-account-circle-line mr-3 text-xl"></i>
          <span class="">Utilisateurs</span></a></li>
      <li>
        <a href="{{route('admin.bijoux.index')}}" class="flex items-center py-2 px-4 text-whiteShade focus:bg-rose-700 focus:text-white rounded">
          <i class="ri-vip-diamond-line mr-3 text-xl"></i>
          <span class="">Produits</span></a></li>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-whiteShade focus:bg-rose-700 focus:text-white rounded">
          <i class="ri-shopping-cart-2-line mr-3 text-xl"></i>
          <span class="">Achats</span></a></li>
    </ul>
  </div>

  <div class="w-[calc(100%-256px)] md:ml-64 max-md:w-full">

    {{-- Barre de haut --}}
    <div class="py-2 px-6 bg-white flex items-center shadow-md">

        {{-- Mobile seulement --}}
        <div class="dropdown dropdown-bottom md:hidden">
          <label tabindex="0" class="btn m-1 bg-neutral-100 hover:bg-neutral-300 border-neutral-100 hover:border-neutral-500"><i class="ri-menu-fill text-lg"></i></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-darkShade text-whiteShade">
            <li><a href="{{ route('admin.utilisateurs.index')}}"><i class="ri-account-circle-line mr-3 text-2xl"></i>Utilisateurs</a></li>
            <li><a href="{{ route('admin.bijoux.index')}}"><i class="ri-vip-diamond-line mr-3 text-2xl"></i>Produits</a></li>
            <li><a><i class="ri-shopping-cart-2-line mr-3 text-2xl"></i>Achats</a></li>
          </ul>
        </div>

        <ul class="flex items-center ml-4 max-md:hidden">
          <li class="mr-2"><a href="#" class="text-neutral-500 hover:text-neutral-700 font-semiBold">Dashboard</a></li>
          <li class="mr-2 text-neutral-500">/</li>
          <li class="mr-2 text-neutral-500">Analytiques</li>
        </ul>
      
      <ul class="ml-auto">
        <li class="flex items-center">
          <i class="ri-search-line text-xl mr-2 text-neutral-700"></i>
          {{-- Recherche --}}
          <form action="" method="post">
            <input type="text" placeholder="Rechercher" class="rounded appearence-none border-neutral-300 focus:border-neutral-300 mr-2 h-10 max-md:w-32">
          </form>
          {{-- Profil --}}
          <div class="dropdown dropdown-end p-0 m-0">
            <label tabindex="0" class="btn bg-neutral-100 hover:bg-red-100 border-neutral-100 hover:border-red-300 px-2">
              <i class="ri-account-circle-fill text-4xl text-darkShade"></i>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-white">
              <li class="hover:bg-red-100"><a class="hover:text-black ">Profil</a></li>
              <li class="hover:bg-red-100">
                <form method="POST" action="{{ route('logout') }}" class="hover:text-black ">
                @csrf <input type="submit" value="Se déconnecter" ></form>
              </li>
            </ul>
          </div>
        </li>
      </ul>

    </div>

    {{-- Main --}}
    <div class="font-tables">
      @yield('content')
    </div>

  </div>


</body>
</html>