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
<body class="bg-slate-100 min-h-screen font-dash text-black">

  {{-- SideBar --}}
  <div class="fixed left-0 top-0 w-64 h-full bg-neutral p-4">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-100">
      <img src="{{ asset('images/composants/logo/ring-logo (2).png') }}" alt="logo" class="w-8 h-auto invert">
      <span class="text-xl font-bold text-white ml-3 font-sans">GemVogue</span>
    </a>
    <ul>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-gray-300 focus:bg-slate-500 focus:text-white rounded">
          <i class="ri-home-2-line mr-3 text-xl"></i>
          <span class="">Dashboard</span></a></li>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-gray-300 focus:bg-slate-500 focus:text-white rounded">
          <i class="ri-account-circle-line mr-3 text-xl"></i>
          <span class="">Utilisateurs</span></a></li>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-gray-300 focus:bg-slate-500 focus:text-white rounded">
          <i class="ri-vip-diamond-line mr-3 text-xl"></i>
          <span class="">Produits</span></a></li>
      <li>
        <a href="#" class="flex items-center py-2 px-4 text-gray-300 focus:bg-slate-500 focus:text-white rounded">
          <i class="ri-shopping-cart-2-line mr-3 text-xl"></i>
          <span class="">Achats</span></a></li>
    </ul>
  </div>

  <div class="w-[calc(100%-256px)] ml-64">

    {{-- Barre de haut --}}
    <div class="py-2 px-6 bg-white flex items-center shadow-md">
      {{-- partie gauche --}}
      <a href="#" class="text-xl text-slate-400 ">
        <i class="ri-menu-fill"></i>
        <ul class="flex items-center ml-4">
          <li class="mr-2"><a href="#" class="text-slate-500 hover:text-slate-700 font-semiBold">Dashboard</a></li>
          <li class="mr-2 text-slate-500">/</li>
          <li class="mr-2 text-slate-500">Analytiques</li>
        </ul>
      </a>
      
      <ul class="ml-auto">
        <li class="flex items-center">
          <i class="ri-search-line text-xl mr-2 text-slate-700"></i>
          {{-- Search --}}
          <form action="" method="post">
            <input type="text" placeholder="Rechercher" class="rounded appearence-none border-slate-300 focus:border-slate-300 mr-2 h-10">
          </form>
          {{-- Profile --}}
          <div class="dropdown dropdown-end p-0 m-0">
            <label tabindex="0" class="btn bg-slate-100 hover:bg-slate-300 border-slate-100 hover:border-slate-500 px-2">
              <i class="ri-account-circle-fill text-4xl text-neutral"></i>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-white text-md">
              <li><a>Profil</a></li>
              <li><a>Se déconnecter</a></li>
            </ul>
          </div>
        </li>
      </ul>

    </div>

    {{-- Main --}}
    @yield('content')

  </div>


</body>
</html>