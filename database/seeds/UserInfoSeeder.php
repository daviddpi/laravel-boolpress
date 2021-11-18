<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\UserInfo;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $infoUser = new UserInfo();

        $infoUser->address = $faker->sentence(2);
        $infoUser->country = $faker->sentence(1);
        $infoUser->telephone = $faker->numerify('##########');

        $infoUser->save();
    }
}
