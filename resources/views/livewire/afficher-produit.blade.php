<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="max-w-4xl mx-auto p-3 font-dmsans antialiased">

        <div class="w-full flex justify-start py-2">
            <a wire:navigate href="{{ route('adminBijoux')}}" class="py-2 px-4 rounded-full bg-gradient-to-r from-second to-fourth hover:saturate-150 transition shadow-lg text-white font-semibold"><i class="ri-arrow-left-line mr-3"></i>Retour</a>
        </div>
        
        <div class="w-full bg-white border-second border border-opacity-50 rounded-lg shadow-xl p-4 mb-6">

            <p class="pb-8 text-center text-xl font-roboto font-bold text-fourthDarker pt-4">Modifier un bijou</p>
    
            {{-- Succès & Erreur --}}
            @if (session()->has('success'))
                <div 
                    role="alert" 
                    class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"
                    x-data="{ show: true }"
                    x-init="setTimeout(() => { show = false }, 3000)"
                    x-show="show"
                    @click="show = false"
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

                <form wire:submit.prevent="ModifierBijou" class="grid grid-cols-2 max-sm:grid-cols-1 gap-4 p-2 place-items-center">
                    <label for="nom" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Nom</p>
                        <input type="text" name="nom" wire:model="nom" value="{{ $nom }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('nom')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="type" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Type</p>
                        <input type="text" name="type" wire:model="type" value="{{ $type }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('type')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="prix" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Prix</p>
                        <input type="text" name="prix" wire:model="prix" value="{{ $prix }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('prix')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="collection" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Collection</p>
                        <input type="text" name="collection" wire:model="collection" value="{{ $collection }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('collection')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="typeMetal" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Type de métal</p>
                        <input type="text" name="typeMetal" wire:model="typeMetal" value="{{ $typeMetal }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('typeMetal')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="qteStock" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Quantité en stock</p>
                        <input type="text" name="qteStock" wire:model="qteStock" value="{{ $qteStock }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('qteStock')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="description" class="w-full sm:col-span-2"><p class="text-sm text-fourthDarker font-semibold">Description</p>
                        <input type="textarea" rows="3" name="description" wire:model="description" value="{{ $description }}" 
                        class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('description')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <div class="w-full flex flex-col">
                        <p class="text-sm text-fourthDarker font-semibold">Photo 1</p>
                        <img src="{{ asset('images/produits/notcompressed/'.$photo1Modify)}}" alt="{{ asset('images/produits/compressed/'.$photo1Modify)}}"
                        class="aspect-square object-cover object-center rounded shadow my-2">

                    </div>
                    <div class="w-full flex flex-col">
                        <p class="text-sm text-fourthDarker font-semibold">Photo 2</p>
                        <img src="{{ asset('images/produits/notcompressed/'.$photo2Modify)}}" alt="{{ asset('images/produits/compressed/'.$photo2Modify)}}"
                        class="aspect-square object-cover object-center rounded shadow my-2">

                    </div>
                    <label for="photo1" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Changer Photo 1</p>
                        <input type="file" name="photo1" wire:model="photo1" value="{{ $photo1 }}" 
                        accept="image/png, image/jpeg" class="file:text-white hover:saturate-150 file:transition file:rounded file:py-1 file:px-3 file:bg-fourth file:border-none file:font-dmsans w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('photo1')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>
                    <label for="photo2" class="w-full"><p class="text-sm text-fourthDarker font-semibold">Changer Photo 2</p>
                        <input type="file" name="photo2" wire:model="photo2" value="{{ $photo2 }}" 
                        accept="image/png, image/jpeg" class="file:text-white hover:saturate-150 file:transition file:rounded file:py-1 file:px-3 file:bg-fourth file:border-none file:font-dmsans w-full shadow focus:ring-fourth  focus:border-fourth border border-second p-2 rounded-lg">
                        @error('photo2')<p class="text-sm text-red-600 pl-2">{{ $message }}</p>@enderror
                    </label>

                    <button type="submit" class="sm:col-span-2 text-white font-dmsans uppercase font-semibold px-5 py-2 bg-gradient-to-r from-second to-fourth rounded shadow hover:saturate-150 transition">Modifier</button>
                </form>

            </div>
        </div>


    </div>
</div>
