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

		$this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

		DB::table('role_user')->insert([
			'user_id' => 1,
			'role_id' => 2,
		],[
			'user_id' => 1,
			'role_id' => 3,
		]);

        Model::reguard();
    }
}
