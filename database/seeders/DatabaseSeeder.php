<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Events;
use App\Models\Follows;

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
        Blog::factory(30)->create();
        Events::factory(10)->create();

        Follows::create(['user_id' => '2', 'followed_by' => '3']);
        Follows::create(['user_id' => '2', 'followed_by' => '4']);
        Follows::create(['user_id' => '2', 'followed_by' => '5']);
        Follows::create(['user_id' => '1', 'followed_by' => '2']);
        Follows::create(['user_id' => '1', 'followed_by' => '3']);
    }
}
