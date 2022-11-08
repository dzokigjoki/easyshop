<?php

use Illuminate\Database\Seeder;
use EasyShop\Models\Role;
use EasyShop\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name'              => 'katalog',
                'menu'              => 'Каталог',
                'display_name'      => 'Каталог мени'
            ],
            [
                'name'              => 'katalog_manage_articles',
                'menu'              => 'Каталог',
                'display_name'      => 'Менаџирање на артикли'
            ],
            [
                'name'              => 'katalog_lager_lista',
                'menu'              => 'Каталог',
                'display_name'      => 'Лагер листа'
            ],
            [
                'name'              => 'katalog_lager_lista_nabavni',
                'menu'              => 'Каталог',
                'display_name'      => 'Лагер листа набавни цени'
            ],
            [
                'name'              => 'katalog_karta_artikl',
                'menu'              => 'Каталог',
                'display_name'      => 'Карта на артикл'
            ],
            [
                'name'              => 'katalog_karta_artikl_nabavni',
                'menu'              => 'Каталог',
                'display_name'      => 'Карта на артикл набавни цени'
            ],
            [
                'name'              => 'katalog_atributi',
                'menu'              => 'Каталог',
                'display_name'      => 'Атрибути'
            ],
            [
                'name'              => 'katalog_baneri_front',
                'menu'              => 'Каталог',
                'display_name'      => 'Банери'
            ],
            [
                'name'              => 'katalog_proizvoditeli',
                'menu'              => 'Каталог',
                'display_name'      => 'Производители'
            ],


            [
                'name'              => 'kategorii',
                'menu'              => 'Категории',
                'display_name'      => 'Категории мени'
            ],


            [
                'name'              => 'magacin',
                'menu'              => 'Магацин',
                'display_name'      => 'Магацин мени'
            ],
            [
                'name'              => 'magacin_ispratnici',
                'menu'              => 'Магацин',
                'display_name'      => 'Испратници'
            ],
            [
                'name'              => 'magacin_priemnici',
                'menu'              => 'Магацин',
                'display_name'      => 'Приемници'
            ],
            [
                'name'              => 'magacin_povratnici',
                'menu'              => 'Магацин',
                'display_name'      => 'Повратници'
            ],
            [
                'name'              => 'magacin_rezervacii',
                'menu'              => 'Магацин',
                'display_name'      => 'Резервации'
            ],
            [
                'name'              => 'magacin_paragon_blok',
                'menu'              => 'Магацин',
                'display_name'      => 'Парагон Блок'
            ],
            [
                'name'              => 'magacin_vlez_izlez',
                'menu'              => 'Магацин',
                'display_name'      => 'Влез / Излез'
            ],
            [
                'name'              => 'magacin_vlez_izlez_plt_print',
                'menu'              => 'Магацин',
                'display_name'      => 'ПЛТ печатење'
            ],
            [
                'name'              => 'magacin_dobavuvaci',
                'menu'              => 'Магацин',
                'display_name'      => 'Добавувачи'
            ],
            [
                'name'              => 'magacin_uvoznici',
                'menu'              => 'Магацин',
                'display_name'      => 'Увозници'
            ],


            [
                'name'              => 'prodazba',
                'menu'              => 'Продажба',
                'display_name'      => 'Продажба мени'
            ],
            [
                'name'              => 'prodazba_naracki',
                'menu'              => 'Продажба',
                'display_name'      => 'Нарачки'
            ],
            [
                'name'              => 'prodazba_plakjanja',
                'menu'              => 'Продажба',
                'display_name'      => 'Плаќања'
            ],
            [
                'name'              => 'prodazba_fakturi',
                'menu'              => 'Продажба',
                'display_name'      => 'Фактури'
            ],
            [
                'name'              => 'prodazba_profakturi',
                'menu'              => 'Продажба',
                'display_name'      => 'Профактури'
            ],
            [
                'name'              => 'prodazba_fiskalni',
                'menu'              => 'Продажба',
                'display_name'      => 'Фискални'
            ],


            [
                'name'              => 'klienti',
                'menu'              => 'Клиенти',
                'display_name'      => 'Клиенти мени'
            ],


            [
                'name'              => 'promocii',
                'menu'              => 'Промоции',
                'display_name'      => 'Промоции мени'
            ],


            [
                'name'              => 'servis',
                'menu'              => 'Сервис',
                'display_name'      => 'Сервис мени'
            ],


            [
                'name'              => 'blog',
                'menu'              => 'Блог',
                'display_name'      => 'Блог мени'
            ],


            [
                'name'              => 'izvestai',
                'menu'              => 'Извештаи',
                'display_name'      => 'Извештаи мени'
            ],

            [
                'name'              => 'izvestai_prodazba',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба мени'
            ],
            [
                'name'              => 'izvestai_prodazba_magacin',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба по магацин'
            ],
            [
                'name'              => 'izvestai_prodazba_denovi',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба по денови'
            ],
            [
                'name'              => 'izvestai_prodazba_proizvoditel',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба по производител'
            ],
            [
                'name'              => 'izvestai_prodazba_kategorija',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба по категорија'
            ],
            [
                'name'              => 'izvestai_prodazba_1',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба - 1'
            ],
            [
                'name'              => 'izvestai_prodazba_2',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба - 2'
            ],
            [
                'name'              => 'izvestai_prodazba_3',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба - 3'
            ],
            [
                'name'              => 'izvestai_prodazba_4',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба - 4'
            ],
            [
                'name'              => 'izvestai_prodazba_5',
                'menu'              => 'Извештаи',
                'display_name'      => 'Продажба - 5'
            ],

            [
                'name'              => 'izvestai_maloprodazba',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба мени'
            ],
            [
                'name'              => 'izvestai_maloprodazba_et',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - ЕТ'
            ],
            [
                'name'              => 'izvestai_maloprodazba_dfi',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - ДФИ'
            ],
            [
                'name'              => 'izvestai_maloprodazba_kdfi',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - КДФИ'
            ],
            [
                'name'              => 'izvestai_maloprodazba_etu',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - ЕТУ'
            ],
            [
                'name'              => 'izvestai_maloprodazba_nivelacija',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - Нивелација'
            ],
            [
                'name'              => 'izvestai_maloprodazba_1',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - 1'
            ],
            [
                'name'              => 'izvestai_maloprodazba_2',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - 2'
            ],
            [
                'name'              => 'izvestai_maloprodazba_3',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - 3'
            ],
            [
                'name'              => 'izvestai_maloprodazba_4',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - 4'
            ],
            [
                'name'              => 'izvestai_maloprodazba_5',
                'menu'              => 'Извештаи',
                'display_name'      => 'Малопродажба - 5'
            ],

            [
                'name'              => 'izvestai_golemoprodazba',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба мени'
            ],
            [
                'name'              => 'izvestai_golemoprodazba_metg',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба - МЕТГ'
            ],
            [
                'name'              => 'izvestai_golemoprodazba_1',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба - 1'
            ],
            [
                'name'              => 'izvestai_golemoprodazba_2',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба - 2'
            ],
            [
                'name'              => 'izvestai_golemoprodazba_3',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба - 3'
            ],
            [
                'name'              => 'izvestai_golemoprodazba_4',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба - 4'
            ],
            [
                'name'              => 'izvestai_golemoprodazba_5',
                'menu'              => 'Извештаи',
                'display_name'      => 'Големопродажба - 5'
            ],

            [
                'name'              => 'izvestai_web',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба мени'
            ],
            [
                'name'              => 'izvestai_web_naracki',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Нарачки'
            ],
            [
                'name'              => 'izvestai_web_artikli',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Продажба по артикли'
            ],
            [
                'name'              => 'izvestai_web_denovi',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Продажба по денови'
            ],
            [
                'name'              => 'izvestai_web_proizvoditel',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Продажба по производител'
            ],
            [
                'name'              => 'izvestai_web_kategorija',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Продажба по категорија'
            ],
            [
                'name'              => 'izvestai_web_sto_ima_vo_kosnickite',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Што има во кошничничките'
            ],
            [
                'name'              => 'izvestai_web_napusteni_kosnicki',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Напуштени кошнички'
            ],
            [
                'name'              => 'izvestai_web_prebaruvanja',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Пребарувања'
            ],
            [
                'name'              => 'izvestai_web_novi_registracii',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Нови регистрации'
            ],
            [
                'name'              => 'izvestai_web_popusti',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Попусти'
            ],
            [
                'name'              => 'izvestai_web_kuponi',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Купони'
            ],
            [
                'name'              => 'izvestai_web_plakjanja',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Плаќања'
            ],
            [
                'name'              => 'izvestai_web_vrateni_naracki',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - Вратени нарачки'
            ],
            [
                'name'              => 'izvestai_web_1',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - 1'
            ],
            [
                'name'              => 'izvestai_web_2',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - 2'
            ],
            [
                'name'              => 'izvestai_web_3',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - 3'
            ],
            [
                'name'              => 'izvestai_web_4',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - 4'
            ],
            [
                'name'              => 'izvestai_web_5',
                'menu'              => 'Извештаи',
                'display_name'      => 'Интернет продажба - 5'
            ],

            [
                'name'              => 'izvestai_ostanato',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато мени'
            ],
            [
                'name'              => 'izvestai_ostanato_top_klienti',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - Топ клиенти'
            ],
            [
                'name'              => 'izvestai_ostanato_mala_zaliha',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - Мала залиха'
            ],
            [
                'name'              => 'izvestai_ostanato_1',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - 1'
            ],
            [
                'name'              => 'izvestai_ostanato_2',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - 2'
            ],
            [
                'name'              => 'izvestai_ostanato_3',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - 3'
            ],
            [
                'name'              => 'izvestai_ostanato_4',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - 4'
            ],
            [
                'name'              => 'izvestai_ostanato_5',
                'menu'              => 'Извештаи',
                'display_name'      => 'Останато - 5'
            ],


            [
                'name'              => 'admin',
                'menu'              => 'Админ',
                'display_name'      => 'Админ мени'
            ],
            [
                'name'              => 'admin_vraboteni',
                'menu'              => 'Админ',
                'display_name'      => 'Вработени'
            ],
            [
                'name'              => 'admin_dozvoli',
                'menu'              => 'Админ',
                'display_name'      => 'Дозволи за пристап'
            ],
            [
                'name'              => 'admin_magacini',
                'menu'              => 'Админ',
                'display_name'      => 'Магацини'
            ],
            [
                'name'              => 'admin_podesuvanja',
                'menu'              => 'Админ',
                'display_name'      => 'Подесувања'
            ],

            [
                'name'              => 'admin_izbor_magacin',
                'menu'              => 'Админ',
                'display_name'      => 'Избор на магацин во филтри'
            ]
            //ToDo како што ќе има извештаи ќе треба тука да ги ставаме
        ];

        DB::table('permissions')->insert( $permissions );

        DB::table('permission_role')->delete();


        // Insert permissions for admin
        $adminRoleId = Role::where('name' , '=', 'admin')->first()->id;

        $permissions = Permission::all();
        $perm_roles  = []; 
        foreach ($permissions as $key => $value) {
            DB::table('permission_role')->insert( ['permission_id' => $value->id,'role_id'=>$adminRoleId] );
        }       
    }
}
