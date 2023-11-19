@extends('layout')

@section('content')
        <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-lg">

                <h1 class="text-3xl max-sm:text-xl font-semibold min-md:mb-8 max-sm:mb-2 sm:mb-5">Qui sommes-nous ?</h1>

                <!-- Section Présentation -->
                <div class="mb-8">
                    <p class="min-md: text-gray-700 leading-relaxed">
                        Nous sommes une entreprise de bijouterie basée à Agadir, au Maroc, spécialisée dans la création et la vente de bijoux uniques depuis plus de 10 ans. Notre passion pour l'art de la bijouterie nous a conduit à développer des collections exceptionnelles qui captivent nos clients à travers le monde.
                    </p>
                </div>

                <!-- Pictures -->
                <div class="mb-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:m-12 sm:m-3">
                        <div>
                            <img src="{{ asset('images/composants/shop (1).jpg') }}" alt="shop photo" class="w-full aspect-square object-cover rounded-lg shadow-md"></div>
                        <div>
                            <img src="{{ asset('images/composants/shop (2).jpg') }}" alt="shop photo" class="w-full aspect-square object-cover rounded-lg shadow-md"></div>
                        <div>
                            <img src="{{ asset('images/composants/shop (3).jpg') }}" alt="shop photo" class="w-full aspect-square object-cover rounded-lg shadow-md"></div>
                    </div>
                </div>

                <!--Google maps -->
                <div class="mb-8">
                    <h2 class="text-2xl max-sm:text-xl font-semibold mb-4">Notre Emplacement</h2>
                    <div class="relative" style="padding-bottom: 50%; ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.2589382925135!2d-9.594355084265923!3d30.403532181758586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda73f34d6b3c2c1%3A0x1598bf88e9c8ed2d!2sAgadir!5e0!3m2!1sen!2sma!4v1630934397009!5m2!1sen!2sma" width="100%" height="0" frameborder="0" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Contact -->
                <div>
                    <h2 class="text-2xl max-sm:text-xl font-semibold mb-4">Contactez-nous</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Vous pouvez nous contacter à tout moment pour toute question ou demande. N'hésitez pas à visiter notre boutique à Agadir ou à nous envoyer un e-mail :
                    </p>
                    <ul class="list-disc pl-6 mt-4">
                        <li>Adresse : Bijouterie gemVogue ,Rue ,Agadir, Maroc</li>
                        <li>Email : contact@gemvogue.com</li>
                        <li>Téléphone : +212 600000000</li>
                    </ul>
                </div>

                <!-- Champs pour commentaire : -->
                
            </div>
        </div>
@endsection