<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder{

    public function run(){
        DB::table('users')->delete();

        $adminRole = Role::whereName('administrator')->first();
        $userRole = Role::whereName('user')->first();

        $user = User::create(array(
            'first_name'    => 'John',
            'last_name'     => 'Doe',
            'email'         => 'j.doe@codingo.me',
            'company'       => 'ACME',
            'password'      => Hash::make('password'),
            'token'         => str_random(64),
            'activated'     => true
        ));

        $user = User::create(array(
            'first_name'    => 'Jane',
            'last_name'     => 'Doe',
            'email'         => 'jane.doe@test.com',
            'company'       => 'ACME',
            'password'      => Hash::make('janesPassword'),
            'token'         => str_random(64),
            'activated'     => true
        ));
    }
}
