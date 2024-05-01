<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Newsletter;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for( $i=0 ; $i < 30; $i++ ){
            Newsletter::create([
                'email' => fake()->unique()->safeEmail(),
            ]);
        }
    }
}
