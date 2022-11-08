<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(array(
			array('country_name' => 'Македонија', 'country_name_en' => 'Macedonia'),
			array('country_name' => 'Албанија', 'country_name_en' => 'Albania'),
			array('country_name' => 'Андора', 'country_name_en' => 'Andorra'),
			array('country_name' => 'Ерменија', 'country_name_en' => 'Armenia'),
			array('country_name' => 'Австрија', 'country_name_en' => 'Austria'),
			array('country_name' => 'Азербејџан', 'country_name_en' => 'Azerbaijan'),
			array('country_name' => 'Белорусија', 'country_name_en' => 'Belarus'),
			array('country_name' => 'Белгија', 'country_name_en' => 'Belgium'),
			array('country_name' => 'Босна и Херцеговина', 'country_name_en' => 'Bosnia and Herzegovina'),
			array('country_name' => 'Бугарија', 'country_name_en' => 'Bulgaria'),
			array('country_name' => 'Хрватска', 'country_name_en' => 'Croatia'),
			array('country_name' => 'Кипар', 'country_name_en' => 'Cyprus'),
			array('country_name' => 'Чешка', 'country_name_en' => 'Czech Republic'),
			array('country_name' => 'Данска', 'country_name_en' => 'Denmark'),
			array('country_name' => 'Естонија', 'country_name_en' => 'Estonia'),
			array('country_name' => 'Финска', 'country_name_en' => 'Finland'),
			array('country_name' => 'Франција', 'country_name_en' => 'France'),
			array('country_name' => 'Грузија', 'country_name_en' => 'Georgia'),
			array('country_name' => 'Германија', 'country_name_en' => 'Germany'),
			array('country_name' => 'Грција', 'country_name_en' => 'Greece'),
			array('country_name' => 'Унгарија', 'country_name_en' => 'Hungary'),
			array('country_name' => 'Исланд', 'country_name_en' => 'Iceland'),
			array('country_name' => 'Ирска', 'country_name_en' => 'Ireland'),
			array('country_name' => 'Италија', 'country_name_en' => 'Italy'),
			array('country_name' => 'Казакстан', 'country_name_en' => 'Kazakhstan'),
			array('country_name' => 'Косово', 'country_name_en' => 'Kosovo'),
			array('country_name' => 'Латвија', 'country_name_en' => 'Latvia'),
			array('country_name' => 'Лихтенштајн', 'country_name_en' => 'Liechtenstein'),
			array('country_name' => 'Литванија', 'country_name_en' => 'Lithuania'),
			array('country_name' => 'Луксембург', 'country_name_en' => 'Luxembourg'),
			array('country_name' => 'Малта', 'country_name_en' => 'Malta'),
			array('country_name' => 'Молдавија', 'country_name_en' => 'Moldova'),
			array('country_name' => 'Монако', 'country_name_en' => 'Monaco'),
			array('country_name' => 'Црна Гора', 'country_name_en' => 'Montenegro'),
			array('country_name' => 'Холандија', 'country_name_en' => 'Netherlands'),
			array('country_name' => 'Норвешка', 'country_name_en' => 'Norway'),
			array('country_name' => 'Полска', 'country_name_en' => 'Poland'),
			array('country_name' => 'Португалија', 'country_name_en' => 'Portugal'),
			array('country_name' => 'Романија', 'country_name_en' => 'Romania'),
			array('country_name' => 'Русија', 'country_name_en' => 'Russia'),
			array('country_name' => 'Сан Марино', 'country_name_en' => 'San Marino'),
			array('country_name' => 'Србија', 'country_name_en' => 'Serbia'),
			array('country_name' => 'Словачка', 'country_name_en' => 'Slovakia'),
			array('country_name' => 'Словенија', 'country_name_en' => 'Slovenia'),
			array('country_name' => 'Шпанија', 'country_name_en' => 'Spain'),
			array('country_name' => 'Шведска', 'country_name_en' => 'Sweden'),
			array('country_name' => 'Швајцарија', 'country_name_en' => 'Switzerland'),
			array('country_name' => 'Турција', 'country_name_en' => 'Turkey'),
			array('country_name' => 'Украина', 'country_name_en' => 'Ukraine'),
			array('country_name' => 'Англија', 'country_name_en' => 'United Kingdom'),
			array('country_name' => 'Израел', 'country_name_en' => 'Israel'),
			array('country_name' => 'Канада', 'country_name_en' => 'Canada'),
			array('country_name' => 'САД', 'country_name_en' => 'USA'),
			array('country_name' => 'Австралија', 'country_name_en' => 'Australia'),
			array('country_name' => 'Нов Зеланд', 'country_name_en' => 'New Zealand'),
			array('country_name' => 'Латинска Америка', 'country_name_en' => 'Latin America'),
			array('country_name' => 'Африка', 'country_name_en' => 'Africa'),
			array('country_name' => 'Индија', 'country_name_en' => 'India'),
			array('country_name' => 'Кина', 'country_name_en' => 'China'),
			array('country_name' => 'Азија', 'country_name_en' => 'Asia'),
			array('country_name' => 'Блиски Исток', 'country_name_en' => 'Middle East'),
			array('country_name' => 'Друга', 'country_name_en' => 'Other'),
			array('country_name' => 'Тајланд', 'country_name_en' => 'Thailand'),
			array('country_name' => 'Тајван', 'country_name_en' => 'Thaiwan')
        ));
    }
}
