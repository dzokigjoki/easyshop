<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Http\Requests\AdminSettingsRequest;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Settings;
use EasyShop\Models\Country;
use EasyShop\Models\City;
use View;

class SettingsController extends Controller
{

    /**
     * Edit settings
     *
     * @return View
     */
    public function index()
    {
        $settings = Settings::first();
        if (is_null($settings)) {
            $settings = new Settings();
        }
        return View::make('admin.settings.index', compact('settings', 'countries', 'cities'));
    }


    /**
     *  Store settings
     *
     * @param AdminSettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminSettingsRequest $request)
    {

        $settings = Settings::first();

        if (is_null($settings)) {
            $settings = new Settings();
        }

        $settings->company_name = $request->get('company_name');
        $settings->company_address = $request->get('company_address');
        $settings->company_city = $request->get('company_city');
        $settings->company_country = $request->get('company_country');
        $settings->company_bank_name = $request->get('company_bank_name');
        $settings->company_bank_account = $request->get('company_bank_account');
        $settings->company_bank_name_2 = $request->get('company_bank_name_2');
        $settings->company_bank_account_2 = $request->get('company_bank_account_2');
        $settings->company_bank_name_3 = $request->get('company_bank_name_3');
        $settings->company_bank_account_3 = $request->get('company_bank_account_3');
        $settings->company_bank_name_4 = $request->get('company_bank_name_4');
        $settings->company_bank_account_4 = $request->get('company_bank_account_4');
        $settings->company_vat_number = $request->get('company_vat_number');
        $settings->meta_string_homepage = $request->get('meta_string_homepage');

//        $facebook_pixel_list = $request->get('facebook_pixel');
//        $settings->facebook_pixel = implode(",",$facebook_pixel_list);
//        $settings->facebook_pixel_currency = $request->get('curr');



//        pixel za topprodukti




        if(strpos(config( 'app.client'), 'topprodukti') != false) {
            $country_list = ['mk', 'bg', 'cz', 'hr', 'hu', 'pl', 'ro', 'rs', 'si', 'sk'];
        }

        elseif(strpos(config( 'app.client'), 'globalstore') != false) {

            $country_list = ['mk', 'bg', 'ro'];
        }
        else
            $country_list = ['mk'];

            foreach ($country_list as $country) {
                $pixelList = $request->input('facebook_pixel_' . $country, []);
                $pixelList = array_filter($pixelList, function($val) {
                    return !is_null($val) && !empty($val) && strlen($val) > 0;
                });

                $settings->{'facebook_pixel_' . $country} = implode(",", $pixelList);
                $settings->{'facebook_pixel_currency_' . $country} = $request->get('facebook_pixel_currency_' . $country);
            }

        \Cache::forget(config( 'app.client'). '.settings');
        $settings->save();
        return redirect()->route('admin.settings');

    }
}
