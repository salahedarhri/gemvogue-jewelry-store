<?php

namespace Database\Seeders; // Make sure this matches your file location

use Illuminate\Database\Seeder;
use App\Models\JewelryProduct;
use Faker\Factory as Faker;

class BijouxSeeder extends Seeder // Update the class name to match the file name
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {

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
                $photo2_bijou = 'ring (4).jpg';
            }

            
            JewelryProduct::create([
                'nom' => $faker->word,
                'description' => $faker->sentence,
                'type' => $type_bijou,
                'photo1' => $photo1_bijou,
                'photo2' => $photo2_bijou,
                'collection' => $faker->randomElement(['Automne 2023','Ete 2023','Hiver 2023']),
                'prix' => $faker->randomFloat(2, 50, 500),
                'qte_stock' => $faker->numberBetween(10, 100),
                'type_metal' => $faker->randomElement(['Or', 'Argent', 'Platine']),
                'gemme' => $faker->randomElement(['Diamond', 'Rubis', 'Sapphire']),
            ]);
        }
    }
}

