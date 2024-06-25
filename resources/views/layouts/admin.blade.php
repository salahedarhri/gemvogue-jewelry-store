<!DOCTYPE html>
<html lang="fr" data-theme="cupcake">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>GemVogue | Espace Admin</title>

  <!-- Tailwind + JS -->
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  
</head>
<body x-data="{ nav:'{{ request()->route()->getName() }}' }" class="bg-neutral-100 min-h-screen text-black antialiased" >

  {{-- SideBar --}}
  <div class="fixed left-0 top-0 w-64 h-full p-4 pr-0 max-md:hidden bg-gradient-to-b from-secondDarker to-fourth">
    <a href="{{ route('accueil') }}" class="flex items-center pb-4 border-b border-b-third">
      <img src="{{ asset('images/composants/logo/ring-logo (2).png') }}" alt="logo" class="w-8 h-auto invert">
      <span class="text-lg font-bold text-third ml-3 font-dmsans">GemVogue</span>
    </a>
    <ul class="font-dmsans">
      <li>
        <a wire:navigate href="{{ route('adminPanel') }}" 
            x-bind:class="{ 'bg-gradient-to-r from-pink-700 to-rose-500 text-third ':nav==='adminPanel'}"
            class="flex items-center py-2 px-4 text-whiteShade focus:bg-fourth focus:text-white rounded-l-xl">
          <i class="ri-home-2-line mr-3 text-xl"></i>
          <span x-bind:class="{ 'font-semibold':nav==='adminPanel'}">Dashboard</span></a>
      </li>
      <li>
        <a wire:navigate href="{{ route('adminUsers') }}" 
            x-bind:class="{ 'bg-gradient-to-r from-pink-700 to-rose-500 text-third ':nav==='adminUsers'}"
            class="flex items-center py-2 px-4 text-whiteShade focus:bg-fourth focus:text-white rounded-l-xl">
          <i class="ri-user-line mr-3 text-xl"></i>
          <span x-bind:class="{ 'font-semibold':nav==='adminUsers'}">Utilisateurs</span></a>
      </li>
      <li>
        <a wire:navigate href="{{ route('adminBijoux') }}" 
            x-bind:class="{ 'bg-gradient-to-r from-pink-700 to-rose-500 text-third ':nav==='adminBijoux'}"
            class="flex items-center py-2 px-4 text-whiteShade focus:bg-fourth focus:text-white rounded-l-xl">
          <i class="ri-vip-diamond-line mr-3 text-xl"></i>
          <span x-bind:class="{ 'font-semibold':nav==='adminBijoux'}">Produits</span></a></li>
      <li>
        <a wire:navigate href="{{ route('adminCommandes')}}" 
            x-bind:class="{ 'bg-gradient-to-r from-pink-700 to-rose-500 text-third ':nav==='adminCommandes'}"
            class="flex items-center py-2 px-4 text-whiteShade focus:bg-fourth focus:text-white rounded-l-xl">
          <i class="ri-shopping-bag-2-line mr-3 text-xl"></i>
          <span x-bind:class="{ 'font-semibold':nav==='adminCommandes'}">Commandes</span></a></li>
      <li>
        <a wire:navigate href="{{ route('adminMessages')}}" 
            x-bind:class="{ 'bg-gradient-to-r from-pink-700 to-rose-500 text-third':nav==='adminMessages'}"
            class="flex items-center py-2 px-4 text-whiteShade focus:bg-fourth focus:text-white rounded-l-xl">
          <i class="ri-chat-1-line mr-3 text-xl"></i>
          <span x-bind:class="{ 'font-semibold':nav==='adminMessages'}">Messages</span></a></li>
      <li>
        <a wire:navigate href="{{ route('adminNewsletters')}}" 
            x-bind:class="{ 'bg-gradient-to-r from-pink-700 to-rose-500 text-third':nav==='adminNewsletters'}"
            class="flex items-center py-2 px-4 text-whiteShade focus:bg-fourth focus:text-white rounded">
          <i class="ri-mail-line mr-3 text-xl"></i>
          <span x-bind:class="{ 'font-semibold':nav==='adminNewsletters'}">Newsletter</span></a></li>
    </ul>
  </div>

  <div class="w-[calc(100%-256px)] md:ml-64 max-md:w-full">

    {{-- Barre de haut --}}
    <div class="py-2 px-6 bg-white flex items-center shadow-md">

        {{-- Mobile seulement --}}
        <div class="dropdown dropdown-bottom md:hidden font-dmsans">
          <label tabindex="0" class="btn m-1 bg-neutral-100 hover:bg-neutral-300 border-neutral-100 hover:border-neutral-500"><i class="ri-menu-fill text-lg"></i></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-fourth text-third">
            <li class="rounded-full hover:font-semibold hover:bg-third hover:text-fourth transition-all"><a wire:navigate href="{{ route('adminPanel') }}">
            <i class="ri-home-2-line mr-3 text-2xl"></i>Dashboard</a></li>
            <li class="rounded-full hover:font-semibold hover:bg-third hover:text-fourth transition-all"><a wire:navigate href="{{ route('adminUsers') }}">
            <i class="ri-account-circle-line mr-3 text-2xl"></i>Utilisateurs</a></li>
            <li class="rounded-full hover:font-semibold hover:bg-third hover:text-fourth transition-all"><a wire:navigate href="{{ route('adminBijoux')}}">
              <i class="ri-vip-diamond-line mr-3 text-2xl"></i>Produits</a></li>
            <li class="rounded-full hover:font-semibold hover:bg-third hover:text-fourth transition-all"><a wire:navigate href="{{ route('adminCommandes')}}">
              <i class="ri-shopping-bag-2-line mr-3 text-2xl"></i>Commandes</a></li>
            <li class="rounded-full hover:font-semibold hover:bg-third hover:text-fourth transition-all"><a wire:navigate href="{{ route('adminMessages')}}">
              <i class="ri-chat-1-line mr-3 text-2xl"></i>Messages</a></li>
            <li class="rounded-full hover:font-semibold hover:bg-third hover:text-fourth transition-all"><a wire:navigate href="{{ route('adminNewsletters')}}">
              <i class="ri-mail-line mr-3 text-2xl"></i>Newsletter</a></li>
          </ul>
        </div>

        <ul class="flex items-center ml-4 max-md:hidden">
          <li class="mr-2"><a href="#" class="text-neutral-500 hover:text-neutral-700 font-semiBold">Dashboard</a></li>
          <li class="mr-2 text-neutral-500">/</li>
          <li class="mr-2 text-neutral-500">Analytiques</li>
        </ul>
      
      <ul class="ml-auto">
        <li class="flex items-center">
          {{-- Profil --}}
          <div class="dropdown dropdown-end p-0 m-0">
            <label tabindex="0" class="btn bg-neutral-100 hover:bg-red-100 border-neutral-100 hover:border-red-300 px-2">
              <i class="ri-account-circle-fill text-4xl text-darkShade"></i>
            </label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow rounded-box w-52 bg-white">
              <li class="hover:bg-red-100 rounded-box">
                <a href="{{ route('profile.edit') }}" class="hover:text-black">Profil</a>
              </li>
              <li class="hover:bg-red-100 rounded-box">
                <form method="POST" action="{{ route('logout') }}" class="hover:text-black">
                  @csrf 
                  <input type="submit" value="Se déconnecter">
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>

    </div>

    {{-- Main --}}
    <main class="font-tables font-roboto">
      {{ $slot }}
    </main>

  </div>


</body>
</html>