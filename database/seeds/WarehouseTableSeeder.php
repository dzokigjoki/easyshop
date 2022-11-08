<?php

use Illuminate\Database\Seeder;
use EasyShop\Models\Warehouse;

class WarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouse = new Warehouse();

        $warehouse->title = 'Главен магацин';
        $warehouse->city_id = 27;
        $warehouse->country_id = 1;

        $warehouse->save();
    }
}
