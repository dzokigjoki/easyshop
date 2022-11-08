<?php

use Illuminate\Database\Seeder;
use EasyShop\Models\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = new Settings();

        $settings->company_name = '';
        $settings->company_address = '';
        $settings->company_city = 'Скопје';
        $settings->company_country = 'Македонија';

        $settings->save();
    }
}
