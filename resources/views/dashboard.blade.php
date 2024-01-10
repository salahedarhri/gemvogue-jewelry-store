<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if( isset( $commande ))

                @else
                    @auth
                    <p>Bienvenue dans votre espace personnel</p>
                    @endauth

                @endif
            </div>
        </div>
    </div>

</x-app-layout>
