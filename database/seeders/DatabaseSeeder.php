<?php

namespace Database\Seeders;

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
        User::create([
            'name' => "Eka Nata",
            'username' => "dreamerdream",
            'email' => "ekanata1411@gmail.com",
            'password' => bcrypt("password")
        ]);

        User::create([
            'name' => "Govin",
            'username' => "ExRyze",
            'email' => "vaisyagovinandas@gmail.com",
            'password' => bcrypt("password")
        ]);
        
        User::factory(5)->create();
    }
}
