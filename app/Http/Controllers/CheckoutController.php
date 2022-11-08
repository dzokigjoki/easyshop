<?php

namespace EasyShop\Http\Controllers;

use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\Coupon;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\Product;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\Payment;
use EasyShop\Models\Settings;
use EasyShop\Models\TempOrder;
use EasyShop\Models\TempOrderItem;
use EasyShop\Services\Billing\CasysBilling;
use Easyshop\Services\Billing\HalkBilling;
use EasyShop\Services\DocumentService;
use EasyShop\Services\ProductService;
use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\DocumentRepository\DocumentRepositoryInterface;
use EasyShop\Repositories\CartRepository\CartRepositoryInterface;
use EasyShop\Models\User;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Variations;
use EasyShop\Models\FakturaOnline;
use EasyShop\Models\FakturaOnlineItems;
use EasyShop\Models\VariationQuantity;

use Log;
use \Auth;
use Carbon\Carbon;
use \Response;
use \Mail;
use DB;
use View;
use EasyShop\BundleProduct;
use EasyShop\PromoCode;
use EasyShop\Services\Billing\HalkBillingService;
use EasyShop\Services\LoyaltyService;
use Newsletter;

class CheckoutController extends FrontController
{
    protected $categoryService;
    protected $productService;
    protected $documentService;
    protected $casysBillingService;
    protected $halkBillingService;
    protected $loyaltyService;
    protected $extensionForLanguage;
    protected $articleRepository;
    protected $documentRepository;
    protected $cartRepository;
    protected $user;

    public function __construct(
        CasysBilling $casysBillingService,
        CategoryService $categoryService,
        HalkBillingService $halkBillingService,
        DocumentService $documentService,
        ArticleRepositoryInterface $articleRepository,
        DocumentRepositoryInterface $documentRepository,
        CartRepositoryInterface $cartRepository,
        ProductService $productService,
        LoyaltyService $loyaltyService
    ) {
        parent::__construct($categoryService);

        $this->casysBillingService = $casysBillingService;
        $this->halkBillingService = $halkBillingService;
        $this->articleRepository = $articleRepository;
        $this->documentRepository = $documentRepository;
        $this->cartRepository = $cartRepository;
        $this->documentService = $documentService;
        $this->extensionForLanguage = detectUrlLang();
        $this->productService = $productService;
        $this->loyaltyService = $loyaltyService;
        $this->user = \Auth::user();
    }

