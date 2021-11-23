<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ["Super Admin", "Admin", "Super User", "User"];

        foreach($roles as $key => $role){
            $newRole = new Role();

            $newRole->name = $role;
            $newRole->level = $key+1;

            $newRole->save();
        }
    }
}
