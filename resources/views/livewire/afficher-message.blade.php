<div>
    {{-- Stop trying to control. --}}
    <div class="max-w-2xl mx-auto flex flex-col gap-3 py-4 px-3">
        <div class="w-full flex justify-start py-2">
            <a wire:navigate href="{{ route('adminMessages')}}" class="py-2 px-4 rounded-full bg-gradient-to-r from-second to-fourth hover:saturate-150 transition shadow-lg text-white font-semibold"><i class="ri-arrow-left-line mr-3"></i>Retour</a>
        </div>

        <label for="nom">
            <p class="text-base font-semibold text-fourth pl-2 pb-2">Nom</p>
            <input type="text" name="nom" wire:model="nom" readonly
            class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition">
            @error('nom') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
        </label>
        <label for="prenom">
            <p class="text-base font-semibold text-fourth pl-2 pb-2">Prénom</p>
            <input type="text" name="prenom" wire:model="prenom" readonly
            class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition">
            @error('prenom') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
        </label>
        <label for="email">
            <p class="text-base font-semibold text-fourth pl-2 pb-2">Email</p>
            <input type="email" name="email" wire:model="email" readonly
            class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition">
            @error('email') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
        </label>
        <label for="numTel">
            <p class="text-base font-semibold text-fourth pl-2 pb-2">Numéro de Tél</p>
            <input type="tel" name="telephone" wire:model="telephone" readonly
            class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition" >
            @error('numTel') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
        </label>
        <label for="msg">
            <p class="text-base font-semibold text-fourth pl-2 pb-2">Message</p>
            <textarea name="msg" rows="4" cols="50" wire:model="message" readonly
            class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg placeholder-slate-400 transition"></textarea>
            @error('msg') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
        </label>

        <div class="w-full flex md:flex-row max-md:flex-col md:justify-between max-md:justify-center max-md:gap-3 max-md:place-items-center font-dmsans">
            <a class="text-center px-4 py-2 bg-gradient-to-r from-red-700 to-red-500 text-white rounded-lg shadow" target="_blank"
            href="https://mail.google.com/mail/?view=cm&fs=1&to={{$email}}&su=Réponse%20du%20support%20GemVogue&body="            
            >Répondre avec Gmail
            </a>
            <a class="text-center px-4 py-2 bg-gradient-to-r from-cyan-700 to-cyan-500 text-white rounded-lg shadow" target="_blank"
            href="https://outlook.office365.com/owa/?path=/mail/action/compose&to={{$email}}subject=Réponse%20du%20support%20GemVogue&body="
            >Répondre avec Outlook
            </a>
        </div>

    </div>


</div>
