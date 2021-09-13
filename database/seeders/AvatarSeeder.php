<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatars')->insert([
            [
                'name'=>'Avatar1',
                'src'=>'imgAvatar1.jpg'

            ],
            [
                'name'=>'Avatar2',
                'src'=>'imgAvatar2.jpg'

            ],
            [
                'name'=>'Avatar3',
                'src'=>'imgAvatar2.jpg'

            ],
            [
                'name'=>'Femme1',
                'src'=>'avatarFemme1.jpg'

            ],
            [
                'name'=>'Femme2',
                'src'=>'avatarFemme2.jpg'

            ],
        ]);
    }
}
