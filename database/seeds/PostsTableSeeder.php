<?php

use App\Post;
use App\Category;
use Faker\Provider\Lorem;
use Illuminate\Support\Arr;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $query = Category::pluck("id")->toArray();

        for($i = 0; $i < 50; $i++){
            $post = new Post();

            $post->title = $faker->sentence(1);
            $post->author = $faker->sentence(1);
            $post->post_date = $faker->dateTimeThisYear();
            $post->post_content = $faker->paragraph(17);
            $post->image_url = $faker->imageUrl(300, 300, $post->title);
            $post->category_id = Arr::random($query);

            $post->save();
        }
    }
}
