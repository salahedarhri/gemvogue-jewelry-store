@props(['bijou'])
 
<a href="{{ route('bijou', ['slug' => $bijou->slug]) }}" wire:key="{{ $bijou->id }}" wire:navigate>
    <div class="flex flex-col place-items-center relative shadow-lg rounded-2xl">
 
        <img src="{{ asset('images/produits/compressed/' . $bijou->photo1) }}"
             alt="{{ $bijou->nom }}"
             loading="eager"
             class="z-20 w-full h-auto aspect-square object-cover object-center rounded-t-xl absolute hover:opacity-0 transition-all">
 
        <img src="{{ asset('images/produits/compressed/' . $bijou->photo2) }}"
             alt="{{ $bijou->nom }}"
             loading="lazy"
             class="z-10 w-full h-auto aspect-square object-cover object-center rounded-t-xl">
 
        <div class="flex flex-col sm:text-sm max-sm:text-xs text-center border-t border-second w-full p-1">
            <p class="truncate font-semibold">{{ $bijou->nom }}</p>
            <p class="text-xs font-medium text-first/50">{{ $bijou->type_metal }}</p>
            <p class="font-semibold text-amber-800">{{ $bijou->prix }} DH</p>
        </div>
 
    </div>
</a>