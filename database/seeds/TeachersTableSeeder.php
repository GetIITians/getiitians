<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Teacher::class, 5)->create()->each(function($u) {
			$u->topics()->save(factory(App\Topic::class)->make());
			$u->users()->save(factory(App\User::class)->make());
		});
    }
}
