<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="max-w-4xl mx-auto p-3 font-dmsans antialiased">

        <div class="w-full flex justify-start py-2">
            <a wire:navigate href="{{ route('adminCommandes')}}" class="py-2 px-4 rounded-full bg-gradient-to-r from-second to-fourth hover:saturate-150 transition shadow-lg text-white font-semibold"><i class="ri-arrow-left-line mr-3"></i>Retour</a>
        </div>
        
        <div class="w-full bg-white border-second border border-opacity-50 rounded-lg shadow-xl p-4 mb-6">

            <p class="pb-8 text-center text-xl font-roboto font-bold text-fourthDarker pt-4">Modifier une commande</p>
    
            {{-- Succès & Erreur --}}
            @if (session()->has('success'))
                <div 
                    role="alert" class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20" x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 3000)"x-show="show@click="show = false"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session()->has('error'))
                <div role="alert" class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="w-full">

                <form wire:submit.prevent="ModifierCommande" class="grid grid-cols-1 gap-4 p-2 place-items-center">
                    <label for="sessionId" class="w-full"><p class="text-sm text-fourthDarker font-semibold">ID du Session</p>
                        <input type="text" name="sessionId" wire:model="sessionId" value="{{ $sessionId }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('sessionId')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="prixTotal" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Prix total</p>
                        <input type="text" name="prixTotal" wire:model="prixTotal" value="{{ $prixTotal }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('prixTotal')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="status" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Statut</p>
                        <input type="text" name="status" wire:model="status" value="{{ $status }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('status')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    
                    <button type="submit" class=" text-white font-dmsans uppercase font-semibold px-5 py-2 bg-gradient-to-r from-second to-fourth rounded shadow hover:saturate-150 transition">Modifier</button>
                </form>

            </div>
        </div>


    </div>
</div>
