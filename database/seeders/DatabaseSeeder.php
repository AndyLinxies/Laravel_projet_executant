<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AvatarSeeder::class,
            RoleSeeder::class,
            CategorieSeeder::class,
            ImageSeeder::class,
            UserSeeder::class,
        ]);
        Blog::factory()->count(4)->create();
    }
}
