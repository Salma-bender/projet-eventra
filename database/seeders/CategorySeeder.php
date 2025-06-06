<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $categories = [
            'Conférence',
            'Atelier',
            'Concert',
            'Webinaire',
            'Compétition',
            'Séminaire'
        ];

        foreach ($categories as $name) {
            Categorie::create(['nom' => $name]);
        }
    }
}
