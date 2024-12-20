<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        User::create([
            'first_name' => 'Dana',
            'last_name' => 'Tal',
            'username'=>'danat',
            'password' => bcrypt('Marb33bmk#'),
            'is_admin' => true
        ]);
        User::create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'username'=>'superuser',
            'password' => bcrypt('Marb33bmk#'),
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
