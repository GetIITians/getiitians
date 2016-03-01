<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

/*
        factory(App\User::class, 10)->create()->each(function($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });
*/

		Model::reguard();
    }
}
