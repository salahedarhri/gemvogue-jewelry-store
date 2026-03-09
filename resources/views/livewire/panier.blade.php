<div>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="font-bold text-lg font-playfair text-first">
            Panier 
            <span class="text-sm font-normal font-dmsans text-first/60">({{ count($items) }} articles)</span>
        </h2>
        <button @click="ouvert = false" class="text-first/60 hover:text-fourth transition">
            <i class="ri-close-line text-2xl"></i>
        </button>
    </div>

    {{-- Articles --}}
    @if(count($items) > 0)
        <div class="flex flex-col gap-4 overflow-y-auto max-h-[60vh]">
            @foreach($items as $id => $item)
                <div class="flex items-center gap-4 border-b border-first/10 pb-4">
                    
                    {{-- Infos --}}
                    <div class="flex-1">
                        <p class="font-medium text-first text-sm font-dmsans">{{ $item['nom'] }}</p>
                        <p class="text-xs text-first/60 mt-0.5 font-dmsans">{{ $item['type'] }} · {{ $item['type_metal'] }}</p>
                        <p class="text-second text-sm font-semibold mt-1">{{ number_format($item['prix'], 2) }} €</p>
                    </div>

                    {{-- Quantité --}}
                    <div class="flex items-center gap-2">
                        <button 
                            wire:click="decrementer({{ $id }})"
                            class="w-6 h-6 rounded border border-first/20 flex items-center justify-center hover:border-fourth hover:text-fourth transition text-sm">
                            −
                        </button>
                        <span class="text-sm w-4 text-center text-first">{{ $item['quantite'] }}</span>
                        <button 
                            wire:click="incrementer({{ $id }})"
                            class="w-6 h-6 rounded border border-first/20 flex items-center justify-center hover:border-fourth hover:text-fourth transition text-sm">
                            +
                        </button>
                    </div>

                    {{-- Supprimer --}}
                    <button 
                        wire:click="retirerDuPanier({{ $id }})"
                        class="text-first/40 hover:text-red-400 transition">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </div>
            @endforeach
        </div>

        {{-- Footer --}}
        <div class="mt-6 pt-4 border-t border-first/10">
            <div class="flex justify-between items-center mb-4 font-dmsans">
                <span class="text-first/60 text-sm">Total</span>
                <span class="font-bold text-first">{{ number_format($total, 2) }} €</span>
            </div>
            <button class="w-full py-3 bg-fourth text-white font-semibold font-dmsans rounded-lg hover:bg-fourthDarker transition">
                Commander
            </button>
            <button 
                wire:click="viderLePanier"
                class="w-full py-2 mt-2 text-sm font-dmsans text-first/40 hover:text-red-400 transition">
                Vider le panier
            </button>
        </div>

    @else
        <div class="flex flex-col items-center justify-center h-48 text-first/40">
            <i class="ri-shopping-cart-line text-4xl mb-3"></i>
            <p class="text-sm font-dmsans">Votre panier est vide</p>
        </div>
    @endif
</div>