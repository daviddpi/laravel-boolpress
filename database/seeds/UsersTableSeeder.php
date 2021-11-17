<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $myUser = new User();

        $myUser->name = "David";
        $myUser->email = "prova@gmail.com";
        $myUser->password = bcrypt("alessia07");

        $myUser->save();
    }
}
