<div class="indicator mx-4">
    <a wire:navigate href="{{ route('panier') }}">
        @if($count > 0)
            <span class="indicator-item badge badge-secondary text-white h-3 p-2">{{ $count }}</span>
        @endif
        <img src="{{ asset('images/composants/logo/shoppingb.png') }}" alt="cart"
             class="w-7 h-auto transition-transform duration-300 ease-out hover:scale-110">
    </a>
</div>