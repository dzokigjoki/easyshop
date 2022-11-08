<?php

use Illuminate\Database\Seeder;
use EasyShop\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role;
        $adminRole->name = 'admin';
        $adminRole->save();
    }
}