    /**
     * Generate mail for Torti client (skip documents and casys)
     * 
     * @param Request $request
     * @return mixed
     */
    public function generateTorti(Request $request)
    {
        if (!$request->session()->has('cart_products')) {
            return redirect('/');
        }

        $products = $request->session()->get('cart_products');
        $clientCredentials = $request->all();

        $rules = [
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required|email',
            'Telephone' => 'required',
            'Address' => 'required',
            'date_pickup' => 'required'
        ];

        $messages = [
            'FirstName.required' => trans('global.validation.first_name_required'),
            'LastName.required' => trans('global.validation.last_name_required'),
            'Email.required' => trans('global.validation.email_required'),
            'Address.required' => trans('global.validation.address_required'),
            'Telephone.required' => trans('global.validation.tel_required'),
            'Email.email' => trans('global.validation.valid_email_required'),
            'date_pickup.required' => trans('global.validation.date-pickup_required'),
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
        foreach ($products as $product) {
            if (isset($product['additional'])) {
                $product['price'] = $product['additional']['price'];

                if (isset($product['additional']['natpis_image']) && $product['additional']['natpis_image'] !== '' && !is_null($product['additional']['natpis_image'])) {
                    $explodedImages = explode(',', $product['additional']['natpis_image']);
                    $product['additional']['natpis_image'] = array(
                        0 => public_path() . '/uploads/customUploads/' . $explodedImages[0],
                        1 => public_path() . '/uploads/customUploads/' . $explodedImages[1],
                    );
                }
            }
            $data_email['products'][] = $product;
        }
        $data_email['userShipping'] = $clientCredentials;
        $clientEmail = $clientCredentials['Email'];

        Mail::send('emails.torti.invoice', $data_email, function ($message) use ($clientEmail) {
            $message->to($clientEmail)->from('noreply@' . \EasyShop\Models\AdminSettings::getField('emaildomain'))->subject('Ви благодариме за нарачката');
        });

        $request->session()->forget('cart_products');

        return redirect(detectUrlLang() . 'thank-you')
            ->with('thankyou', true)
            ->with('success_message', trans('global.messages.success_order'));
        // ->with('pixel', $totalPrice)
        // ->with('productIds', json_encode($productIds));
    }

    /**
     * Generate document for the checkout
     *
     * @param Request $request
     * @return mixed
     */
    public function generate(Request $request)
    {

        $locale = $this->locale;

        $lang = $this->lang;
        

        if (!$request->session()->has('cart_products')) {
            return redirect('/');
        }

        $input = $request->input();
        $rules = [
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required|email',
            'Telephone' => 'required',
            'Country' => 'required',
            'City' => 'required',
            'Address' => 'required'
        ];

        $messages = [
            'FirstName.required' => trans('global.validation.first_name_required'),
            'LastName.required' => trans('global.validation.last_name_required'),
            'Email.required' => trans('global.validation.email_required'),
            'City.required' => trans('global.validation.city_required'),
            'Address.required' => trans('global.validation.address_required'),
            'Telephone.required' => trans('global.validation.tel_required'),
            'Email.email' => trans('global.validation.valid_email_required'),
        ];


        if (in_array(config( 'app.client'), ['topprodukti_rs', 'topprodukti_bg', 'topprodukti_ro'])) {
            $rules['payment_zone'] = 'required';
            $messages['payment_zone.required'] = trans('global.validation.zone_required');
        }


        if (in_array(config( 'app.client'), ['perla', 'topprodukti_hu', 'topprodukti_pl', 'topprodukti_ro'])) {
            $rules['Zip'] = 'required';
            $messages['Zip.required'] = trans('global.validation.zip_required');
        }


        //        $this->validate($request, $rules, $messages);

        // TODO: Remove after email problem is solved
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            // if (strpos(config( 'app.client'), 'globalstore') === 0) {
            //     Log::useDailyFiles(storage_path() . '/logs/globalstore_errors.log');
            //     Log::info([
            //         'Request' => $request,
            //         'Errors' => $validator->errors(),
            //     ]);
            // }

            $this->throwValidationException($request, $validator);
        }

        $allow_minus = \EasyShop\Models\AdminSettings::getField('allowMinusQuantity');
        $limitPerProduct = \EasyShop\Models\AdminSettings::getField('limitProducts');

        // Check if product is in stock
        $productNotEnoughStock = [];

        if ($request->session()->has('cart_products')) {
            $products = $request->session()->get('cart_products');

            foreach ($products as $p) {
                $product = Product::getProductByIdInLang($p['id'], $lang);


                // Check if in meanwhile the product become inactive
                if (!$product->active) {
                    array_push($productNotEnoughStock, $p['title']);
                    continue;
                }

                // Check if the product has stock
                if (!$allow_minus) {
                    if ($product->bundle) {
                        $bundleIds = $request->session()->get('cart_products')[$product->id]['bundle_items'][0];
                        // $bundleIds = BundleProduct::where('bundle', $product->id)->pluck('product_id');
                        $bundleProducts = Product::whereIn('id', $bundleIds)->get();
                        foreach ($bundleProducts as $bundleProduct) {
                            $stock = $bundleProduct->total_stock;
                            if (1 > $stock) {
                                array_push($productNotEnoughStock, $bundleProduct->title);
                            }
                        }
                    } else {
                        if (!is_array($p['variation'])) {
                            $variationString = str_replace('_', ',', $p['variation']);
                        } else {
                            $variationString = implode(',', (array) $p['variation']);
                        }

                        $stock = $product->has_variations
                            ? $this->articleRepository->getProductVariationQuantity($p['id'], $variationString)
                            : $product->total_stock;

                        if (!is_array($p['variation'])) {
                            $variationsArray  = explode('_', $p['variation']);
                        } else {
                            $variationsArray =  $p['variation'];
                        }
                        $variationNames = Variations::whereIn('id', $variationsArray)->pluck('value')->toArray();

                        $variationNamesString = implode(',', $variationNames);


                        if ($p['quantity'] > $stock) {

                            array_push($productNotEnoughStock, $p['title'] . ($product->has_variations ? '(' . $variationNamesString . ')' : ''));
                        }
                    }
                }
            }

            /*
             * Array of products that don't have enough quantity
             */
            if (count($productNotEnoughStock) > 0) {

                if ($request->input('paymentType') === Payment::TYPE_GOTOVO) {
                    $request->session()->flash('formData', $request->all());

                    return back()->withError((count($productNotEnoughStock) > 1 ? 'Продуктите ' : 'Продуктот ') .
                        implode(',', $productNotEnoughStock) .
                        ' моментално ' . (count($productNotEnoughStock) > 1 ? 'ги ' : 'го ') . ' нема на залиха.');
                } else if ($request->input('paymentType') === Payment::TYPE_CASYS || $request->input('paymentType') === Payment::TYPE_HALK) {

                    $data = array(
                        'status' => 'not_enough_stock',
                        'productNames' => $productNotEnoughStock
                    );

                    return Response::json($data);
                }
            }
        }

        // Check if the product exceed the limit
        if ($limitPerProduct && $request->session()->has('cart_products')) {
            $productExceedLimit = [];
            $products = $request->session()->get('cart_products');

            foreach ($products as $product) {
                if ($product['quantity'] > $limitPerProduct) {
                    array_push($productExceedLimit, '"' . $product['title'] . ($product['variation_value'] ? '(' . $product['variation_value'] . ')' : '') . '"');
                }
            }

            /*
             * Array of products that exceed quantity limit
             */
            if (count($productExceedLimit) > 0) {
                if ($request->input('paymentType') === Payment::TYPE_GOTOVO) {
                    $request->session()->flash('formData', $request->all());

                    return back()->withError((count($productExceedLimit) > 1 ? 'Продуктите ' : 'Продуктот ') .
                        implode(',', $productExceedLimit) .
                        ' ја ' . (count($productExceedLimit) > 1 ? 'надминуваат ' : 'надминува ') .
                        ' дозволената количина (' . $limitPerProduct . ').');
                } else if ($request->input('paymentType') === Payment::TYPE_CASYS) {

                    $data = array(
                        'status' => 'exceed_product_limit',
                        'productNames' => $productExceedLimit
                    );

                    return Response::json($data);
                }
            }
        }

        /**
         * GOTOVO
         */

        if ($request->input('paymentType') === Payment::TYPE_GOTOVO) {
            $newDocument = Document::create();
            $newDocument->user_id = \Auth::check() ? \Auth::user()->id : User::GUEST_ID;
            $newDocument->document_date = date("Y-m-d H:i:s");
            $newDocument->maturity_date = date("Y-m-d");
            if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {
                $newDocument->type_of_order = 'Web';
            }
            $count_docs = Document::where('type', 'narachka')
                ->whereNotNull('document_number')
                ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->where('warehouse_id', \EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->count();

            $newDocument->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');

            $newDocument->currency = \EasyShop\Models\AdminSettings::getField('currency');
            $newDocument->type = Document::TYPE_NARACHKA;
            $newDocument->status = Document::STATUS_NARACKA_GENERIRANA;
            $newDocument->payment = Document::PAYMENT_GOTOVO;
            $newDocument->web = 1;
            $newDocument->note = $request->get('comments');
            
            // Add warehouse
            $newDocument->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
            $newDocument->document_number = sprintf('%02d', $newDocument->warehouse_id) . '-' . $newDocument->document_number;

            // Add type of delivery
            $typeDelivery = $request->input('type_delivery');
            $newDocument->type_delivery = NULL;
            $newDocument->price_delivery = 0;
            if ($typeDelivery) {
                // Get type delivery from config
                $deliveries = config( 'clients.' . config( 'app.client') . '.type_delivery');
                if (is_array($deliveries) && array_key_exists($typeDelivery, $deliveries)) {
                    $documentDelivery = $deliveries[$typeDelivery];
                    $newDocument->type_delivery = $documentDelivery['name'];
                    $newDocument->price_delivery = $documentDelivery['price'];
                }
            }

            $newDocument->document_json = $this->prepareDocumentJsonField($request);



            $newDocument->customer_name = $request->get('FirstName') . " " . $request->get('LastName');
            
            $this->documentRepository->create($newDocument);

            $totalPrice = 0;
            $totalQuantity = 0;

            $order_id = $newDocument->id;

            //=============== GENERATE RESERVATION =================//
            $rezervacija_online_flag = \EasyShop\Models\AdminSettings::getField('rezervacijaOnline');

            if (!empty($rezervacija_online_flag)) {
                $rezervacija = new Document();
                $rezervacija->status = Document::STATUS_NARACKA_GENERIRANA;
                $rezervacija->web = 1;
                $rezervacija->user_id = $newDocument->user_id;
                $rezervacija->document_date = date("Y-m-d H:i:s");
                $rezervacija->maturity_date = date("Y-m-d");
                $count_docs = Document::where('type', Document::TYPE_REZERVACIJA)
                    ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                    ->where('document_date', '<=', date('Y-m-d H:i:s'))
                    ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                    ->whereNotNull('document_number')
                    ->count();
                $rezervacija->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
                $rezervacija->currency = $newDocument->currency;
                $rezervacija->type = Document::TYPE_REZERVACIJA;
                $rezervacija->paid = Document::PAID_FALSE;
                $rezervacija->payment = Document::PAYMENT_GOTOVO;
                $rezervacija->note = $newDocument->note;
                $rezervacija->checksum = $newDocument->checksum;
                $rezervacija->type_delivery = $newDocument->type_delivery;
                $rezervacija->price_delivery = $newDocument->price_delivery;
                $rezervacija->note = $newDocument->note;
                $rezervacija->document_json = $newDocument->document_json;
                // Add warehouse
                $rezervacija->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
                $rezervacija->document_number = sprintf('%02d', $rezervacija->warehouse_id) . '-' . $rezervacija->document_number;
                $rezervacija->save();
            }
            //=============== //GENERATE RESERVATION =================//


            //=============== RELATED DOCUMENTS =================//
            $documentRelated = new DocumentsRelated();
            $documentRelated->naracka_id = $newDocument->id;
            if (!empty($rezervacija_online_flag)) {
                $documentRelated->rezervacija_id = $rezervacija->id;
            }
            $documentRelated->save();
            //=============== //RELATED DOCUMENTS =================//

            // Get total quantity
            foreach ($request->session()->get('cart_products') as $k => $productItem) {
                $totalQuantity += $productItem['quantity'];
            }

            $products = $request->session()->get('cart_products');
            $coupons = $request->session()->get('coupons');

            /// Promocija za site
            $gradualDiscounts = \EasyShop\Models\GradualDiscount::with('products', 'items')->whereDate('start', '<=', Carbon::now()->format('Y-m-d'))->whereDate('end', '>=', Carbon::now()->format('Y-m-d'))->get();
            $products = session()->get('cart_products');

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
            if (isset($selectedGradualDiscount)) {
                foreach ($selectedGradualDiscount->products as $gradualDiscountProduct) {
                    $gradualDiscountProductIds[] = $gradualDiscountProduct->id;
                }
            }
            /// ------Promocija za site



            $priceSum = 0;
            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                $pointsSum = 0;
            }
            //presmetuvanje na vkupnata cena na produktite za fiksen popust da se presmeta
            foreach ($products as $k => $v) {
                $product = Product::getProductByIdInLang($v['id'], $lang);
                $product->quantity = $v['quantity'];
                if (config( 'app.client') == 'herline' && $v['price'] == 533) {
                    $price = 0;
                } else {
                    $price = $product->{$this->priceGroup};

                    if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                        $price = Product::getPriceRetail1($product, false, 0);
                    }
                }
                if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                    if($this->loyaltyService->isProductInLoyaltyCategory($product)){
                        if($pointsSum <= \Auth::user()->points){
                            $pointsSum -= (Product::getProductPoints($product) * $product->quantity);
                        }
                    }
                    else{
                        $pointsSum += (Product::getProductPoints($product) * $product->quantity);
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

            $totalPriceForDelivery = 0; 

            foreach ($products as $k => $productItem) {
                $product = Product::getProductByIdInLang($productItem['id'], $lang);
                $check_product_discount = \EasyShop\Models\Product::hasDiscount($product->discount);
                $price_temp = $product->{$this->priceGroup};

                if (!!$check_product_discount) {
                    $price_temp = Product::getPriceRetail1($product, false, 0);
                }

                if(config('app.client') == 'barbakan' && isset($productItem['description']) &&$productItem['description'] != ""){
                    $newDocument->note .= explode("#",$productItem["title"])[0]." (".$productItem['description']."), ";
                }

                if (config('app.client') == 'herline' && $productItem['price'] == 533) {
                    $price_temp = 533;
                }

                //se presmetuva vkupnata cena na narackata pred da se izvrsi popustot na nejze od kuponite
                if (isset($product->bundle_price_type) && $product->bundle_price_type == 'percent') {
                    $bundleProducts = Product::whereIn('id', $productItem['bundle_items'][0])->get();
                    $bundleProductPrices = 0;
                    foreach ($bundleProducts as $bundleProduct) {
                        $bundleProductPrices += (int)$bundleProduct->price_retail_1;
                    }
                    $bundlePriceDiscounted = $bundleProductPrices - (($product->price_retail_1 / 100) * $bundleProductPrices);
                    $totalPriceForDelivery = $totalPriceForDelivery + ($bundlePriceDiscounted * $productItem["quantity"]);
                } else {
                    $theproduct = Product::getProductByIdInLang($productItem['id']);
                    if($theproduct->type != 'service'){
                        $totalPriceForDelivery = $totalPriceForDelivery + ($price_temp * $productItem["quantity"]);
                    }
                }

                if (config( 'app.client') == 'herline' && $productItem['price'] == 533) {
                    $price_temp = 533;
                } else {
                    //ako ne e na popust produktot
                    if (!$check_product_discount) {
                        if (!empty($coupons)) {
                            foreach ($coupons as $coupon) {
                                if ($coupon->discount_type === 'percent') {
                                    $price_temp = $price_temp - ($price_temp * (($coupon->value) / 100));
                                } elseif ($coupon->discount_type === 'fixed') {
                                    $price_temp = $price_temp - ($price_temp / $fixedPercentage);
                                }
                            }
                        }
                    } else { // ako e na popust produktot moze da dobie samo fiksen popust od kupon

                        if (!empty($coupons)) {
                            foreach ($coupons as $coupon) {
                                if ($coupon->discount_type === 'fixed') {
                                    $price_temp = $price_temp - ($price_temp / $fixedPercentage);
                                }
                            }
                        }
                    }
                    if ($price_temp <= 0) {
                        $price_temp = 0;
                    }
                }


                // Set up the new price in the cart product
                $products[$k]['price'] = $price_temp;

                // Get vat multiplier
                $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

                if ($product->bundle) {
                    if (isset($product->bundle_price_type) && $product->bundle_price_type == 'fixed') {
                        $bundlePrice = $price_temp / $product->bundle_products_number;
                    }
                    $bundleIds = BundleProduct::where('bundle', $product->id)->pluck('product_id');
                    $bundleProducts = Product::whereIn('products.id', $bundleIds)->join('bundle_products', 'products.id', '=', 'bundle_products.product_id')->where('bundle_products.bundle', $product->id)->select('products.*', 'bundle_products.quantity as quantity')->get();

                    foreach ($bundleProducts as $bundleProduct) {
                        $newDocumentItem = DocumentItems::create();
                        $newDocumentItem->document_id = $newDocument->id;
                        $newDocumentItem->product_id = $bundleProduct->id;
                        $newDocumentItem->item_name = $bundleProduct->title;
                        $newDocumentItem->quantity = $productItem["quantity"] * $bundleProduct->quantity;
                        $newDocumentItem->document_number = $newDocument->document_number;

                        if (isset($product->bundle_price_type) && $product->bundle_price_type == 'percent') {
                            $bundlePrice = $bundleProduct->price_retail_1 - ((int)$product->price_retail_1 / 100 * $bundleProduct->price_retail_1);
                        }
                        $newDocumentItem->price = $bundlePrice * $bundleProduct->quantity;
                        $newDocumentItem->vat = $bundleProduct->vat;
                        $newDocumentItem->price_no_vat = ($bundlePrice * $bundleProduct->quantity) / $danok;
                        $newDocumentItem->sum_no_vat = $newDocumentItem->price_no_vat * $productItem["quantity"];
                        $newDocumentItem->sum_vat = $newDocumentItem->price * $productItem["quantity"];

                        $newDocumentItem->unit_code = $bundleProduct->unit_code;
                        $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($bundleProduct);
                        $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($bundleProduct);
                        $newDocumentItem->save();


                        $totalPrice += $newDocumentItem->sum_vat;
                        $totalQuantity += $newDocumentItem->quantity;
                    }
                } else {
                    $newDocumentItem = DocumentItems::create();
                    $newDocumentItem->document_id = $newDocument->id;
                    $newDocumentItem->product_id = $product->id;
                    $newDocumentItem->item_name = $product->title;
                    $newDocumentItem->quantity = $productItem['quantity'];
                    $newDocumentItem->document_number = $newDocument->document_number;

                    $newDocumentItem->price = $price_temp;
                    $newDocumentItem->vat = $product->vat;
                    $newDocumentItem->price_no_vat = $price_temp / $danok;
                    $newDocumentItem->sum_no_vat = $newDocumentItem->price_no_vat * $productItem['quantity'];
                    $newDocumentItem->sum_vat = $newDocumentItem->price * $productItem['quantity'];

                    if (!empty($check_product_discount)) {
                        $newDocumentItem->original_price = $product->{$this->priceGroup};
                        $newDocumentItem->original_price_no_vat = $newDocumentItem->original_price / $danok;
                        $newDocumentItem->original_sum_no_vat = $newDocumentItem->original_price_no_vat * $productItem['quantity'];
                        $newDocumentItem->original_sum_vat = $newDocumentItem->original_price * $productItem['quantity'];
                    }



                    $variations = null;
                    // доколку има варијација, пратена е како Array
                    if (isset($productItem['variation']) && is_array($productItem['variation'])) {
                        $variations = implode(',', $productItem['variation']);
                    } else if (isset($productItem['variation'])) {
                        $variations = str_replace('_', ',', $productItem['variation']);
                    }

                    $newDocumentItem->variation_id =  $variations;
                    $newDocumentItem->unit_code = $product->unit_code;
                    $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($product);
                    $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($product);
                    $newDocumentItem->save();

                    // If product has discount
                    // if (!empty($check_product_discount)) {
                    //     $newDocumentItem->original_price = $product->{$this->priceGroup};
                    //     $newDocumentItem->original_price_no_vat = $newDocumentItem->original_price / $danok;
                    //     $newDocumentItem->original_sum_no_vat = $newDocumentItem->original_price_no_vat * $productItem['quantity'];
                    //     $newDocumentItem->original_sum_vat = $newDocumentItem->original_price * $productItem['quantity'];
                    // }


                    // $variations = null;
                    // доколку има варијација, пратена е како Array
                    // if (isset($productItem['variation']) && is_array($productItem['variation'])) {
                    //     $variations = implode(',', $productItem['variation']);
                    // } else if (isset($productItem['variation'])) {
                    //     $variations = str_replace('_', ',', $productItem['variation']);
                    // }

                    // $newDocumentItem->variation_id =  $variations;
                    $newDocumentItem->unit_code = $product->unit_code;
                    $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($product);
                    $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($product);
                    $newDocumentItem->save();

                    $totalPrice += $newDocumentItem->sum_vat;
                    $totalQuantity += $newDocumentItem->quantity;
                }
            }
            $newDocument->note = trim($newDocument->note, ", ");
            /**
             * Presmetaj cena za dostava - uslov koga sumata e nad odreden iznos, dostavata e bez pari
             */

            switch (config( 'app.client')) {
                case Settings::CLIENT_HERLINE:
                    if ($totalPriceForDelivery >= 1500) {
                        $newDocument->price_delivery = 0;
                        $newDocument->save();
                    } else {
                        $newDocument->price_delivery = 150;
                        $newDocument->save();
                    }
                    break;
                case Settings::CLIENT_YEPPEUDA:
                    if ($totalPriceForDelivery >= 1200) {
                        $newDocument->price_delivery = 0;
                        $newDocument->save();
                    }
                    break;
                case Settings::CLIENT_HOTSPOT:
                    if ($totalPriceForDelivery >= 1000) {
                        $newDocument->price_delivery = 0;
                        $newDocument->save();
                    }
                    break;
                case Settings::CLIENT_NATURATHERAPYSHOP:
                    if ($totalPriceForDelivery >= 1000) {
                        $newDocument->price_delivery = 0;
                    } else if($totalPriceForDelivery == 0){
                        $newDocument->price_delivery = 0;
                    } else {
                        $newDocument->price_delivery = 100;
                    }
                    $newDocument->save();
                    break;
                case Settings::CLIENT_NATURATHERAPYSHOP_AL:
                    if ($totalPriceForDelivery >= 15) {
                        $newDocument->price_delivery = 0;
                    } else {
                        $document_info = json_decode($newDocument->document_json, true);
                        $userBilling = $document_info['userBilling'];
                        $country_id = $userBilling['country_id'];
                        if ($country_id == 26) {
                            $newDocument->price_delivery = 0;
                        } else {
                            $newDocument->price_delivery = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                        }
                    }
                    $newDocument->save();
                    break;
                case Settings::CLIENT_NATURATHERAPYSHOP_ALB:
                    if ($totalPriceForDelivery >= 2000) {
                        $newDocument->price_delivery = 0;
                    } else if($totalPriceForDelivery == 0){
                        $newDocument->price_delivery = 0;
                    } else {
                        $document_info = json_decode($newDocument->document_json, true);
                        $userBilling = $document_info['userBilling'];
                        $city_id = $userBilling['city_id'];
                        if($city_id == 37){
                            $newDocument->price_delivery = 200;
                        }
                        $newDocument->price_delivery = 250;
                    }
                    $newDocument->save();
                    break;
                case Settings::CLIENT_PELETCENTAR:
                    if ($totalPriceForDelivery >= 3000) {
                        $newDocument->price_delivery = 0;
                        $newDocument->save();
                    }
                    break;
                case Settings::CLIENT_MY_MODA:
                    $newDocument->price_delivery = 110;
                    $newDocument->save();
                    break;
                case Settings::CLIENT_EXPRESSBOOK:
                    if ($totalPriceForDelivery >= 1200) {
                        $newDocument->price_delivery = 0;
                    } else {
                        // $document_info = json_decode($newDocument->document_json, true);
                        // $userBilling = $document_info['userBilling'];
                        // $city_id = $userBilling['city_id'];
                        // if ($city_id != 27) {
                        $newDocument->price_delivery = 130;
                        // } else {
                        //     $newDocument->price_delivery = 0;
                        // }
                    }
                    $newDocument->save();
                    break;
                case Settings::CLIENT_DRBROWNS:
                    if ($totalPriceForDelivery >= 1200) {
                        $newDocument->price_delivery = 0;
                    } else {
                        // $document_info = json_decode($newDocument->document_json, true);
                        // $userBilling = $document_info['userBilling'];
                        // $city_id = $userBilling['city_id'];
                        // if ($city_id != 27) {
                        $newDocument->price_delivery = 120;
                        // } else {
                        //     $newDocument->price_delivery = 0;
                        // }
                    }
                    $newDocument->save();
                    break;
                    default: 
                    $newDocument->save();
                    break;
            }

            //Dodavanje na poeni posle narachka NATURATHERAPY
            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                if(auth()->check()){
                    $user = \Auth::user();
                    if($pointsSum < 0){
                        $pointsSum = abs($pointsSum);
                        DB::table('users')->where('id', '=', $user->id)->decrement('points', $pointsSum);
                    
                    }
                    else{
                        DB::table('users')->where('id', '=', $newDocument->user_id)->increment('points', $pointsSum);
                    }
                }
            }

            $data_email['document_city_country'] = $this->prepareCityCountryForMail($newDocument);
            $data_email['document'] = $newDocument;

            $productIds = [];

            foreach ($products as $key => $productItem) {
                $productIds[] = $productItem['id'];

                if (!is_array($productItem['variation'])) {
                    $productItem['variation'] = explode(',', $productItem['variation']);
                }
                if (isset($productItem['variation']) && !empty($productItem['variation'])) {
                    foreach ($productItem['variation'] as $k => $v) {
                        $variation = Variations::where('id', $v)->first();

                        if (!is_null($variation)) {
                            $products[$key][$variation['name']] = $variation['value'];
                        } else {
                            $products[$key]['variation'] = '';
                        }
                        // $products[$key]['variation'] = $variation['value'];
                        unset($products[$key]['variation']);
                    }
                } else {
                    $products[$key]['variation'] = '';
                }
            }

            $data_email['products'] = $products;
            $data_email['document_number'] = $newDocument->document_number;

            if (config( 'app.client') == 'herline' ||  in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS) || config( 'app.client') == 'yeppeuda') {
                foreach ($data_email['products'] as $data_product) {
                    $bundle = Product::find($data_product['id']);

                    if (isset($bundle->bundle_price_type) && $bundle->bundle_price_type == 'percent') {
                        $bundleProducts = Product::whereIn('id', $data_product['bundle_items'][0])->get();
                        $bundleProductPrices = 0;
                        foreach ($bundleProducts as $bundleProduct) {
                            $bundleProductPrices += (int)$bundleProduct->price_retail_1;
                        }
                        $bundlePriceDiscounted = $bundleProductPrices - (($data_product['price'] / 100) * $bundleProductPrices);
                        $data_email['products'][$data_product['id']]['price'] = $bundlePriceDiscounted;
                    }
                }
            }

            switch (config( 'app.client')) {
                case "luxbox":
                    Mail::send('emails.luxbox.invoice', $data_email, function ($message) use ($data_email) {
                        $clientName = env('MAIL_SENDER_NAME');
                        $email = json_decode($data_email['document']->document_json);
                        $message->to($email->userShipping->email)->from('noreply@' . \EasyShop\Models\AdminSettings::getField('emaildomain'), $clientName)->subject(trans('global.messages.online_order') . $data_email['document_number']);
                    });
                    break;
                default:
                    try {
                        Mail::send('emails.invoice', $data_email, function ($message) use ($data_email) {
                            $clientName = env('MAIL_SENDER_NAME');
                            $email = json_decode($data_email['document']->document_json);
                            $message->to($email->userShipping->email)->from('noreply@' . \EasyShop\Models\AdminSettings::getField('emaildomain'), $clientName)->subject(trans('global.messages.online_order') . $data_email['document_number']);
                        });
                    } catch (\Exception $e) {
                        \Log::error($e->getMessage());
                    }
            }

            // Zgolemuvanje na brojot na prodavanost na proizvodot
            foreach ($products as $product) {

                $product = Product::getProductByIdInLang($product['id'], $lang);
                $product->purchases += 1;
                $product->save();
            }

            foreach ($coupons as $coupon) {
                PromoCode::where('code', '=', $coupon->code)->update(['reuse_number' => DB::raw('reuse_number-1')]);
            }

            $request->session()->forget('cart_products');
            $request->session()->forget('coupons');

            return redirect(detectUrlLang() . 'thank-you')
                ->with('thankyou', true)
                ->with('success_message', trans('global.messages.success_order'))
                ->with('pixel', $totalPrice)
                ->with('productIds', json_encode($productIds));
        }
        /**
         * CASYS
         */
        else if ($request->input('paymentType') === Payment::TYPE_CASYS) {

            /*
             * Kreiraj privremena naracka
             */
            $tempOrder = new TempOrder();
            $tempOrder->user_id = auth()->check() ? auth()->user()->id : User::GUEST_ID;
            $tempOrder->note = $request->input('note');
            $tempOrder->currency = \EasyShop\Models\AdminSettings::getField('currency');
            $tempOrder->document_json = $this->prepareDocumentJsonField($request);
            $tempOrder->customer_name = $request->get('FirstName') . " " . $request->get('LastName');
            // Add type of delivery
            $typeDelivery = $request->input('type_delivery');
            $tempOrder->type_delivery = NULL;
            $tempOrder->price_delivery = 0;

            if ($typeDelivery) {
                // Get type delivery from config
                $deliveries = config( 'clients.' . config( 'app.client') . '.type_delivery');
                if (is_array($deliveries) && array_key_exists($typeDelivery, $deliveries)) {
                    $documentDelivery = $deliveries[$typeDelivery];
                    $tempOrder->type_delivery = $documentDelivery['name'];
                    $tempOrder->price_delivery = $documentDelivery['price'];
                }

                // Dokolku treba razlicna cena za dostava pri plakanje so karticka i vo gotovo
                if (isset($documentDelivery['price_with_card']) && !is_null($documentDelivery['price_with_card'])) {
                    $tempOrder->price_delivery = $documentDelivery['price_with_card'];
                }
            }



            $tempOrder->save();


            $totalPrice = 0;
            $productIds = [];
            $products = $request->session()->get('cart_products');
            $coupons = $request->session()->get('coupons');

            //se brojat produktite vo sesija za da se izracuna fiksen popust
            $numProducts = 0;
            foreach ($products as $v) {
                $numProducts = $numProducts + $v["quantity"];
            }

            $totalPriceForDelivery = 0;


            $priceSum = 0;

            //presmetuvanje na vkupnata cena na produktite za fiksen popust da se presmeta
            foreach ($products as $k => $v) {
                $product = $this->articleRepository->getById($k);
                $product->quantity = $v['quantity'];
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
            if (!empty($coupons)) {
                foreach ($coupons as $coupon) {

                    if ($coupon->discount_type === 'fixed') {
                        $fixedPercentage = $priceSum / $coupon->value;
                    }
                }
            }


            foreach ($products as $k => $productItem) {
                $product = Product::getProductByIdInLang($productItem['id'], $lang);
                $productIds[] = $product->id;
                $price_temp = $product->{$this->priceGroup};

                $check_product_discount = \EasyShop\Models\Product::hasDiscount($product->discount);

                if ($check_product_discount) {
                    $price_temp = Product::getPriceRetail1($product, false, 0);
                }

                if (!$check_product_discount) {
                    if (!empty($coupons)) {
                        foreach ($coupons as $coupon) {
                            if ($coupon->discount_type === 'percent') {
                                $price_temp = $price_temp - ($price_temp * (($coupon->value) / 100));
                            } elseif ($coupon->discount_type === 'fixed') {
                                $price_temp = $price_temp - ($price_temp / $fixedPercentage);
                            }
                        }
                    }
                } else { // ako e na popust produktot moze da dobie samo fiksen popust od kupon
                    $price_temp = Product::getPriceRetail1($product, false, 0);
                    if (!empty($coupons)) {
                        foreach ($coupons as $coupon) {
                            if ($coupon->discount_type === 'fixed') {
                                $price_temp = $price_temp - ($price_temp / $fixedPercentage);
                            }
                        }
                    }
                }

                //se presmetuva vkupnata cena na narackata pred da se izvrsi popustot na nejze od kuponite
                $theproduct = Product::getProductByIdInLang($productItem['id']);
                if($theproduct->type != 'service'){
                    $totalPriceForDelivery = $totalPriceForDelivery + ($price_temp * $productItem["quantity"]);
                }
                

                if ($price_temp <= 0) {
                    $price_temp = 0;
                }


                if (!empty($coupons)) {
                    $tempOrder->promo_code_id = head($coupons)->id;
                    $tempOrder->save();
                }
               
                // Get vat multiplier
                $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

                $newTempItem = new TempOrderItem();
                $newTempItem->document_id = $tempOrder->id;
                $newTempItem->product_id = $product->id;
                $newTempItem->item_name = $product->title;
                $newTempItem->quantity = $productItem['quantity'];
                $newTempItem->price = $price_temp;
                $newTempItem->vat = $product->vat;
                $newTempItem->price_no_vat = $price_temp / $danok;
                $newTempItem->sum_no_vat = $newTempItem->price_no_vat * $productItem['quantity'];
                $newTempItem->sum_vat = $newTempItem->price * $productItem['quantity'];

                // If product has discount
                if (!empty($check_product_discount)) {
                    $newTempItem->original_price = $product->{$this->priceGroup};
                    $newTempItem->original_price_no_vat = $newTempItem->original_price / $danok;
                    $newTempItem->original_sum_no_vat = $newTempItem->original_price_no_vat * $productItem['quantity'];
                    $newTempItem->original_sum_vat = $newTempItem->original_price * $productItem['quantity'];
                }

                $newTempItem->variation_id = isset($productItem['variation']) ? $productItem['variation'] : null;
                $newTempItem->url = $productItem['url'];
                $newTempItem->image = $productItem['image'];
                $newTempItem->unit_code = $product->unit_code;
                $newTempItem->proizvod_usluga = $this->productService->flagProductService($product);
                $newTempItem->stranski_domasen = $this->productService->flagForeignDomestic($product);

                $newTempItem->save();

                $totalPrice += $newTempItem->sum_vat;
            }

            if (config( 'app.client') === Settings::CLIENT_YEPPEUDA) {
                if ($totalPriceForDelivery >= 1200) {
                    $tempOrder->price_delivery = 0;
                    $tempOrder->save();
                }
            } else if (config( 'app.client') === Settings::CLIENT_PELETCENTAR) {

                // Free delivery for Macedonia
                if ($totalPriceForDelivery >= 4000) {
                    $tempOrder->price_delivery = 0;
                    $tempOrder->save();
                }
            } else if (config( 'app.client') === Settings::CLIENT_DRBROWNS) {

                // Free delivery for Macedonia
                if ($totalPriceForDelivery >= 1200) {
                    $tempOrder->price_delivery = 0;
                    $tempOrder->save();
                }
            } else if (config( 'app.client') === Settings::CLIENT_MY_MODA) {
                // Free delivery for Macedonia
                if ($totalPriceForDelivery >= 2000) {
                    $tempOrder->price_delivery = 0;
                    $tempOrder->save();
                }
            }

            // Add delivery to the order


            $totalPrice += $tempOrder->price_delivery;
            $totalPrice = (int) $totalPrice;

            $data = $this->casysBillingService->generateChecksum($request->all(), $totalPrice, $tempOrder->id);

            // Add checksum for additional validation
            $tempOrder->checksum = $data['checksum'];
            $tempOrder->total_price = $totalPrice;
            $tempOrder->product_ids = implode(',', $productIds);
            $tempOrder->save();
            $data['totalPrice'] = $totalPrice;
            $data['totalPriceFull'] = $totalPrice * 100;
            $data['productIds'] = $productIds;

            $data['status'] = 'success';



            $request->session()->forget('cart_products');
            $request->session()->forget('coupons');

            return response()->json($data);
        } else if ($request->input('paymentType') === Payment::TYPE_HALK) {

            $tempOrder = new TempOrder();
            $tempOrder->user_id = auth()->check() ? auth()->user()->id : User::GUEST_ID;
            $tempOrder->note = $request->input('note');
            $tempOrder->currency = \EasyShop\Models\AdminSettings::getField('currency');
            $tempOrder->document_json = $this->prepareDocumentJsonField($request);

            $tempOrder->customer_name = $request->get('FirstName') . " " . $request->get('LastName');
            // Add type of delivery
            $typeDelivery = $request->input('type_delivery');
            $tempOrder->type_delivery = NULL;
            $tempOrder->price_delivery = 0;

            if ($typeDelivery) {
                // Get type delivery from config
                $deliveries = config( 'clients.' . config( 'app.client') . '.type_delivery');
                if (is_array($deliveries) && array_key_exists($typeDelivery, $deliveries)) {
                    $documentDelivery = $deliveries[$typeDelivery];
                    $tempOrder->type_delivery = $documentDelivery['name'];
                    $tempOrder->price_delivery = $documentDelivery['price'];
                }
            }
            $tempOrder->save();

            $totalPrice = 0;
            $productIds = [];
            $products = $request->session()->get('cart_products');
            $coupons = $request->session()->get('coupons');

            $priceSum = 0;

            //presmetuvanje na vkupnata cena na produktite za fiksen popust da se presmeta
            foreach ($products as $k => $v) {
                if(isset($k['id'])) {
                    $product = Product::getProductByIdInLang($k['id'], $lang);
                } else {
                    $product = Product::getProductByIdInLang($k, $lang);
                }

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


            $totalPriceForDelivery = 0;

            foreach ($products as $k => $productItem) {
                $product = $this->articleRepository->getById($productItem['id']);
                $productIds[] = $product->id;
                $price_temp = $product->{$this->priceGroup};

                $check_product_discount = \EasyShop\Models\Product::hasDiscount($product->discount);

                if ($check_product_discount) {
                    $price_temp = Product::getPriceRetail1($product, false, 0);
                }

                // if(config('app.client') == 'barbakan' && isset($productItem['description']) &&$productItem['description'] != ""){
                //     $newDocument->note .= explode("#",$productItem["title"])[0]." (".$productItem['description']."), ";
                // }

                if (config('app.client') == 'herline' && $productItem['price'] == 533) {
                    $price_temp = 533;
                }

                //se presmetuva vkupnata cena na narackata pred da se izvrsi popustot na nejze od kuponite
                if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
                    $theproduct = Product::getProductByIdInLang($productItem['id']);
                    if($theproduct->type != 'service'){
                        $totalPriceForDelivery = $totalPriceForDelivery + ($price_temp * $productItem["quantity"]);
                    }
                }
                else{
                    $totalPriceForDelivery = $totalPriceForDelivery + ($price_temp * $productItem["quantity"]);
                }
                

                if (config( 'app.client') == 'herline' && $productItem['price'] == 533) {
                    $price_temp = 533;
                } else {
                    if (!$check_product_discount) {
                        if (!empty($coupons)) {
                            foreach ($coupons as $coupon) {
                                if ($coupon->discount_type === 'percent') {
                                    $price_temp = $price_temp - ($price_temp * (($coupon->value) / 100));
                                } elseif ($coupon->discount_type === 'fixed') {
                                    $price_temp = $price_temp - ($price_temp / $fixedPercentage);
                                }
                            }
                        }
                    } else { // ako e na popust produktot moze da dobie samo fiksen popust od kupon


                        if (!empty($coupons)) {
                            foreach ($coupons as $coupon) {
                                if ($coupon->discount_type === 'fixed') {
                                    $price_temp = $price_temp - ($price_temp / $fixedPercentage);
                                }
                            }
                        }
                    }

                    if ($price_temp <= 0) {
                        $price_temp = 0;
                    }
                }
                if (!empty($coupons)) {
                    $tempOrder->promo_code_id = head($coupons)->id;
                    $tempOrder->save();
                }

                // Get vat multiplier
                $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

                $newTempItem = new TempOrderItem();
                $newTempItem->document_id = $tempOrder->id;
                $newTempItem->product_id = $product->id;
                $newTempItem->item_name = $product->title;
                $newTempItem->quantity = $productItem['quantity'];
                $newTempItem->price = $price_temp;
                $newTempItem->vat = $product->vat;
                $newTempItem->price_no_vat = $price_temp / $danok;
                $newTempItem->sum_no_vat = $newTempItem->price_no_vat * $productItem['quantity'];
                $newTempItem->sum_vat = $newTempItem->price * $productItem['quantity'];

                // If product has discount
                if (!empty($check_product_discount)) {
                    $newTempItem->original_price = $product->{$this->priceGroup};
                    $newTempItem->original_price_no_vat = $newTempItem->original_price / $danok;
                    $newTempItem->original_sum_no_vat = $newTempItem->original_price_no_vat * $productItem['quantity'];
                    $newTempItem->original_sum_vat = $newTempItem->original_price * $productItem['quantity'];
                }

                $newTempItem->variation_id = isset($productItem['variation']) ? $productItem['variation'] : null;
                $newTempItem->url = $productItem['url'];
                $newTempItem->image = $productItem['image'];
                $newTempItem->unit_code = $product->unit_code;
                $newTempItem->proizvod_usluga = $this->productService->flagProductService($product);
                $newTempItem->stranski_domasen = $this->productService->flagForeignDomestic($product);

                $newTempItem->save();

                $totalPrice += $newTempItem->sum_vat;
            }

            if (config( 'app.client') === Settings::CLIENT_HERLINE) {
                if ($totalPriceForDelivery >= 1500) {
                    $tempOrder->price_delivery = 0;
                    $tempOrder->save();
                }
            }
            if (config( 'app.client') === Settings::CLIENT_NATURATHERAPYSHOP) {
                if ($totalPriceForDelivery >= 1000) {
                    $tempOrder->price_delivery = 0;
                } else if($totalPriceForDelivery == 0){
                    $tempOrder->price_delivery = 0;   
                } else {
                    $tempOrder->price_delivery = 100;
                }
                $tempOrder->save();
            }

            $totalPrice += $tempOrder->price_delivery;
            $totalPrice = (int) $totalPrice;

            // Add checksum for additional validation
            $tempOrder->total_price = $totalPrice;
            $tempOrder->product_ids = implode(',', $productIds);
            $tempOrder->save();
            $data['totalPrice'] = $totalPrice;
            // $data['totalPriceFull'] = $totalPrice * 100;
            $data['productIds'] = $productIds;
            $data['status'] = 'success';


            $request->session()->forget('cart_products');
            $request->session()->forget('coupons');



            $oid = 'Order-' . uniqid();
            $rnd = uniqid();

            // Create hash
            $hash = $this->halkBillingService->generateHash($rnd, $totalPrice, $oid);

            // Add checksum for additional validation
            $tempOrder->checksum = $oid;
            $tempOrder->total_price = $totalPrice;
            $tempOrder->product_ids = implode(',', $productIds);
            $tempOrder->save();
            $data['hash'] = $hash;
            $data['totalPrice'] = (int) $totalPrice;
            $data['productIds'] = $productIds;
            $data['status'] = 'success';
            $data['oid'] = $oid;
            $data['rnd'] = $rnd;
            $data['currency'] = \EasyShop\Models\AdminSettings::getField('currencyCode');

            return response()->json($data);
        }
    }

