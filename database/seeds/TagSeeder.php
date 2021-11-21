<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 7; $i++){
            $tag = new Tag();

            $tag->name = $faker->word();
            $tag->color = $faker->hexColor();

            $tag->save();
        }
    }
}
