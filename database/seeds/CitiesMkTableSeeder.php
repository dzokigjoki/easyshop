<?php

use Illuminate\Database\Seeder;

class CitiesMkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(array(
            array('zip' => '2330', 'city_name' => 'Берово', 'city_name_en' => 'Berovo', 'country_id' => '1'),
			array('zip' => '7000', 'city_name' => 'Битола', 'city_name_en' => 'Bitola', 'country_id' => '1'),
			array('zip' => '1484', 'city_name' => 'Богданци', 'city_name_en' => 'Bogdanci', 'country_id' => '1'),
			array('zip' => '1250', 'city_name' => 'Дебар', 'city_name_en' => 'Debar', 'country_id' => '1'),
			array('zip' => '2320', 'city_name' => 'Делчево', 'city_name_en' => 'Delčevo', 'country_id' => '1'),
			array('zip' => '1442', 'city_name' => 'Демир Капија', 'city_name_en' => 'Demir Kapija', 'country_id' => '1'),
			array('zip' => '7240', 'city_name' => 'Демир Хисар', 'city_name_en' => 'Demir Hisar', 'country_id' => '1'),
			array('zip' => '1480', 'city_name' => 'Гевгелија', 'city_name_en' => 'Gevgelija', 'country_id' => '1'),
			array('zip' => '1230', 'city_name' => 'Гостивар', 'city_name_en' => 'Gostivar', 'country_id' => '1'),
			array('zip' => '1430', 'city_name' => 'Кавадарци', 'city_name_en' => 'Kavadarci', 'country_id' => '1'),
			array('zip' => '6250', 'city_name' => 'Кичево', 'city_name_en' => 'Kičevo', 'country_id' => '1'),
			array('zip' => '2300', 'city_name' => 'Кочани', 'city_name_en' => 'Kočani', 'country_id' => '1'),
			array('zip' => '1360', 'city_name' => 'Кратово', 'city_name_en' => 'Kratovo', 'country_id' => '1'),
			array('zip' => '1330', 'city_name' => 'Крива Паланка', 'city_name_en' => 'Kriva Palanka', 'country_id' => '1'),
			array('zip' => '7550', 'city_name' => 'Крушево', 'city_name_en' => 'Kruševo', 'country_id' => '1'),
			array('zip' => '1300', 'city_name' => 'Куманово', 'city_name_en' => 'Kumanovo', 'country_id' => '1'),
			array('zip' => '6530', 'city_name' => 'Македонски Брод', 'city_name_en' => 'Makedonski Brod', 'country_id' => '1'),
			array('zip' => '2304', 'city_name' => 'Македонска Каменица', 'city_name_en' => 'Makedonska Kamenica', 'country_id' => '1'),
			array('zip' => '1440', 'city_name' => 'Неготино', 'city_name_en' => 'Negotino', 'country_id' => '1'),
			array('zip' => '6000', 'city_name' => 'Охрид', 'city_name_en' => 'Ohrid', 'country_id' => '1'),
			array('zip' => '2326', 'city_name' => 'Пехчево', 'city_name_en' => 'Pehčevo', 'country_id' => '1'),
			array('zip' => '7500', 'city_name' => 'Прилеп', 'city_name_en' => 'Prilep', 'country_id' => '1'),
			array('zip' => '2210', 'city_name' => 'Пробиштип', 'city_name_en' => 'Probištip', 'country_id' => '1'),
			array('zip' => '2420', 'city_name' => 'Радовиш', 'city_name_en' => 'Radoviš', 'country_id' => '1'),
			array('zip' => '7310', 'city_name' => 'Ресен', 'city_name_en' => 'Resen', 'country_id' => '1'),
			array('zip' => '2220', 'city_name' => 'Свети Николе', 'city_name_en' => 'Sveti Nikole', 'country_id' => '1'),
			array('zip' => '1000', 'city_name' => 'Скопје', 'city_name_en' => 'Skopje', 'country_id' => '1'),
			array('zip' => '6330', 'city_name' => 'Струга', 'city_name_en' => 'Struga', 'country_id' => '1'),
			array('zip' => '2400', 'city_name' => 'Струмица', 'city_name_en' => 'Strumica', 'country_id' => '1'),
			array('zip' => '2000', 'city_name' => 'Штип', 'city_name_en' => 'Štip', 'country_id' => '1'),
			array('zip' => '1200', 'city_name' => 'Тетово', 'city_name_en' => 'Tetovo', 'country_id' => '1'),
			array('zip' => '2460', 'city_name' => 'Валандово', 'city_name_en' => 'Valandovo', 'country_id' => '1'),
			array('zip' => '1400', 'city_name' => 'Велес', 'city_name_en' => 'Veles', 'country_id' => '1'),
			array('zip' => '2310', 'city_name' => 'Виница', 'city_name_en' => 'Vinica', 'country_id' => '1'),
			array('zip' => '', 'city_name' => 'Друго', 'city_name_en' => 'Other', 'country_id' => NULL),
			array('zip' => '1487', 'city_name' => 'Дојран', 'city_name_en' => 'Dojran', 'country_id' => '1')
        ));
    }
}