    /**
     * @param Request $request
     */
    public function success(Request $request)
    {

        $documentId = $request->input('Details2');
        $casysRef = $request->input('cPayPaymentRef');
        $checksum = $request->input('CheckSum');

        if (!$documentId) {
            return redirect()->route('home')->withError('Настана грешка при нарачувањето!');
        }

        $tempOrder = TempOrder::find($documentId);
        if (!$tempOrder || $tempOrder->checksum !== $checksum) {
            return redirect()->route('home')->withError('Настана грешка при нарачувањето!');
        }

        if ($tempOrder->success) {
            return redirect(detectUrlLang() . 'thank-you')
                ->with('thankyou', true)
                ->with('success_message', trans('global.messages.success_order'))
                ->with('pixel', $tempOrder->total_price)
                ->with('productIds', json_encode(explode(',', $tempOrder->product_ids)));
        }

        $document_ids = [];

        // Generiraj NARACKA
        $naracka = new Document();
        $naracka->status = Document::STATUS_NARACKA_GENERIRANA;
        $naracka->casys_ref = $casysRef;
        $naracka->web = 1;
        $naracka->user_id = $tempOrder->user_id;
        $naracka->document_date = date("Y-m-d H:i:s");
        $naracka->maturity_date = date("Y-m-d");
        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {
            $naracka->type_of_order = 'Web';
        }
        $count_docs = Document::where('type', Document::TYPE_NARACHKA)
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->whereNotNull('document_number')
            ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
            ->count();


        $naracka->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
        $naracka->currency = $tempOrder->currency;
        $naracka->type = Document::TYPE_NARACHKA;
        $naracka->payment = Document::PAYMENT_KARTICKA;
        $naracka->paid = Document::PAID_TRUE;
        $naracka->note = $tempOrder->note;
        $naracka->checksum = $tempOrder->checksum;
        $naracka->type_delivery = $tempOrder->type_delivery;
        $naracka->price_delivery = $tempOrder->price_delivery;
        $naracka->promo_code_id = $tempOrder->promo_code_id;
        $naracka->note = $tempOrder->note;
        $naracka->document_json = $tempOrder->document_json;

        $naracka->customer_name = $tempOrder->customer_name;
        // Add warehouse
        $naracka->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
        $naracka->document_number = sprintf('%02d', $naracka->warehouse_id) . '-' . $naracka->document_number;

        $naracka->save();
        $document_ids[Document::TYPE_NARACHKA] = $naracka->id;


        //Namali ja iskoristenosta na kuponot dokolku bil iskoristen pri narackata 
        if (isset($naracka->promo_code_id)) {
            PromoCode::where('id', '=', $naracka->promo_code_id)->update(['reuse_number' => DB::raw('reuse_number-1')]);
        }


        // GENERIRAJ FAKTURA
        $faktura_online_flag = \EasyShop\Models\AdminSettings::getField('fakturaOnline');
        $rezervacija_online_flag = \EasyShop\Models\AdminSettings::getField('rezervacijaOnline');

        if (!empty($faktura_online_flag)) {
            $faktura = new FakturaOnline();
            $faktura->type = Document::TYPE_FAKTURA_ONLINE;
            $count_docs = FakturaOnline::where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->whereNotNull('document_number')
                ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->count();
        } else {
            $faktura = new Document();
            $faktura->type = Document::TYPE_FAKTURA;
            $faktura->paid = Document::PAID_TRUE;
            $count_docs = Document::where('type', Document::TYPE_FAKTURA)
                ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->whereNotNull('document_number')
                ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->count();
        }

        $faktura->status = Document::STATUS_NARACKA_GENERIRANA;
        $faktura->web = 1;
        $faktura->user_id = $tempOrder->user_id;
        $faktura->document_date = date("Y-m-d H:i:s");
        $faktura->maturity_date = date("Y-m-d");
        $faktura->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');

        $faktura->currency = $tempOrder->currency;

        $faktura->payment = Document::PAYMENT_KARTICKA;
        $faktura->note = $tempOrder->note;
        $faktura->checksum = $tempOrder->checksum;
        $faktura->type_delivery = $tempOrder->type_delivery;
        $faktura->price_delivery = $tempOrder->price_delivery;
        $faktura->note = $tempOrder->note;
        $faktura->document_json = $tempOrder->document_json;
        // Add warehouse
        $faktura->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
        $faktura->document_number = sprintf('%02d', $faktura->warehouse_id) . '-' . $faktura->document_number;

        $faktura->save();

        if (!empty($faktura_online_flag)) {
            $document_ids[Document::TYPE_FAKTURA_ONLINE] = $faktura->id;
        } else {
            $document_ids[Document::TYPE_FAKTURA] = $faktura->id;
        }

        // GENERIRAJ REZERVACIJA
        if (!empty($rezervacija_online_flag)) {
            $rezervacija = new Document();
            $rezervacija->status = Document::STATUS_NARACKA_GENERIRANA;
            $rezervacija->web = 1;
            $rezervacija->user_id = $tempOrder->user_id;
            $rezervacija->document_date = date("Y-m-d H:i:s");
            $rezervacija->maturity_date = date("Y-m-d");
            $count_docs = Document::where('type', Document::TYPE_REZERVACIJA)
                ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->whereNotNull('document_number')
                ->count();
            $rezervacija->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
            $rezervacija->currency = $tempOrder->currency;
            $rezervacija->type = Document::TYPE_REZERVACIJA;
            $rezervacija->paid = Document::PAID_TRUE;
            $rezervacija->payment = Document::PAYMENT_KARTICKA;
            $rezervacija->note = $tempOrder->note;
            $rezervacija->checksum = $tempOrder->checksum;
            $rezervacija->type_delivery = $tempOrder->type_delivery;
            $rezervacija->price_delivery = $tempOrder->price_delivery;
            $rezervacija->note = $tempOrder->note;
            $rezervacija->document_json = $tempOrder->document_json;
            // Add warehouse
            $rezervacija->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
            $rezervacija->document_number = sprintf('%02d', $rezervacija->warehouse_id) . '-' . $rezervacija->document_number;
            $rezervacija->save();
            $document_ids[Document::TYPE_REZERVACIJA] = $rezervacija->id;
        }
        // VNESI PRODUKTI VO NARACKA,FAKTURA,REZERVACIJA

        $products = TempOrderItem::where('document_id', $tempOrder->id)->get();
        foreach ($document_ids as $doc_key => $doc_value) {

            foreach ($products as $k => $v) {
                if (!empty($faktura_online_flag) && $doc_key == Document::TYPE_FAKTURA_ONLINE) {
                    $newDocumentItem = new FakturaOnlineItems();
                } else {
                    $newDocumentItem = new DocumentItems();
                }



                $product = $this->articleRepository->getById($v->product_id);

                if ($product->bundle) {

                    $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

                    if (isset($product->bundle_price_type) && $product->bundle_price_type == 'fixed') {
                        $bundlePrice = $v->price / $product->bundle_products_number;
                    }
                    $bundleIds = BundleProduct::where('bundle', $product->id)->pluck('product_id');
                    $bundleProducts = Product::whereIn('products.id', $bundleIds)
                        ->join('bundle_products', 'products.id', '=', 'bundle_products.product_id')->where('bundle_products.bundle', $product->id)
                        ->select('products.*', 'bundle_products.quantity as quantity')->get();

                    foreach ($bundleProducts as $bundleProduct) {
                        $newDocumentItem = DocumentItems::create();
                        $newDocumentItem->document_id = $doc_value;
                        $newDocumentItem->product_id = $bundleProduct->id;
                        $newDocumentItem->item_name = $bundleProduct->title;
                        $newDocumentItem->quantity = $v->quantity * $bundleProduct->quantity;
                        $newDocumentItem->document_number = $naracka->document_number;

                        if (isset($product->bundle_price_type) && $product->bundle_price_type == 'percent') {
                            $bundlePrice = $bundleProduct->price_retail_1 - ((int)$product->price_retail_1 / 100 * $bundleProduct->price_retail_1);
                        }
                        $newDocumentItem->price = $bundlePrice * $bundleProduct->quantity;
                        $newDocumentItem->vat = $bundleProduct->vat;
                        $newDocumentItem->price_no_vat = ($bundlePrice * $bundleProduct->quantity) / $danok;
                        $newDocumentItem->sum_no_vat = $newDocumentItem->price_no_vat * $v->quantity;
                        $newDocumentItem->sum_vat = $newDocumentItem->price * $v->quantity;

                        $newDocumentItem->unit_code = $bundleProduct->unit_code;
                        $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($bundleProduct);
                        $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($bundleProduct);


                        $newDocumentItem->save();
                    }
                } else {

                    $newDocumentItem->product_id = $v->product_id;
                    $newDocumentItem->item_name = $v->item_name;
                    $newDocumentItem->quantity = $v->quantity;
                    $newDocumentItem->price = $v->price;
                    $newDocumentItem->vat = $v->vat;
                    $newDocumentItem->price_no_vat = $v->price_no_vat;
                    $newDocumentItem->sum_no_vat = $v->sum_no_vat;
                    $newDocumentItem->sum_vat = $v->sum_vat;

                    $newDocumentItem->original_price = $v->original_price;
                    $newDocumentItem->original_price_no_vat = $v->original_price_no_vat;
                    $newDocumentItem->original_sum_vat = $v->original_sum_vat;
                    $newDocumentItem->original_sum_no_vat = $v->original_sum_no_vat;

                    $newDocumentItem->variation_id = $v->variation_id;
                    $newDocumentItem->document_id = $doc_value;
                    $newDocumentItem->unit_code = $v->unit_code;
                    $newDocumentItem->proizvod_usluga = $v->proizvod_usluga;
                    $newDocumentItem->stranski_domasen = $v->stranski_domasen;
                }
                if ($doc_key === Document::TYPE_NARACHKA) {
                    $newDocumentItem->document_number = $naracka->document_number;
                }
                if ($doc_key === Document::TYPE_FAKTURA || $doc_key == Document::TYPE_FAKTURA_ONLINE) {
                    $newDocumentItem->document_number = $faktura->document_number;
                }
                if ($doc_key === Document::TYPE_REZERVACIJA) {
                    $newDocumentItem->document_number = $rezervacija->document_number;
                }

                $newDocumentItem->save();
            }
        }
        if (!empty($rezervacija_online_flag)) {
            $this->documentService->reserveProducts($rezervacija->id, $rezervacija->warehouse_id);
        }

        $documentRelated = new DocumentsRelated();
        $documentRelated->naracka_id = $naracka->id;
        if (!empty($faktura_online_flag)) {
            $documentRelated->faktura_online_id = $faktura->id;
        }
        if (!empty($rezervacija_online_flag)) {
            $documentRelated->rezervacija_id = $rezervacija->id;
        }
        $documentRelated->save();

        $tempOrder->success = true;
        $tempOrder->save();

        // SEND EMAIL
        $products = TempOrderItem::where('document_id', $tempOrder->id)->get();

        $data_email['document_city_country'] = $this->prepareCityCountryForMail($naracka);
        $data_email['document'] = $naracka;

        $productIds = [];

        $productArray = [];

        foreach ($products as $product) {

            $productIds[] = $product->product_id;
            $productArrayItem = [
                'id' => $product->product_id,
                'quantity' => $product->quantity,
                'title' => $product->item_name,
                'url' => $product->url,
                'image' => $product->image,
                'price' => $product->price,
                'variation' => $product->variation_id,
            ];

            if (isset($productArrayItem['variation']) && !empty($productArrayItem['variation'])) {
                $variation = Variations::where('id', $productArrayItem['variation'])->first();
                if (!is_null($variation)) {
                    $productArrayItem['variation'] = $variation['value'];
                } else {
                    $productArrayItem['variation'] = '';
                }
                $productArrayItem['variation'] = $variation['value'];
            } else {
                $productArrayItem['variation'] = '';
            }

            $productArray[] = $productArrayItem;


            // Zgolemuvanje na brojot na prodavanost na proizvodot

            $product = $this->articleRepository->getById($product->product_id);
            $product->purchases += 1;
            $product->save();
        }

        $data_email['products'] = $productArray;
        $data_email['document_number'] = $naracka->document_number;

        Mail::send('emails.invoice', $data_email, function ($message) use ($data_email) {
            $email = json_decode($data_email['document']->document_json);
            $message->to($email->userShipping->email)->from('noreply@' . \EasyShop\Models\AdminSettings::getField('emaildomain'))->subject('Online нарачка ' . $data_email['document_number']);
        });

        $request->session()->forget('cart_products');
        $request->session()->forget('coupons');
        $totalPrice = $tempOrder->total_price;

        return redirect(detectUrlLang().'thank-you')
            ->with('thankyou', true)
            ->with('success_message', trans('global.messages.success_order'))
            ->with('pixel', $totalPrice)
            ->with('productIds', json_encode(explode(',', $tempOrder->product_ids)));
    }

