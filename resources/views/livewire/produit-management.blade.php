<div x-data="{ openModal:false, openDisplay:false, imageChoisi:'' }">

  <div class="flex flex-row max-sm:flex-col max-sm:text-center max-sm:gap-3 justify-between place-items-center p-3 mt-2 font-dmsans">
    <p class="text-lg max-md:text-md text-fourth">Liste des bijoux</p>
    <button @click="openModal=!openModal" class="text-white bg-fourth hover:saturate-150 transition rounded py-1 px-3 flex flex-row place-items-center gap-2">
      <i class="ri-add-circle-line text-2xl"></i>
      <p>Ajouter un bijou</p>
    </button>
  </div>

    {{-- Alerte pour Suppression --}}
  @if (session()->has('success'))
      <div role="alert" class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"                 
            x-data="{ show: true }"
            x-init="setTimeout(() => { show = false }, 50000)"
            x-show="show"
            @click="show = false">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('success') }}</span>
      </div>
  @endif
  @if (session()->has('error'))
    <div role="alert" class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20"                 
          x-data="{ show: true }"
          x-init="setTimeout(() => { show = false }, 50000)"
          x-show="show"
          @click="show = false">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('error') }}</span>
    </div>
  @endif

  <div x-cloak x-show="openModal">
    {{-- Modal associé au Bijou --}}
    @include('admin.modalBijouAdd')
  </div>

  <div x-cloak x-show="openDisplay">
    {{-- Modal associé au Bijou --}}
    @include('admin.modalBijouDisplay')
  </div>
    
  {{-- Tableau --}}
  <div class="overflow-x-auto border border-second rounded-lg py-1 m-2">
    <table class="table md:table-sm max-md:table-xs md:px-1 font-roboto">
      <thead class="text-lightBlue">
        <tr class="border-b-third text-fourth">
            <th class="max-lg:hidden">Photo</th>
            <th>Nom</th>
            <th>type</th>
            <th>Prix</th>
            <th class="max-lg:hidden">Description</th>
            <th class="max-lg:hidden">Collection</th>
            <th class="max-lg:hidden">Métal</th>
            <th class="max-lg:hidden">Qte</th>
            <th class="text-center hover:text-fourth transition">Action</th>
        </tr>
      </thead>
      <tbody >
        @foreach($bijoux as $bijou)
          <tr class="border-b-third hover:bg-third transition-all">
            <td class="max-lg:hidden flex justify-center align-center gap-1">
              <div class="avatar" @click="openDisplay= true; imageChoisi='{{ asset('images/produits/compressed/'.$bijou->photo1)}}'">
                <div class="mask h-8 w-8 p-0 rounded shadow">
                  <img src="{{ asset('images/produits/compressed/'.$bijou->photo1) }}" alt="{{$bijou->photo1}}"/>
                </div>
              </div>
              <div class="avatar" @click="openDisplay= true; imageChoisi='{{ asset('images/produits/compressed/'.$bijou->photo2)}}'">
                <div class="mask h-8 w-8 p-0 rounded shadow">
                  <img src="{{ asset('images/produits/compressed/'.$bijou->photo2) }}" alt="{{$bijou->photo2}}"/>
                </div>
              </div>
            </td>
            <td> {{ $bijou->nom }}</td>
            <td> {{ $bijou->type }}</td>
            <td> {{ $bijou->prix }} DH</td>
            <td class="max-lg:hidden">{{ $bijou->description }}</td>
            <td class="max-lg:hidden">{{ $bijou->collection }}</td>
            <td class="max-lg:hidden">{{ $bijou->type_metal }}</td>
            <td class="max-lg:hidden">{{ $bijou->qte_stock }}</td>
            <td class="flex flex-row max-sm:flex-col justify-center align-center place-items-center text-center gap-6 max-sm:gap-4 max-sm:py-2"> 
              <a wire:navigate href="{{ route('manageBijou',[ 'id' => $bijou->id ])}}">
                <i class="ri-edit-line text-white bg-second hover:saturate-150 transition text-2xl p-1 rounded shadow"></i>
              </a>
              <button wire:click="SupprimerBijou({{ $bijou->id }})" 
                wire:confirm="Voulez-vous vraiment supprimer le bijou {{$bijou->name}} ?">
                <i class="ri-close-large-line text-white bg-red-700 hover:saturate-150 transition text-2xl p-1 rounded shadow"></i>
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 p-4">
    {{$bijoux->links()}}
  </div>

</div>
  