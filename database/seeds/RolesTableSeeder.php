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
		factory(App\Role::class, 'roleStudent', 1)->create();
		factory(App\Role::class, 'roleTeacher', 1)->create();
		factory(App\Role::class, 'roleAdmin', 1)->create();
		factory(App\Role::class, 'roleSuperadmin', 1)->create();
    }
}