    /**
     * Failed payment
     *
     * @return mixed
     */
    public function fail()
    {
        if (View::exists('clients.' . config( 'app.client') . '.payment-fail')) {
            return view('clients.' . config( 'app.client') . '.payment-fail');
        } else {
            return redirect()->route('home')->withError('Настана грешка при нарачувањето!');
        }
    }


    /**
     * @name halkSuccess
     * @description
     * Success URL redirection from Halk Bank
     */
    public function halkSuccess(Request $request)
    {

        $oid = $request->get('ReturnOid');

        $tempOrder = TempOrder::where('checksum', $oid)->first();

        if (!$tempOrder || $request->input('Response') != 'Approved') {
            return;
        }

        if ($tempOrder->success) {
            return redirect(detectUrlLang() . 'thank-you')
                ->with('thankyou', true);
        }

        $tempOrder->success = true;
        $tempOrder->save();

        $document_ids = [];

        // Generiraj NARACKA
        $naracka = new Document();
        $naracka->status = Document::STATUS_NARACKA_GENERIRANA;
        // $naracka->casys_ref = $casysRef;
        $naracka->web = 1;
        $naracka->user_id = $tempOrder->user_id;
        $naracka->document_date = date("Y-m-d H:i:s");
        $naracka->maturity_date = date("Y-m-d");
        $count_docs = Document::where('type', Document::TYPE_NARACHKA)
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->whereNotNull('document_number')
            ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
            ->count();

        if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP) {
            $naracka->type_of_order = 'Web';
        }
        $naracka->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
        $naracka->currency = $tempOrder->currency;
        $naracka->type = Document::TYPE_NARACHKA;
        $naracka->payment = Document::PAYMENT_KARTICKA;
        $naracka->paid = Document::PAID_TRUE;
        $naracka->note = $tempOrder->note;
        $naracka->checksum = $tempOrder->checksum;
        $naracka->promo_code_id = $tempOrder->promo_code_id;
        $naracka->type_delivery = $tempOrder->type_delivery;
        $naracka->price_delivery = $tempOrder->price_delivery;
        $naracka->note = $tempOrder->note;
        $naracka->document_json = $tempOrder->document_json;

