@extends('layouts.client')

@section('content')
    <div class="w-screen bg-third pt-3">

        <!-- Alerts succes ou refus -->
        @if(session('success'))
          <div class="alert alert-success w-5/6 mx-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
              <span>{{ session('success') }}</span>
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-error w-5/6 mx-auto">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('error') }}</span>
          </div>
        @endif

        <div class="max-w-7xl mx-auto grid md:grid-cols-3 max-md:grid-cols-1 gap-3">

          {{-- Image section --}}
          <div class="md:col-span-2">

            {{-- Medium/Big screen --}}
            <div class="grid grid-cols-2 gap-4 max-sm:hidden ">
              <div><img src="{{ asset('images/produits/' . $bijou->photo1) }}" 
                alt="Photo 1" class="w-full aspect-square object-cover shadow-lg"></div>
              <div><img src="{{ asset('images/produits/' . $bijou->photo2) }}" 
                alt="Photo 2" class="w-full aspect-square object-cover shadow-lg"></div>
            </div>

            {{-- Mobile screen --}}
            <div class="carousel max-w-sm aspect-square object-cover md:hidden shadow-lg">

              <div id="slide1" class="carousel-item relative w-full">
                  <img src="{{ asset('images/produits/' . $bijou->photo1) }}" class="w-full" />
                  <div class="absolute flex justify-between transform -translate-y-1/2 right-5 top-1/2">
                      <a href="#slide2" class="btn btn-circle">❯</a>
                  </div>
                </div> 
                <div id="slide2" class="carousel-item relative w-full">
                  <img src="{{ asset('images/produits/' . $bijou->photo2) }}" class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a> 
                    </div>
                </div> 
            </div>

          </div>

          <div class="">

          </div>



        </div>
    </div>
@endsection