<?php

namespace EasyShop\Http\Controllers;

use EasyShop\Models\Coupon;
use EasyShop\Models\Document;
use EasyShop\Models\Product;
use EasyShop\Models\Settings;
use \ImagesHelper;
use EasyShop\Repositories\CartRepository\CartRepositoryInterface;
use Illuminate\Http\Request;
use EasyShop\Models\ProductOptionsPackage;

use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use Illuminate\Http\Response;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use Auth;
use Carbon\Carbon;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\GradualDiscount;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\ProductOptions;
use EasyShop\Models\ProductOptionValue;
use EasyShop\PromoCode;
use Illuminate\Support\Facades\DB;
use TwitterPhp\Connection\User;

class CartController extends FrontController
{
    protected $user;
    protected $userId;
    protected $categoryService;
    protected $categoryRepository;
    protected $articleRepository;
    protected $cartRepository;


    public function __construct(
        CategoryService $categoryService,
        ArticleRepositoryInterface $articleRepository,
        CartRepositoryInterface $cartRepository
    ) {
        parent::__construct($categoryService);

        $this->articleRepository = $articleRepository;
        $this->cartRepository = $cartRepository;
        $this->userId = auth()->check() ? auth()->user()->id : \Session::get('user_id');
        if (!session()->get('coupons')) {
            session()->put('coupons', []);
        }
    }