        $naracka->customer_name = $tempOrder->customer_name;
        // Add warehouse
        $naracka->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
        $naracka->document_number = sprintf('%02d', $naracka->warehouse_id) . '-' . $naracka->document_number;

        $naracka->save();
        $document_ids[Document::TYPE_NARACHKA] = $naracka->id;

        //Namali ja iskoristenosta na kuponot dokolku bil iskoristen pri narackata 
        if (isset($naracka->promo_code_id)) {
            PromoCode::where('id', '=', $naracka->promo_code_id)->update(['reuse_number' => DB::raw('reuse_number-1')]);
        }

        // GENERIRAJ FAKTURA
        $faktura_online_flag = \EasyShop\Models\AdminSettings::getField('fakturaOnline');
        $rezervacija_online_flag = \EasyShop\Models\AdminSettings::getField('rezervacijaOnline');

        if (!empty($faktura_online_flag)) {
            $faktura = new FakturaOnline();
            $faktura->type = Document::TYPE_FAKTURA_ONLINE;
            $count_docs = FakturaOnline::where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->whereNotNull('document_number')
                ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->count();
        } else {
            $faktura = new Document();
            $faktura->type = Document::TYPE_FAKTURA;
            $faktura->paid = Document::PAID_TRUE;
            $count_docs = Document::where('type', Document::TYPE_FAKTURA)
                ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->whereNotNull('document_number')
                ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->count();
        }

