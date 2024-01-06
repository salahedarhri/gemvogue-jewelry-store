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

        for ($i = 0; $i < 80; $i++) {

            //Seeding Photos :
            $type_bijou = $faker->randomElement(['Collier', 'Anneau', 'Bracelet','Boucles oreilles']);
            
            switch ($type_bijou) {
                case 'Anneau':
                      $photo1_bijou = 'ring1.jpg';
                      $photo2_bijou = 'ring2.jpg';
                    break;
                case 'Collier':
                      $photo1_bijou = 'necklace1.jpg';
                      $photo2_bijou = 'necklace2.jpg';
                    break;
                case 'Bracelet':
                      $photo1_bijou = 'bracelet1.jpg';
                      $photo2_bijou = 'bracelet2.jpg';
                    break;
                case 'Boucles oreilles':
                    $photo1_bijou = 'boucles1.jpg';
                    $photo2_bijou = 'boucles2.jpg';
                    break;
                default:  
                    $photo1_bijou = 'bijou_default1.jpg';
                    $photo2_bijou = 'bijou_default2.jpg';}

            //Seeding slug using name and type:
            $nom = $faker->words(3,true);
            $slug = Str::slug("$nom-$type_bijou");

            
            Bijou::create([
                'nom' => $nom,
                'description' => $faker->sentence,
                'type' => $type_bijou,
                'photo1' => $photo1_bijou,
                'photo2' => $photo2_bijou,
                'collection' => $faker->randomElement(['Automne 2023','Ete 2023','Hiver 2024']),
                'prix' => $faker->randomFloat(0,100, 3000),
                'qte_stock' => $faker->numberBetween(10, 100),
                'type_metal' => $faker->randomElement(['Or', 'Argent', 'Platine']),
                'slug' => $slug,
            ]);
        }
    }
}

