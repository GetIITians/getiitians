<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\User::class, 'user1',1)->create();
		factory(App\User::class, 'user2',1)->create();
    }
}
