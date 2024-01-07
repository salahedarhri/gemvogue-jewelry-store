@extends('layouts.client')

@section('content')

<div class="container mt-8">
    <div class="max-w-md mx-auto bg-beige p-6 rounded-lg shadow-lg">
        <h3 class="text-3xl font-semibold mb-4 text-center">Merci pour votre achat, {{ $client->name }}!</h3>

        <p class="text-lg">Nous tenons à vous remercier sincèrement pour votre récent achat sur notre site. C'est un plaisir de vous compter parmi nos clients.</p>

        <p class="text-lg">Votre commande a été traitée avec soin, et nous sommes en train de la préparer pour l'expédition. Dès que votre commande sera prête à partir, nous vous enverrons un email de confirmation avec tous les détails d'expédition.</p>

        <div class="bg-green-100 text-green-800 p-4 my-4">
            <p class="text-lg mb-0">Votre paiement a été traité avec succès. Vous pouvez consulter les détails de votre commande à tout moment en vous connectant à votre compte sur notre site.</p>
        </div>

        <p class="text-lg">Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter. Nous sommes là pour vous aider!</p>

        <p class="text-lg">Merci encore pour votre confiance.</p>

        <hr class="my-4">

        <p class="text-gray-600">Cordialement,</p>
        <p class="italic">GemVogue</p>
    </div>
</div>

@endsection