    /**
     * Show checkout page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request)
    {
        // dd($request->session()->get('cart_products'));




        $locale = $this->locale;

        $lang = $this->lang;

        $price = $this->priceGroup;

        if (auth()->check()) {

            $data['client'] = auth()->user();
            $country = $data['client']->country;
            if (!is_null($country) && $country->id == 1) {
                $city = $data['client']->city;
                $data['city'] = !empty($city) ? $city : '';
            } else {
                $city = $data['client']->city_other;
                $data['city'] = !empty($city) ? $city : '';
                $data['zip'] = $data['client']->zip_other;
            }
        } else {
            $country = NULL;
        }

        $data['country'] = $country;
        $data['user'] = is_null(auth()->user()) ? (new \EasyShop\Models\User()) : auth()->user();
        $data['all_countries'] = Country::all();
        $data['all_cities'] = City::orderBy('city_name', 'ASC')->get();

        $products = $request->session()->get('cart_products');
        $coupons = $request->session()->get('coupons');

        $data['products'] = [];
        $data['totalPrice'] = 0;
        $data['totalQuantity'] = 0;
        $data['contentIds'] = [];
        $data['contents'] = [];
        $data['pageName'] = 'page-cart';
        $totalPriceForDelivery = 0;

        if (!empty($products)) {
            $priceSum = 0;

            //presmetuvanje na vkupnata cena na produktite za fiksen popust da se presmeta
            foreach ($products as $k => $v) {
                $product = Product::getProductByIdInLang($k, $lang);
                $product->quantity = $v['quantity'];


                if (config( 'app.client') == 'herline' && $v['price'] == 533) {
                    $price = 0;
                } else {
                    $price = $product->{$this->priceGroup};

                    if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                        $price = Product::getPriceRetail1($product, false, 0);
                    }

                    if ($price == 25) {
                        $price = 0;
                    }
                }


                $priceSum = $priceSum + $price * $product->quantity;
            }

            if (!empty($coupons)) {
                foreach ($coupons as $coupon) {

                    if ($coupon->discount_type === 'fixed') {
                        $fixedPercentage = $priceSum / $coupon->value;
                    }
                }
            }
            


            
            foreach ($products as $k => $v) {

                $additional = isset($v['additional']) ? $v['additional'] : null;
                $product = Product::getProductByIdInLang($k, $lang);
                $product->quantity = $v['quantity'];

                if (isset($v['variation'])) {
                    $v['variation'] = array($v['variation']);
                    $product->variation = null;
                    $product->variation = implode('_', (array) $v['variation'][0]);
                }


                $price = $product->{$this->priceGroup};

                if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                    $price = Product::getPriceRetail1($product, false, 0);
                }

                if (config( 'app.client') == 'herline' && $v['price'] == 533) {
                    $price = 533;
                }
                $totalPriceForDelivery = $totalPriceForDelivery + ($price * $v['quantity']);
                
                if (config( 'app.client') == 'herline' && $v['price'] == 533) {
                    $price = 533;
                } else {
                    if (!empty($coupons)) {
                        foreach ($coupons as $coupon) {
                            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                                $package = ProductCategory::where('product_id', '=', $product->id)->where('category_id', '=', 14)->first();
                                if($package != null){
                                    continue;
                                }
                            }
                            //ako produktot ne e na popust
                            if (!\EasyShop\Models\Product::hasDiscount($product->discount) || $coupon->discount_type === 'fixed') {
                                if ($coupon->discount_type === 'percent') {
                                    $price = $price - ($price * ($coupon->value / 100));
                                } elseif ($coupon->discount_type === 'fixed') {

                                    $price = $price - ($price / $fixedPercentage);

                                    if ($price <= 0) {
                                        $price = 0;
                                    }
                                }
                            }
                        }
                    } elseif (empty($coupons)) {
                        if (\EasyShop\Models\Product::hasDiscount($product->discount) && empty($coupons)) {
                            $price = Product::getPriceRetail1($product, false, 0);
                        } else {
                            if (isset($product->bundle_price_type) && $product->bundle_price_type == 'percent') {
                                $bundleProducts = \EasyShop\Models\Product::whereIn('id', $v['bundle_items'][0])->get();
                                $bundleProductPrices = 0;
                                foreach ($bundleProducts as $bundleProduct) {
                                    $bundleProductPrices += (int)$bundleProduct->price_retail_1;
                                }
                                $bundlePriceDiscounted = $bundleProductPrices - (($v['price'] / 100) * $bundleProductPrices);
                                $price = $bundlePriceDiscounted;
                            } else {
                                $price = $product->{$this->priceGroup};
                            }
                        }
                    }
                }
                $product->cena = $price;
                $product->url = route('product', [$product->id, $product->url]);
                $product->image = ImagesHelper::getProductImage($product, $id = null, $size = 'sm_');
                if (isset($additional)) {
                    $product->additional = $additional;
                }

                $data['totalPriceForDelivery'] = $totalPriceForDelivery;
                $data['totalPrice'] = $data['totalPrice'] + $product->cena * $product->quantity;
                $data['totalQuantity'] += $product->quantity;
                $data['products'][] = $product;
                $data['contentIds'][] = $product->id;
                $data['contents'][] = [
                    'id' => $product->id,
                    'quantity' => $product->quantity,
                    'item_price' => $product->cena,
                ];
            }
            if (config( 'app.client') == 'matica') {
                $selectedGradualDiscount = null;
                $gradualDiscounts = GradualDiscount::with('products', 'items')->whereDate('start', '<=', Carbon::now()->format('Y-m-d'))->whereDate('end', '>=', Carbon::now()->format('Y-m-d'))->get();
                if (count($gradualDiscounts) > 0) {
                    foreach ($gradualDiscounts as $gradualDiscount) {
                        $numberOfCartProductsInGradualDiscount = 0;
                        foreach ($gradualDiscount->products as $gradualDiscountProduct) {
                            $gradualDiscountProductsIdArray[] = $gradualDiscountProduct->id;
                        }
                        foreach ($products as $product) {
                            if (in_array($product['id'], $gradualDiscountProductsIdArray)) {
                                $numberOfCartProductsInGradualDiscount++;
                            }
                        }
                        if ($numberOfCartProductsInGradualDiscount >= 1) {
                            $selectedGradualDiscount = $gradualDiscount;
                        }
                    }
                }
                $data['selectedGradualDiscount'] = $selectedGradualDiscount;
            }
        }
        
        if (config( 'app.client') == 'herline') {
            $data['products'] = self::calculateCustomBundleHerline($data['products']);
        }

        $data['coupons'] = $coupons;
        $data['contentIds'] = json_encode($data['contentIds']);
        $data['contents'] = json_encode($data['contents']);

        $data['metaTags']['title'] = 'Кошничка';
        if (empty($data['products'])) {
            return view('clients.' . config( 'app.theme') . '.cart-empty', $data);
        } else {
            return view('clients.' . config( 'app.theme') . '.cart', $data);
        }
    }

    /**
     * Add product to the cart and return cart list
     *
     * @param Request $request
     * @return mixed
     */
    public function addCartProduct(Request $request)
    {

        $locale = $this->locale;

        $lang = $this->lang;
        

        $this->validate($request, [
            'pid' => 'required|numeric',
            // 'pvariation' => 'numeric',
        ]);

        $productId = $request->input('pid');

        // земање варијации од request
        $variationId = $request->input('pvariation');
        $variationValue = null;

        $product = Product::getProductByIdInLang($productId, $lang);

        if (is_null($product)) {
            return response()->json('Продуктот не е пронајден!', 404);
        }

        if ($product->total_stock <= 0 && \EasyShop\Models\AdminSettings::getField('allowMinusQuantity') == false && !$product->bundle) {
            switch (config( 'app.client')) {
                case Settings::CLIENT_MATICA:
                    return response()->json([
                        'status' => 'product_no_stock',
                    ]);
                    break;
            }
        }

        if ($request->has('pvariation')) {
            // креирај cart index со варијациите

            // контактенирај ги ids на варијациите
            $productCartIndex = $productId . ',';

            // foreach ($variationId as $v) {
            //     $productCartIndex .= $v;
            // }
            $variations = implode('_', $variationId);
            $productCartIndex .= $variations;
        } else {
            $productVariations = $product->variationValuesAndIds();
            $temp = [];
            foreach ($productVariations->groupBy('name') as $key => $value) {
                array_push($temp, $value[0]->id);
            }
            $variation = implode('_', $temp);
            // $variation = $productVariations->first();
            // $variationId = $variation->id;
            // $variationValue = $variation->value;
            if ($variation == "") {
                $productCartIndex = $productId;
            } else {
                $productCartIndex = $productId . ',' . $variation;
            }


            // $productCartIndex = $productId;
        }

        $priceGroup = $this->priceGroup;
        $productPrice = null;
        $isTester = null;

        // Доколку веќе има производи во кошничка
        if ($request->session()->has('cart_products')) {
            // доколку веќе постои истиот производ во кошничка
            if (array_key_exists($productCartIndex, $request->session()->get('cart_products'))) {

                switch (config( 'app.client')) {
                    case Settings::CLIENT_MATICA:
                        return response()->json([
                            'status' => 'product_exists',
                        ]);
                        break;
                    case Settings::CLIENT_HERLINE:
                        if ($request->input('isBundle')) {
                            return response()->json([
                                'status' => 'product_exists',
                            ]);
                        }

                        break;
                }

                $cartArray = $request->session()->get('cart_products');
                $cartArray[$productCartIndex]['quantity'] += (int) $request->input('pquantity');
                $cartArray[$productCartIndex]['additional'] = $request->input('additional');
                if($request->input('pdesc') && $request->input('pdesc') != ""){
                    $cartArray[$productCartIndex]['description'] = $cartArray[$productCartIndex]['description'] . ", " . $request->input('pdesc');
                }
                

                if (config( 'app.client') == 'herline') {
                    $cartArray = self::calculateCustomBundleHerline($cartArray);
                }


                $request->session()->put('cart_products', $cartArray);
            }
            // доколку го нема производот во кошничка
            else {
                // ако производот има варијација
                if ($product->has_variations) {
                    $productVariations = $product->variationValuesAndIds();

                    // If the request has product variation id
                    // Check if there is variation with that id for that product

                    //    доколку има варијација во request-от
                    if ($request->has('pvariation')) {
                        // If the variation was passed to the request
                        // $variation = $product->getVariationById($variationId);
                        if (!is_null($variationId)) {
                            $productCartIndex = $productId . ',';

                            // foreach ($variationId as $v) {
                            //     $productCartIndex .= $v;
                            // }
                            $variation = implode('_', $variationId);
                            $productCartIndex .= $variation;
                        } else {
                            $productCartIndex = $productId;
                        }
                    }

                    // ако request-от нема варијација се зема првата на производот
                    else if (!$request->has('pvariation') && count($productVariations)) {
                        $productVariations = $product->variationValuesAndIds();
                        $temp = [];
                        foreach ($productVariations->groupBy('name') as $key => $value) {
                            array_push($temp, $value[0]->id);
                        }
                        $variation = implode('_', $temp);

                        $productCartIndex = $productId . ',' . $variation;
                    }

                    $cartArray = $request->session()->get('cart_products');

                    $productPrice = $product->{$priceGroup};
                    if (!is_null($product->additional)) {
                        $productPrice = $product->additional['price'];
                    } else if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                        $productPrice = Product::getPriceRetail1($product, false, 0);
                    }


                    $cartArray[$productCartIndex] = [
                        'id' => $product->id,
                        'quantity' => (int) $request->input('pquantity'),
                        'url' => route('product', [$product->id, $product->url]),
                        'image' => ImagesHelper::getProductImage($product, $id = null, $size = 'sm_'),
                        'title' => $product->title,
                        'price' => $productPrice,
                        'variation' => $variation,
                        // TODO: CHECK
                        // 'variation' => $variationId,
                        // 'variation_value' => $variationValue,
                        'additional' => $request->input('additional'),
                        'bundle_items' => $request->input('bundle_items')
                    ];
                }

                // ако производот нема варијација
                else {
                    $cartArray = $request->session()->get('cart_products');
                    $productPrice = $product->{$priceGroup};
                    if (!is_null($product->additional)) {
                        $productPrice = $product->additional['price'];
                    } else if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                        $productPrice = Product::getPriceRetail1($product, false, 0);
                    }
                    $cartArray[$productCartIndex] = [
                        'id' => $product->id,
                        'quantity' => (int) $request->input('pquantity'),
                        'url' => route('product', [$product->id, $product->url]),
                        'image' => ImagesHelper::getProductImage($product, $id = null, $size = 'sm_'),
                        'title' => $product->title,
                        'price' => $productPrice,
                        'variation' => null,
                        'variation_value' => null,
                        'additional' => $request->input('additional'),
                        'bundle_items' => $request->input('bundle_items'),
                        'description' => $request->input('pdesc')
                    ];
                }
                if (config( 'app.client') == 'herline') {
                    $cartArray = self::calculateCustomBundleHerline($cartArray);
                }
                
                $request->session()->put('cart_products', $cartArray);
            }
            
        }
        // Доколку сеуште нема производи во кошничка
        else {

            // Доколку производот има варијации
            if ($product->has_variations) {

                $productVariations = $product->variationValuesAndIds();

                // If the request has product variation id
                // Check if there is variation with that id for that product
                if ($request->has('pvariation')) {
                    // If the variation was passed to the request
                    // $variation = $product->getVariationById($variationId);

                    $productCartIndex = $productId;
                    if (!is_null($request->input('pvariation'))) {
                        $productCartIndex = $productId . ',';

                        // foreach ($variationId as $v) {
                        //     $productCartIndex .= $v;
                        // }
                        $variation = implode('_', $variationId);
                        $productCartIndex .= $variations;
                    } else {
                        $productCartIndex = $productId;
                    }
                }
                // If variation id is not passed, but the product has variation
                // get the first variation
                else if (!$request->has('pvariation') && count($productVariations)) {
                    $temp = [];
                    foreach ($productVariations->groupBy('name') as $key => $value) {
                        array_push($temp, $value[0]->id);
                    }
                    $variation = implode('_', $temp);
                    // $variation = $productVariations->first();
                    // $variationId = $variation->id;
                    // $variationValue = $variation->value;
                    $productCartIndex = $productId . ',' . $variation;
                }

                $cartArray = $request->session()->get('cart_products');

                $productPrice = $product->{$priceGroup};
                if (!is_null($product->additional)) {
                    $productPrice = $product->additional['price'];
                } else if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                    $productPrice = Product::getPriceRetail1($product, false, 0);
                }

                $cartArray[$productCartIndex] = [
                    'id' => $product->id,
                    'quantity' => $request->input('pquantity'),
                    'url' => route('product', [$product->id, $product->url]),
                    'image' => ImagesHelper::getProductImage($product, $id = null, $size = 'sm_'),
                    'title' => $product->title,
                    'price' => $productPrice,
                    'variation' => $variation,
                    'additional' => $request->input('additional'),
                    'bundle_items' => $request->input('bundle_items')
                ];
            }
            // Доколку производот нема варијации
            else {

                $cartArray = [];

                $productPrice = $product->{$priceGroup};
                if (!is_null($product->additional)) {
                    $productPrice = $product->additional['price'];
                } else if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                    $productPrice = Product::getPriceRetail1($product, false, 0);
                }

                $cartArray[$productCartIndex] = [
                    'id' => $product->id,
                    'quantity' => $request->input('pquantity'),
                    'url' => route('product', [$product->id, $product->url]),
                    'image' => ImagesHelper::getProductImage($product, $id = null, $size = 'sm_'),
                    'title' => $product->title,
                    'price' => $productPrice,
                    //'user_description' => 
                    'variation' => null,
                    // 'variation_value' => null,
                    'additional' => $request->input('additional'),
                    'bundle_items' => $request->input('bundle_items'),
                    'description' => $request->input('pdesc')];
            }

            

            if (config( 'app.client') == 'herline') {
                $cartArray = self::calculateCustomBundleHerline($cartArray);
            }

            
            $request->session()->put('cart_products', $cartArray);
        }


        $products = $request->session()->get('cart_products');

        $data['totalPrice'] = 0;
        $data['priceGroup'] = $priceGroup;
        $data['products'] = [];
        $totalProducts = 0;



        foreach ($products as $k => $v) {
            $totalProducts += $v['quantity'];
            $product = new \stdClass();
            $product->id = explode('_', $k)[0];
            $product->title = $v['title'];
            $product->quantity = $v['quantity'];
            $product->url = $v['url'];
            $product->image = $v['image'];
            $product->price = $v['price'];
            // варијација за продуктот
            $product->variation = $v['variation'];
            $data['products'][] = $product;
            if (isset($v['additional']) && !is_null($v['additional'])) {
                $data['totalPrice'] = $data['totalPrice'] + ($v['additional']['price'] * $v['quantity']);
            } else {
                $data['totalPrice'] = $data['totalPrice'] + ($v['price'] * $v['quantity']);
            }
        }

        return response()->json([
            'totalProducts' => $totalProducts,
            'totalPrice' => number_format($data['totalPrice'], 0, ',', '.'),
            'price' => $productPrice,
            'title' => $product->title,
            'isTester' => $isTester,
            'html' => view('clients.' . config( 'app.theme') . '.' . 'cart-partial', $data)->render(),
            'status' => 'success'
        ]);
    }

    public function checkPromoCode(Request $request)
    {


        $locale = $this->locale;

        $lang = $this->lang;
        
        $exists = false;
        $promo_code = $request->input('coupon');

        $coupon = PromoCode::where('code', $promo_code)
            ->where('start', '<=', date('Y-m-d H:i:s'))
            ->where('end', '>=', date('Y-m-d H:i:s'))
            ->first();


        if ($coupon && $coupon->reuse_number > 0) {

            // Dokolku stanuva zbor na kupon sto e generiran za popust na prvata naracka i vazi za konkreten user
            if (\EasyShop\Models\AdminSettings::getField('firstOrderDiscount')) {
                if (!is_null($coupon->user_id)) {
                    if (!Auth::check()) {
                        return response()->json([
                            'promo_code_status' => '<span class="alert alert-danger">Мора да се најавите за да ја искористите промоцијата</span>'
                        ]);
                    }
                    if (Auth::user()->id != $coupon->user_id) {

                        return response()->json([
                            'promo_code_status' => '<span class="alert alert-danger">Купонот не е генериран за вашиот профил</span>'
                        ]);
                    }
                }
            }

            $products = $request->session()->get('cart_products');
            $coupons = $request->session()->get('coupons');

            $isPackage = [];
            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                foreach($products as $product){
                    $package = ProductCategory::where('product_id', '=', $product['id'])->where('category_id', '=', 14)->first();
                    if($package != null){
                        array_push($isPackage, $product);
                    }
                }
                if(count($products) == count($isPackage)){
                    return response()->json([
                        'promo_code_status' => '<span class="alert alert-warning">Купонот не може да биде искористен за пакети.</span>'
                    ]);
                }
            }

            foreach ($coupons as $coupon) {
                if ($coupon->code === $promo_code)
                    $exists = true;
            }

            if ($exists === false) {
                session()->push('coupons', $coupon);


                $priceSum = 0;

                //presmetuvanje na vkupnata cena na produktite za fiksen popust da se presmeta
                foreach ($products as $k => $v) {
                    $product = Product::getProductByIdInLang($k, $lang);
                    $product->quantity = $v['quantity'];
                    if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                        $package = ProductCategory::where('product_id', '=', $product->id)->where('category_id', '=', 14)->first();
                        if($package != null){
                            continue;
                        }
                    }

                    if (config( 'app.client') == 'herline' && $v['price'] == 533) {
                        $price = 0;
                    } else {
                        $price = $product->{$this->priceGroup};

                        if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                            $price = Product::getPriceRetail1($product, false, 0);
                        }
                    }
                    $priceSum = $priceSum + $price * $product->quantity;
                }

                if ($coupon->discount_type === 'fixed') {
                    $fixedPercentage = $priceSum / $coupon->value;
                }
                

                foreach ($products as $key => $product) {
                    $p = $this->articleRepository->getById($k);
                    if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                        $package = ProductCategory::where('product_id', '=', $p->id)->where('category_id', '=', 14)->first();
                        if($package != null){
                            continue;
                        }
                    }

                    $check_product_discount = \EasyShop\Models\Product::hasDiscount($p->discount);

                    if (config( 'app.client') == 'herline' && $product['price'] == 533) {
                        $price_temp = 533;
                    } else {

                        if (!$check_product_discount || $coupon->discount_type === 'fixed') {
                            $price_temp = $product['price'];
                            if ($coupon->discount_type === 'percent') {
                                $price_temp = $price_temp - ($price_temp * (($coupon->value) / 100));
                            } elseif ($coupon->discount_type === 'fixed') {

                                $price_temp = $price_temp - ($price_temp / $fixedPercentage);

                                if ($price_temp <= 0) {
                                    $price_temp = 0;
                                }
                            }
                        }
                    }
                    $product['price'] = $price_temp;
                    $products[$key] = $product;
                }
                $request->session()->put('cart_products', $products);


                return response()->json([
                    'promo_code_status' => '<span class="alert alert-success">'. trans("global.codes.successful").'</span>'
                ]);
            } else {
                return response()->json([
                    'promo_code_status' => '<span class="alert alert-warning">' . trans("global.codes.aused") . '</span>'
                ]);
            }
        } elseif ($coupon && $coupon->reuse_number === 0) {
            return response()->json([
                'promo_code_status' => '<span class="alert alert-warning">' . trans("global.codes.aused") . '</span>'
            ]);
        } else {

            return response()->json([
                'promo_code_status' => '<span class="alert alert-danger">' . trans("global.codes.notexistant") . '</span>'
            ]);
        }
    }


    /**
     * Remove product from the cart
     *
     * @param Request $request
     * @param $id - Product id
     * @return mixed
     */
    public function removeCartProduct(Request $request, $id, $variationId = null)
    {

        $cartArray = $request->session()->get('cart_products');
        if (!is_null($variationId)) {
            unset($cartArray[$variationId]);
        } else {
            unset($cartArray[$id]);
        }
        if (config( 'app.client') == 'herline') {
            $cartArray = self::calculateCustomBundleHerline($cartArray);
        }

        $request->session()->put('cart_products', $cartArray);

        return back();
    }



    /**
     * Update the products quantity from cart view
     *
     * @param Request $request
     */
    public function updateProductQuantity(Request $request)
    {

        // $this->validate($request, [
        //     'id' => 'required|numeric',
        //     // 'variation' => 'numeric',
        //     // 'newVariation' => 'numeric',
        //     'quantity' => 'numeric',
        //     // 'formData' => 'required',
        // ]);



        // parse_str($request->input('formData'), $formData);
        // $request->session()->flash('formData', $formData);

        // $productId = $request->input('id');
        // $variationId = $request->input('variation');
        // $newVariationId = $request->input('newVariation');
        // $quantity = $request->input('quantity', 1);
        // $variationValue = null;
        // $cartIndex = $request->input('cartIndex');
        // $oldCartIndex =  $request->input('cartIndex');

        // $product = $this->articleRepository->getById($productId);

        // if (is_null($product)) {
        //     return response()->json('Продуктот не е пронајден!', 404);
        // }

        // // if ($quantity < 1) {
        // //     return $this->removeCartProduct($request, $productId, $variationId);
        // // }

        // $productCartIndex = $productId; 


        // $oldProduct = session()->get('cart_products')[$cartIndex];

        // if ($request->has('newVariation')) {
        //     $this->removeCartProduct($request, $productId, $cartIndex);
        // }
        // $productCartIndex = $productId . '_';

        // $oldVariationsWithProduct = explode(',', $cartIndex);
        // $oldVariations = explode('_', $oldVariationsWithProduct[1]);

        // $key = array_search($request->input('variation'), $oldVariations);


        // $oldVariations[$key] = $request->input('newVariation');

        // $cartIndex = $productId . ',' . implode('_', $oldVariations);

        // if ($request->has('newVariation')) {
        //     $productCartIndex = $cartIndex;
        // } else {
        //     $productCartIndex = $productId . ',' . $request->input('variation');
        // }





        // $products = $request->session()->get('cart_products');

        // if ($request->has('quantity')) {
        //     // Update session
        //     if (isset($products[$productCartIndex])) {
        //         $products[$productCartIndex]['quantity'] = $quantity;
        //     }
        // } else if (!is_null($newVariationId)) {
        //     $priceGroup = $this->priceGroup;
        //     if (isset($products[$productCartIndex])) {
        //         $quantity = $products[$productCartIndex]['quantity'];
        //     }


        //     // Set the new cart index
        //     // $variation = $product->getVariationById($newVariationId);
        //     if (!is_null($request->input('newVariation'))) {

        //         // OD OVDE PRODOLZI
        //         // dd($oldCartIndex);
        //         // dd($request->input('newVariation'));
        //         // dd($products[$oldCartIndex]);

        //         if (!is_array($oldProduct['variation'])) {
        //             $oldProduct['variation'] = explode('_', $oldProduct['variation']);
        //         }
        //         $key = array_search($request->input('variation'), $oldProduct['variation']);
        //         // dd($key);
        //         $oldProduct['variation'][$key] = $request->input('newVariation');


        //         // $array = $products[$oldCartIndex]->variation; 

        //         // dd($produ)
        //     }


        //     $productPrice = $product->{$priceGroup};
        //     if (!is_null($product->additional)) {
        //         $productPrice = $product->additional['price'];
        //     } else if( \EasyShop\Models\Product::hasDiscount( $product->discount ) ) {
        //         $productPrice = Product::getPriceRetail1($product, false, 0);
        //     }





        //     $products[$productCartIndex] = [
        //         'id' => $product->id,
        //         'quantity' => (int) $quantity,
        //         'url' => route('product', [$product->id, $product->url]),
        //         'image' => ImagesHelper::getProductImage($product, $id = null, $size = 'sm_'),
        //         'title' => $product->title,
        //         'price' => $productPrice,
        //         'variation' => $oldVariations,
        //         // 'variation_value' => $variationValue,
        //     ];
        // }


        // $request->session()->put('cart_products', $products);

        // return response()->json('Успешно променета кошничка');

        $this->validate($request, [
            'id' => 'required|numeric',
            // 'variation' => 'numeric',
            'newVariation' => 'numeric',
            'quantity' => 'numeric',
            // 'formData' => 'required',
        ]);


        $locale = $this->locale;

        $lang = $this->lang;


        parse_str($request->input('formData'), $formData);
        $request->session()->flash('formData', $formData);

        $productId = $request->input('id');
        $variationId = $request->input('variation');
        $newVariationId = $request->input('newVariation');
        $quantity = $request->input('quantity', 1);
        $variationValue = null;
        $cIndexToDelete = $request->input('cartIndex');



        $variationsCombination = substr($cIndexToDelete, strpos($cIndexToDelete, ",") + 1);



        $product = Product::getProductByIdInLang($productId, $lang);

        if (is_null($product)) {
            return response()->json('Продуктот не е пронајден!', 404);
        }



        $productCartIndex = $productId;

        if ($request->has('newVariation')) {
            if (!is_null($cIndexToDelete)) {
                $this->removeCartProduct($request, $productId, $cIndexToDelete);
            }
            $variation = $product->getVariationById($newVariationId);
            if (!is_null($variation)) {
                $productCartIndex = str_replace($variationId, $newVariationId, $cIndexToDelete);
                // $productCartIndex = $productId . '' . $variation->id;
                // $variationValue = $variation->value;
            }
        }

        $products = $request->session()->get('cart_products');

        if ($request->has('quantity')) {
            //            $this->cartRepository->updateQuantityById(explode('_', $productId)[0], $quantity, $this->userId, $variationId);
            // Update session
            if (!is_null($cIndexToDelete)) {
                $products[$cIndexToDelete]['quantity'] = $quantity;
            } else {
                $products[$productCartIndex]['quantity'] = $quantity;
            }
            // if (isset($products[$productCartIndex])) {
            //     $products[$productCartIndex]['quantity'] = $quantity;
            // }
        } else if (!is_null($newVariationId)) {
            $priceGroup = $this->priceGroup;
            //            $old_value = $this->cartRepository->getById(
            //                $productId,
            //                $this->userId,
            //                $variationId
            //            );
            //
            //            $this->cartRepository->updateVariationById(
            //                $productId,
            //                $variationId,
            //                $this->userId
            //            );

            if (isset($products[$productCartIndex])) {
                $quantity = $products[$productCartIndex]['quantity'];
                unset($products[$productCartIndex]);
            }


            // Set the new cart index
            $variation = $product->getVariationById($newVariationId);
            if (!is_null($variation)) {
                // $productCartIndex = $productId . '_' . $variation->id;
                $productCartIndex = str_replace($variationId, $newVariationId, $cIndexToDelete);
                $variationId = substr($productCartIndex, strpos($productCartIndex, ",") + 1);
                // $variationValue = $variation->value;
            }

            $productPrice = $product->{$priceGroup};

            if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                $productPrice = Product::getPriceRetail1($product, false, 0);
            }

            $products[$productCartIndex] = [
                'id' => $product->id,
                'quantity' => (int) $quantity,
                'url' => route('product', [$product->id, $product->url]),
                'image' => ImagesHelper::getProductImage($product, $id = null, $size = 'sm_'),
                'title' => $product->title,
                'price' => $productPrice,
                'variation' => $variationId,
                'variation_value' => $variationValue,
            ];
        }

        $request->session()->put('cart_products', $products);

        return response()->json('Успешно променета кошничка');
    }


    public function orderHistory()
    {
        if (Auth::user()) {
            $order_data = Document::select('id', 'document_number', 'created_at', 'status')
                ->where('type', '=', 'narachka')
                ->where('user_id', '=', Auth::user()->id)
                ->with('items')
                ->get();
        }
        return view('clients.' . config( 'app.theme') . '.order-history', compact('order_data'));
    }

    public function calculateCustomBundleHerline($cartArray)
    {
        $inDiscountCategory = [];
        foreach ($cartArray as $product) {
            if (self::inDiscountCategory($product['id'])) {
                $inDiscountCategory[] = $product['id'];
            }
        }

        if (count($inDiscountCategory) % 3 != 0 && count($inDiscountCategory) > 3) {
            
            foreach ($cartArray as $key => $i) {
                if (!in_array($i["id"], $inDiscountCategory)) {
                    continue;
                }
                $product = \EasyShop\Models\Product::find($i["id"]);
                if (!is_null($cartArray[$key]["price"])) {
                    if($cartArray[$key]["price"] == 533){
                        $cartArray[$key]["price"] = Product::getPriceRetail1($product, false, 0);
                    }
                    
                } else if (!is_null($cartArray[$key]["cena"])) {
                    if($cartArray[$key]["cena"] == 533){
                        $cartArray[$key]["cena"] = Product::getPriceRetail1($product, false, 0);
                        $cartArray[$key]["price_retail_1"] = Product::getPriceRetail1($product, false, 0);
                        $cartArray[$key]["discount"] = null;
                    }
                    
                }
            }
            $limit = floor(count($inDiscountCategory) / 3) * 3;
            $count = 0;
            foreach ($cartArray as $key => $i) {
                if ($count == $limit) {
                    break;
                }
                if (!in_array($i["id"], $inDiscountCategory)) {
                    continue;
                }
                if (!is_null($cartArray[$key]["price"])) {
                    $cartArray[$key]["price"] = 533;
                } else if (!is_null($cartArray[$key]["cena"])) {
                    $cartArray[$key]["cena"] = 533;
                    $cartArray[$key]["price_retail_1"] = 533;
                    $cartArray[$key]["discount"] = null;
                }
                $count += 1;
            }
        } else if (count($inDiscountCategory) % 3 == 0) {
            foreach ($cartArray as $key => $i) {
                if (!in_array($i["id"], $inDiscountCategory)) {
                    continue;
                }
                if (!is_null($cartArray[$key]["price"])) {
                    $cartArray[$key]["price"] = 533;
                } else if (!is_null($cartArray[$key]["cena"])) {
                    $cartArray[$key]["cena"] = 533;
                    $cartArray[$key]["price_retail_1"] = 533;
                    $cartArray[$key]["discount"] = null;
                }
            }
        } else if (count($inDiscountCategory) < 3) {

            foreach ($cartArray as $key => $i) {
                if (!in_array($i["id"], $inDiscountCategory)) {
                    continue;
                }
                $product = \EasyShop\Models\Product::find($i["id"]);
                if (!is_null($cartArray[$key]["price"])) {
                    if($cartArray[$key]["price"] == 533){
                        $cartArray[$key]["price"] = Product::getPriceRetail1($product, false, 0);
                    }
                } else if (!is_null($cartArray[$key]["cena"])) {
                    if($cartArray[$key]["cena"] = 533){
                        $cartArray[$key]["cena"] = Product::getPriceRetail1($product, false, 0);
                        $cartArray[$key]["price_retail_1"] = Product::getPriceRetail1($product, false, 0);
                        $cartArray[$key]["discount"] = null;
                    }
                    
                }
            }
        }
        // 3 za 1599, 1 e 533 edinecna cena

        return $cartArray;
    }

    public function inDiscountCategory($productId)
    {
        // ID of Category - "Промоции"
        $discountCategoryId = 42;
        $productCategories = DB::table('products')->where('products.id', $productId)->leftJoin('product_category', 'product_category.product_id', '=', 'products.id')->pluck('product_category.category_id');
        return in_array($discountCategoryId, $productCategories);
    }
}