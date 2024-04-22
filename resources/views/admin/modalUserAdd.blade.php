<div class="fixed inset-0 bg-slate-700 bg-opacity-50 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModalAdd=false" class=" bg-white shadow-lg rounded border-2 border-second border-opacity-50 p-3 font-dmsans">

        <div class="w-full flex justify-end p-1">
            <button @click="openModalAdd=false" ><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-8  text-center text-lg font-semibold text-fourthDarker">Ajouter un utilisateur</p>

        <div class="w-full flex justify-end p-1">
            <p class="text-sm text-center text-slate-500">* = Champ Obligatoire</p>
        </div>

        <form wire:submit="AjouterUser" class="w-96 flex flex-col gap-3 max-sm:gap-4 py-3 font-dmsans">
            @csrf
            <label for="nom" class="flex flex-col">
                <input type="text" name="nomAdd" wire:model="nomAdd" placeholder="Nom*"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('nomAdd') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="email" class="flex flex-col">
                <input type="text" name="emailAdd" wire:model="emailAdd" placeholder="Email*"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('emailAdd') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <label for="motdepasse" class="flex flex-col">
                <input type="password" name="motdepasseAdd" wire:model="motdepasseAdd" placeholder="Mot de Passe*"
                class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                @error('motdepasseAdd') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
            </label>
            <button type="submit" class="w-full text-white font-dmsans uppercase font-semibold px-4 py-2 bg-fourth rounded shadow hover:bg-pink-800 transition">Ajouter</button>
        </form>

        <button @click="openModalAdd=false" class="w-full text-white font-dmsans uppercase font-semibold px-4 py-2 bg-slate-500 rounded shadow hover:bg-slate-800 transition">Annuler</button>
    </div>
</div>