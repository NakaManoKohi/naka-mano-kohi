<?php

namespace Database\Seeders;

use App\Models\benefit;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;
use App\Models\Events;
use App\Models\Follows;
use App\Models\Level;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['level'=>'admin']);
        Level::create(['level'=>'subadmin']);
        Level::create(['level'=>'user']);
        Benefit::create(['benefit'=>'admin']);
        Benefit::create(['benefit'=>'subadmin']);
        Benefit::create(['benefit'=>'user']);
        
        User::create([
            'name' => "Eka Nata",
            'username' => "dreamerdream",
            'email' => "ekanata1411@gmail.com",
            'password' => bcrypt("password"),
            'level' => 1
        ]);

        User::create([
            'name' => "Govin",
            'username' => "ExRyze",
            'email' => "vaisyagovinandas@gmail.com",
            'password' => bcrypt("password"),
            'level' => 2
        ]);
        
        User::factory(5)->create();
        Blog::factory(10)->create();
        Events::factory(10)->create();
        Post::factory(10)->create();
    }
}
