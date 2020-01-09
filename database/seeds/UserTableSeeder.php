<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $admin = new User();
        $admin->name = 'Maciek';
        $admin->email = 'maciej.loj@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $test_user = new User();
        $test_user->name = 'Test';
        $test_user->email = 'example@example.com';
        $test_user->password = bcrypt('user');
        $test_user->save();
        $test_user->roles()->attach($role_user);

    }
}
