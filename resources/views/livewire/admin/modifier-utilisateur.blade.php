<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="max-w-2xl mx-auto p-3 font-dmsans antialiased">

        <div class="w-full flex justify-start py-2">
            <a wire:navigate href="{{ route('adminUsers')}}" class="py-2 px-4 rounded-full bg-gradient-to-r from-second to-fourth hover:saturate-150 transition shadow-lg text-white font-semibold"><i class="ri-arrow-left-line mr-3"></i>Retour</a>
        </div>
        
        <div class="w-full bg-white border-second border border-opacity-50 rounded-lg shadow-xl p-4 mb-6">

            <p class="pb-8 text-center text-xl font-roboto font-bold text-fourthDarker pt-4">Modifier un utilisateur</p>
    
            {{-- Succès & Erreur --}}
            @if (session()->has('successUser'))
                <div 
                    role="alert" 
                    class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"
                    x-data="{ show: true }"
                    x-init="setTimeout(() => { show = false }, 5000)"
                    x-show="show"
                    @click="show = false"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('successUser') }}</span>
                </div>
            @endif

            @if (session()->has('errorUser'))
                <div 
                    role="alert" 
                    class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20"
                    x-data="{ show: true }"
                    x-init="setTimeout(() => { show = false }, 5000)"
                    x-show="show"
                    @click="show = false"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('errorUser') }}</span>
                </div>
            @endif

            <div class="w-full">
                <form wire:submit.prevent="ModifierUser" 
                class="w-full flex flex-col gap-8 max-sm:gap-4 py-3 font-dmsans">
                    <label for="nom" class="flex flex-col">
                        <p class="text-fourthDarker font-semibold pl-2 pb-1">
                            Nom
                        </p>
                        <input name="nomModify" type="text" placeholder="Nom" wire:model="nomUtilisateur" value="{{ $nomUtilisateur }}"
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                        @error('nomModify')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="email" class="flex flex-col">
                        <p class="text-fourthDarker font-semibold pl-2 pb-1">
                            Email
                        </p>
                        <input name="emailModify" type="text" placeholder="Email" wire:model="emailUtilisateur" value="{{ $emailUtilisateur }}"
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                        @error('emailModify')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                    </label>
                    <button type="submit" class="w-fit ml-auto text-white font-dmsans uppercase font-semibold px-5 py-2 bg-fourth rounded shadow hover:bg-pink-800 transition">Modifier</button>
                </form>
            </div>
        </div>

        <div x-data="{ caps1:false , caps2:false }" class="w-full bg-white border-second border border-opacity-50 rounded-lg shadow-xl p-4">

            <p class="pb-8 text-center text-xl font-roboto font-bold text-fourthDarker pt-4">Mot de Passe</p>

            {{-- Succès & Erreur --}}
            @if (session()->has('successMdp'))
                <div role="alert" class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"                    x-data="{ show: true }"
                    x-init="setTimeout(() => { show = false }, 5000)"
                    x-show="show"
                    @click="show = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('successMdp') }}</span>
                </div>
            @endif
            @if (session()->has('errorMdp'))
                <div role="alert" class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20"                    x-data="{ show: true }"
                    x-init="setTimeout(() => { show = false }, 5000)"
                    x-show="show"
                    @click="show = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('errorMdp') }}</span>
                </div>
            @endif

            <div class="w-full">
                <form wire:submit="ModifierPassword" 
                class="w-full flex flex-col gap-8 max-sm:gap-4 py-3 font-dmsans">
                    <label for="nom" class="flex flex-col">
                        <p class="text-fourthDarker font-semibold pl-2 pb-1">
                            Nouveau mot de passe
                        </p>
                        <input name="mdpUtilisateur" type="password" wire:model="mdpUtilisateur" @keydown="caps1 = $event.getModifierState('CapsLock')" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                        @error('mdpUtilisateur')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                        <p class="text-amber-600 font-dmsans text-sm py-1 px-2 font-semibold" x-cloak x-show="caps1">Verouillage Majuscule est activée</p>
                    </label>
                    <label for="email" class="flex flex-col">
                        <p class="text-fourthDarker font-semibold pl-2 pb-1">
                            Confirmer le mot de passe
                        </p>
                        <input name="mdpUtilisateur_confirmation" type="password" wire:model="mdpUtilisateur_confirmation" @keydown="caps2 = $event.getModifierState('CapsLock')"  
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                        @error('mdpUtilisateur_confirmation')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                        <p class="text-amber-600 font-dmsans text-sm py-1 px-2 font-semibold" x-cloak x-show="caps2">Verouillage Majuscule est activée</p>
                    </label>
                    <button type="submit" class="w-fit ml-auto text-white font-dmsans uppercase font-semibold px-5 py-2 bg-fourth rounded shadow hover:bg-pink-800 transition">Modifier</button>
                </form>
            </div>
        </div>

    </div>
</div>
