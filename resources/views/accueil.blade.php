@extends('layouts.client')

@section('content')

    <!-- First part -->
    <div class="w-full bg-third">
      <div class="font-playfair grid md:grid-cols-2 max-md:grid-cols-1 justify-center align-center max-w-7xl mx-auto text-first lg:py-8">
        <div class="flex flex-col p-8 justify-evenly">
          <p class="md:text-4xl max-md:text-2xl font-semibold py-4">Your One-Stop Destination for Unique and Exquisite Jewelry Pieces</p>
          <p class="font-dmsans text-lg py-2">Here, we offer various types of jewelry, including necklaces, bracelets, earrings, and rings. From classic designs to modern styles, we have something for everyone.</p>
          <a href="#" class="bg-second text-third text-lg text-center p-3 w-52 rounded-l-full my-4">Shop the collection</a>
        </div>
      
        <div class="flex items-center">
          <img src="{{ asset('images/composants/landing-redhead.png')}}"
            alt="landing image" srcset="" class="object-cover align-center">
        </div>
    </div>
    </div>
    
    <!-- Second part -->
    <div class="font-playfair w-full bg-white text-first py-6">
      <p class="text-center text-2xl p-4">Our Collection</p>
  
      <div class="grid md:grid-cols-3 max-md:grid-cols-1 max-w-4xl mx-auto justify-between gap-12 md:py-6 max-md:items-center">
        <div class="relative aspect-square max-md:max-w-xs mx-auto">
          <img class="object-cover w-full h-full" src="{{ asset('images/composants/landing-earrings.png')}}" alt="landing earrings" srcset="">
          <a href="#" class="absolute top-3/4 left-0 bg-second text-third text-center p-2 w-48 rounded-r-full shadow-xl my-4">Ear Rings</a>
        </div>
        <div class="relative aspect-square max-md:max-w-xs mx-auto">
          <img class="object-cover w-full h-full" src="{{ asset('images/composants/landing-necklace.png')}}" alt="landing necklace" srcset="">
          <a href="#" class="absolute top-3/4 left-0 bg-second text-third text-center p-2 w-48 rounded-r-full shadow-xl my-4">Necklaces</a>
        </div>
        <div class="relative aspect-square max-md:max-w-xs mx-auto">
          <img class="object-cover w-full h-full" src="{{ asset('images/composants/landing-ring.png')}}" alt="landing ring" srcset="">
          <a href="#" class="absolute top-3/4 left-0 bg-second text-third text-center p-2 w-48 rounded-r-full shadow-xl my-4">Rings</a>
        </div>
      </div>
    </div>
  
    <!-- Third part -->
    <div class="font-playfair w-full bg-third">
     <div class="flex flex-col justify-evenly md:py-16 md:px-6 max-md:p-8 max-w-4xl mx-auto  text-center text-orange-950">
      <p class="text-2xl font-semibold md:pb-12 max-md:pb-6">A diamond is a woman's best friends!</p>
      <p class="font-dmsans max-md:text-sm">A diamond is a timeless symbol of beauty and friendship, making it the perfect gift for any woman.
        It is often said that diamonds are a woman's best friend, and for good reason.
        Not only does a diamond represent unwavering loyalty and devotion, but it is also a symbol of luxury,
        glamor and class. A diamond tells the world that you are proud of your loved one, and want them to have only the best.
        As Coco Chanel once said, "A diamond is eternity, it is real and it is unbreakable".</p>
     </div> 

  {{-- <div class="w-full h-largeHeight bg-top bg-no-repeat bg-cover" style="background-image:url({{ asset('images/composants/landing-md.jpg') }})">
    <div class="w-full h-full relative">

        <div class="absolute left-10 md:top-1/2 md:right-2/3 p-4  max-md:top-3/4 max-md:left-1/2">
          <p class="text-3xl text-whiteBeige font-serif max-md:text-xl">Des bijouteries exquices près de vous</p>
        </div>

      <div class="w-full h-full bg-slate-800 bg-opacity-30"></div>
    </div>
  </div> --}}

@endsection

