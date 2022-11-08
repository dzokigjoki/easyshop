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
        $this->call(PermissionsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesMkTableSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(WarehouseTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(DashboardSeeder::class);

        Model::reguard();

    }
}
