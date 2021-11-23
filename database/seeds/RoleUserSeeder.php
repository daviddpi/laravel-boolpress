<?php

use App\Role;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $role_ids = Role::pluck("id")->toArray();

        foreach($users as $user){
            $user->roles()->sync( [Arr::random($role_ids)], [Arr::random($role_ids)]);
        }
    }
}
