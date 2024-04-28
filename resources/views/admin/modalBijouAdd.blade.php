<div class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModal=false" class="w-fit max-md:w-full bg-white shadow-lg rounded-b-xl border-t-2 border-red-400 p-2 font-dmsans">

        <div class="w-full flex justify-end p-1">
            <button @click="openModal=false" ><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-2  text-center text-xl font-semibold text-fourthDarker">Ajouter un bijou</p>

        {{-- Succès & Erreur --}}
        @if (session()->has('success'))
            <div role="alert" class="alert alert-success font-dmsans py-3 my-3 w-fit mx-auto z-20"   x-data="{ show: true }"    x-init="setTimeout(() => { show = false }, 50000)"   x-show="show"  @click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div role="alert" class="alert alert-error font-dmsans py-3 my-3 w-fit mx-auto z-20" x-data="{ show: true }"  x-init="setTimeout(() => { show = false }, 50000)" x-show="show"    @click="show = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit="AjouterBijou" enctype="multipart/form-data" class="max-w-2xl mx-auto grid grid-cols-2 max-sm:grid-cols-1 md:gap-4 p-4">
            @csrf   
            <label for="nom"><p class="text-base font-bold text-fourth">Nom:</p>
                <input type="text" class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="nom">
                @error('nom') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror   
            </label> 
            <label for="prix"><p class="text-base font-bold text-fourth">Prix:</p>
                <input type="number" step=".01" class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="prix">
                @error('prix') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="type"><p class="text-base font-bold text-fourth">Type:</p>
                <input type="text" class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="type">
                @error('type') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="photo1"><p class="text-base font-bold text-fourth">Photo 1:</p>
                <input type="file" accept="image/png, image/jpeg" class="file:text-white file:bg-fourth file:border-none file:font-dmsans hover:saturate-150 file:transition file:rounded file:py-1 file:px-3 w-full shadow focus:ring-fourth p-1 focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="photo1">
                @error('photo1') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror 
            </label>
            <label for="photo2"><p class="text-base font-bold text-fourth">Photo 2:</p>
                <input type="file" accept="image/png, image/jpeg" class="file:text-white file:bg-fourth file:border-none file:font-dmsans hover:saturate-150 file:transition file:rounded file:py-1 file:px-3 w-full shadow focus:ring-fourth p-1 focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="photo2">
                @error('photo2') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror  
            </label>
            <label for="collection"><p class="text-base font-bold text-fourth">Collection:</p>
                <input type="text" class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="collection">
                @error('collection') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="qteStock"><p class="text-base font-bold text-fourth">Quantité en Stock:</p>
                <input type="number" class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="qteStock">
                @error('qteStock') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="typeMetal"><p class="text-base font-bold text-fourth">Type de Métal:</p>
                <input type="text" class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" wire:model="typeMetal">
                @error('typeMetal') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <label for="description" class="sm:col-span-2"><p class="text-base font-bold text-fourth">Description:</p>
                <textarea class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition" rows="4" wire:model="description"></textarea>
                @error('description') <span class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</span> @enderror    
            </label>
            <button type="submit" class="sm:col-span-2 text-white bg-gradient-to-r from-second to-fourth rounded-lg shadow-lg w-full font-dmsans py-2 hover:saturate-150 mt-3">Enregistrer</button>
        </form>

    </div>
</div>