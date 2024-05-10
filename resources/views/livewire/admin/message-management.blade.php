<div>

    {{-- Alerte pour Suppression --}}
    @if (session()->has('success'))
      <div role="alert" class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"                     
            x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 5000)"
            x-show="show"
            @click="show = false">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('success') }}</span>
      </div>
    @endif
    @if (session()->has('error'))
      <div role="alert" class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20"                     
            x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 5000)" x-show="show" @click="show = false">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('error') }}</span>
      </div>
    @endif
    
    <div class="flex flex-row max-sm:flex-col max-sm:text-center max-sm:gap-3 justify-between place-items-center p-3 mt-3">
      <p class="text-lg max-md:text-md text-fourth ">Liste des messages</p>
    </div>
      
      {{-- Tableau --}}
      <div class="max-md:overflow-x-auto border border-second rounded-lg py-1 m-2">
        <table class="table md:table-sm max-md:table-xs md:px-1 font-roboto">
          <thead class="text-lightBlue">
            <tr class="border-b-third text-fourth">
                <th>Nom</th>
                <th>Prenom</th>
                <th class="max-lg:hidden">Email</th>
                <th>Message</th>
                <th class="max-lg:hidden">Telephone</th>
              <th class="text-center hover:text-fourth transition">Action</th>
            </tr>
          </thead>
          <tbody >
            @foreach($messages as $message)
              <tr class="border-b-third hover:bg-third transition-all ">
                <td>{{ $message->nom }}</td>
                <td>{{ $message->prenom }}</td>
                <td class="max-lg:hidden">{{ $message->email }}</td>
                <td class="hover:text-clip">{{ $message->message }}</td>
                <td class="max-lg:hidden">{{ $message->telephone }}</td>
                <td class="flex flex-row max-sm:flex-col justify-center align-middle place-items-center text-center gap-6 max-sm:gap-4 max-sm:py-2"> 
                  <a wire:navigate href="{{ route('manageMessage',[ 'id' => $message->id ])}}">
                    <i class="ri-message-2-fill text-white bg-lime-700 hover:bg-lime-600 transition text-2xl p-1 rounded shadow"></i>
                  </a>
                  <button 
                    wire:click="SupprimerMessage({{ $message->id }})" 
                    wire:confirm="Voulez-vous vraiment supprimer le message de {{$message->nom}} {{$message->prenom}} ?">
                    <i class="ri-close-large-line text-white bg-red-700 hover:bg-red-600 transition text-2xl p-1 rounded shadow"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  
      <div class="mt-4 p-4">
        {{$messages->links()}}
      </div>
  
  </div>
  