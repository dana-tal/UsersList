<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds, comment
     */


    public function run(): void
    {
        $admin_pass =  env('ADMIN_USER_PASS');

        User::create([
            'first_name' => 'Dana',
            'last_name' => 'Tal',
            'username'=>'danat',
            'password' => bcrypt($admin_pass),
            'is_admin' => true
        ]);
        User::create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'username'=>'superuser',
            'password' => bcrypt($admin_pass),
            'is_admin' => true
        ]);
        User::create([
            'first_name' => 'Test',
            'last_name' => 'Test',
            'username'=>'test',
            'password' => bcrypt('123456'),
            'is_admin' =>false
        ]);
        User::factory(23)->create();

    }
}
