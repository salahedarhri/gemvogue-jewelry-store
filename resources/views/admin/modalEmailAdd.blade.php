<div class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModalAdd=false" class="lg:w-2/5 md:w-3/5 max-md:w-full bg-white shadow-lg rounded border-2 border-second border-opacity-50 p-3 font-dmsans">

        <div class="w-full flex justify-end p-1">
            <button @click="openModalAdd=false" ><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-4  text-center text-xl font-semibold text-fourthDarker">Ajouter un email Newsletter</p>

        {{-- Succès & Erreur --}}
        @if (session()->has('success'))
            <div 
                role="alert" 
                class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"
                x-data="{ show: true }"
                x-init="setTimeout(() => { show = false }, 5000)"
                x-show="show"
                @click="show = false"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div 
                role="alert" 
                class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20"
                x-data="{ show: true }"
                x-init="setTimeout(() => { show = false }, 5000)"
                x-show="show"
                @click="show = false"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="AjouterEmail" wire:key="add-email" class="max-w-xl mx-auto flex flex-col gap-6 max-sm:gap-4 py-3 font-dmsans">
            <p class="text-sm text-end text-slate-500">* = Champ Obligatoire</p>

            @csrf
            <label for="emailAdd" class="w-full flex flex-col">
                <p class="text-base font-bold text-fourth">Email*</p>
                <input type="text" name="emailAdd" wire:model.live="emailAdd"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('emailAdd') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>

            <div class="flex flex-row justify-between p-2">
                <button @click="openModalAdd=false" class="w-fit text-white font-dmsans uppercase font-semibold px-4 py-2 bg-slate-500 rounded shadow hover:bg-slate-800 transition">Annuler</button>
                <button type="submit" class="w-fit text-white font-dmsans uppercase font-semibold px-4 py-2 bg-fourth rounded shadow hover:bg-pink-800 transition">Ajouter</button>
            </div>
        </form>

    </div>
</div>