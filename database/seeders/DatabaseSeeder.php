<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::create([
        //     'name' => 'walas',
        //     'email' => 'walas@gmail.com',
        //     'role'=>'walas',
        //     'password'=>bcrypt('12345678')
        // ]);
        // \App\Models\User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'role'=>'admin',
        //     'password'=>bcrypt('12345678')
        // ]);

        User::create(['name' => 'admin', 'email' => 'admin@gmail.com',  'role'=>'admin', 'password'=>bcrypt('12345678')]);
    }
}
