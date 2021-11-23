<?php

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
        $this->call([
            
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            UserInfoSeeder::class,
            TagSeeder::class,
            PostsTableSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class

        ]);
    }
}
