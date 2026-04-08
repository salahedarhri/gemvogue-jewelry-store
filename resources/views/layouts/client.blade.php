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
      <p class="text-sm animate-translate">
        L'hiver est là ! profitez d'un collier cadeau jusqu'au fin d'année pour tous vos achats (dernier délai le 30 août 2026)</p>
    </a>
  </div>

  {{-- Navbar  --}}
  @include('composants.navbar')

  {{-- Contenu  --}}
  @yield('content')
  
  {{-- Footer --}}
  @include('composants.navbar')

  {{-- Toaster pour notifications --}}
  @include('composants.toast')


  @livewireScriptConfig
</body>
</html>