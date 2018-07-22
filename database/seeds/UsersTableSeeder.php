<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@example.com',
        	'password' => Hash::make('password'),
        ]);

        // Assign Role of Admin to Admin
        $admin->assignRole('admin');

        // Create a Profile for a new user on registration
        Profile::create([
            'user_id'   => $admin->id,
            'username'  => 'admin'
        ]);


    }
}
