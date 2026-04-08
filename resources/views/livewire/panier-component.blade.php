<div class="w-full bg-third min-h-screen">

    {{-- Banner --}}
    <div class="md:h-60 max-md:h-48 max-w-7xl mx-auto bg-cover bg-center rounded-b-xl"
      style="background-image:url({{asset('images/composants/compressed/bijoux-panier.jpg')}});">
      <div class="h-full w-full bg-gray-950 bg-opacity-50 rounded-b-xl">
        <div class="flex items-center justify-center h-full md:pt-36 max-md:pt-24">
          <p class="text-3xl text-third font-playfair font-semibold">Votre Panier</p>
        </div>
      </div>
    </div>

    @if ($produits->count() > 0)

        <div class="max-w-6xl mx-auto px-4 py-10 flex lg:flex-row flex-col gap-8 font-dmsans">

            {{-- Liste des produits --}}
            <div class="flex-1">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold font-playfair text-first">
                        Panier 
                        <span class="text-sm font-normal text-first/50">({{ $qte_total }} articles)</span>
                    </h2>
                    <button wire:click="viderPanier" 
                        class="text-sm text-first/40 hover:text-red-400 transition font-dmsans">
                        Vider le panier
                    </button>
                </div>

                {{-- Articles --}}
                <div class="flex flex-col divide-y divide-second/20">
                    @foreach ($produits as $item)
                        <div class="flex gap-4 py-5">

                            {{-- Image --}}
                            <a wire:navigate href="{{ route('bijou', ['slug' => $item->model->slug]) }}" 
                                class="shrink-0 hover:opacity-80 transition">
                                <img src="{{ asset('images/produits/compressed/' . $item->model->photo1) }}" 
                                    alt="{{ $item->name }}"
                                    class="w-24 h-24 md:w-32 md:h-32 object-cover rounded-lg shadow-md">
                            </a>

                            {{-- Infos --}}
                            <div class="flex flex-1 flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold text-first font-playfair">{{ $item->name }}</p>
                                        <p class="text-sm text-first/50 mt-0.5">{{ $item->model->type_metal }}</p>
                                    </div>
                                    <button wire:click="supprimerProduit('{{ $item->rowId }}')"
                                        class="text-first/30 hover:text-red-400 transition ml-4">
                                        <i class="ri-delete-bin-line text-lg"></i>
                                    </button>
                                </div>

                                <div class="flex items-center justify-between mt-3">
                                    {{-- Prix --}}
                                    <div>
                                        <p class="text-second font-semibold">{{ $item->subtotal() }} DH</p>
                                        <p class="text-xs text-first/40">{{ $item->price }} DH / unité</p>
                                    </div>

                                    {{-- Quantité --}}
                                    <div class="flex items-center gap-2 border border-second/30 rounded-lg overflow-hidden">
                                        <button wire:click="decrementerProduit('{{ $item->rowId }}')"
                                            class="w-8 h-8 flex items-center justify-center hover:bg-second/10 transition text-first">
                                            −
                                        </button>
                                        <span class="w-6 text-center text-sm font-semibold text-first">{{ $item->qty }}</span>
                                        <button wire:click="incrementerProduit('{{ $item->rowId }}')"
                                            class="w-8 h-8 flex items-center justify-center hover:bg-second/10 transition text-first">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <a wire:navigate href="{{ route('boutique') }}" 
                    class="inline-flex items-center gap-2 mt-6 text-sm text-first/50 hover:text-fourth transition">
                    <i class="ri-arrow-left-line"></i>
                    Continuer mes achats
                </a>
            </div>

            {{-- Récapitulatif --}}
            <div class="lg:w-80 w-full">
                <div class="bg-whiteBeige rounded-xl p-6 shadow-sm sticky top-24">
                    
                    <h3 class="font-playfair font-bold text-xl text-first mb-6">Récapitulatif</h3>

                    {{-- Détail articles --}}
                    <div class="flex flex-col gap-3 pb-4 border-b border-second/20">
                        @foreach ($produits as $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-first/70">{{ $item->name }} x{{ $item->qty }}</span>
                                <span class="text-first font-medium">{{ $item->subtotal() }} DH</span>
                            </div>
                        @endforeach
                    </div>

                    {{-- Livraison --}}
                    <div class="flex justify-between text-sm py-4 border-b border-second/20">
                        <span class="text-first/70">Livraison <span class="text-xs">(Maroc)</span></span>
                        <span class="text-first font-medium">{{ $livraison }} DH</span>
                    </div>

                    {{-- Total --}}
                    <div class="flex justify-between items-center py-4">
                        <span class="font-semibold text-first">Total TTC</span>
                        <span class="text-xl font-bold text-second">{{ $total }} DH</span>
                    </div>

                    {{-- Paiement --}}
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button class="w-full py-3 bg-fourth hover:bg-fourthDarker transition text-white font-semibold font-dmsans rounded-lg shadow-md">
                            Payer en ligne
                        </button>
                    </form>

                    <div class="flex items-center justify-center gap-2 mt-4 text-xs text-first/40">
                        <i class="ri-lock-line"></i>
                        <span>Paiement sécurisé via Stripe</span>
                    </div>

                </div>
            </div>

        </div>

    @else

        {{-- Panier vide --}}
        <div class="max-w-4xl mx-auto py-10 px-4 font-playfair">
            <div class="text-center py-6">
                <i class="ri-shopping-cart-line text-5xl text-first"></i>
                <p class="text-xl text-first mt-4 mb-2 font-semibold">Votre panier est vide</p>
                <p class="text-sm font-dmsans text-first mb-6">Trouvez ce qui vous correspond en visitant notre sélection.</p>
                <a wire:navigate href="{{ route('boutique') }}" 
                    class="inline-block px-6 py-2 bg-fourth text-white rounded-lg hover:bg-fourthDarker transition font-dmsans text-sm">
                    Découvrir la boutique
                </a>
            </div>

            <p class="font-semibold text-2xl mb-4 mt-6">Nos sélections</p>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4">

                @foreach([
                    ['categorie' => 'Anneau',          'label' => 'Anneaux',           'img' => 'ring2.jpg'],
                    ['categorie' => 'Collier',          'label' => 'Colliers',          'img' => 'necklace2.jpg'],
                    ['categorie' => 'Bracelet',         'label' => 'Bracelets',         'img' => 'bracelet2.jpg'],
                    ['categorie' => 'Boucles oreilles', 'label' => "Boucles d'oreilles",'img' => 'boucles2.jpg'],
                ] as $cat)
                    <a wire:navigate href="{{ route('boutiqueCategorie', ['categorie' => $cat['categorie']]) }}"
                        class="relative aspect-square overflow-hidden rounded-lg shadow-md group">
                        <img src="{{ asset('images/produits/compressed/' . $cat['img']) }}" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition"></div>
                        <p class="absolute bottom-4 w-full text-center text-white font-semibold text-lg">
                            {{ $cat['label'] }}
                        </p>
                    </a>
                @endforeach

            </div>
        </div>

    @endif

</div>