<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // voiture, animal, tec, art,
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Voiture'
            ],
            [
                'name' => 'Animal'
            ],
            [
                'name' => 'Technologie'
            ],
            [
                'name' => 'Art'
            ]
        ]);
    }
}