        $faktura->status = Document::STATUS_NARACKA_GENERIRANA;
        $faktura->web = 1;
        $faktura->user_id = $tempOrder->user_id;
        $faktura->document_date = date("Y-m-d H:i:s");
        $faktura->maturity_date = date("Y-m-d");
        $faktura->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');

        $faktura->currency = $tempOrder->currency;

        $faktura->payment = Document::PAYMENT_KARTICKA;
        $faktura->note = $tempOrder->note;
        $faktura->checksum = $tempOrder->checksum;
        $faktura->type_delivery = $tempOrder->type_delivery;
        $faktura->price_delivery = $tempOrder->price_delivery;
        $faktura->note = $tempOrder->note;
        $faktura->document_json = $tempOrder->document_json;
        // Add warehouse
        $faktura->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
        $faktura->document_number = sprintf('%02d', $faktura->warehouse_id) . '-' . $faktura->document_number;

        $faktura->save();

        if (!empty($faktura_online_flag)) {
            $document_ids[Document::TYPE_FAKTURA_ONLINE] = $faktura->id;
        } else {
            $document_ids[Document::TYPE_FAKTURA] = $faktura->id;
        }

        // GENERIRAJ REZERVACIJA
        if (!empty($rezervacija_online_flag)) {
            $rezervacija = new Document();
            $rezervacija->status = Document::STATUS_NARACKA_GENERIRANA;
            $rezervacija->web = 1;
            $rezervacija->user_id = $tempOrder->user_id;
            $rezervacija->document_date = date("Y-m-d H:i:s");
            $rezervacija->maturity_date = date("Y-m-d");
            $count_docs = Document::where('type', Document::TYPE_REZERVACIJA)
                ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->where('warehouse_id',\EasyShop\Models\AdminSettings::getField('warehouseId'))
                ->whereNotNull('document_number')
                ->count();
            $rezervacija->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
            $rezervacija->currency = $tempOrder->currency;
            $rezervacija->type = Document::TYPE_REZERVACIJA;
            $rezervacija->paid = Document::PAID_TRUE;
            $rezervacija->payment = Document::PAYMENT_KARTICKA;
            $rezervacija->note = $tempOrder->note;
            $rezervacija->checksum = $tempOrder->checksum;
            $rezervacija->type_delivery = $tempOrder->type_delivery;
            $rezervacija->price_delivery = $tempOrder->price_delivery;
            $rezervacija->note = $tempOrder->note;
            $rezervacija->document_json = $tempOrder->document_json;
            // Add warehouse
            $rezervacija->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
            $rezervacija->document_number = sprintf('%02d', $rezervacija->warehouse_id) . '-' . $rezervacija->document_number;
            $rezervacija->save();
            $document_ids[Document::TYPE_REZERVACIJA] = $rezervacija->id;
        }

