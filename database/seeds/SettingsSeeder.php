<?php

use EasyShop\Models\AdminSettings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $settings = [
            [
                'name'              => 'titlepage',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'logo',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'emaildomain',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'contactemail',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'telephone',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'modules',
                'value'              => '{"catalogMenu":"1","banners":"0","lager":"1","attributes":"1","magacinMenu":"1","reservations":"0","categoriesMenu":"1","sales":"1","clientsMenu":"1","promotionsMenu":"1","coupons":"0","blogsMenu":"0","izvestaiMenu":"1","stickers":"0","adminMenu":"1","employees":"1","settings":"1","permisii":"1","ticketsMenu":"0","servisMenu":"0"}',
                'type'      => 'array'
            ],
            [
                'name'              => 'bannerssize',
                'value'              => '{"lg":"750x750","md":"350x350","sm":"100x100"}',
                'type'      => 'array'
            ],
            [
                'name'              => 'productssize',
                'value'              => '{"lg":"750x750","md":"350x350","sm":"100x100"}',
                'type'      => 'array'
            ],
            [
                'name'              => 'blogssize',
                'value'              => '{"lg":"750x750","md":"350x350","sm":"100x100"}',
                'type'      => 'array'
            ],
            [
                'name'              => 'currency',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'currencies',
                'value'              => '[{"name":"\u041c\u041a\u0414","divider":"1"}]',
                'type'      => 'array'
            ],
            [
                'name'              => 'paymentMethods',
                'value'              => '[{"name":"gotovo","display_name":"\u0413\u043e\u0442\u043e\u0432\u043e"}]',
                'type'      => 'array'
            ],
            [
                'name'              => 'watermark',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'typeOfPayment',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'merchantId',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'merchantName',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'merchantPassword',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'prices',
                'value'              => null,
                'type'      => 'array'
            ],
            [
                'name'              => 'pixelCode',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'pixelDefaultCurrency',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'googleVerification',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'googleAnalytics',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'googleVerification',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'hideIzvestai',
                'value'              => null,
                'type'      => 'array'
            ],
            [
                'name'              => 'fakturaIspratnica',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'nalepnica',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'sifra',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'orderColumns',
                'value'              => '{"phone":"1","address":"1","city":"1","paid":"1","municipality":"0","courier":"0","courierStatus":"0","trackingCode":"1","total":"1","deliveredAt":"1","paidAt":"1","posta":"1","payment":"1","articles":"1"}',
                'type'      => 'array'
            ],
            [
                'name'              => 'warehouseId',
                'value'              => 1,
                'type'      => 'integer'
            ],
            [
                'name'              => 'fakturaOnline',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'rezervacijaOnline',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'allowMinusQuantity',
                'value'              => true,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'fixCeni',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'limitProducts',
                'value'              => null,
                'type'      => 'integer'
            ],
            [
                'name'              => 'sifra',
                'value'              => null,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'promotion',
                'value'              => null,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'recaptchaSitekey',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'recaptchaSecret',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'showGoogleProductCategoryField',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'showVariations',
                'value'              => false,
                'type'      => 'boolean'
            ], 
            [
                'name'              => 'directBuy',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'showManufacturer',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'shopImporter',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'showZemjaNaPoteklo',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'firstOrderDiscount',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'firstOrderDiscountTip',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'firstOrderDiscountValue',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'defaultRecommeded',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'locale',
                'value'              => 'mk',
                'type'      => 'string'
            ],
            [
                'name'              => 'findDifferencesMenu',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'children',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'showChildren',
                'value'              => false,
                'type'      => 'boolean'
            ],
            [
                'name'              => 'clientId',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'storeKey',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'currencyCode',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'apiUser',
                'value'              => null,
                'type'      => 'string'
            ],
            [
                'name'              => 'apiPassword',
                'value'              => null,
                'type'      => 'string'
            ],



        ];

        foreach ($settings as $i) {

            $check = AdminSettings::where('name', $i['name'])->first();
            if (!$check) {
                DB::table('admin_settings')->insert($i);
            }
        }
    }
}
