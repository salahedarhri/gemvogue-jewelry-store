<div class="fixed inset-0 bg-slate-800 bg-opacity-60 flex items-center justify-center max-md:px-4 z-10">

    <!-- Modal -->
    <div  @click.away="openModalModify=false" class="w-96 bg-white shadow-lg rounded-lg border-2 border-second border-opacity-50 p-3 font-dmsans">

        <div class="w-full flex justify-end p-1">
            <button @click="openModalModify=false"><i class="ri-close-line text-2xl hover:bg-red-500 hover:text-white rounded-full p-1 transition-all"></i></button>
        </div>

        <p class="pb-8  text-center text-lg font-semibold text-fourthDarker">Modifier un utilisateur</p>

        <div class="w-full flex justify-end p-1">
            <p class="text-sm text-center text-slate-500">* = Champ Obligatoire</p>
        </div>

        <div class="w-full">
            <form wire:submit="ModifierUser" 
            class="w-full flex flex-col gap-3 max-sm:gap-4 py-3 font-dmsans">
             <label for="nom" class="flex flex-col">
                    <input wire:key="modify-nom-user" name="nomModify" type="text" placeholder="Nom" wire:model.live="nomModify" value="{{ $nomModify }}"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                    @error('nomModify')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="email" class="flex flex-col">
                    <input wire:key="modify-email-user" name="emailModify" type="text" placeholder="Email" wire:model.live="emailModify" value="{{ $emailModify }}"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                    @error('emailModify')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="motdepasse" class="flex flex-col">
                    <input wire:key="modify-mdp-user" name="motdepasseModify" type="password" placeholder="Nouveau mot de passe" wire:model.live="motdepasseModify" value="{{ $motdepasseModify }}"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-second rounded-lg  placeholder-slate-400 transition">
                    @error('motdepasseModify')<p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <button type="submit" class="w-full text-white font-dmsans uppercase font-semibold px-4 py-2 bg-fourth rounded shadow hover:bg-pink-800 transition">Modifier</button>
            </form>

            <button @click="openModalModify=false" class="w-full text-white font-dmsans uppercase font-semibold px-4 py-2 bg-slate-500 rounded shadow hover:bg-slate-800 transition">Annuler</button>
        </div>
    </div>
</div>