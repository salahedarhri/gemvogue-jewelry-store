<div x-data="{ openModalModify:false, openModalAdd:false }">

    {{-- Alerte pour Suppression --}}
    @if (session()->has('success'))
      <div role="alert"                
                x-data="{ show: true }"
                x-show="show"
                @click="show = false" class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('success') }}</span>
      </div>
    @endif
    @if (session()->has('error'))
      <div role="alert"                 
                x-data="{ show: true }"
                x-show="show"
                @click="show = false" class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('error') }}</span>
      </div>
    @endif
  
    <p class="text-lg max-md:text-md text-fourth p-3 mt-3">Liste des E-mails Newsletters</p>
    
    <div class="flex flex-row max-sm:flex-col max-sm:text-center max-sm:gap-3 justify-between place-items-center p-3 mt-2 font-dmsans">
      <input type="text" wire:model.live.debounce.300ms="search" placeholder="Rechercher par email.." class="rounded-xl shadow-sm focus:ring-fourth  focus:border-fourth border border-second  placeholder-slate-400 transition">
      <button @click="openModalAdd=!openModalAdd" class="text-white bg-fourth hover:saturate-150 transition rounded py-1 px-3 flex flex-row place-items-center gap-2">
        <i class="ri-add-circle-line text-2xl "></i>
        <p>Ajouter un email</p></button>
    </div>
  
    <div x-cloak x-show="openModalModify">
      {{-- Modal associé à l'option --}}
      @include('admin.modalNewsletterModify')
    </div>

    <div x-cloak x-show="openModalAdd">
      {{-- Modal associé à l'option --}}
      @include('admin.modalEmailAdd')
    </div>
      
      {{-- Tableau --}}
      <div wire:loading.class="opacity-50" class="overflow-x-auto border border-second rounded-lg py-1 m-2">
        <table class="table md:table-sm max-md:table-xs md:px-1 font-roboto">
          <thead class="text-lightBlue">
            <tr class="border-b-third text-fourth">
              <th>Email</th>
              <th class="text-center hover:text-fourth transition">Action</th>
            </tr>
          </thead>
          <tbody >
            @foreach($emails as $email)
              <tr class="border-b-third hover:bg-third transition-all">
                <td> {{ $email->email }}</td>
                <td class="flex flex-row max-sm:flex-col justify-center align-center place-items-center text-center gap-6 max-sm:gap-4 max-sm:py-2">
                  <button wire:key="email-{{ $email->email }}" wire:click="MontrerEmail('{{ $email->email }}',{{ $email->id }})" @click="openModalModify =! openModalModify">
                    <i class="ri-edit-line text-white bg-second hover:saturate-150 transition text-2xl p-1 rounded shadow"></i>
                  </button>
                  <button wire:key="email-{{ $email->id }}" wire:click="SupprimerEmail({{ $email->id }})"  wire:confirm="Voulez-vous vraiment supprimer l'email {{$email->name}} ?" >
                    <i class="ri-close-large-line text-white bg-red-700 hover:saturate-150 transition text-2xl p-1 rounded shadow"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  
      <div class="mt-4 p-4">
        {{$emails->links()}}
      </div>
  
  </div>
  