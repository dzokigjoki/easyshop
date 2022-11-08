<?php

namespace EasyShop\Http\Controllers\Api;

use EasyShop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\Payment;
use EasyShop\Models\Product;
use EasyShop\Models\User;
use EasyShop\Models\Variations;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\DocumentRepository\DocumentRepositoryInterface;
use EasyShop\Services\ProductService;
use EasyShop\Services\ApiResponse;
use EasyShop\Services\CategoryService;
use Illuminate\Support\Facades\Mail;
use JWTAuth;
use EasyShop\Models\Settings;

class CheckoutController extends Controller
{
    protected $apiResponse;
    protected $categoryService;
    protected $productRepository;
    protected $productService;
    protected $documentRepository;

    public function __construct(
        ApiResponse $apiResponse,
        CategoryService $categoryService,
        ArticleRepositoryInterface $productRepository,
        DocumentRepositoryInterface $documentRepository,
        ProductService $productService
    ) {
        $this->apiResponse = $apiResponse;
        $this->categoryService = $categoryService;
        $this->productRepository = $productRepository;
        $this->documentRepository = $documentRepository;
        $this->productService = $productService;
    }

    public function generateOrder(Request $request)
    {
        if (!$request->has('products')) {
            return $this->apiResponse->error('Ве молиме додадете продукти во нарачката!');
        }
        $rules = [
            'FirstName' => 'required',
            'LastName' => 'required',
            'Email' => 'required|email',
            'Telephone' => 'required',
            'Country' => 'required',
            'City' => 'required',
            'Address' => 'required',
            'products' => 'required'
        ];
        $messages = [
            'FirstName.required' => trans('global.validation.first_name_required'),
            'LastName.required' => trans('global.validation.last_name_required'),
            'Email.required' => trans('global.validation.email_required'),
            'City.required' => trans('global.validation.city_required'),
            'Address.required' => trans('global.validation.address_required'),
            'Telephone.required' => trans('global.validation.tel_required'),
            'Email.email' => trans('global.validation.valid_email_required'),
            'products.required' => 'Мора да имате продукти во нарачката',
        ];
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
        $allow_minus = \EasyShop\Models\AdminSettings::getField('allowMinusQuantity');
        $limitPerProduct = \EasyShop\Models\AdminSettings::getField('limitProducts');

        $productNotEnoughStock = [];

        if ($request->has('products')) {

            $products = $request->input('products');

            foreach ($products as $p) {
                $product = $this->productRepository->getById($p['id']);

                if (!$product->active) {
                    array_push($productNotEnoughStock, $product->title);
                    continue;
                }

                if (!$allow_minus) {
                    if (!is_array($p['variationIds'])) {
                        $variationString = str_replace('_', ',', $p['variationIds']);
                    } else {
                        $variationString = implode(',', (array) $p['variationIds']);
                    }
                    $stock = $product->has_variations
                        ? $this->productRepository->getProductVariationQuantity($p['id'], $variationString)
                        : $product->total_stock;

                    if (!is_array($p['variationIds'])) {
                        $variationsArray  = explode('_', $p['variationIds']);
                    } else {
                        $variationsArray =  $p['variationIds'];
                    }
                    $variationNames = Variations::whereIn('id', $variationsArray)->pluck('value')->toArray();
                    $variationNamesString = implode(',', $variationNames);

                    if ($p['quantity'] > $stock) {
                        array_push($productNotEnoughStock, $p['title'] . ($product->has_variations ? '(' . $variationNamesString . ')' : ''));
                    }
                }
            }

            if (count($productNotEnoughStock) > 0) {
                // if ($request->input('paymentType') === Payment::TYPE_GOTOVO) {

                $message = (count($productNotEnoughStock) > 1 ? 'Продуктите ' : 'Продуктот ') .
                    implode(',', $productNotEnoughStock) . ' моментално ' . (count($productNotEnoughStock) > 1 ? 'ги ' : 'го ') . ' нема на залиха.';

                return $this->apiResponse->error([], $message, 400);
                // }
            }
        }

        // if ($limitPerProduct && $request->has('products')) {
        //     $productExceedLimit = [];
        //     $products = $request->input('products');
        //     foreach ($products as $product) {
        //         if ($product['quantity'] > $limitPerProduct) {
        //             array_push($productExceedLimit, '"' . $product['title'] . ($product['variation_value'] ? '(' . $product['variation_value'] . ')' : '') . '"');
        //         }
        //     }

        //     if (count($productExceedLimit) > 0) {
        //         if ($request->input('paymentType') === Payment::TYPE_GOTOVO) {
        //             return back()->withError((count($productExceedLimit) > 1 ? 'Продуктите ' : 'Продуктот ') .
        //                 implode(',', $productExceedLimit) .
        //                 ' ја ' . (count($productExceedLimit) > 1 ? 'надминуваат ' : 'надминува ') .
        //                 ' дозволената количина (' . $limitPerProduct . ').');
        //         }
        //     }
        // }

        $newDocument = Document::create();
        // $loggedUser = JWTAuth::parseToken()->toUser();
        // $newDocument->user_id = !is_null($loggedUser) ? $loggedUser->id : User::GUEST_ID;
        $newDocument->user_id = User::GUEST_ID;
        $newDocument->document_date = date("Y-m-d H:i:s");
        $newDocument->maturity_date = date("Y-m-d");
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
        $newDocument->warehouse_id = \EasyShop\Models\AdminSettings::getField('warehouseId');
        $newDocument->document_number = sprintf('%02d', $newDocument->warehouse_id) . '-' . $newDocument->document_number;
        $typeDelivery = $request->input('type_delivery');
        $newDocument->type_delivery = NULL;
        $newDocument->price_delivery = 0;

        if ($typeDelivery) {
            $deliveries = config( 'clients.' . config( 'app.client') . '.type_delivery');
            if (is_array($deliveries) && array_key_exists($typeDelivery, $deliveries)) {
                $documentDelivery = $deliveries[$typeDelivery];
                $newDocument->type_delivery = $documentDelivery['name'];
                $newDocument->price_delivery = $documentDelivery['price'];
            }
        }
        $newDocument->document_json = $this->prepareDocumentJsonField($request);
        $newDocument->web = 1;
        $this->documentRepository->create($newDocument);
        $totalPrice = 0;
        $totalQuantity = 0;
        $documentRelated = new DocumentsRelated();
        $documentRelated->naracka_id = $newDocument->id;
        $documentRelated->save();
        $products = $request->input('products');
        foreach ($products as $k => $productItem) {
            $totalQuantity += $productItem['quantity'];
        }
        foreach ($products as $k => $productItem) {
            $product = $this->productRepository->getById($productItem['id']);
            $price_temp = $product->price_retail_1;
            $check_product_discount = Product::hasDiscount($product->discount);

            if (!!$check_product_discount) {
                $price_temp = Product::getPriceRetail1($product, false);
            }
            $products[$k]['price'] = $price_temp;
            
            $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);
            
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
                $newDocumentItem->original_price = $product->price_retail_1;
                $newDocumentItem->original_price_no_vat = $newDocumentItem->original_price / $danok;
                $newDocumentItem->original_sum_no_vat = $newDocumentItem->original_price_no_vat * $productItem['quantity'];
                $newDocumentItem->original_sum_vat = $newDocumentItem->original_price * $productItem['quantity'];
            }

