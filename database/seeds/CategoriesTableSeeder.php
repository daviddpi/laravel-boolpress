<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoiesName = ["html","css","js","php","mySql"];

        foreach($categoiesName as $category){
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