        // VNESI PRODUKTI VO NARACKA,FAKTURA,REZERVACIJA

        $products = TempOrderItem::where('document_id', $tempOrder->id)->get();
        foreach ($document_ids as $doc_key => $doc_value) {

            foreach ($products as $k => $v) {
                if (!empty($faktura_online_flag) && $doc_key == Document::TYPE_FAKTURA_ONLINE) {
                    $newDocumentItem = new FakturaOnlineItems();
                } else {
                    $newDocumentItem = new DocumentItems();
                }

                $product = $this->articleRepository->getById($v->product_id);

                if ($product->bundle) {

                    $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

                    if (isset($product->bundle_price_type) && $product->bundle_price_type == 'fixed') {
                        $bundlePrice = $v->price / $product->bundle_products_number;
                    }
                    $bundleIds = BundleProduct::where('bundle', $product->id)->pluck('product_id');
                    $bundleProducts = Product::whereIn('products.id', $bundleIds)->join('bundle_products', 'products.id', '=', 'bundle_products.product_id')->where('bundle_products.bundle', $product->id)->select('products.*', 'bundle_products.quantity as quantity')->get();
                    
                    foreach ($bundleProducts as $bundleProduct) {
                        $newDocumentItem = DocumentItems::create();
                        $newDocumentItem->document_id = $doc_value;
                        $newDocumentItem->product_id = $bundleProduct->id;
                        $newDocumentItem->item_name = $bundleProduct->title;
                        $newDocumentItem->quantity = $v->quantity * $bundleProduct->quantity;
                        $newDocumentItem->document_number = $naracka->document_number;

                        if (isset($product->bundle_price_type) && $product->bundle_price_type == 'percent') {
                            $bundlePrice = $bundleProduct->price_retail_1 - ((int)$product->price_retail_1 / 100 * $bundleProduct->price_retail_1);
                        }
                        $newDocumentItem->price = $bundlePrice * $bundleProduct->quantity;
                        $newDocumentItem->vat = $bundleProduct->vat;
                        $newDocumentItem->price_no_vat = ($bundlePrice * $bundleProduct->quantity) / $danok;
                        $newDocumentItem->sum_no_vat = $newDocumentItem->price_no_vat * $v->quantity;
                        $newDocumentItem->sum_vat = $newDocumentItem->price * $v->quantity;

                        $newDocumentItem->unit_code = $bundleProduct->unit_code;
                        $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($bundleProduct);
                        $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($bundleProduct);


                        $newDocumentItem->save();
                    }
                } else {

                    $newDocumentItem->product_id = $v->product_id;
                    $newDocumentItem->item_name = $v->item_name;
                    $newDocumentItem->quantity = $v->quantity;
                    $newDocumentItem->price = $v->price;
                    $newDocumentItem->vat = $v->vat;
                    $newDocumentItem->price_no_vat = $v->price_no_vat;
                    $newDocumentItem->sum_no_vat = $v->sum_no_vat;
                    $newDocumentItem->sum_vat = $v->sum_vat;

                    $newDocumentItem->original_price = $v->original_price;
                    $newDocumentItem->original_price_no_vat = $v->original_price_no_vat;
                    $newDocumentItem->original_sum_vat = $v->original_sum_vat;
                    $newDocumentItem->original_sum_no_vat = $v->original_sum_no_vat;

                    $newDocumentItem->variation_id = $v->variation_id;
                    $newDocumentItem->document_id = $doc_value;
                    $newDocumentItem->unit_code = $v->unit_code;
                    $newDocumentItem->proizvod_usluga = $v->proizvod_usluga;
                    $newDocumentItem->stranski_domasen = $v->stranski_domasen;
                }


                if ($doc_key === Document::TYPE_NARACHKA) {
                    $newDocumentItem->document_number = $naracka->document_number;
                }
                if ($doc_key === Document::TYPE_FAKTURA || $doc_key == Document::TYPE_FAKTURA_ONLINE) {
                    $newDocumentItem->document_number = $faktura->document_number;
                }
                if ($doc_key === Document::TYPE_REZERVACIJA) {
                    $newDocumentItem->document_number = $rezervacija->document_number;
                }

                $newDocumentItem->save();
            }
        }
        if (!empty($rezervacija_online_flag)) {
            $this->documentService->reserveProducts($rezervacija->id, $rezervacija->warehouse_id);
        }

