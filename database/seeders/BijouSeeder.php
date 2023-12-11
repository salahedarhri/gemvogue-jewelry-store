<?php

namespace Database\Seeders; 

use Illuminate\Database\Seeder;
use App\Models\Bijou;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BijouSeeder extends Seeder {
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 40; $i++) {

            //Seeding Photos :
            $type_bijou = $faker->randomElement(['Collier', 'Anneau', 'Bracelet']);
            switch ($type_bijou) {
                case 'Anneau':
                      $photo1_bijou = 'ring (1).jpg';
                      $photo2_bijou = 'ring (2).jpg';
                    break;
                case 'Collier':
                      $photo1_bijou = 'collier.jpg';
                      $photo2_bijou = 'collier2.jpg';
                    break;
                case 'Bracelet':
                      $photo1_bijou = 'bracelet.jpg';
                      $photo2_bijou = 'bracelet2.jpg';
                    break;
                default:  
                $photo1_bijou = 'ring (3).jpg';
                $photo2_bijou = 'ring (4).jpg';}

            //Seeding slug using name and type:
            $nom = $faker->words(3,true);
            $slug = Str::slug("$nom-$type_bijou");

            
            Bijou::create([
                'nom' => $nom,
                'description' => $faker->sentence,
                'type' => $type_bijou,
                'photo1' => $photo1_bijou,
                'photo2' => $photo2_bijou,
                'collection' => $faker->randomElement(['Automne 2023','Ete 2023','Hiver 2023']),
                'prix' => $faker->randomFloat(0,100, 3000),
                'qte_stock' => $faker->numberBetween(10, 100),
                'type_metal' => $faker->randomElement(['Or', 'Argent', 'Platine']),
                'slug' => $slug,
            ]);
        }
    }
}

