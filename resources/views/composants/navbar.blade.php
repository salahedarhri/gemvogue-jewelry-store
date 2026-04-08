  <nav class="w-full font-dmsans bg-third border-b border-second" x-data="{ nav:'{{request()->route()->getName()}}' }">
    <nav class="cabin flex justify-between p-3 max-w-7xl mx-auto text-first">
  
      <div class="md:w-1/3 md:justify-start flex gap-10 max-lg:gap-4 items-center max-md:hidden">
        <a wire:navigate href="{{ route('accueil') }}" x-bind:class="{ 'underline decoration-fourth': nav==='accueil' }"
        class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">Accueil</a>
        <a wire:navigate href="{{ route('boutique') }}" x-bind:class="{ 'underline decoration-fourth': nav==='boutique' }"
        class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">Boutique</a>
        <a wire:navigate href="{{ route('apropos') }}" x-bind:class="{ 'underline decoration-fourth': nav==='apropos' }"
        class="text-md cursor-pointer hover:translate-x-2 transition-transform duration-300 ease-in-out">À propos</a>
      </div>
      <div class="md:w-1/3 md:justify-center flex items-center">
        <a href="{{ route('accueil')}}" class="flex">
          <p class="text-2xl font-playfair">GemVogue</p>
        </a>
      </div>

      <div class="md:w-1/3 md:justify-end flex items-center">

      <div class="indicator mx-4"
            x-data="{ 
              count: {{ Cart::instance('cart')->content()->count() }},
              init() {
                  window.addEventListener('produit-ajoute', () => {
                  this.count++;
                });
              }
          }">
          <a wire:navigate href="{{ route('panier')}}">
              <span 
                  x-show="count > 0"
                  x-text="count"
                  class="indicator-item badge badge-secondary text-white h-3 p-2">
              </span>
              <img src="{{ asset('images/composants/logo/shoppingb.png')}}" alt="cart" class="w-7 h-auto hover:translate-x-1 transition-transform duration-300 ease-in-out">
          </a>
      </div>
      
        @auth
          <div class="dropdown dropdown-end max-md:hidden">
            <div tabindex="0" role="button" class="m-1 hover:translate-x-1 transition"><i class="ri-user-fill text-2xl p-1 border-2 border-second border-opacity-20 rounded-lg shadow"></i></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="{{ route('dashboard')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">Espace Client</a></li>
              <li><a href="{{ route('register')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">S'inscrire</a></li>
            </ul>
          </div>  
        @else
          <div class="dropdown dropdown-end max-md:hidden">
            <div tabindex="0" role="button" class="m-1 hover:translate-x-1 transition"><i class="ri-user-fill text-2xl p-1 border-2 border-second border-opacity-20 rounded-lg shadow"></i></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="{{ route('login')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">Connexion</a></li>
              <li><a href="{{ route('register')}}" class="hover:bg-second hover:text-white transition ease-in-out text-base">S'inscrire</a></li>
            </ul>
          </div>  
        @endauth

        <div class="dropdown dropdown-bottom dropdown-end md:hidden text-first">
          <label tabindex="0"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="150px" height="150px" class="w-8 h-8 ml-3 fill-first">
            <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/></svg></label>
          <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-48">
            <li><a href="/" class="text-base focus:bg-second" >Accueil</a></li>
            <li><a href="/boutique" class="text-base focus:bg-second" >Boutique</a></li>
            <li><a href="/apropos" class="text-base focus:bg-second">À propos</a></li>
            @auth
            <li><a href="/dashboard" class="text-base bg-emerald-200 focus:bg-second">Espace Client</a></li>
            @else
            <li><a href="{{ route('login') }}" class="text-base focus:bg-second" >Connexion</a></li>
            <li><a href="{{ route('register') }}" class="text-base focus:bg-second" >Inscription</a></li>
            @endauth
          </ul>
        </div>

      </div>


    </nav>
  </nav>