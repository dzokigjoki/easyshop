<?php

use Illuminate\Database\Seeder;
use EasyShop\Models\User;
use EasyShop\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->email = 'info@generadevelopment.com';
        $admin->password = Hash::make('generadev123');
        $admin->confirmation_code = md5('1');
        $admin->confirmed = 1;
        $admin->first_name = 'Администратор';
        $admin->last_name = 'Генера';
        $admin->city_id = 27;
        $admin->country_id = 1;
        $admin->address = 'Прашка 13 2/2';
        $admin->company = 'Генера Девелопмент ДОО';
        $admin->gender = 'male';
        $admin->type = 'company';
        $admin->nacin_plakanje = 'faktura';
        $admin->address_shiping = 'Прашка 13 2/2';
        $admin->danocen_broj = '12345';
        $admin->website = 'https://generadevelopment.com';
        $admin->aktiven = 1;
        $admin->warehouse_id = 1;

        $admin->save();

        $role = Role::where('name', '=', 'admin')->first();

        $admin->roles()->attach($role->id);


        $guest = new User();
        $guest->email = 'gostin@' . \EasyShop\Models\AdminSettings::getField('emaildomain');
        $guest->password = Hash::make('test123');
        $guest->confirmation_code = md5('1');
        $guest->confirmed = 1;
        $guest->first_name = 'Гостин';
        $guest->last_name = '';
        $guest->city_id = 27;
        $guest->country_id = 1;
        $guest->gender = 'male';
        $guest->type = 'person';
        $guest->nacin_plakanje = 'gotovo';
        $guest->aktiven = 1;
        $guest->warehouse_id = 1;

        $guest->save();
    }
}
