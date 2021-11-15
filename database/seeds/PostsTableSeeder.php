<?php

use App\Post;
use Faker\Provider\Lorem;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){
            $post = new Post();

            $post->title = $faker->sentence(1);
            $post->author = $faker->sentence(1);
            $post->post_date = $faker->dateTimeThisYear();
            $post->post_content = $faker->paragraph(17);
            $post->image_url = $faker->imageUrl(300, 300, $post->title);

            $post->save();
        }
    }
}
