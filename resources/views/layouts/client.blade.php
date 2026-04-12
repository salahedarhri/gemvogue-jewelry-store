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

{{-- Fixed navbar --}}
  <nav id="navbar" class="fixed top-0 w-full z-50">

    {{-- Banner --}}
    <div class="w-full text-center p-2 max-md:hidden bg-fourthDarker text-white font-dmsans">
      <a wire:navigate href="{{ route('boutique') }}">
        <p class="text-sm animate-translate">
          Le primtemps est là ! profitez d'un collier cadeau pour tous vos achats (dernier délai le 1er juin 2026)</p>
      </a>
    </div>

    {{-- Navbar  --}}
    @include('composants.navbar')
  </nav>

  {{-- Contenu & Adjusted padding for navbar --}}
  <div id="main-content"
     x-data="{ adjustPadding() { $el.style.paddingTop = document.getElementById('navbar').offsetHeight + 'px' } }"
     x-init="adjustPadding()"
     @resize.window="adjustPadding()">
    @yield('content')
  </div>
  
  {{-- Footer --}}
  @include('composants.footer')

  {{-- Toaster pour notifications --}}
  @include('composants.toast')


  @livewireScriptConfig
</body>
</html>