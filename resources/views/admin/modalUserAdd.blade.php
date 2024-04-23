<div class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModal=false" class="lg:w-2/5 md:w-3/5 max-md:w-full bg-white shadow-lg rounded border-2 border-second border-opacity-50 p-3 font-dmsans">

        <div class="w-full flex justify-end p-1">
            <button @click="openModal=false" ><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-4  text-center text-xl font-semibold text-fourthDarker">Ajouter un utilisateur</p>

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

        <form wire:submit="AjouterUser" class="max-w-xl mx-auto flex flex-col gap-6 max-sm:gap-4 py-3 font-dmsans">
            <p class="text-sm text-end text-slate-500">* = Champ Obligatoire</p>

            @csrf
            <label for="nom" class="w-full flex flex-col">
                <p class="text-base font-bold text-fourth">Nom*</p>
                <input type="text" name="nom" wire:model="nom"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('nom') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="email" class="w-full flex flex-col">
                <p class="text-base font-bold text-fourth">Email*</p>
                <input type="text" name="email" wire:model="email"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('email') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="motdepasse" class="w-full flex flex-col">
                <p class="text-base font-bold text-fourth">Mot de passe*</p>
                <input type="password" name="motdepasse" wire:model="motdepasse"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('motdepasse') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="motdepasse_confirmation" class="w-full flex flex-col">
                <p class="text-base font-bold text-fourth">Confirmation du mot de passe*</p>
                <input type="password" name="motdepasse_confirmation" wire:model="motdepasse_confirmation"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('motdepasse_confirmation') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <div class="flex flex-row justify-between p-2">
                <button @click="openModal=false" class="w-fit text-white font-dmsans uppercase font-semibold px-4 py-2 bg-slate-500 rounded shadow hover:bg-slate-800 transition">Annuler</button>
                <button type="submit" class="w-fit text-white font-dmsans uppercase font-semibold px-4 py-2 bg-fourth rounded shadow hover:bg-pink-800 transition">Ajouter</button>
            </div>
        </form>

    </div>
</div>