            $variations = null;

            if (isset($productItem['variationIds']) && is_array($productItem['variationIds'])) {
                $variations = implode(',', $productItem['variationIds']);
            } else if (isset($productItem['variationIds'])) {
                $variations = str_replace('_', ',', $productItem['variationIds']);
            }

            $newDocumentItem->variation_id =  $variations;
            $newDocumentItem->unit_code = $product->unit_code;
            $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($product);
            $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($product);
            $newDocumentItem->save();
            $totalPrice += $newDocumentItem->sum_vat;
            $totalQuantity += $newDocumentItem->quantity;
        }

        if (config( 'app.client') == 'mymoda') {
            if ($totalPrice >= 2000) {
                $newDocument->price_delivery = 0;
                $newDocument->save();
            }
        }
        $data_email['document_city_country'] = $this->prepareCityCountryForMail($newDocument);
        $data_email['document'] = $newDocument;
        $productIds = [];
        foreach ($products as $key => $productItem) {
            $productIds[] = $productItem['id'];

            if (!is_array($productItem['variationIds'])) {
                $productItem['variationIds'] = explode(',', $productItem['variationIds']);
            }

            if (isset($productItem['variationIds']) && !empty($productItem['variationIds'])) {
                foreach ($productItem['variationIds'] as $k => $v) {
                    $variation = Variations::where('id', $v)->first();

                    if (!is_null($variation)) {
                        $products[$key][$variation['name']] = $variation['value'];
                    } else {
                        $products[$key]['variation'] = '';
                    }
                    unset($products[$key]['variation']);
                }
            } else {
                $products[$key]['variation'] = '';
            }
        }
        $data_email['products'] = $products;
        $data_email['document_number'] = $newDocument->document_number;

        try {
            Mail::send('emails.invoice', $data_email, function ($message) use ($data_email) {
                $clientName = env('MAIL_SENDER_NAME');
                $email = json_decode($data_email['document']->document_json);
                $message->to($email->userShipping->email)->from('noreply@' . \EasyShop\Models\AdminSettings::getField('emaildomain'), $clientName)->subject(trans('global.messages.online_order') . $data_email['document_number']);
            });
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

        foreach ($products as $product) {
            $product = $this->productRepository->getById($product['id']);
            $product->purchases += 1;
            $product->save();
        }

        return $this->apiResponse->success([], 'Успешна нарачка, Ви благодариме');
    }



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
        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
            $temp_array['userBilling']['loyalty_code'] = $req->get('loyalty_code', '');
        }
        $temp_array['userBilling']['address'] = $req->get('Address');
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
}
