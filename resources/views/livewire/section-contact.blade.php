<div>
    {{-- Do your work, then step back. --}}
    <div class="grid grid-cols-2 max-md:grid-cols-1 justify-center align-center px-4 py-8 gap-8">
        <div class="w-full max-w-lg mx-auto">

            @if (session()->has('message'))
                <div role="alert" class="alert alert-success font-dmsans py-3 my-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <p class="font-playfair text-xl text-center pb-6 bg-gradient-to-r from-fourth to-pink-800 font-bold text-transparent bg-clip-text">Contactez-nous En Ligne</p>
            <p class="font-dmsans text-sm text-end pb-1 ">* : Champ Obligatoire</p>

            <form wire:submit.prevent="validerContact" class="w-full flex flex-col gap-6 max-sm:gap-4 py-3 font-dmsans opacity-90">
                <label for="nomContact">
                    <input type="text" name="nomContact" placeholder="Nom *" wire:model="nomContact"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition">
                    @error('nomContact') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="prenomContact">
                    <input type="text" name="prenomContact" placeholder="Prénom *" wire:model="prenomContact"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition">
                    @error('prenomContact') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="emailContact">
                    <input type="email" name="emailContact" placeholder="Email *" wire:model="emailContact"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition">
                    @error('emailContact') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="numTelContact">
                    <input type="tel" name="numTelContact" placeholder="Num° Téléphone" wire:model="numTelContact"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg  placeholder-slate-400 transition" >
                    @error('numTelContact') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>
                <label for="msgContact">
                    <textarea name="msgContact" placeholder="Entrer un message *" rows="4" cols="50" wire:model="msgContact"
                    class="w-full shadow focus:ring-fourth  focus:border-fourth border border-transparent rounded-lg placeholder-slate-400 transition"></textarea>
                    @error('msgContact') <p class="text-red-500 font-dmsans text-sm py-1 px-2">{{ $message }}</p>@enderror
                </label>

                <button type="submit" class="text-white font-dmsans uppercase font-semibold px-4 py-2 bg-fourth rounded shadow w-fit mx-auto hover:bg-pink-800 transition">Envoyer</button>
            </form>

        </div>
        <div class="flex flex-col align-center text-center font-dmsans">
            <p class="font-playfair text-xl text-center pb-6 bg-gradient-to-r from-second to-pink-800 font-bold text-transparent bg-clip-text">Nos Cordonnées</p>

            <div class="flex flex-col text-center py-3 gap-2 text-base">
                <p><b>Email :</b>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=arhri.salah@gmail.com" target="_blank">arhri.salah@gmail.com</a></p>
            </div>
        </div>
    </div>
</div>
