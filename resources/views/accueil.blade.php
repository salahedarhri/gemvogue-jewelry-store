@extends('layout')

@section('content')

  <div class="w-full h-largeHeight bg-top bg-no-repeat bg-cover" style="background-image:url({{ asset('images/composants/landing-md.jpg') }})">
    <div class="w-full h-full relative">

        <div class="absolute left-10 md:top-1/2 md:right-2/3 p-4  max-md:top-3/4 max-md:left-1/2">
          <p class="text-3xl text-whiteBeige font-serif max-md:text-xl">Des bijouteries exquices près de vous</p>
        </div>

      <div class="w-full h-full bg-slate-800 bg-opacity-30"></div>
    </div>
  </div>

@endsection

