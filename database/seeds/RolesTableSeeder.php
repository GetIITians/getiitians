<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(App\Role::class, 'student', 1)->create();
		factory(App\Role::class, 'teacher', 1)->create();
		factory(App\Role::class, 'admin', 1)->create();
		factory(App\Role::class, 'superadmin', 1)->create();
    }
}