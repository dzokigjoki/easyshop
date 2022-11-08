<?php

namespace EasyShop\Http\Controllers;

use EasyShop\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use EasyShop\Models\Settings;
use Session;
use View;
use DB;
use App;
use Agent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use EasyShop\Services\GeoIpService;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\Manufacturers;
use EasyShop\Models\PopupModal;
use EasyShop\Models\Wishlist;

class FrontController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var string
     *
     * Set the price group of the user
     */
    protected $priceGroup = 'price_retail_1';

    /**
     * @var null
     */
    protected $defaultCurrency = null;

    /**
     * List of menu categories
     *
     * @var array
     */
    protected $menuCategories = [];


    /**
     * Client from env
     *
     * @var string
     */
    protected $client = '';


    /**
     * This is needed when multiple clients use the same database to differentiate the products by category
     * Topprodukti is an example of that
     *
     * @var null
     */
    protected $categoriesLastChildIds = null;


    /**
     * @param $categoryService
     */
    public function __construct($categoryService)
    {
        $productService = new \EasyShop\Services\ProductService(\App::make(\EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface::class));
        $GeoIpService =  new \EasyShop\Services\GeoIpService();

        $this->client = config( 'app.client');

        $this->locale = detectLocale();

        $this->lang = detectLang();

        $this->urlLang = detectUrlLang();

        App::setLocale($this->locale);

        // TODO: clear from cache when changed
        // Get categories for the menu
        //        $menuCategories = \Cache::remember(config( 'app.client') . '.menu', 60 * 24, function() use ($categoryService) {
        //            return $categoryService->getNestedCategoryList($onlyActive = TRUE);
        //        });
        $menuCategories = $categoryService->getNestedCategoryList($onlyActive = TRUE, $onlyMainMenu = TRUE, $this->lang);

        $this->menuCategories = $menuCategories;
        View::share('menuCategories', $menuCategories);
        View::share('isMobile', Agent::isMobile());
        View::share('lang', $this->lang); // e.g. 'lang1'

        View::share('locale', $this->locale); // e.g. 'en'

        View::share('urlLang', $this->urlLang); // e.g. '/en'

        //MAKE CACHE::REMEMBER!!
        /* $settings = \Cache::remember(config( 'app.client'). '.settings', 60*24, function () {
            return Settings::first();
        });*/

        $settings = Settings::first();

        $settingsTableFacebookPixels = [];
        $settingsTableFacebookPixelsCurrency = '';

        if ((strpos(config( 'app.client'), 'topprodukti')) !== false || (strpos(config( 'app.client'), 'globalstore') !== false)) {

            $column_pixel = 'facebook_pixel_' . substr(config( 'app.client'), -2);
            $column_currency = 'facebook_pixel_currency_' . substr(config( 'app.client'), -2);

            if ($settings->{$column_pixel}) {
                $settingsTableFacebookPixels = explode(',', $settings->{$column_pixel});
                $settingsTableFacebookPixelsCurrency = $settings->{$column_currency};
            }
        } else {
            if (isset($settings->facebook_pixel_mk) && $settings->facebook_pixel_mk) {
                $settingsTableFacebookPixels = explode(',', $settings->facebook_pixel_mk);
                $settingsTableFacebookPixelsCurrency = $settings->facebook_pixel_currency_mk;
            }
        }

        
        View::share('facebook_pixels', $settingsTableFacebookPixels);
        View::share('facebook_pixels_currency', $settingsTableFacebookPixelsCurrency);

        /*==== CURRENCY ====*/
        if (!\Session::get('selectedCurrency')) {
            $selectedCurrency = \EasyShop\Models\AdminSettings::getField('currency');
            $allCurrencies = \EasyShop\Models\AdminSettings::getField('currencies'); 
            \Session::put('selectedCurrency', $selectedCurrency);
            
            foreach($allCurrencies as $i){
                if($i['name'] == $selectedCurrency){
                    \Session::put('selectedCurrencyDivider', $i['divider']);
                    break;
                }
            }
            
        }

        // Get last child categories ids, for retrieving products from those categories
        // $this->categoriesLastChildIds = $categoryService->getLastChildIds([$menuCategories[9]]);
        
        if ($this->client === 'peletcentar') {
            $peletcentarPeletCategoryIds = $categoryService->getLastChildIds([$menuCategories[0]]);
            $peletcentarPeletProductIds = $productService->getProductIdsInCategories($peletcentarPeletCategoryIds);
            $productIds = [];

            foreach ($peletcentarPeletProductIds as $product) {
                $productIds[] = $product->product_id;
            }
            \View::share('peletcentarPeletiIds', $productIds);
        }

        // Default price group
        $this->priceGroup = 'price_retail_1';
        // Set the price group
        if (auth()->check()) {
            $this->priceGroup = auth()->user()->cenovna_grupa;
        }
        View::share('myPriceGroup', $this->priceGroup);

        if (auth()->check()) {
            $wishlistItems = Wishlist::join('products','product_id','=','products.id')->where('user_id', auth()->user()->id)->get();
            View::share('wishlistItems', $wishlistItems);
        }

        $all_countries = Country::all();
        $all_cities = City::orderBy('city_name', 'ASC')->get();

        View::share('all_countries', $all_countries);
        View::share('all_cities', $all_cities);

        // Front global vars
        $translationsToastr = [];
        $translationsToastr['addToCartSucess'] = trans('global.front.toastr_add_to_cart_success');
        View::share('translationsToastr', $translationsToastr);


        // If the user is not logged in, assign unique id
        if (!auth()->check() && !Session::has('user_id')) {
            Session::put('user_id', uniqid());
        }

        if (config( 'app.client') === 'betajewels') {
            $manufacturers = DB::table('manufacturers')->orderBy('order', 'asc')->get();
            // $manufacturers = Manufacturers::orderBy('name','asc')->get();
            View::share('mm', $manufacturers);
        }


        if (config( 'app.client') === 'naturatherapyshop_al') {

            if (!Cookie::has('location')) {
                $price_multiplier = $GeoIpService->getLocation();
                View::share('price_multiplier', $price_multiplier);
            } else {

                $price_multiplier = Cookie::get('location');
                View::share('price_multiplier', $price_multiplier);

            }
        }

        $popupModal = PopupModal::where('active', 1)->first();
        View::share('popupModal', $popupModal);
    }

}