        $documentRelated = new DocumentsRelated();
        $documentRelated->naracka_id = $naracka->id;
        if (!empty($faktura_online_flag)) {
            $documentRelated->faktura_online_id = $faktura->id;
        }
        if (!empty($rezervacija_online_flag)) {
            $documentRelated->rezervacija_id = $rezervacija->id;
        }
        $documentRelated->save();


        // SEND EMAIL
        $products = TempOrderItem::where('document_id', $tempOrder->id)->get();

        $data_email['document_city_country'] = $this->prepareCityCountryForMail($naracka);
        $data_email['document'] = $naracka;

        $productIds = [];

        $productArray = [];

        foreach ($products as $product) {

            $productIds[] = $product->product_id;
            $productArrayItem = [
                'id' => $product->product_id,
                'quantity' => $product->quantity,
                'title' => $product->item_name,
                'url' => $product->url,
                'image' => $product->image,
                'price' => $product->price,
                'variation' => $product->variation_id,
            ];

            if (isset($productArrayItem['variation']) && !empty($productArrayItem['variation'])) {
                $variation = Variations::where('id', $productArrayItem['variation'])->first();
                if (!is_null($variation)) {
                    $productArrayItem['variation'] = $variation['value'];
                } else {
                    $productArrayItem['variation'] = '';
                }
                $productArrayItem['variation'] = $variation['value'];
            } else {
                $productArrayItem['variation'] = '';
            }

            $productArray[] = $productArrayItem;

            // Zgolemuvanje na brojot na prodavanost na proizvodot

            $product = $this->articleRepository->getById($product->product_id);
            $product->purchases += 1;
            $product->save();
        }

        $data_email['products'] = $productArray;
        $data_email['document_number'] = $naracka->document_number;

        Mail::send('emails.invoice', $data_email, function ($message) use ($data_email) {
            $email = json_decode($data_email['document']->document_json);
            $message->to($email->userShipping->email)->from('noreply@' . \EasyShop\Models\AdminSettings::getField('emaildomain'))->subject('Online нарачка ' . $data_email['document_number']);
        });

        $request->session()->forget('cart_products');
        $request->session()->forget('coupons');
        $totalPrice = $tempOrder->total_price;

        return redirect(detectUrlLang() . 'thank-you')
            ->with('thankyou', true)
            ->with('success_message', trans('global.messages.success_order'))
            ->with('pixel', $totalPrice)
            ->with('productIds', json_encode(explode(',', $tempOrder->product_ids)));
    }

    /**
     * @name halkFail
     * @description
     * Fail URL redirection from Halk Bank
     */
    public function halkFail(Request $request)
    {
        return view('clients.' . config( 'app.client') . '.payment-fail');
    }

    public function halkCheckStatus(Request $request)
    {
        $clientid = \EasyShop\Models\AdminSettings::getField('clientId');
        $name = \EasyShop\Models\AdminSettings::getField('apiUser');
        $password = \EasyShop\Models\AdminSettings::getField('apiPassword');
        $oid = $request->get('oid');
        $lip = null;


        // $oid = "ORDER-10156-Q4zB-1-5701";

        $request = "DATA=<?xml version=\"1.0\" encoding=\"ISO-8859-9\"?>
        <CC5Request>
        <Name>" . $name . "</Name>
        <Password>" . $password . "</Password>
        <ClientId>" . $clientid . "</ClientId>
        <OrderId>" . $oid . "</OrderId>
        <Mode>P</Mode>
        <Extra><ORDERSTATUS>QUERY</ORDERSTATUS></Extra>
        </CC5Request>";



        $url = "https://epay.halkbank.mk/fim/api";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            print curl_error($ch);
        } else {
            curl_close($ch);
        }

        echo $result;
    }

    /**
     * Put the user information in document_json field
     *
     * @param $req
     * @return string
     */
    private function prepareDocumentJsonField($req)
    {
        $temp_array['userBilling']['phone'] = $req->get('Telephone');
        $temp_array['userBilling']['city_id'] = $req->get('City');
        $municipality = $req->get('municipality');

        if (isset($municipality)) {
            $temp_array['userBilling']['municipality'] = $req->get('municipality');
            $temp_array['userShipping']['municipality_shipping'] = $req->get('municipality');
        } else {
            $temp_array['userBilling']['municipality'] = null;
            $temp_array['userShipping']['municipality_shipping'] = null;
        }
        $temp_array['userBilling']['country_id'] = $req->get('Country');
        $temp_array['userBilling']['city_other'] = $req->get('city_other');
        $temp_array['userBilling']['zip_other'] = $req->get('Zip');
        $temp_array['userBilling']['country_other'] = $req->get('country_other');
        $temp_array['userBilling']['email'] = $req->get('Email');
        $temp_array['userBilling']['first_name'] = $req->get('FirstName');
        $temp_array['userBilling']['last_name'] = $req->get('LastName');

        $temp_array['userBilling']['address'] = $req->get('Address');
        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
            $temp_array['userBilling']['loyalty_code'] = $req->get('loyalty_code');
        }
        $temp_array['userShipping']['phone'] = $req->get('Telephone');
        $temp_array['userShipping']['city_id_shipping'] = $req->get('City');
        $temp_array['userShipping']['country_id_shipping'] = $req->get('Country');
        $temp_array['userShipping']['city_other_shipping'] = $req->get('city_other');
        $temp_array['userShipping']['zip_other_shipping'] = $req->get('Zip');
        $temp_array['userShipping']['country_other_shipping'] = $req->get('country_other');
        $temp_array['userShipping']['address_shiping'] = $req->get('Address');
        $temp_array['userShipping']['email'] = $req->get('Email');
        $temp_array['userShipping']['first_name'] = $req->get('FirstName');
        $temp_array['userShipping']['last_name'] = $req->get('LastName');


        if ($temp_array['userBilling']['city_other'] && $req->has('payment_zone')) {
            $temp_array['userBilling']['city_other'] = $req->input('payment_zone') . ' - ' . $temp_array['userBilling']['city_other'];
        }

        if ($temp_array['userShipping']['city_other_shipping'] && $req->has('payment_zone')) {
            $temp_array['userShipping']['city_other_shipping'] = $req->input('payment_zone') . ' - ' . $temp_array['userShipping']['city_other_shipping'];
        }
        return json_encode($temp_array);
    }

    /**
     * @param $document
     * @return array
     */
    private function prepareCityCountryForMail($document)
    {
        $return = [];
        $data = json_decode($document->document_json);
        $data = $data->userShipping;

        if ($data->country_id_shipping != 62 && !is_null($data->country_id_shipping)) {
            $country_data = Country::where('id', $data->country_id_shipping)->first();
            $return['country'] = $country_data->country_name;
        } else {
            $return['country'] = $data->country_other_shipping;
        }

        if ($data->city_id_shipping < 35 && $data->country_id_shipping == 1) {
            $city_data = City::where('id', $data->city_id_shipping)->first();
            $return['city'] = $city_data->city_name;
            $return['zip'] = $city_data->zip;
        } else {
            $return['city'] = $data->city_other_shipping;
            $return['zip'] = $data->zip_other_shipping;
        }

        return $return;
    }


    /**
     * Thank you page
     *
     * @return view
     */
    public function getThankYou(Request $request)
    {
        $data['pageName'] = 'page-thank-you';
        if (!$request->session()->has('thankyou')) {
            return redirect()->route('home');
        }

        return view('clients.' . config( 'app.theme') . '.thank-you-page', $data);
    }
}
