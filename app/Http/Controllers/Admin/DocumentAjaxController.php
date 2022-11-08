<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Services\ProductService;
use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Product;
use EasyShop\Models\Document;
use EasyShop\Models\User;
use EasyShop\Models\WarehouseProduct;
use EasyShop\Models\Warehouse;
use EasyShop\Models\Discount;
use EasyShop\Models\ProductVariations;
use EasyShop\Models\VariationQuantity;
use EasyShop\Models\Suppliers;
use EasyShop\Models\Payment;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\Settings;
use EasyShop\Models\FakturaOnline;
use EasyShop\Models\Variations;
use EasyShop\Models\FakturaOnlineItems;
use EasyShop\Models\City;
use EasyShop\PromoCode;
use EasyShop\BundleProduct;
use Datatables;
use Response;
use Auth;
use DB;
use EasyShop\Courier;
use EasyShop\PartnerReview;
use EasyShop\PartnerStock;
use EasyShop\Services\DocumentService;
use GuzzleHttp\Client as GuzzleHttpClient;

class DocumentAjaxController extends Controller
{

    /**
     * @var
     */
    protected $productService;
    protected $documentService;

    public function __construct(ProductService $productService, DocumentService $documentService)
    {
        $this->productService = $productService;
        $this->documentService = $documentService;
    }

    public function changePostaOnDocuments(Request $req)
    {

        $documents_ids      = $req->get('document_ids');
        $posta              = $req->get('posta');
        if (!empty($documents_ids) && !empty($posta)) {
            Document::whereIn('id', $documents_ids)->update(['posta' => $posta]);
        }
        $response = ['success' => 1];

        return Response::json($response);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changePaymentStatusOnDocuments(Request $req)
    {

        $doc_ids            = $req->get('document_id');
        $paid_status        = $req->get('paid_status');
        $paid_status_type   = $req->get('paid_status_type');

        if ($paid_status == 'neplatena') {
            $paid_status_type   = 'ziro';
            Payment::whereIn('document_id', $doc_ids)->delete();
        }

        $doc = Document::whereIn('id', $doc_ids)->update(['payment' => $paid_status_type, 'paid' => $paid_status]);

        // Ako smenime status na ex. faktura, da se smeni statusot na site related dokumenti (naracki, povratnici, ispratnici itn..) 
        $docs = Document::whereIn('id', $doc_ids)->get();
        foreach ($docs as $document) {
            $relatedDocIdsNeeded = DocumentsRelated::where(function ($query) use ($document) {
                $query->where('ostanato_id', $document->id)
                    ->orWhere('naracka_id', $document->id)
                    ->orWhere('profaktura_id', $document->id)
                    ->orWhere('faktura_id', $document->id)
                    ->orWhere('ispratnica_id', $document->id)
                    ->orWhere('vlez_id', $document->id)
                    ->orWhere('izlez_id', $document->id)
                    ->orWhere('rezervacija_id', $document->id)
                    ->orWhere('fiskalna_id', $document->id)
                    ->orWhere('povratnica_id', $document->id)
                    ->orWhere('faktura_online_id', $document->id)
                    ->orWhere('paragon_id', $document->id);
            })->first()->toArray();

            foreach ($relatedDocIdsNeeded as $key => $value) {
                if (!is_null($value) && $key != 'id') {
                    $idsToChangeStatus[] = $value;
                }
            }
            Document::whereIn('id', $idsToChangeStatus)->update(['payment' => $paid_status_type, 'paid' => $paid_status]);
        }

        if ($paid_status == 'platena') {

            foreach ($doc_ids as $di) {
                $doc_temp = Document::where('id', $di)->select('user_id')->first();
                $sum      = DocumentItems::where('document_id', $di)->sum('sum_vat');
                $payment = new Payment();
                $payment->document_id   = $di;
                $payment->user_id       = $doc_temp->user_id;
                $payment->type          = $paid_status_type;
                $payment->price         = $sum;
                $payment->save();
            }
            $doc = Document::whereIn('id', $doc_ids)->update(['naracka_platena_na' => date('Y-m-d H:i:s')]);
        }
        $response = ['success' => 1];

        return Response::json($response);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeWarehouse(Request $req)
    {
        $document_type = $req->get('document_type');
        if ($document_type == 'faktura_online')
            $doc = FakturaOnline::where('id', $req->get('document_id'))->first();
        else
            $doc = Document::where('id', $req->get('document_id'))->first();


        $doc->warehouse_id = $req->get('warehouse_id');
        $doc->save();
        $response = ['success' => 1];

        return Response::json($response);
    }

    public function changeTypeOfOrder(Request $req)
    {
        $document_type = $req->get('document_type');
        if ($document_type == 'faktura_online')
            $doc = FakturaOnline::where('id', $req->get('document_id'))->first();
        else
            $doc = Document::where('id', $req->get('document_id'))->first();


        $doc->type_of_order = $req->get('type_of_order');
        if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) {
            if ($doc->type_of_order == 'Inbound' || 
                $doc->type_of_order == 'Outbound' || 
                $doc->type_of_order == 'Социјални мрежи' ||
                $doc->type_of_order == 'Продавници'
            ) {
                $doc->created_by = auth()->id();
            } else {
                $doc->created_by = null;
            }
        }

        $doc->save();
        $response = ['success' => 1];

        return Response::json($response);
    }

    public function changeCourier(Request $req)
    {

        $document = Document::find($req->get('document_id'));
        $courier = Courier::find($req->get('courier_select'));


        if (!is_null($document->courier_id)) {
            $old_courier = Courier::find($document->courier_id);

            if ($old_courier->name == "MEX") {
                $curlopt_url = 'https://mex.mk/api/delete_curl.php';
                $params = array(
                    'auth_token' => $old_courier->api_token,
                    'tracking_id' => $document->courier_tracking_id,
                );
                // Get cURL resource
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_POST             => 1,
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_POSTFIELDS         => $params,
                    CURLOPT_RETURNTRANSFER     => 1
                ));

                $resp = curl_exec($curl);
                curl_close($curl);
                $document->courier_tracking_id = null;
                $document->courier_status = null;
                $document->courier_id = null;
                $document->save();
            } else if ($old_courier->name == "Kolporter") {

                $curlopt_url = 'https://api.kolporter.mk/users/login';

                $params = array(
                    'client_id' => "33ca2350fcf1d6c9d9f40a89e6e63604",
                    'client_secret' => "f59497d4bd4fcb930bd5e553c537a6a9",
                    'username' => "contact@naturatherapy.mk",
                    'password' => "natura",
                    'grant_type' => "password",
                );

                // Get cURL resource
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_POST             => 1,
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json"
                    ),
                    CURLOPT_POSTFIELDS         => json_encode($params),
                    CURLOPT_RETURNTRANSFER     => 1
                ));
                $resp = curl_exec($curl);
                curl_close($curl);
                $resp_arr = json_decode($resp);

                $curlopt_url = 'https://api.kolporter.mk/expeditions/' . $document->tracking_code;

                // Get cURL resource
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_CUSTOMREQUEST => "DELETE",
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_HTTPHEADER => array(
                        "Authorization:Bearer " . $resp_arr->access_token,
                    ),
                    CURLOPT_RETURNTRANSFER     => 1
                ));
                $resp = curl_exec($curl);
                curl_close($curl);


                $document->courier_tracking_id = null;
                $document->courier_status = null;
                $document->courier_id = null;
                $document->save();
            }
        }



        // COURIER
        if (is_null($document->courier_id)) {
            $document->courier_id = $courier->id;
            $client_data = json_decode($document->document_json);
            $client_data = $client_data->userBilling;
            $city = City::find($client_data->city_id);
            $doc_articles  = DocumentItems::where('document_id', $document->id)
                ->leftJoin('products', 'products.id', '=', 'document_items.product_id')
                ->select('document_items.*', 'products.total_stock', 'minimum_stock_alert', 'products.unit_code')
                ->get()->toArray();

            $totalPrice = 0;
            $instructions = "";
            $numArticles = 0;
            foreach ($doc_articles as $article) {
                $totalPrice += $article['sum_vat'];
                $numArticles += $article['quantity'];
                $instructions = $instructions . $article['item_name'] . '[' . $article['quantity'] . '], ';
            }


            if ($courier->name == "MEX") {
                $curlopt_url = 'https://mex.mk/api/add_shipment_process_curl.php';
                
                $totalPrice += $document->price_delivery;
                $params = array(
                    'auth_token' => $courier->api_token,
                    'receiver_name' => $client_data->first_name . " " . $client_data->last_name,
                    'receiver_address' => $client_data->address,
                    'receiver_city' => $city->city_name,
                    'receiver_phone' => $client_data->phone,
                    'reference' => $totalPrice,
                    'instructions' => $instructions
                );
                // Get cURL resource
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_POST             => 1,
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_POSTFIELDS         => $params,
                    CURLOPT_RETURNTRANSFER     => 1
                ));

                $resp = curl_exec($curl);
                curl_close($curl);
                $resp_arr = json_decode($resp);
                $document->courier_tracking_id = $resp_arr->tracking_id;

                $getStatusParams = array(
                    'auth_token' => $courier->api_token,
                    'tracking_id' => $document->courier_tracking_id
                );

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://mex.mk/api/get_shipment_curl.php',
                    CURLOPT_POST => 1,
                    CURLOPT_POSTFIELDS => $getStatusParams,
                    CURLOPT_RETURNTRANSFER => 1
                ));

                $respGetStatus = curl_exec($curl);
                curl_close($curl);
                $res_get_status = json_decode($respGetStatus);
                $document->courier_status = $res_get_status->current_status_name;
                $document->save();

            } else if($courier->name == "Express"){
                $curlopt_url = 'https://eds-ks.com/api/add_shipment_process_curl.php';
                $totalPrice += $document->price_delivery;

                /** TODO: If they ship to MKD or if we add new list of cities change receiver_city value */
                
                $params = array(
                    'auth_token' => $courier->api_token,
                    'receiver_name' => $client_data->first_name . " " . $client_data->last_name,
                    'receiver_address' => $client_data->address,
                    'receiver_city' => $client_data->city_other,
                    'receiver_phone' => $client_data->phone,
                    'reference' => $totalPrice,
                    'instructions' => $instructions
                );
                // Get cURL resource
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => 'https://eds-ks.com/api/add_shipment_process_curl.php',
                    CURLOPT_POST             => 1,
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_POSTFIELDS         => $params,
                    CURLOPT_RETURNTRANSFER     => 1
                ));

                $resp = curl_exec($curl);
                $resp = str_replace("﻿", "", $resp);
                curl_close($curl);
                $resp_arr = json_decode($resp);
                $document->courier_tracking_id = $resp_arr->tracking_id;

                $getStatusParams = array(
                    'auth_token' => $courier->api_token,
                    'tracking_id' => $document->courier_tracking_id
                );

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://eds-ks.com/api/get_shipment_curl.php',
                    CURLOPT_POST => 1,
                    CURLOPT_POSTFIELDS => $getStatusParams,
                    CURLOPT_RETURNTRANSFER => 1
                ));

                $respGetStatus = curl_exec($curl);
                curl_close($curl);
                $respGetStatus = str_replace("﻿", "", $respGetStatus);
                $res_get_status = json_decode($respGetStatus);
                $document->courier_status = $res_get_status->current_status_name;
                $document->save();
            } else if ($courier->name == "Falcon Logistics" && config( 'app.client') == Settings::CLIENT_HERLINE) {
                $curlopt_url = 'https://flk.mk/API/flkapi.php';
                $qrcode = 'HERLINE-' . $document->id . '_';

                if ($document->payment == 'karticka') {
                    $totalPrice = 0;
                }

                $params = array(
                    'key' => urlencode($courier->api_token),
                    'testing' => 0,
                    'recipient_name' => urlencode($client_data->first_name . " " . $client_data->last_name),
                    'recipient_address' => urlencode($client_data->address),
                    'recipient_house_number' => urlencode('   '),
                    'recipient_city' => urlencode($city->city_name),
                    'recipient_postcode' => urlencode($city->zip),
                    'recipient_phone' => urlencode($client_data->phone),
                    'recipient_email' => urlencode($client_data->email),
                    'order_value' => $totalPrice,
                    'order_weight' => 0.9,
                    'order_who_pays_delivery' => 1,
                    'order_number_of_packets' => 1,
                    'order_comment' => urlencode(''),
                    'qrcode' => urlencode($qrcode),
                    'shipment_id' => urlencode($qrcode),
                    'shop_id' => 1,
                    'express' => 0,
                    'debug' => 0,
                );

                $params_string = '';

                foreach ($params as $key => $value) {
                    $params_string .= $key . '=' . $value . '&';
                }

                rtrim($params_string, '&');

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_POST             => count($params),
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_POSTFIELDS         => $params_string,
                    CURLOPT_RETURNTRANSFER     => 1
                ));

                $resp = curl_exec($curl);
                curl_close($curl);
                $resp_arr = json_decode($resp);
                $document->courier_tracking_id = $qrcode;
                $document->save();

                // Get the status from FLK
                $url = 'https://flk.mk/API/flkapi_order.php';

                $params = array(
                    'key' => urlencode($courier->api_token),
                    'qrcode' => urlencode($document->courier_tracking_id),
                    'shipment_id' => urlencode($document->courier_tracking_id)
                );

                $params_string_for_status = '';
                foreach ($params as $key => $value) {
                    $params_string_for_status .= $key . '=' . $value . '&';
                }

                rtrim($params_string_for_status, '&');

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $url,
                    CURLOPT_POST             => count($params),
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_POSTFIELDS         => $params_string_for_status,
                    CURLOPT_RETURNTRANSFER     => 1
                ));

                $statusResult = curl_exec($curl);
                curl_close($curl);
                $resp_arr = json_decode($statusResult);

                switch ($resp_arr->Result) {
                    case '0':
                        $document->courier_status = 'Нова нарачка';
                        $document->save();
                        break;
                    case '1':
                        $document->courier_status = 'Назначена на курир';
                        $document->save();
                        break;
                    case '2':
                        $document->courier_status = 'Се чека курирот да ја подигне нарачката';
                        $document->save();
                        break;
                    case '3':
                        $document->courier_status = 'Преземана од курирот';
                        $document->save();
                        break;
                    case '4':
                        $document->courier_status = 'Во магацин';
                        $document->save();
                        break;
                    case '5':
                        $document->courier_status = 'Курирот е на пат за да ја достави нарачката';
                        $document->save();
                        break;
                    case '6':
                        $document->courier_status = 'Нарачката е доставена';
                        $document->save();
                        break;
                    case '7':
                        $document->courier_status = 'Проблем со нарачката';
                        $document->save();
                        break;
                    case '8':
                        $document->courier_status = 'Нарачката е избришана од системот на FLK';
                        $document->save();
                        break;
                    case '-1':
                        $document->courier_status = 'Проблем со API request';
                        $document->save();
                        break;
                }
            } else if ($courier->name == "Kolporter") {

                $curlopt_url = 'https://api.kolporter.mk/users/login';

                $params = array(
                    'client_id' => "33ca2350fcf1d6c9d9f40a89e6e63604",
                    'client_secret' => "f59497d4bd4fcb930bd5e553c537a6a9",
                    'username' => "contact@naturatherapy.mk",
                    'password' => "natura",
                    'grant_type' => "password",
                );

                // Get cURL resource
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_POST             => 1,
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json"
                    ),
                    CURLOPT_POSTFIELDS         => json_encode($params),
                    CURLOPT_RETURNTRANSFER     => 1
                ));


                $resp = curl_exec($curl);
                curl_close($curl);
                $resp_arr = json_decode($resp);



                $curlopt_url = 'https://api.kolporter.mk/orders/import';


                $csv = 'Име на примач;Адреса на примач;Место на примач;Телефон на примач;Тежина;Откуп;Коментар
                ';
                $csv = $csv . $client_data->first_name . " " . $client_data->last_name . ";";
                $csv = $csv . $client_data->address . ";";
                $csv = $csv . $city->city_name . ";";
                $csv = $csv . $client_data->phone . ";";
                $csv = $totalPrice < 1000 ? $csv . "1;" : $csv . "2;";
                $csv = $csv . $totalPrice . ";";
                $csv = $csv . $instructions;






                $params = array(
                    "csv" => $csv,
                    "delimiter" => ";",
                    "listtype" => "пакет"
                );

                // Get cURL resource
                $curl = curl_init();


                curl_setopt_array($curl, array(
                    CURLOPT_URL             => $curlopt_url,
                    CURLOPT_POST             => 1,
                    CURLOPT_FOLLOWLOCATION    => 1,
                    CURLOPT_POSTFIELDS         => json_encode($params),
                    CURLOPT_HTTPHEADER => array(
                        "Authorization:Bearer " . $resp_arr->access_token,
                        "Content-Type: application/json"

                    ),
                    CURLOPT_RETURNTRANSFER     => 1
                ));

                $resp = curl_exec($curl);
                curl_close($curl);
                $resp_arr = json_decode($resp);


                $document->courier_tracking_id = $resp_arr->orders[0]->trackingNumber;
                $document->tracking_code = $resp_arr->log->import->listID;
                $document->courier_status = $resp_arr->orders[0]->status;
                $document->save();
            } else if ($courier->name == 'MrCourier' && config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_ALB){
                $user = 'naturatherapy';
                $baseUrl = 'https://backoffice.mrcourier.al/';
                $client = new GuzzleHttpClient();

                // -------- Get Challenge --------
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ];
                $apiRequest = $client->request('POST', $baseUrl . 'webservice.php?operation=getchallenge&username=' . $user, [
                    'verify' => false,
                    'headers' => $headers  
                ]);
                $content = json_decode($apiRequest->getBody()->getContents());
                
                // -------- Login --------
                $apiRequest = $client->request('POST', $baseUrl . 'webservice.php', [
                    'verify' => false,
                    'headers' => $headers,
                    'form_params' => [
                        'operation' => 'login',
                        'username' => $user,
                        'accessKey' => md5($content->result->token . 'uhpEKkBGVrWTO2p')
                    ],
                ]);
                $content = json_decode($apiRequest->getBody()->getContents());
                
                // -------- Create Shipping --------
                $payment_param = 0;
                $articles_param = '';
                foreach($doc_articles as $article){
                    $payment_param += $article['sum_vat'];
                    if(end($doc_articles)['product_id'] == $article['product_id']){
                        $articles_param .= $article['quantity'] . "x" . $article['item_name'];
                    }
                    else{
                        $articles_param .= $article['quantity'] . "x" . $article['item_name'] . " & ";
                    }
                }

                $city;
                if($client_data->city_other != "" || $client_data->city_other != " " || $client_data->city_other != null){
                    $city = $client_data->city_other;
                }
                else{
                    $city = 'Tirana';
                }

                $json = array(
                    "data" => [
                    "Method" => "CreateShipping",
                    "Params" => [
                        "to_address" => [
                            "name" => $client_data->first_name . $client_data->last_name,
                            "street1" => $client_data->address,
                            "city" => $city,
                            "zip" => "1001",
                            "country" => "Shqiperi",
                            "phone" => $client_data->phone,
                            "email" => $client_data->email,
                            "ExternalReference" => "ClientReference"
                        ],
                        "parcels" => [
                            [
                                "weight" => 1,
                                "quantity" => 1
                            ]
                        ],
                        "ContentDescription" => $articles_param,
                        "CashOnDelivery" => $payment_param + $document->price_delivery,
                        "CashOnDeliveryCurrency" => "ALL",
                        "CarrierService" => "",
                        "Note" => $document->note
                    ]
                ]);
                $form_element_params = json_encode($json);

                $apiRequest = $client->request('POST', $baseUrl . 'webservice.php?operation=CreateShipping&sessionName=' . $content->result->sessionName, [
                    'verify' => false,
                    'headers' => $headers,
                    'form_params' => [
                        "element" => $form_element_params
                    ]
                ]);
                $content = json_decode($apiRequest->getBody()->getContents());
                
                // -------- Save Document --------
                $document->courier_tracking_id = $content->result->NewOrderID;
                $document->courier_status = $content->result->Status;
                $document->courier_id = $courier->id;
                $document->save();
                
            } else if ($courier->name == 'Postaxi' && config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL){
                $user = 'naturatherapy@hotmail.com';
                $baseUrl = 'https://test.postaxi-ks.com/';
                $client = new GuzzleHttpClient();

                // -------- Get Token --------
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ];
                $apiRequest = $client->request('POST', $baseUrl . 'token', [
                    'headers' => $headers,
                    'form_params' => [
                        'grant_type' => 'password',
                        'username' => $user,
                        'password' => '#001.Natura'
                    ]  
                ]);
                $content = json_decode($apiRequest->getBody()->getContents());
                // -------- Create Shipping --------
                $payment_param = 0;
                $articles_param = '';
                foreach($doc_articles as $article){
                    $payment_param += $article['sum_vat'];
                    if(end($doc_articles)['product_id'] == $article['product_id']){
                        $articles_param .= $article['quantity'] . "x" . $article['item_name'];
                    }
                    else{
                        $articles_param .= $article['quantity'] . "x" . $article['item_name'] . " & ";
                    }
                }

                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer ' . $content->access_token
                ];
                $apiRequest = $client->request('POST', $baseUrl . 'Api/Values', [
                    'headers' => $headers,
                    'form_params' => [
                        "FullName" => $client_data->first_name . $client_data->last_name,
                        "Address" => $client_data->address,
                        "City" => "Prishtine",
                        "Phone" =>  $client_data->phone,
                        "Amount" => $payment_param . $document->price_delivery,
                        "Comment" => $articles_param
                    ]
                ]);
                $content = json_decode($apiRequest->getBody()->getContents());
                // -------- Save Document --------
                //$document->courier_tracking_id = $content->result->NewOrderID;
                $document->courier_status = $content->success;
                $document->courier_id = $courier->id;
                $document->save();
            }
        } else {
            // ovde znacit smenale sluzba i trebit da se povikat delete na starata i post na novata, ama pred 
            // da se naprajt sve ova, da se proverit dali menatoto e istata sluzba ili druga, ako e istata continue;
            // ako e razlicna -> vo documentot trebit statusot, tracking_id i courier_id da se izbrisit isto taka
        }

        $response = ['success' => 1];

        return Response::json($response);
    }

    public function changeDocumentDate(Request $req)
    {


        $document_create_date = $req->get('document_create_date');
        $document_type = $req->get('document_type');
        if ($document_type == 'faktura_online')
            $doc = FakturaOnline::where('id', $req->get('document_id'))->first();
        else
            $doc = Document::where('id', $req->get('document_id'))->first();

        if (isset($document_create_date) && $document_create_date != "") {
            $doc->created_at = \Carbon\Carbon::createFromFormat('d.m.Y', $document_create_date)->toDateTimeString();
            $doc->document_date = \Carbon\Carbon::createFromFormat('d.m.Y', $document_create_date)->toDateTimeString();
        }


        $doc->save();
        $response = ['success' => 1];

        return Response::json($response);
    }


    public function changeDocumentDeliveredDate(Request $req)
    {

        $document_delivered_date = $req->get('document_delivered_date');
        $document_type = $req->get('document_type');
        if ($document_type == 'faktura_online')
            $doc = FakturaOnline::where('id', $req->get('document_id'))->first();
        else
            $doc = Document::where('id', $req->get('document_id'))->first();

        if (isset($document_delivered_date)) {
            if ($document_delivered_date == "") {
                $doc->naracka_ispratena_na = null;
            } else {
                $doc->naracka_ispratena_na = \Carbon\Carbon::createFromFormat('d.m.Y', $document_delivered_date)->toDateTimeString();
            }
        }


        $doc->save();
        $response = ['success' => 1];

        return Response::json($response);
    }


    /**
     * Za document type IZLEZ treba da se cuva za vo koj magacin se prefrla
     *
     * @param Request $req
     * @return mixed
     */
    public function changeToWarehouse(Request $req)
    {
        $doc = Document::where('id', $req->get('document_id'))->first();
        $doc->warehouse_to_id = $req->get('warehouse_to_id');
        $doc->save();
        $response = ['success' => 1];

        return Response::json($response);
    }


    /**
     * Get documents for warehouse - VLEZ
     *
     * @param Request $req
     * @return mixed
     */
    public function getDocumentsForWarehouse(Request $req)
    {
        $warehouse = Warehouse::find($req->warehouse_id);
        $documents =  Document::where('type', 'izlez')
            ->where('status', 'generirana')
            ->where('warehouse_to_id', $warehouse->id)
            ->whereNotIn('id', function ($query) {
                $query->from('documents_related')
                    ->select('izlez_id')
                    ->whereNotNull('izlez_id');
            })->get();


        $html = '';
        foreach ($documents as $document) {
            $html .= '<option value="' . $document->id . '">' . $document->document_number . ' (' . date('d-m-Y', strtotime($document->created_at)) . ')</option>';
        }

        return Response::json([
            'html' => $html
        ]);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeCurrency(Request $req)
    {
        $doc = Document::where('id', $req->get('document_id'))->first();
        $doc->currency = $req->get('currency');
        $doc->save();
        $response = ['success' => 1, 'currency' => $doc->currency];

        return Response::json($response);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeTypeDelivery(Request $req)
    {
        $doc = Document::where('id', $req->get('document_id'))->first();
        $doc->type_delivery = $req->get('type_delivery');
        $doc->save();

        $response = ['success' => 1];

        return Response::json($response);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function addNote(Request $req)
    {
        $doc = Document::where('id', $req->get('document_id'))->first();
        $doc->note = $req->get('note');
        $doc->save();
        $response = ['success' => 1];
        return Response::json($response);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeDocumentProductName(Request $req)
    {
        $doc = DocumentItems::where('id', $req->get('pk'))->first();
        $doc->item_name = $req->get('value');
        $doc->save();
        $response = ['success' => 1];
        return Response::json($response);
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        $products = Product::select('id', 'title', 'vat')
            ->where('type', 'product')->get()->toArray();

        $response = ['products' => $products];
        return Response::json($response);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function createDocumentsFromExistingDocumentsBunch(Request $req)
    {
        $document_ids  = $req->get('document_ids');
        $document_type = $req->get('document_types');
        $warehouse_id = $req->get('warehouse');

        foreach ($document_ids as $doc_id) {

            foreach ($document_type as $doc_type) {
                $check = DocumentsRelated::where('naracka_id', $doc_id)->first();
                $col   = $doc_type . '_id';

                if ($col == 'ispratnica_id' && !empty($check->$col)) {
                    $d = Document::where('id', $check->$col)->where('status', 'stornirana')->first();
                    if (!empty($d)) {
                        $check->$col = null;
                    }
                }

                if (!isset($check->$col) || empty($check->$col)) {
                    if (empty($check)) {
                        $check = new DocumentsRelated();
                        $check->naracka_id = $doc_id;
                    } else {
                        if (!is_null($check->rezervacija_id) && $doc_type == 'ispratnica') {
                            $reservationDocument = Document::find($check->rezervacija_id);
                            $check->rezervacija_id = null;
                            $documentOrigin = Document::find($doc_id);
                            $this->documentService->unReserveProducts($doc_id, $documentOrigin->warehouse_id);
                            $check->save();
                            $reservationDocument->delete();
                        }
                    }
                    $old_document = Document::where('id', $doc_id)->first();
                    // FAKTURA ONLINE
                    if ($doc_type == 'faktura_online') {
                        $count_docs = FakturaOnline::where('document_date', '>=', date('Y-01-01 00:00:00'))
                            ->where('document_date', '<=', date('Y-m-d H:i:s'))
                            ->whereNotNull('document_number')
                            ->where('warehouse_id', $warehouse_id)
                            ->count();
                    } else {
                        $count_docs = Document::where('type', $doc_type)
                            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                            ->where('document_date', '<=', date('Y-m-d H:i:s'))
                            ->whereNotNull('document_number')
                            ->where('warehouse_id', $old_document->warehouse_id)
                            ->count();
                    }


                    if ($doc_type == 'faktura_online') {
                        $doc = new FakturaOnline();
                        $doc->user_id           = $old_document->user_id;
                        $doc->document_date     = date('Y-m-d H:i:s');
                        $doc->maturity_date     = date('Y-m-d');
                        $doc->document_number   = sprintf('%05d', $count_docs + 1) . '/' . date('y');
                        $doc->document_number   = sprintf('%02d', $warehouse_id) . '-' . $doc->document_number;

                        if (config( 'app.client') == 'tehnopolis')
                            $doc->document_number   = $doc->document_number . '-T';
                        elseif (config( 'app.client') == 'mojoutlet')
                            $doc->document_number   = $doc->document_number . '-M';

                        $doc->note              = $old_document->note;
                        $doc->type              = 'faktura_online';
                        $doc->status            = 'generirana';
                        $doc->payment           = $old_document->payment;
                        $doc->paid              = $old_document->paid;
                        $doc->type_delivery     = $old_document->type_delivery;
                        $doc->price_delivery    = $old_document->price_delivery;
                        $doc->currency          = $old_document->currency;
                        $doc->supplier_id       = $old_document->supplier_id;
                        $doc->warehouse_id      = $warehouse_id;
                        $doc->web               = $old_document->web;
                        $doc->tracking_code     = $old_document->tracking_code;
                        $doc->checksum          = $old_document->checksum;
                        $doc->document_json     = $old_document->document_json;
                        $doc->posta             = $old_document->posta;
                        $doc->save();

                        $count_docs = Document::where('type', 'faktura')
                            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                            ->where('document_date', '<=', date('Y-m-d H:i:s'))
                            ->whereNotNull('document_number')
                            ->where('warehouse_id', $warehouse_id)
                            ->count();

                        $faktura_za_tehnoolis = new Document();
                        $faktura_za_tehnoolis->user_id           = 1;
                        $faktura_za_tehnoolis->document_date     = date('Y-m-d H:i:s');
                        $faktura_za_tehnoolis->maturity_date     = date('Y-m-d');
                        $faktura_za_tehnoolis->document_number   = sprintf('%05d', $count_docs + 1) . '/' . date('y');
                        $faktura_za_tehnoolis->document_number   = sprintf('%02d', $warehouse_id) . '-' . $faktura_za_tehnoolis->document_number;


                        $faktura_za_tehnoolis->note              = $old_document->note;
                        $faktura_za_tehnoolis->type              = 'faktura';
                        $faktura_za_tehnoolis->status            = 'generirana';
                        $faktura_za_tehnoolis->payment           = $old_document->payment;
                        $faktura_za_tehnoolis->paid              = $old_document->paid;
                        $faktura_za_tehnoolis->type_delivery     = $old_document->type_delivery;
                        $faktura_za_tehnoolis->price_delivery    = $old_document->price_delivery;
                        $faktura_za_tehnoolis->currency          = $old_document->currency;
                        $faktura_za_tehnoolis->supplier_id       = $old_document->supplier_id;
                        $faktura_za_tehnoolis->warehouse_id      = $warehouse_id;
                        $faktura_za_tehnoolis->web               = $old_document->web;
                        $faktura_za_tehnoolis->tracking_code     = $old_document->tracking_code;
                        $faktura_za_tehnoolis->checksum          = $old_document->checksum;
                        $faktura_za_tehnoolis->document_json     = $old_document->document_json;
                        $faktura_za_tehnoolis->posta             = $old_document->posta;
                        $faktura_za_tehnoolis->save();
                        $check->faktura_id = $faktura_za_tehnoolis->id;

                        $count_docs = Document::where('type', 'ispratnica')
                            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                            ->where('document_date', '<=', date('Y-m-d H:i:s'))
                            ->whereNotNull('document_number')
                            ->where('warehouse_id', $warehouse_id)
                            ->count();

                        $ispratnica_za_tehnoolis = new Document();
                        $ispratnica_za_tehnoolis->user_id           = 1;
                        $ispratnica_za_tehnoolis->document_date     = date('Y-m-d H:i:s');
                        $ispratnica_za_tehnoolis->maturity_date     = date('Y-m-d');
                        $ispratnica_za_tehnoolis->document_number   = sprintf('%05d', $count_docs + 1) . '/' . date('y');
                        $ispratnica_za_tehnoolis->document_number   = sprintf('%02d', $warehouse_id) . '-' . $ispratnica_za_tehnoolis->document_number;


                        $ispratnica_za_tehnoolis->note              = $old_document->note;
                        $ispratnica_za_tehnoolis->type              = 'ispratnica';
                        $ispratnica_za_tehnoolis->status            = 'generirana';
                        $ispratnica_za_tehnoolis->payment           = $old_document->payment;
                        $ispratnica_za_tehnoolis->paid              = $old_document->paid;
                        $ispratnica_za_tehnoolis->type_delivery     = $old_document->type_delivery;
                        $ispratnica_za_tehnoolis->price_delivery    = $old_document->price_delivery;
                        $ispratnica_za_tehnoolis->currency          = $old_document->currency;
                        $ispratnica_za_tehnoolis->supplier_id       = $old_document->supplier_id;
                        $ispratnica_za_tehnoolis->warehouse_id      = $warehouse_id;
                        $ispratnica_za_tehnoolis->web               = $old_document->web;
                        $ispratnica_za_tehnoolis->tracking_code     = $old_document->tracking_code;
                        $ispratnica_za_tehnoolis->checksum          = $old_document->checksum;
                        $ispratnica_za_tehnoolis->document_json     = $old_document->document_json;
                        $ispratnica_za_tehnoolis->posta             = $old_document->posta;
                        $ispratnica_za_tehnoolis->save();
                        $check->ispratnica_id = $ispratnica_za_tehnoolis->id;
                    } else {
                        $doc = $old_document->replicate();
                        $doc->document_date = date('Y-m-d H:i:s');
                        $doc->user_id = $old_document->user_id;
                        $doc->type = $doc_type;
                        $doc->status = 'generirana';
                        // Hardcoded za top produkti da se bez specijalni znaci dokument number
                        // $top_produkti_array =
                        //     [
                        //         'topprodukti_mk',
                        //         'topprodukti_bg',
                        //         'topprodukti_cz',
                        //         'topprodukti_hr',
                        //         'topprodukti_hu',
                        //         'topprodukti_sk',
                        //         'topprodukti_pl',
                        //         'topprodukti_ro',
                        //         'topprodukti_rs',
                        //         'topprodukti_si',
                        //     ];
                        // if (in_array(config( 'app.client'), $top_produkti_array)) {
                        //     $doc->document_number = sprintf('%05d', $count_docs + 1) . date('y');
                        //     $doc->document_number   = sprintf('%02d', $old_document->warehouse_id) . $doc->document_number;
                        // } else {
                        $doc->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
                        $doc->document_number   = sprintf('%02d', $old_document->warehouse_id) . '-' . $doc->document_number;
                        // }
                        $doc->save();
                    }


                    $check->$col = $doc->id;
                    $check->save();

                    $document_items_old = DocumentItems::where('document_id', $doc_id)->get();
                    foreach ($document_items_old as $key => $value) {
                        if ($doc_type == 'faktura_online')
                            $new = new FakturaOnlineItems();
                        else
                            $new = new DocumentItems();

                        $new->document_id = $doc->id;
                        $new->product_id = $value->product_id;
                        $new->item_name = $value->item_name;
                        $new->quantity = $value->quantity;
                        $new->price = $value->price;
                        $new->vat = $value->vat;
                        $new->price_no_vat = $value->price_no_vat;
                        $new->sum_no_vat = $value->sum_no_vat;
                        $new->sum_vat = $value->sum_vat;
                        $new->variation_id = $value->variation_id;

                        $new->unit_code = $value->unit_code;
                        $new->original_price = $value->original_price;
                        $new->original_price_no_vat = $value->original_price_no_vat;
                        $new->original_sum_vat = $value->original_sum_vat;
                        $new->original_sum_no_vat = $value->original_sum_no_vat;
                        $new->discount_type = $value->discount_type;
                        $new->discount_type_value = $value->discount_type_value;
                        $new->discount_value = $value->discount_value;

                        $new->save();

                        if ($doc_type == 'faktura_online') {
                            $new = new DocumentItems();
                            $new->document_id = $faktura_za_tehnoolis->id;
                            $new->product_id = $value->product_id;
                            $new->item_name = $value->item_name;
                            $new->quantity = $value->quantity;
                            $new->price = $value->price;
                            $new->vat = $value->vat;
                            $new->price_no_vat = $value->price_no_vat;
                            $new->sum_no_vat = $value->sum_no_vat;
                            $new->sum_vat = $value->sum_vat;
                            $new->variation_id = $value->variation_id;

                            $new->unit_code = $value->unit_code;
                            $new->original_price = $value->original_price;
                            $new->original_price_no_vat = $value->original_price_no_vat;
                            $new->original_sum_vat = $value->original_sum_vat;
                            $new->original_sum_no_vat = $value->original_sum_no_vat;
                            $new->discount_type = $value->discount_type;
                            $new->discount_type_value = $value->discount_type_value;
                            $new->discount_value = $value->discount_value;
                            $new->save();

                            $new = new DocumentItems();
                            $new->document_id = $ispratnica_za_tehnoolis->id;
                            $new->product_id = $value->product_id;
                            $new->item_name = $value->item_name;
                            $new->quantity = $value->quantity;
                            $new->price = $value->price;
                            $new->vat = $value->vat;
                            $new->price_no_vat = $value->price_no_vat;
                            $new->sum_no_vat = $value->sum_no_vat;
                            $new->sum_vat = $value->sum_vat;
                            $new->variation_id = $value->variation_id;

                            $new->unit_code = $value->unit_code;
                            $new->original_price = $value->original_price;
                            $new->original_price_no_vat = $value->original_price_no_vat;
                            $new->original_sum_vat = $value->original_sum_vat;
                            $new->original_sum_no_vat = $value->original_sum_no_vat;
                            $new->discount_type = $value->discount_type;
                            $new->discount_type_value = $value->discount_type_value;
                            $new->discount_value = $value->discount_value;
                            $new->save();
                        }
                    }
                    if ($doc_type != 'faktura_online') {
                        $this->updateProductsInWarehouse($doc, $doc->warehouse_id);
                        $this->updateProductsTotal($doc->id, null, $doc->warehouse_id);
                    } else {
                        $this->updateProductsInWarehouse($ispratnica_za_tehnoolis, $ispratnica_za_tehnoolis->warehouse_id);
                        $this->updateProductsTotal($ispratnica_za_tehnoolis->id, null, $ispratnica_za_tehnoolis->warehouse_id);
                    }
                }
            }
        }
        return Response::json(['success' => 1]);
    }

    /**
     * @param Request $req
     * @param $type
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createDocumentFromExisting(Request $req, $type)
    {
        $documentOrigin = Document::where('id', $req->get('document_id'))->first();
        $column_name = $documentOrigin->type;
        $documentId = $req->get('document_id');
        if ($column_name == Document::TYPE_NARACHKA) {
            $column_name = 'naracka';
        }
        $column_find = $column_name . '_id';

        $documentRelated = DocumentsRelated::where($column_find, $documentId)->first();

        if (is_null($documentRelated)) {
            $documentRelated = new DocumentsRelated();
            $documentRelated->{$column_find} = $documentId;
            $documentRelated->save();
        } else {
            if (!is_null($documentRelated->rezervacija_id) && $type == 'ispratnica') {
                $reservationDocument = Document::find($documentRelated->rezervacija_id);
                $documentRelated->rezervacija_id = null;
                $this->documentService->unReserveProducts($documentId, $documentOrigin->warehouse_id);
                $documentRelated->save();
                $reservationDocument->delete();
            }
        }

        $col  = $type . '_id';

        if ($col == 'ispratnica_id') {
            $generatedDocument = Document::where('id', $documentRelated->ispratnica_id)->where('status', 'stornirana')->first();
            if (!is_null($generatedDocument)) {
                $documentRelated->$col = null;
            }
        }

        if (is_null($documentRelated->$col)) {
            $old_document = $documentOrigin;

            $count_docs = Document::where('type', $type)
                ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                ->where('document_date', '<=', date('Y-m-d H:i:s'))
                ->whereNotNull('document_number')
                ->where('warehouse_id', $old_document->warehouse_id)
                ->count();


            $doc = $old_document->replicate();
            $doc->document_date = date('Y-m-d H:i:s');
            $doc->user_id = $old_document->user_id;
            $doc->type = $type;
            $doc->status = 'generirana';
            // Hardcoded za top produkti da se bez specijalni znaci dokument number
            // $top_produkti_array =
            //     [
            //         'topprodukti_mk',
            //         'topprodukti_bg',
            //         'topprodukti_cz',
            //         'topprodukti_hr',
            //         'topprodukti_hu',
            //         'topprodukti_sk',
            //         'topprodukti_pl',
            //         'topprodukti_ro',
            //         'topprodukti_rs',
            //         'topprodukti_si',
            //     ];
            // if (in_array(config( 'app.client'), $top_produkti_array)) {
            //     $doc->document_number = sprintf('%05d', $count_docs + 1) . date('y');
            //     $doc->document_number   = sprintf('%02d', $old_document->warehouse_id) . $doc->document_number;
            // } else {
            //     $doc->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
            //     $doc->document_number   = sprintf('%02d', $old_document->warehouse_id) . '-' . $doc->document_number;
            // }
            $doc->save();
            $documentRelated->$col = $doc->id;
            $documentRelated->save();

            $document_items_old = DocumentItems::where('document_id', $req->get('document_id'))->get();
            foreach ($document_items_old as $key => $value) {
                $new = new DocumentItems();
                $new->document_id = $doc->id;
                $new->product_id = $value->product_id;
                $new->item_name = $value->item_name;
                $new->quantity = $value->quantity;
                $new->price = $value->price;
                $new->vat = $value->vat;
                $new->price_no_vat = $value->price_no_vat;
                $new->sum_no_vat = $value->sum_no_vat;
                $new->sum_vat = $value->sum_vat;
                $new->variation_id = $value->variation_id;

                $new->unit_code = $value->unit_code;
                $new->original_price = $value->original_price;
                $new->original_price_no_vat = $value->original_price_no_vat;
                $new->original_sum_vat = $value->original_sum_vat;
                $new->original_sum_no_vat = $value->original_sum_no_vat;
                $new->discount_type = $value->discount_type;
                $new->discount_type_value = $value->discount_type_value;
                $new->discount_value = $value->discount_value;

                $new->save();
            }
            $this->updateProductsInWarehouse($doc, $doc->warehouse_id);
            $this->updateProductsTotal($doc->id, null, $doc->warehouse_id);

            if ($doc->type == 'rezervacija' && $doc->paid == 'neplatena')
                $this->rezervacijaProducts($doc);

            if ($doc->type == 'ispratnica' && !empty($documentRelated->rezervacija_id)) {

                $check_rezervacija = Document::where('id', $documentRelated->rezervacija_id)->where('type', 'rezervacija')->first();
                if (!empty($check_rezervacija)) {
                    $check_rezervacija->paid = 'platena';
                    $check_rezervacija->save();
                }
            }

            return redirect("admin/document/$doc->type/edit/$doc->id");
        } else {
            $redirect_id = $documentRelated->$col;
            return redirect("admin/document/$type/edit/$redirect_id");
        }
    }


    /**
     * @param Request $req
     * @return mixed
     */
    public function getTotalProductInWarehouse(Request $req)
    {
        $price = 0;
        $product_id = $req->get('product_id');

        if (empty($product_id))
            return Response::json(['success' => 1, 'zaliha' => 0, 'vat' => 0, 'price' => 0]);

        $my_warehouse = $req->get('warehouse_id');
        $product_in = WarehouseProduct::where('product_id', $product_id)
            ->where('warehouse_id', $my_warehouse)
            ->where(function ($query) {
                $query->orWhere('document_type', Document::TYPE_PRIEMNICA)
                    ->orWhere('document_type', Document::TYPE_VLEZ)
                    ->orWhere('document_type', Document::TYPE_POVRATNICA);
            })->sum('quantity');

        $product_out = WarehouseProduct::where('product_id', $product_id)
            ->where('warehouse_id', $my_warehouse)
            ->where(function ($query) {
                $query->orWhere('document_type', Document::TYPE_ISPRATNICA)
                    ->orWhere('document_type', Document::TYPE_IZLEZ)
                    ->orWhere('document_type', Document::TYPE_POVRATNICA_DOBAVUVAC);
            })->sum('quantity');

        if (empty($product_out))
            $product_out = 0;

        if (empty($product_in))
            $product_in = 0;

        $reservation_ids = Document::where('type', 'rezervacija')
            ->where('status', 'generirana')
            ->where('warehouse_id', $my_warehouse)
            ->where('paid', 'neplatena')
            ->lists('id')->toArray();

        $reservation_items_count = DocumentItems::whereIn('document_id', $reservation_ids)->where('product_id', $product_id)->sum('quantity');

        if (empty($reservation_items_count)) {
            $reservation_items_count = 0;
        }

        $product_in = (int) $product_in;
        $product_out = (int) $product_out;
        $total = $product_in - $product_out - $reservation_items_count;

        $p = Product::where('id', $product_id)->first();
        $vat = 0;
        if ($p) {
            $vat = $p->vat;
        }

        $doc_type = $req->get('doc_type');
        $user_id = $req->get('user_id');
        $discount_value = 0;
        $discount_type = '';
        $has_variations = 0;
        $variations = [];
        if ($p->has_variations > 0) {
            $has_variations = 1;
            $productVariations = ProductVariations::where('product_id', $product_id)->pluck('variation_id');
            $variations = Variations::whereIn('id', $productVariations)->get()->groupBy('name');
        }

        if ($doc_type != 'priemnica') {
            if (empty($user_id))
                $user_id = Auth::user()->id;

            $us = User::where('id', $user_id)->first();
            $cena_type = 'price_retail_1';
            $price = $p->price_retail_1;

            if (!empty($us->cenovna_grupa)) {
                if ($us->cenovna_grupa == 'price_retail_1') {
                    $price = $p->price_retail_1;
                    $cena_type = 'price_retail_1';
                }
                if ($us->cenovna_grupa == 'price_retail_2') {
                    $price = $p->price_retail_2;
                    $cena_type = 'price_retail_2';
                }
                if ($us->cenovna_grupa == 'price_wholesale_1') {
                    $price = $p->price_wholesale_1;
                    $cena_type = 'price_wholesale_1';
                }
                if ($us->cenovna_grupa == 'price_wholesale_2') {
                    $price = $p->price_wholesale_2;
                    $cena_type = 'price_wholesale_2';
                }
                if ($us->cenovna_grupa == 'price_wholesale_3') {
                    $price = $p->price_wholesale_3;
                    $cena_type = 'price_wholesale_3';
                }
            }
            $date = date('Y-m-d H:i:s');
            $dicount = Discount::select('*')->whereRaw("product_id = $product_id  and '$date' between start and end")->first();

            if (($dicount) && ((int) $dicount->$cena_type == 1)) {
                $cenovna_grupa_temp = $us->cenovna_grupa;
                if ($dicount->type == 'fixed') {
                    $price = (float) $p->$cenovna_grupa_temp - $dicount->value;
                } else {
                    $price = (float) $p->$cenovna_grupa_temp - (($dicount->value * $p->$cenovna_grupa_temp) / 100);
                }
                $discount_value = $dicount->value;
                $discount_type = $dicount->type;
            }
        }

        if ($doc_type == 'izlez') {
            $return_izlezi = [];
            $zaliha_otvoreni = 0;
            $otvoreni_izlezi_ids = Document::where('type', 'izlez')
                ->where('status', 'podgotovka')
                ->pluck('id');

            $product_vo_otvoreni_izlezi_ids = DocumentItems::where('product_id', $product_id)
                ->whereIn('document_id', $otvoreni_izlezi_ids)
                ->pluck('document_id');

            $product_vo_otvoreni_izlezi = DocumentItems::where('product_id', $product_id)
                ->whereIn('document_id', $otvoreni_izlezi_ids)
                ->select('document_id', 'quantity', 'price')
                ->get()
                ->toArray();

            foreach ($product_vo_otvoreni_izlezi as $poi) {
                $zaliha_otvoreni = $zaliha_otvoreni + $poi['quantity'];
                $return_izlezi[$poi['document_id']] = $poi;
            }

            $otvoreni_izlezi = Document::whereIn('documents.id', $product_vo_otvoreni_izlezi_ids)
                ->join('warehouses', 'documents.warehouse_to_id', '=', 'warehouses.id')
                ->select('documents.id as document_id', 'document_date', 'warehouses.title')
                ->get()
                ->toArray();

            foreach ($otvoreni_izlezi as $poi) {
                $temp = $return_izlezi[$poi['document_id']];
                $poi['document_date'] = date('d.m.Y H:i:s', strtotime($poi['document_date']));
                $return_izlezi[$poi['document_id']] = array_merge($poi, $temp);
            }
        }

        $json_return =
            [
                'success' => 1,
                'zaliha' => $total,
                'vat' => $vat,
                'price' => $price,
                'discount_value' => $discount_value,
                'discount_type' => $discount_type,
                'has_variations' => $has_variations,
                'variations' => $variations
            ];

        if ($doc_type == 'izlez') {
            $json_return['otvoreni_produkti'] = array_values($return_izlezi);
            $json_return['zaliha_so_otvoreni'] = $total - $zaliha_otvoreni;
        }
        return response()->json($json_return);
    }



    /**
     * @param Request $req
     * @return mixed
     */
    public function countVariationsInWarehouse(Request $req)
    {
        $product_id = $req->get('product_id');
        $variation_id = $req->get('variation_id');
        $warehouse_id = $req->get('warehouse_id');

        $vq = VariationQuantity::where('product_id', $product_id)
            ->where('variation_id', $variation_id)
            ->where('warehouse_id', $warehouse_id)
            ->sum('quantity');



        $vq = (int) $vq;

        $return_izlezi = [];
        $zaliha_otvoreni = 0;
        $otvoreni_izlezi_ids = Document::where('type', 'izlez')
            ->where('status', 'podgotovka')

            ->pluck('id');

        $product_vo_otvoreni_izlezi_ids = DocumentItems::where('product_id', $product_id)
            ->where('variation_id', $variation_id)
            ->whereIn('document_id', $otvoreni_izlezi_ids)
            ->pluck('document_id');

        $product_vo_otvoreni_izlezi = DocumentItems::where('product_id', $product_id)
            ->where('variation_id', $variation_id)
            ->whereIn('document_id', $otvoreni_izlezi_ids)
            ->select('document_id', 'quantity', 'price')
            ->get()
            ->toArray();

        foreach ($product_vo_otvoreni_izlezi as $poi) {
            $zaliha_otvoreni = $zaliha_otvoreni + $poi['quantity'];
            $return_izlezi[$poi['document_id']] = $poi;
        }

        $otvoreni_izlezi = Document::whereIn('documents.id', $product_vo_otvoreni_izlezi_ids)
            ->join('warehouses', 'documents.warehouse_to_id', '=', 'warehouses.id')
            ->select('documents.id as document_id', 'document_date', 'warehouses.title')
            ->get()
            ->toArray();

        foreach ($otvoreni_izlezi as $poi) {
            $temp = $return_izlezi[$poi['document_id']];
            $poi['document_date'] = date('d.m.Y H:i:s', strtotime($poi['document_date']));
            $return_izlezi[$poi['document_id']] = array_merge($poi, $temp);
        }

        $json_return = ['success' => 1, 'zaliha' => $vq];
        $json_return['otvoreni_produkti'] = array_values($return_izlezi);
        $json_return['zaliha_so_otvoreni'] = $vq - $zaliha_otvoreni;

        return Response::json($json_return);
    }

    private function createDocumentFromExistingPrivate($type, $old_document_id)
    {
        $old_document = Document::where('id', $old_document_id)->first();

        $count_docs = Document::where('type', $type)
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->whereNotNull('document_number')
            ->where('warehouse_id', $old_document->warehouse_id)
            ->count();


        $doc = $old_document->replicate();
        $doc->document_date = date('Y-m-d H:i:s');
        $doc->user_id = $old_document->user_id;
        $doc->type = $type;
        $doc->status = 'generirana';
        $doc->save();
        // Hardcoded za top produkti da se bez specijalni znaci dokument number
        // $top_produkti_array =
        //     [
        //         'topprodukti_mk',
        //         'topprodukti_bg',
        //         'topprodukti_cz',
        //         'topprodukti_hr',
        //         'topprodukti_hu',
        //         'topprodukti_sk',
        //         'topprodukti_pl',
        //         'topprodukti_ro',
        //         'topprodukti_rs',
        //         'topprodukti_si',
        //     ];
        // if (in_array(config( 'app.client'), $top_produkti_array)) {
        //     $doc->document_number = sprintf('%05d', $count_docs + 1) . date('y');
        //     $doc->document_number   = sprintf('%02d', $old_document->warehouse_id) . $doc->document_number;
        // } else {
        $doc->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
        $doc->document_number = sprintf('%02d', $old_document->warehouse_id) . '-' . $doc->document_number;
        // }
        $doc->save();

        $document_items_old = DocumentItems::where('document_id', $old_document_id)->get();
        foreach ($document_items_old as $key => $value) {
            $new = new DocumentItems();
            $new->document_id = $doc->id;
            $new->product_id = $value->product_id;
            $new->item_name = $value->item_name;
            $new->quantity = $value->quantity;
            $new->price = $value->price;
            $new->vat = $value->vat;
            $new->price_no_vat = $value->price_no_vat;
            $new->sum_no_vat = $value->sum_no_vat;
            $new->sum_vat = $value->sum_vat;
            $new->variation_id = $value->variation_id;

            $new->unit_code = $value->unit_code;
            $new->original_price = $value->original_price;
            $new->original_price_no_vat = $value->original_price_no_vat;
            $new->original_sum_vat = $value->original_sum_vat;
            $new->original_sum_no_vat = $value->original_sum_no_vat;
            $new->discount_type = $value->discount_type;
            $new->discount_type_value = $value->discount_type_value;
            $new->discount_value = $value->discount_value;
            $new->save();
        }

        return $doc->id;
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeDocumentStatus(Request $req)
    {
        $document_id = $req->input('document_id');
        $document_status = $req->input('document_status');
        $my_warehouse    = $req->input('warehouse_id');
        $document_type   = $req->input('document_type');
        $documents_ids = is_array($document_id) ? $document_id : [$document_id];

        foreach ($documents_ids as $document_id) {
            if ($document_type == 'faktura_online')
                $doc = FakturaOnline::where('id', $document_id)->first();
            else
                $doc = Document::where('id', $document_id)->first();

            $previous_status = $doc->status;
            $doc->status = $document_status;

            if ($document_status === Document::STATUS_GENERIRANA && empty($doc->document_number)) {
                $count_docs = Document::where('type', $doc->type)
                    ->where('document_date', '>=', date('Y-01-01 00:00:00'))
                    ->where('document_date', '<=', date('Y-m-d H:i:s'))
                    ->whereNotNull('document_number')
                    ->where('warehouse_id', $doc->warehouse_id)
                    ->count();

                $doc->document_number = sprintf('%05d', $count_docs + 1) . '/' . date('y');
                $doc->document_number   = sprintf('%02d', $doc->warehouse_id) . '-' . $doc->document_number;

                if (
                    config( 'app.client') != Settings::CLIENT_NATURATHERAPYSHOP || config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL
                ) {
                    $doc->document_date      = date('Y-m-d H:i:s');
                    $doc->maturity_date   = date('Y-m-d');
                }
            }
            $user = User::find($doc->user_id);

            if (!is_null($user) && $user->partner == 1 && $doc->type = Document::TYPE_ISPRATNICA) {
                $items = DocumentItems::where('document_id', $doc->id)->get();
                foreach ($items as $key => $value) {
                    $record = PartnerStock::where('user_id', $user->id)->where('product_id', $value->id)->first();
                    $flag = false;
                    if (is_null($record)) {
                        $record = new PartnerStock();
                        $flag = true;
                    } else {
                        $oldQuantity = $record->quantity;
                    }
                    $record->user_id = $doc->user_id;
                    $record->product_id = $value->product_id;
                    if (!$flag) {
                        $record->quantity = $oldQuantity + $value->quantity;
                    } else {
                        $record->quantity = $value->quantity;
                    }
                    $record->save();
                }
            }

            if ($doc->status === Document::STATUS_ISPRATENA) {
                $doc->naracka_ispratena_na = date('Y-m-d H:i:s');
            }

            if (!empty($doc->status_log)) {
                $status_log = (array) json_decode($doc->status_log);
                $status_log[] = ['name' => Auth::user()->first_name . ' ' . Auth::user()->last_name, 'status' => $document_status, 'date' => date('Y-m-d H:i:s')];
                $doc->status_log = json_encode($status_log);
            } else {
                $status_log         = [];
                $status_log[]       = ['name' => Auth::user()->first_name . ' ' . Auth::user()->last_name, 'status' => $document_status, 'date' => date('Y-m-d H:i:s')];
                $doc->status_log    = json_encode($status_log);
            }

            $doc->save();

            if (
                $document_status === Document::STATUS_GENERIRANA ||
                $document_status === Document::STATUS_ISPRATENA
            ) {

                if (empty($my_warehouse)) {
                    $my_warehouse = $doc->warehouse_id;
                }
                $totalStockInMainWarehouseBeforeUpdate = [];
                $documentItems = DocumentItems::where('document_id', $document_id)->get();
                // Get total stock in main Warehouse before updating total stock and warehouse
                // This is needed for calculating 'ponderov prosek'
                $productsFromDocument = [];
                foreach ($documentItems as $documentItem) {
                    if (isset($productsFromDocument[$documentItem->product_id])) {
                        $productsFromDocument[$documentItem->product_id]['quantity'] += $documentItem->quantity;
                    } else {
                        $productsFromDocument[$documentItem->product_id] = [
                            'quantity' => $documentItem->quantity,
                            'price' => $documentItem->price
                        ];
                    }
                }

                foreach (array_keys($productsFromDocument) as $productId) {
                    $totalStockInMainWarehouseBeforeUpdate[$productId] = $this->productService->getTotalStockInMainWarehouse($productId);
                }

                $this->updateProductsInWarehouse($doc, $my_warehouse);
                $this->updateProductsTotal($document_id, null, $my_warehouse);

                if ($doc->type == 'rezervacija' && $doc->paid == 'neplatena')
                    $this->rezervacijaProducts($doc);

                if ($doc->type == 'ispratnica') {
                    $check = DocumentsRelated::where('ispratnica_id', $req->get('document_id'))->first();
                    if ($check) {
                        $check_rezervacija = Document::where('id', $check->rezervacija_id)->where('type', 'rezervacija')->first();
                        if (!empty($check_rezervacija)) {
                            $check_rezervacija->paid = 'platena';
                            $check_rezervacija->save();
                        }
                    }
                }

                if ($req->has('generiraj_ispratnica')) {
                    $check = DocumentsRelated::where('faktura_id', $document_id)->first();

                    if (empty($check)) {
                        $check = new DocumentsRelated();
                        $check->faktura_id = $doc->id;
                    }

                    if (empty($check->ispratnica_id)) {
                        $document_new_id = $this->createDocumentFromExistingPrivate('ispratnica', $doc->id);
                        $check->ispratnica_id = $document_new_id;
                        $check->save();
                        $this_doc = Document::where('id', $document_new_id)->first();
                        $this->updateProductsInWarehouse($this_doc, $my_warehouse);
                        $this->updateProductsTotal($document_new_id, null, $my_warehouse);
                    } else {
                        $document_items_old = DocumentItems::where('document_id', $doc->id)->get();
                        DocumentItems::where('document_id', $doc->generirana_ispratnica)->delete();
                        foreach ($document_items_old as $key => $value) {
                            $new = new DocumentItems();
                            $new->document_id = $doc->generirana_ispratnica;
                            $new->product_id = $value->product_id;
                            $new->item_name = $value->item_name;
                            $new->quantity = $value->quantity;
                            $new->price = $value->price;
                            $new->vat = $value->vat;
                            $new->price_no_vat = $value->price_no_vat;
                            $new->sum_no_vat = $value->sum_no_vat;
                            $new->sum_vat = $value->sum_vat;
                            $new->variation_id = $value->variation_id;
                            $new->save();
                        }
                    }
                }

                if ($doc->type == 'faktura') {
                    $check = DocumentsRelated::where('faktura_id', $document_id)->first();
                    if (empty($check)) {
                        $check = new DocumentsRelated();
                        $check->faktura_id = $doc->id;
                    }

                    if (empty($check->naracka_id)) {

                        $document_new_id = $this->createDocumentFromExistingPrivate('narachka', $doc->id);
                        $check->naracka_id = $document_new_id;
                        $check->save();
                    } else {

                        $document_items_old = DocumentItems::where('document_id', $doc->id)->get();
                        DocumentItems::where('document_id', $doc->generirana_narachka)->delete();
                        foreach ($document_items_old as $key => $value) {
                            $new = new DocumentItems();
                            $new->document_id = $doc->generirana_narachka;
                            $new->product_id = $value->product_id;
                            $new->item_name = $value->item_name;
                            $new->quantity = $value->quantity;
                            $new->price = $value->price;
                            $new->vat = $value->vat;
                            $new->price_no_vat = $value->price_no_vat;
                            $new->sum_no_vat = $value->sum_no_vat;
                            $new->sum_vat = $value->sum_vat;
                            $new->variation_id = $value->variation_id;
                            $new->save();
                        }
                    }
                }

                if ($doc->type === Document::TYPE_PRIEMNICA) {
                    $documentItems = DocumentItems::where('document_id', $document_id)->get();

                    // Presmetuvanje na pondirana vrednost pri priem na roba
                    // Total quantitu of product

                    foreach (array_keys($productsFromDocument) as $productId) {
                        $product = Product::find($productId);
                        $totalStockInMainWarehouse = $this->productService->getTotalStockInMainWarehouse($product->id, $product->has_variation);
                        $addedQuantity = $productsFromDocument[$productId]['quantity'];
                        $price = $productsFromDocument[$productId]['price'];



                        if ($totalStockInMainWarehouse < 1) {
                            $count_totalstock_temp = DocumentItems::where('document_id', $document_id)
                                ->where('product_id', $product->id)
                                ->select('price')
                                ->first();
                            $product->price_nabavna =    $count_totalstock_temp->price;
                        } else
                            $product->price_nabavna = (($product->price_nabavna * $totalStockInMainWarehouseBeforeUpdate[$product->id]) + ($price * $addedQuantity)) / $totalStockInMainWarehouse;

                        $product->save();
                    }
                }
            }
            if ($document_status == 'podgotovka') {


                if ($previous_status != 'stornirana') {
                    $wp = DocumentItems::where('document_id', $document_id)->get();
                    WarehouseProduct::where('document_id', $document_id)->delete();
                    $this->updateProductsTotal($document_id, $wp, $doc->warehouse_id);
                }

                if ($doc->type == 'rezervacija' && $doc->paid == 'neplatena') {
                    $doc_items = DocumentItems::where('document_id', $doc->id)->get();
                    foreach ($doc_items as $key => $value) {

                        if (!empty($doc_items->variation_id)) {

                            $original_product = VariationQuantity::where('product_id', $value->product_id)->where('variation_id', $doc_items->variation_id)->where('warehouse_id', $doc->warehouse_id)->first();
                            $original_product->quantity = $original_product->quantity + $value->quantity;
                            $original_product->save();
                        } else {

                            $original_product = Product::where('id', $value->product_id)->first();
                            $original_product->total_stock = $original_product->total_stock + $value->quantity;
                            $original_product->save();
                        }
                    }
                }
            }

            if ($document_status == 'stornirana') {
                $wp = DocumentItems::where('document_id', $document_id)->get();
                WarehouseProduct::where('document_id', $document_id)->delete();
                if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) {
                    // COURIER
                    $documentOrder = Document::find($document_id);
                    $courier = Courier::find($documentOrder->courier_id);
                    if (!is_null($courier)) {
                        $params = array(
                            'auth_token' => $courier->api_token,
                            'tracking_id' => $documentOrder->tracking_id
                        );
                        // Get cURL resource 
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://mex.mk/api/delete_curl.php',
                            CURLOPT_POST => 1,
                            CURLOPT_POSTFIELDS => $params,
                            CURLOPT_RETURNTRANSFER => 1
                        ));
                        // Send the request & save response to $resp 
                        $resp = curl_exec($curl);
                        curl_close($curl);

                        $documentOrder->courier_status = null;
                        $documentOrder->courier_id = null;
                        $documentOrder->courier_tracking_id = null;
                        $documentOrder->save();
                    }
                }
                $this->updateProductsTotal($document_id, $wp, $doc->warehouse_id);
            }
        }
        return Response::json(['success' => 1]);
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function changeDocumentPartner(Request $req)
    {
        $document_id = $req->get('document_id');
        $document_partner = $req->get('document_partner');
        $doc = Document::where('id', $document_id)->first();
        if ($doc->type == 'priemnica' || $doc->type == 'povratnica_dobavuvac') {
            $doc->supplier_id = $document_partner;
            $client = Suppliers::where('id', $document_partner)->first();
        } else {
            $doc->user_id = $document_partner;
            $client = User::where('id', $document_partner)->first();
        }

        $this->copyClientAddressToDocument($doc, $client);
        $doc->save();
        return Response::json(['success' => 1]);
    }

    private function rezervacijaProducts($doc)
    {
        $doc_items = DocumentItems::where('document_id', $doc->id)->get();
        foreach ($doc_items as $key => $value) {

            if (!empty($value->variation_id)) {

                $original_product = VariationQuantity::where('product_id', $value->product_id)->where('variation_id', $value->variation_id)->where('warehouse_id', $doc->warehouse_id)->first();
                $original_product->quantity = $original_product->quantity - $value->quantity;
                $original_product->save();
            } else {

                $original_product = Product::where('id', $value->product_id)->first();
                $original_product->total_stock = $original_product->total_stock - $value->quantity;
                $original_product->save();
            }
        }
    }

    /**
     * @param $document_id
     * @param null $wp
     */
    private function updateProductsTotal($document_id, $wp = null, $my_warehouse = null, $skip_variation = null)
    {
        $relatedDocuments = DocumentsRelated::where('naracka_id', $document_id)->first();

        // Ako ima rezervacija, da se skoka delot so Warehouse, poso ne e se uste kreirana ispratnica.
        if (!is_null($relatedDocuments) && !is_null($relatedDocuments->rezervacija_id)) {
            $reservationDocument = Document::find($relatedDocuments->rezervacija_id);
            $orderDocument = Document::find($relatedDocuments->naracka_id);
            $this->documentService->unReserveProducts($orderDocument->id, $orderDocument->warehouse_id);
            $relatedDocuments->rezervacija_id = null;
            $relatedDocuments->save();
            $reservationDocument->delete();
        } else {
            if (empty($wp)) {
                $wp = WarehouseProduct::where('document_id', $document_id)->get();
            }
            foreach ($wp as $key => $value) {
                $product_id = $value['product_id'];

                // OVDE USLOV DA NAPRAM DA GI ZEMAM SITE DOCUMENTS JOIN DOCUMENT_ITEMS KAJ SO IMAT REZERVACIJA
                // I SUM NA QUANTITY DA IM NAPRAM I DA GI DODAM VO PRODUCT_OUT PROMENLIVATA I TO E TO

                $reserved_product_out = DB::table('documents as d')
                    ->join('documents_related as dr', 'd.id', '=', 'dr.rezervacija_id')
                    ->join('document_items as di', 'dr.naracka_id', '=', 'di.document_id')
                    ->where('di.product_id', '=', $product_id)
                    ->sum('di.quantity');


                $reserved_product_out = is_null($reserved_product_out) ? 0 : (int)$reserved_product_out;



                if (!empty($value['variation_id'])) {

                    $product_in = WarehouseProduct::where('product_id', $product_id)
                        ->where('variation_id', $value['variation_id'])
                        ->where('warehouse_id', $my_warehouse)
                        ->where(function ($query) {
                            $query->where('document_type', Document::TYPE_VLEZ)
                                ->orWhere('document_type', Document::TYPE_POVRATNICA)
                                ->orWhere('document_type', Document::TYPE_PRIEMNICA);
                        })->sum('quantity');

                    $product_out = WarehouseProduct::where('product_id', $product_id)
                        ->where('variation_id', $value['variation_id'])
                        ->where('warehouse_id', $my_warehouse)
                        ->where(function ($query) {
                            $query->where('document_type', Document::TYPE_ISPRATNICA)
                                ->orWhere('document_type', Document::TYPE_IZLEZ)
                                ->orWhere('document_type', Document::TYPE_POVRATNICA_DOBAVUVAC);
                        })->sum('quantity');

                    $product_in = (int) $product_in;
                    $product_out = (int) $product_out;

                    $total = $product_in - ($product_out + $reserved_product_out);

                    if (empty($my_warehouse)) {
                        $my_warehouse = auth()->user()->warehouse_id;
                    }

                    if (empty($skip_variation)) {
                        $product = VariationQuantity::where('product_id', $product_id)
                            ->where('variation_id', $value['variation_id'])
                            ->where('warehouse_id', $my_warehouse)
                            ->first();

                        if (empty($product)) {
                            $product = new VariationQuantity();
                            $product->variation_id = $value['variation_id'];
                            $product->product_id = $product_id;
                        }
                        $product->warehouse_id = $my_warehouse;
                        $product->quantity = $total;
                        $product->save();
                    }
                }

                $product_in = WarehouseProduct::where('product_id', $product_id)
                    ->where(function ($query) {
                        $query->where('document_type', Document::TYPE_PRIEMNICA)
                            ->orWhere('document_type', Document::TYPE_VLEZ)
                            ->orWhere('document_type', Document::TYPE_POVRATNICA);
                    })->sum('quantity');

                $product_out = WarehouseProduct::where('product_id', $product_id)
                    ->where(function ($query) {
                        $query->orwhere('document_type', Document::TYPE_ISPRATNICA)
                            ->orWhere('document_type', Document::TYPE_IZLEZ)
                            ->orWhere('document_type', Document::TYPE_POVRATNICA_DOBAVUVAC);
                    })->sum('quantity');

                $product_in = (int) $product_in;
                $product_out = (int) $product_out;

                $total = $product_in - ($product_out + $reserved_product_out);

                $product = Product::where('id', $product_id)->first();
                $product->total_stock = $total;
                $product->save();
            }
        }
    }

    /**
     * Updates quantity of products in warehouse
     *
     * @param $document
     */
    private function updateProductsInWarehouse($document, $my_warehouse = 1)
    {
        if ($document->type == 'priemnica' || $document->type == 'ispratnica' || $document->type == 'povratnica_dobavuvac' || $document->type == 'povratnica') {
            $doc_items = DocumentItems::where('document_id', $document->id)->get();
            WarehouseProduct::where('document_id', $document->id)->delete();
            foreach ($doc_items as $key => $di) {
                $wp = new WarehouseProduct();
                $wp->product_id = $di->product_id;
                $wp->warehouse_id = $my_warehouse;
                $wp->quantity = $di->quantity;
                $wp->document_id = $document->id;
                $wp->document_type = $document->type;
                $wp->variation_id = $di->variation_id;
                $wp->save();
            }
        }


        if ($document->type == 'izlez') {

            $doc_items = DocumentItems::where('document_id', $document->id)->get();

            foreach ($doc_items as $key => $di) {

                $wp = new WarehouseProduct();
                $wp->product_id = $di->product_id;
                $wp->warehouse_id = $document->warehouse_id;
                $wp->quantity = $di->quantity;
                $wp->document_id = $document->id;
                $wp->document_type = 'izlez';
                $wp->variation_id = $di->variation_id;
                $wp->save();
            }
        }

        if ($document->type == 'vlez') {

            $izlez_id  = DocumentsRelated::where('vlez_id', $document->id)->first();
            $izlez_doc = Document::where('id', $izlez_id->izlez_id)->first();
            $doc_items = DocumentItems::where('document_id', $izlez_id->izlez_id)->get();
            foreach ($doc_items as $key => $di) {

                $wp = new WarehouseProduct();
                $wp->product_id = $di->product_id;
                $wp->warehouse_id = $my_warehouse;
                $wp->quantity = $di->quantity;
                $wp->document_id = $document->id;
                $wp->document_type = 'vlez';
                //$wp->other_warehouse = $document->from_warehouse;
                $wp->variation_id = $di->variation_id;
                $wp->save();
            }
        }
    }

    /**
     * Used in edit article, quantity view
     * Get product quantity for each warehouse
     *
     * @param Request $req
     * @return mixed
     */
    public function getTotalProductInWarehouseDatatable(Request $req)
    {
        $product_id = $req->get('product_id');
        $product = Product::where('id', $product_id)
            ->select('has_variations', 'title')
            ->first();

        if ($product->has_variations) {
            $allVariations = Variations::all();

            $results = VariationQuantity::where('product_id', $product_id)
                ->join('warehouses', 'warehouses.id', '=', 'variation_quantity.warehouse_id')
                // ->join('variations', 'variations.id', '=', 'variation_quantity.variation_id')
                ->leftJoin('products', 'products.id', '=', 'variation_quantity.product_id')
                ->select('warehouses.title', 'products.title as pt', 'variation_quantity.variation_id as value', 'variation_quantity.quantity')
                ->get();

            foreach ($results as $result) {
                $value  = '';
                $valueIds = [];
                $explodeValues = explode(',', $result->value);
                foreach ($explodeValues as $v) {
                    $valueIds[] = (int) $v;
                }

                foreach ($allVariations as $variation) {
                    if (in_array($variation->id, $valueIds)) {
                        $value = $value === '' ? $variation->value : $value . ', ' . $variation->value;
                    }
                }

                $result->value = $value;
            }
        } else {

            $results = [];
            $warehouse_ids = WarehouseProduct::where('product_id', $product_id)
                ->join('warehouses', 'warehouses.id', '=', 'product_warehouse.warehouse_id')
                ->groupBy('warehouse_id')
                ->select('warehouses.title', 'product_id', 'quantity', 'warehouse_id')
                ->get();
            $i = 0;
            $wids = [];

            foreach ($warehouse_ids as $key => $value) {

                $product_in = WarehouseProduct::where('product_id', $product_id)
                    ->where(function ($q) {
                        $q->where('document_type', Document::TYPE_PRIEMNICA)
                            ->orWhere('document_type', Document::TYPE_VLEZ)
                            ->orWhere('document_type', Document::TYPE_POVRATNICA);
                    })
                    ->where('warehouse_id', $value['warehouse_id'])
                    ->sum('quantity');

                if (empty($product_in))
                    $product_in = 0;

                $product_out = WarehouseProduct::where('product_id', $product_id)
                    ->where(function ($q) {
                        $q->where('document_type', Document::TYPE_ISPRATNICA)
                            ->orWhere('document_type', Document::TYPE_IZLEZ)
                            ->orWhere('document_type', Document::TYPE_POVRATNICA_DOBAVUVAC);
                    })
                    ->where('warehouse_id', $value['warehouse_id'])
                    ->sum('quantity');

                if (empty($product_out)) {
                    $product_out = 0;
                }

                $reservation_ids = Document::where('type', 'rezervacija')
                    ->where('status', 'generirana')
                    ->where('paid', 'neplatena')
                    ->where('warehouse_id', $value['warehouse_id'])
                    ->lists('id')->toArray();

                $reservation_items_count = DocumentItems::whereIn('document_id', $reservation_ids)
                    ->where('product_id', $product_id)
                    ->sum('quantity');

                if (empty($reservation_items_count)) {
                    $reservation_items_count = 0;
                }

                $product_in = (int) $product_in;
                $product_out = (int) $product_out;

                // MODIFY DATA FOR DATA TABLE FRONTEND
                $warehouse_ids[$i]->quantity = $product_in - $product_out - $reservation_items_count;
                $warehouse_ids[$i]->product_id = $product->title;
                $wids[] = $warehouse_ids[$i]->warehouse_id;
                $i = $i + 1;
            }

            $results = $warehouse_ids;

            $wh = Warehouse::whereNotIn('id', $wids)
                ->select('title')
                ->get();

            foreach ($wh as $key => $value) {
                $value->product_id = $product->title;
                $value->quantity = 0;
                $results[] = $value;
            }
        }

        return Datatables::of($results)
            ->removeColumn('warehouse_id')
            ->make();
    }

    public function lagerLista()
    {
        $products = Product::select('id', 'active', 'has_variations', 'title')->get();
        $results = [];
        foreach ($products as $key => $product) {

            if ($product->has_variations) {

                $results_temp = VariationQuantity::where('product_id', $product->id)
                    ->join('warehouses', 'warehouses.id', '=', 'variation_quantity.warehouse_id')
                    ->join('variations', 'variations.id', '=', 'variation_quantity.variation_id')
                    ->leftJoin('products', 'products.id', '=', 'variation_quantity.product_id')
                    ->select('warehouses.id as warehouse_id', 'warehouses.title', 'products.title as pt', 'variations.value', 'variation_quantity.quantity', 'product_id')
                    ->get();

                foreach ($results_temp as $key => $value) {
                    if (!isset($results[$value->product_id][$value->warehouse_id])) {
                        $results[$value->product_id][$value->warehouse_id] = ['title' => $value->title, 'product_id' => $value->product_id, 'quantity' => $value->quantity, 'value' => $value->value];
                        $results[$value->product_id][$value->warehouse_id]['new_quantity'] = $value->value . '(' . $value->quantity . ')';
                    } else {
                        $results[$value->product_id][$value->warehouse_id]['new_quantity'] = $results[$value->product_id][$value->warehouse_id]['new_quantity'] . ',' . $value->value . '(' . $value->quantity . ')';
                    }
                }
            } else {


                $warehouse_ids = WarehouseProduct::where('product_id', $product->id)
                    ->join('warehouses', 'warehouses.id', '=', 'product_warehouse.warehouse_id')
                    ->groupBy('warehouse_id')
                    ->select('warehouses.title', 'product_id', 'quantity', 'warehouse_id')
                    ->get();
                $i = 0;
                $wids = [];
                foreach ($warehouse_ids as $key => $value) {

                    $product_in = WarehouseProduct::where('product_id', $product->id)
                        ->where(function ($q) {
                            $q->where('document_type', 'priemnica')
                                ->orWhere('document_type', 'vlez')
                                ->orWhere('document_type', 'povratnica');
                        })
                        ->where('warehouse_id', $value['warehouse_id'])
                        ->sum('quantity');

                    if (empty($product_in))
                        $product_in = 0;

                    $product_out = WarehouseProduct::where('product_id', $product_id)
                        ->where(function ($q) {
                            $q->where('document_type', 'ispratnica')
                                ->orWhere('document_type', 'izlez');
                        })
                        ->where('warehouse_id', $value['warehouse_id'])
                        ->sum('quantity');

                    if (empty($product_out))
                        $product_out = 0;

                    $reservation_ids = Document::where('type', 'rezervacija')
                        ->where('status', 'generirana')
                        ->where('paid', 'neplatena')
                        ->where('warehouse_id', $value['warehouse_id'])
                        ->lists('id')->toArray();

                    $reservation_items_count = DocumentItems::whereIn('document_id', $reservation_ids)->where('product_id', $product_id)->sum('quantity');

                    if (empty($reservation_items_count))
                        $reservation_items_count = 0;


                    $product_in = (int) $product_in;
                    $product_out = (int) $product_out;
                    // MODIFY DATA FOR DATATABLE FRONTEND
                    $warehouse_ids[$i]->quantity = $product_in - $product_out - $reservation_items_count;
                    $warehouse_ids[$i]->product_id = $product->title;
                    $wids[] = $warehouse_ids[$i]->warehouse_id;
                    $i = $i + 1;
                }

                $results = $warehouse_ids;

                $wh = Warehouse::whereNotIn('id', $wids)->select('title')->get();
                foreach ($wh as $key => $value) {
                    $value->product_id = $product->title;
                    $value->quantity = 0;
                    $results[] = $value;
                }
            }
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDocumentProducts($id, Request $req)
    {
        $data_for_docuent_type =  $req->get('document');

        $unit_code_config = true;

        if ($data_for_docuent_type != 'faktura_online') {
            $doc = Document::where('id', $id)
                ->select('type', 'status', 'type_delivery', 'price_delivery')
                ->first();

            $doc_items_array = [
                'document_items.id as did', 'products.unit_code', 'document_items.id as nona', 'item_name',
                'quantity', 'price_no_vat', 'document_items.vat', 'price',
                'original_price_no_vat', 'original_price', 'original_sum_vat',
                'document_items.id', 'document_id',
                'sum_vat', 'variation_id'
            ];
        } else {
            $doc = FakturaOnline::where('id', $id)->select('type', 'status', 'type_delivery', 'price_delivery')->first();
            $doc_items_array = [
                'faktura_online_items.id as did', 'products.unit_code', 'faktura_online_items.id as nona', 'item_name',
                'quantity', 'price_no_vat', 'faktura_online_items.vat', 'price',
                'original_price_no_vat', 'original_price', 'original_sum_vat',
                'faktura_online_items.id', 'document_id',
                'sum_vat', 'variation_id'
            ];
        }

        if (empty($unit_code_config))
            unset($doc_items_array[1]);

        if ($data_for_docuent_type != 'faktura_online') {
            $docItems = DocumentItems::where('document_id', $id);
            if (!empty($unit_code_config)) {
                $docItems->leftJoin('products', 'products.id', '=', 'document_items.product_id');
            }
        } else {
            $docItems = FakturaOnlineItems::where('document_id', $id);
            if (!empty($unit_code_config)) {
                $docItems->leftJoin('products', 'products.id', '=', 'faktura_online_items.product_id');
            }
        }


        $docItems->select($doc_items_array);

        $docItems = $docItems->get();

        $index = 1;
        $i = 0;


        foreach ($docItems as $di) {

            $product = Product::where('unit_code', $di->unit_code)->first();
            if (!is_null($product)) {
                $docItems[$i]->image = \ImagesHelper::getProductImage($product->image, $product->id, 'sm_');

                if (config( 'app.client') == 'kopkompani') {
                    $docItems[$i]->location = $product->location;
                }
            }
            if (!is_null($di->variation_id)) {
                $di->variation_id = str_replace('_', ',', $di->variation_id); // za vekje zapisanite naracki so greska pr( 3__ ) da ne pagja adminot. Moze da se izbrise za nekoe vreme
                $variations = explode(',', $di->variation_id);
                foreach ($variations as $v) {
                    if ($v != "") {
                        $variationValue = Variations::find($v);
                        $docItems[$i]->item_name .= '(' . $variationValue->value . ')';
                    }
                }
            }

            if ($doc->type === Document::TYPE_IZLEZ) {
                $docItems[$i]->price_no_vat = number_format($docItems[$i]->original_price_no_vat, 2, '.', ',');
                $docItems[$i]->price = number_format($docItems[$i]->original_price, 2, '.', ',');
                $docItems[$i]->sum_vat = number_format($docItems[$i]->original_sum_vat, 2, '.', ',');
            } else {
                $docItems[$i]->price_no_vat = number_format($docItems[$i]->price_no_vat, 2, '.', ',');
                $docItems[$i]->price = number_format($docItems[$i]->price, 2, '.', ',');
                $docItems[$i]->sum_vat = number_format($docItems[$i]->sum_vat, 2, '.', ',');
            }



            $docItems[$i]->nona = $index;
            $docItems[$i]->vat = $docItems[$i]->vat . '%';
            $index += 1;
            $i += 1;
        }
        if ($doc->status != 'podgotovka') {

            // If there is delivery type, add it to the list
            if (!is_null($doc->type_delivery) && !is_null($doc->price_delivery) && ($doc->type == Document::TYPE_NARACHKA || $doc->type == Document::TYPE_FAKTURA)) {

                $firma_bez_danok =  config( 'clients.' . config( 'app.client') . '.firma_bez_danok');

                $docItems[$i] = new \stdClass();
                $docItems[$i]->nona = $index;
                $docItems[$i]->did = 100000;
                $docItems[$i]->item_name = $doc->type_delivery;
                $docItems[$i]->quantity = 1;
                if ($firma_bez_danok) {
                    $docItems[$i]->price_no_vat = number_format($doc->price_delivery, 2, '.', ',');
                    $docItems[$i]->vat = '0%';
                    $docItems[$i]->price = number_format($doc->price_delivery, 2, '.', ',');
                    $docItems[$i]->sum_vat = number_format($doc->price_delivery, 2, '.', ',');
                } else {
                    $docItems[$i]->price_no_vat = number_format($doc->price_delivery - ($doc->price_delivery * 0.18), 2, '.', ',');
                    $docItems[$i]->vat = '18%';
                    $docItems[$i]->price = number_format($doc->price_delivery, 2, '.', ',');
                    $docItems[$i]->sum_vat = number_format($doc->price_delivery, 2, '.', ',');
                }

                $docItems[$i]->nona = $index;
            }
        }

        $dt = Datatables::of($docItems)
            ->addColumn('image', function ($items) {
                if (!empty($items->image)) {
                    return "<img style='width: 80px;' src='$items->image'>";
                }
                return "N/A";
            })
            ->addColumn('location', function ($items) {
                if (config( 'app.client') == 'kopkompani') {
                    if (!isset($items->location)) {
                        $items->location = null;
                    }
                    return $items->location;
                }
            })
            ->editColumn('item_name', '@if(isset($unit_code)){{$unit_code}} - @endif<span @if($did != 100000)data-pk="{{$did}}" class="product_name"@endif>{{$item_name}}</span>')
            ->editColumn('quantity', '<span data-pk="{{$did}}" class="kolicina_class">{{$quantity}}</span>')
            ->editColumn('price_no_vat', '<span id="pricenovat_{{$did}}" data-pk="{{$did}}" class="pricenovat_class">{{$price_no_vat}}</span>')
            ->editColumn('price', '<span id="price_{{$did}}" data-pk="{{$did}}" class="price_class">{{$price}}</span>')
            ->editColumn('sum_vat', '<span id="sum_{{$did}}">{{$sum_vat}}</span>')

            ->removeColumn('variation_id')
            ->removeColumn('variation');

        if ($doc->status == 'podgotovka') {
            if ($data_for_docuent_type != 'faktura_online') {
                $dt->addColumn('action', '<div class="text-center">
                                    <a  class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="/admin/document/{{$document_id}}/products/{{$id}}/remove">
                                        <i class="fa fa-trash-o"></i>
                                    </a>                                    
                                    </div>');
            } else {
                $dt->addColumn('action', '<div class="text-center">
                                    <a  class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="/admin/document/{{$document_id}}/products/{{$id}}/remove?document_type=faktura_online">
                                        <i class="fa fa-trash-o"></i>
                                    </a>                                    
                                    </div>');
            }
        }
        $dt->removeColumn('original_price_no_vat')
            ->removeColumn('original_price')
            ->removeColumn('original_sum_vat');

        if (!empty($unit_code_config))
            $dt->removeColumn('unit_code');
        return $dt->removeColumn('did')->removeColumn('document_id')->removeColumn('id')->make();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDocumentProductsNarachkaSplit($id)
    {

        $doc = Document::where('id', $id)->select('type', 'status')->first();
        $docItems = DocumentItems::where('document_id', $id)
            ->leftJoin('variations', 'variations.id', '=', 'document_items.variation_id')
            ->select('document_items.id as did', 'document_items.id as nona', 'item_name', 'quantity', 'price_no_vat', 'vat', 'price', 'document_items.id', 'document_id', 'sum_vat', 'variations.value as variation', 'variations.id as variation_id', 'document_items.product_id as pid')->get();

        $index = 1;
        $i = 0;
        foreach ($docItems as $di) {
            if (!empty($di->variation_id)) {
                $docItems[$i]->item_name = $docItems[$i]->item_name . ' (' . $docItems[$i]->variation . ')';
            }
            $docItems[$i]->nona = '<input type="checkbox" name="products[' . $di->nona . ']" value="' . $di->pid . '">';
            $docItems[$i]->vat = $docItems[$i]->vat . '%';
            $options = '';
            for ($v = 1; $v <= $di->quantity; $v++) {
                $options = $options . '<option value="' . $v . '">' . $v . '</option>';
            }

            $docItems[$i]->quantity = "<select name='kolicina[" . $di->pid . "]'>$options</select>";
            $index += 1;
            $i += 1;
        }

        $dt = Datatables::of($docItems)
            ->editColumn('item_name', '<span data-pk="{{$nona}}" class="product_name">{{$item_name}}</span>')
            ->removeColumn('id')
            ->removeColumn('did')
            ->removeColumn('pid')
            ->removeColumn('variation_id')
            ->removeColumn('variation')
            ->removeColumn('document_id');
        if ($doc->status == 'podgotovka') {

            $dt->addColumn('action', '<div class="text-center">
                                    
                                    </div>');
        }
        return $dt->make();
    }

    /**
     * @param Request $req
     * @param $id
     * @return mixed
     */
    public function addProductToDocument(Request $request, $id)
    {

        $document_type = $request->get('document_type');
        if ($document_type == 'faktura_online') {
            $document = FakturaOnline::find($id);
        } else {
            $document = Document::find($id);
        }

        // Curency converter for priemnica
        $currency_conversion = $request->input('currency_conversion', 1);
        $currency_conversion = is_numeric($currency_conversion) && $currency_conversion >= 1 ? (float) $currency_conversion : 1;
        // Priemnica expenses
        $customs = $request->input('customs', 1);
        $customs = is_numeric($customs) && $customs >= 0 ? (float) $customs : 0;

        $transport = $request->input('transport', 1);
        $transport = is_numeric($transport) && $transport >= 0 ? (float) $transport : 0;

        $freight_forwarder = $request->input('freight_forwarder', 1);
        $freight_forwarder = is_numeric($freight_forwarder) && $freight_forwarder >= 0 ? (float) $freight_forwarder : 0;



        $product = Product::where('id', $request->input('product_id'))->first();
        $has_variation = $request->get('variation_id');
        $check_product_in_document = DocumentItems::where('document_id', $id)->where('product_id', $request->input('product_id'));
        if (!empty($has_variation)) {
            $check_product_in_document = $check_product_in_document->where('variation_id', $has_variation);
        }

        $check_product_in_document = $check_product_in_document->first();

        // If the product already exists in the document return error
        if (!empty($check_product_in_document)) {
            return response()->json(['error' => 1]);
        }

        if ($document_type == 'faktura_online') {
            $documentItem = new FakturaOnlineItems;
        } else {
            $documentItem = new DocumentItems();
        }

        if ($product->bundle) {

            $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

            if (isset($product->bundle_price_type) && $product->bundle_price_type == 'fixed') {
                $bundlePrice = Product::getPriceRetail1($product, false, 0) / $product->bundle_products_number;
            }
            $bundleIds = BundleProduct::where('bundle', $product->id)->pluck('product_id');

            if ((config( 'app.client') == 'matica')) {
                $bundleProducts = Product::whereIn('products.id', $product['bundle_items'][0])->get();
            } else {
                $bundleProducts = Product::whereIn('products.id', $bundleIds)->join('bundle_products', 'products.id', '=', 'bundle_products.product_id')->select('products.*', 'bundle_products.quantity as quantity')->get();
            }
            foreach ($bundleProducts as $bundleProduct) {
                $newDocumentItem = DocumentItems::create();
                $newDocumentItem->document_id = $document->id;
                $newDocumentItem->product_id = $bundleProduct->id;
                $newDocumentItem->item_name = $bundleProduct->title;
                if ((config( 'app.client') == 'matica')) {
                    $newDocumentItem->quantity = 1;
                    $bundleProduct->quantity = 1;
                } else {
                    $newDocumentItem->quantity = $request->get('quantity') * $bundleProduct->quantity;
                }

                $newDocumentItem->document_number = $document->document_number;

                if (isset($product->bundle_price_type) && $product->bundle_price_type == 'percent') {
                    $bundlePrice = $bundleProduct->price_retail_1 - ((int)$product->price_retail_1 / 100 * $bundleProduct->price_retail_1);
                }
                $newDocumentItem->price = $bundlePrice * $bundleProduct->quantity;
                $newDocumentItem->vat = $bundleProduct->vat;
                $newDocumentItem->price_no_vat = ($bundlePrice * $bundleProduct->quantity) / $danok;
                $newDocumentItem->sum_no_vat = $newDocumentItem->price_no_vat * $request->get('quantity');
                $newDocumentItem->sum_vat = $newDocumentItem->price * $request->get('quantity');

                $newDocumentItem->unit_code = $bundleProduct->unit_code;
                $newDocumentItem->proizvod_usluga = $this->productService->flagProductService($bundleProduct);
                $newDocumentItem->stranski_domasen = $this->productService->flagForeignDomestic($bundleProduct);
                $newDocumentItem->save();
            }
        } else {



            $documentItem->document_id = $id;
            $documentItem->product_id = $request->input('product_id');
            $documentItem->item_name = $product->title;
            $documentItem->quantity = $request->input('quantity');
            $documentItem->document_number = $request->input('document_number');
            $documentItem->vat = $product->vat;
            $documentItem->unit_code = $product->unit_code;


            // Calcucate no vat price
            $divideVat = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($product->vat);

            if ($document->type === Document::TYPE_IZLEZ) {

                $documentItem->price = $product->price_nabavna;
                $documentItem->price_no_vat = round($product->price_nabavna / $divideVat);
                $documentItem->sum_no_vat = $documentItem->quantity * $documentItem->price_no_vat;
                $documentItem->sum_vat = $documentItem->quantity * $documentItem->price;
            } else {

                if ($document->type === Document::TYPE_PRIEMNICA) {
                    $documentItem->price = $request->input('total_price') * $currency_conversion;
                    $documentItem->price_no_vat = $request->input('price') * $currency_conversion;
                    $documentItem->currency_conversion = $currency_conversion;

                    // Expenses (customs, transport, freight forwarder)
                    if ($customs > 0) {
                        $documentItem->price = $documentItem->price + ($customs / $documentItem->quantity);
                        $documentItem->customs = $customs;
                    }
                    if ($transport > 0) {
                        $documentItem->price = $documentItem->price + ($transport / $documentItem->quantity);
                        $documentItem->transport = $transport;
                    }
                    if ($freight_forwarder > 0) {
                        $documentItem->price = $documentItem->price + ($freight_forwarder / $documentItem->quantity);
                        $documentItem->freight_forwarder = $freight_forwarder;
                    }

                    // Calculate no vat prices again because of the expenses
                    $documentItem->price_no_vat = $documentItem->price / $divideVat;
                } else {
                    $documentItem->price = $request->input('total_price');
                    $documentItem->price_no_vat = $request->input('price');

                    if ($request->has('discount_price')) {
                        $documentItem->price = $request->input('discount_price');
                    }
                }

                $documentItem->sum_no_vat = ($documentItem->quantity * $documentItem->price_no_vat);
                $documentItem->sum_vat = ($documentItem->quantity * $documentItem->price);
            }

            // Original price od the document for calculating discount
            // Potrebno za nivelacija
            $documentItem->original_price = $product->price_retail_1;
            $documentItem->original_price_no_vat = round($product->price_retail_1 / $divideVat);
            $documentItem->original_sum_vat = $documentItem->quantity * $documentItem->original_price;
            $documentItem->original_sum_no_vat = $documentItem->quantity * $documentItem->original_price_no_vat;

            // Calculate if there is a discount
            if ($documentItem->original_sum_vat > $documentItem->sum_vat) {
                $documentItem->discount_type = Document::DISCOUNT_FIXED;
                $documentItem->discount_type_value = $documentItem->original_sum_vat - $documentItem->sum_vat;
                $documentItem->discount_value = $documentItem->original_sum_vat - $documentItem->sum_vat;
            }

            if ($request->has('variation_id')) {
                $documentItem->variation_id = implode(',', $request->input('variation_id'));
            }

            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                $the_user = DB::table('users')->where('id', '=', $document->user_id)->first();
                if(\EasyShop\Services\LoyaltyService::isProductInLoyaltyCategory($product)){
                    if($the_user->points >= $product->points * $documentItem->quantity){
                        DB::table('users')->where('id', '=', $document->user_id)->decrement('points', $product->points * $documentItem->quantity);
                    }
                    else{
                        return response()->json(['error' => 2]);
                    }
                }                
                else{
                    DB::table('users')->where('id', '=', $document->user_id)->increment('points', $product->points * $documentItem->quantity);
                }
            }
            $documentItem->save();

            //Change delivery including new product
            if (config( 'app.client') == 'naturatherapyshop') {

                $document_items_prices = DocumentItems::where('document_id', $id)->pluck('sum_vat');

                $document_test = DocumentItems::where('document_id', $id)->get();

                $sum = 0;
                foreach($document_test as $docItem){
                    $prod = Product::getProductByIdInLang($docItem->product_id);
                    if($prod->type != 'service'){
                        $sum += $docItem->sum_vat;
                    }
                }
                if($sum > 0 && $sum < 1000){
                    if($document->type_delivery == "cargo"){
                        $document->price_delivery = 100;
                    } else{
                        $document->price_delivery = 0;
                    }
                }
                else{
                    $document->price_delivery = 0;
                }
                // if ($document_items_prices->sum() > 0 &&  $document_items_prices->sum() < 1000) {
                //     if ($document->type_delivery == "cargo") {
                //         $document->price_delivery = 100;
                //     } else {
                //         $document->price_delivery = 0;
                //     }
                // } else {
                //     $document->price_delivery = 0;
                // }

                $document->save();


            }

            if (config('app.client') === Settings::CLIENT_NATURATHERAPYSHOP_ALB) {
                $document_test = DocumentItems::where('document_id', $id)->get();

                $sum = 0;
                foreach($document_test as $docItem){
                    $prod = Product::getProductByIdInLang($docItem->product_id);
                    if($prod->type != 'service'){
                        $sum += $docItem->sum_vat;
                    }
                }
                if($sum > 0 && $sum < 2000){
                    $client_data = json_decode($document->document_json);
                    $client_data = $client_data->userBilling;
                    if($client_data->city_id == 37){
                        $document->price_delivery = 200;
                    }
                    else{
                        $document->price_delivery = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                    }
                }
                else{
                    $document->price_delivery = 0;
                }
                $document->save();
            }
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $document_test = DocumentItems::where('document_id', $id)->get();

                $sum = 0;
                foreach($document_test as $docItem){
                    $prod = Product::getProductByIdInLang($docItem->product_id);
                    if($prod->type != 'service'){
                        $sum += $docItem->sum_vat;
                    }
                }
                if($sum > 0 && $sum < 15){
                    $document->price_delivery = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
                }
                else{
                    $document->price_delivery = 0;
                }
                $document->save();
            }
        }

        return response()->json(['success' => 1, 'price_delivery_updated' => $document->price_delivery, 'product_vat' => $product->vat, 'product_price' => $product->price_retail_1]);
    }

    /**
     * @param $doc_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeProductFromDocument($doc_id, $id, Request $req)
    {

        $document_type = $req->get('document_type');
        $doc = Document::where('id', '=', $doc_id)->first();
        $documentItem = DocumentItems::where('id', '=', $id)->first();
        $product = Product::getProductByIdInLang($documentItem->product_id);
        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){   
            if(\EasyShop\Services\LoyaltyService::isProductInLoyaltyCategory($product)){
                DB::table('users')->where('id', '=', $doc->user_id)->increment('points', $product->points * $documentItem->quantity);
            }                
            else{
                DB::table('users')->where('id', '=', $doc->user_id)->decrement('points', $product->points * $documentItem->quantity);
            }
        }
        if ($document_type == 'faktura_online') {
            $document = FakturaOnline::where('id', $doc_id)->first();
            FakturaOnlineItems::where('id', $id)->delete();
        } else {
            $document = Document::where('id', $doc_id)->first();
            DocumentItems::where('id', $id)->delete();
        }

        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                $document_items = DocumentItems::where('document_id', $doc_id)->get();
                $sum = 0;
                foreach($document_items as $docItem){
                    $prod = Product::getProductByIdInLang($docItem->product_id);
                    if($prod->type != 'service'){
                        $sum += $docItem->sum_vat;
                    }
                }
                if($sum > 0 && $sum < 1000){
                    if($document->type_delivery == "cargo"){
                        $document->price_delivery = 100;
                    } else{
                        $document->price_delivery = 0;
                    }
                }
                else{
                    $document->price_delivery = 0;
                }
        }
        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL){
            $document_items = DocumentItems::where('document_id', $doc_id)->get();
            $sum = 0;
            foreach($document_items as $docItem){
                $prod = Product::getProductByIdInLang($docItem->product_id);
                if($prod->type != 'service'){
                    $sum += $docItem->sum_vat;
                }
            }
            if($sum > 0 && $sum < 15){
                $document->price_delivery = config( 'clients.' . config( 'app.client') . '.type_delivery.cargo.price');
            }
            else{
                $document->price_delivery = 0;
            }
        }
        else{
            $document_items_prices = DocumentItems::where('document_id', $doc_id)->pluck('sum_vat');
            if ($document_items_prices->sum() > 0 &&  $document_items_prices->sum() < 1000) {
                if ($document->type_delivery == "cargo") {
                    $document->price_delivery = 100;
                } else {
                    $document->price_delivery = 0;
                }
            } else {
                $document->price_delivery = 0;
            }
        }
        
        $document->save();

        

        return redirect()->route('admin.document.edit', [$document->type, $doc_id]);
    }

    /**
     * DataTable call for document list
     *
     * @param $documentType
     * @return mixed
     */
    public function getDocuments(Request $req, $documentType)
    {
        $status_input       = $req->get('status');
        $warehouse_input    = $req->get('warehouse');
        $products_input     = $req->get('products');
        $new_from           = $req->get('new_from');
        $new_to             = $req->get('new_to');
        $paid_filter        = $req->get('paid');
        $paiddate_filter    = $req->get('platena_na');
        $ispratena_filter   = $req->get('ispratena_na');
        $posta              = $req->get('posta');
        $client_selected    = $req->get('client_id');
        $orderType          = $req->get('orderType');
        if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
            $created_by_select    = $req->get('created_by_select');
        }

        /*====== LIST OF FIELDS FOR THE TABLE=======*/
        $selectArray = ['document_number as checkbox', 'document_number', 'document_date', 'documents.type', 'status', 'documents.id', 'document_json', 'documents.user_id'];

        // Get all documents with passed type
        $documents = Document::query()->where('documents.type', $documentType);

        if ($documentType == 'faktura_online') {
            $selectArray = ['document_number as checkbox', 'document_number', 'document_date', 'faktura_online.type', 'status', 'faktura_online.id', 'document_json', 'faktura_online.user_id'];
            $documents = FakturaOnline::where('faktura_online.type', $documentType);
        }
        //Get documents for the logged in operator
        // if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
        //     if (!auth()->user()->canDo('admin')) {
        //         $documents
        //             ->where('documents.created_by', auth()->user()->id)
        //             ->orWhere('documents.created_by', NULL);
        //     }
        // }   

        if ($documentType == Document::TYPE_REZERVACIJA) {
            $documents->where('paid', 'neplatena');
        }

        // Add Client or Supplier field
        if ($documentType == Document::TYPE_PRIEMNICA) {
            $documents->leftJoin('suppliers', 'supplier_id', '=', 'suppliers.id');
            array_push($selectArray, 'suppliers.company_name');
        } else {
            $documents->leftJoin('users', 'users.id', '=', 'user_id');
            array_push($selectArray, DB::raw('concat(users.first_name , " " , users.last_name) as client'));
        }

        if (!empty($status_input)) {
            $documents->whereIn('status', $status_input);
        }
        if (!empty($paid_filter)) {
            $documents->whereIn('paid', $paid_filter);
        }
        if (!empty($posta)) {
            $documents->whereIn('posta', $posta);
        }
        if (!empty($orderType)) {
            $documents->whereIn('type_of_order', $orderType);
        }
        if (!empty($ispratena_filter)) {
            $documents->where('naracka_ispratena_na', '>=', date('Y-m-d 00:00:00', strtotime($ispratena_filter)))
                ->where('naracka_ispratena_na', '<=', date('Y-m-d 23:59:59', strtotime($ispratena_filter)));
        }
        if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
            if (!empty($created_by_select)) {
                $documents->where('documents.created_by', $created_by_select);
            }
        }     
        if (!empty($client_selected)) {
            if ($documentType == Document::TYPE_PRIEMNICA || $documentType == Document::TYPE_POVRATNICA_DOBAVUVAC) {
                $documents->where('supplier_id', $client_selected);
            } else {
                $documents->where('users.id', $client_selected);
            }
        }
        if (!empty($paiddate_filter)) {
            $documents->where('naracka_platena_na', '>=', date('Y-m-d 00:00:00', strtotime($paiddate_filter)))
                ->where('naracka_platena_na', '<=', date('Y-m-d 23:59:59', strtotime($paiddate_filter)));
        }
        if (!empty($warehouse_input)) {
            if ($documentType == 'faktura_online')
                $documents->whereIn('faktura_online.warehouse_id', $warehouse_input);
            else
                $documents->whereIn('documents.warehouse_id', $warehouse_input);
        }

        if (!empty($products_input)) {
            if ($documentType == 'faktura_online')
                $dis = FakturaOnlineItems::whereIn('product_id', $products_input)->get();
            else
                $dis = DocumentItems::whereIn('product_id', $products_input)->get();

            $documents_id_product = [];
            foreach ($dis as $key => $value) {
                $documents_id_product[] = $value['document_id'];
            }
            if ($documentType == 'faktura_online')
                $documents->whereIn('faktura_online.id', $documents_id_product);
            else
                $documents->whereIn('documents.id', $documents_id_product);
        }

        if (!empty($new_from) && !empty($new_to)) {
            $new_from = date('Y-m-d 00:00:00', strtotime($new_from));
            $new_to = date('Y-m-d 23:59:58', strtotime($new_to));
            $documents->where('document_date', '>=', $new_from)->where('document_date', '<=', $new_to);
        }

        // Add tracking code  for 'narachka'

        if ($documentType === Document::TYPE_NARACHKA) {
            $selectArray[] = 'status as doc_status';
            $selectArray[] = 'documents.note as note';
            $selectArray[] = 'paid';
            $selectArray[] = 'tracking_code';
            if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS) || config( 'app.client') == Settings::CLIENT_HERLINE) {
                $selectArray[] = 'courier_id';
                $selectArray[] = 'courier_tracking_id';
                $selectArray[] = 'courier_status';
            }
            $selectArray[] = 'payment';

            if (in_array(config( 'app.client'), ['tehnopolis', 'mojoutlet']))
                $selectArray[] = 'vlezen_document';

            $selectArray[] = 'tracking_code as doc_articles';
            $selectArray[] = 'tracking_code as total';
            $selectArray[] = 'currency';
            $selectArray[] = 'price_delivery';
            $selectArray[] = \DB::raw('(SELECT COALESCE(SUM(di.sum_vat), 0)  FROM document_items as di WHERE di.document_id = documents.id  ) as sum_vat');
            $selectArray[] = 'naracka_ispratena_na';
            $selectArray[] = 'naracka_platena_na';
            $selectArray[] = 'posta';
            $selectArray[] = 'promo_code_id';

            if (config( 'clients.' . config( 'app.client') . '.type_of_order' . '.active')) {
                $selectArray[] = 'type_of_order';
            }
        }

        // if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
        //     $selectArray[] = 'documents.created_by';
        // }

        if ($documentType === Document::TYPE_IZLEZ) {
            $selectArray[] = 'documents.warehouse_id as od_magacin';
            $selectArray[] = 'warehouse_to_id';
        }

        $documents = $documents->select($selectArray)->orderBy('id', 'desc');
        $cites_mk = City::all()->pluck('city_name', 'id')->toArray();

        //OVA SREDI GO
        // if ($documentType === Document::TYPE_IZLEZ) {
        //     $magacin_od = Warehouse::where('id', $documents[$i]->od_magacin)->first();
        //     $magacin_do_title = '';
        //     if (!empty($documents[$i]->warehouse_to_id)) {
        //         $magacin_do = Warehouse::where('id', $documents[$i]->warehouse_to_id)->first();
        //         $magacin_do_title = $magacin_do->title;
        //     }
        //     $documents[$i]->od_magacin = $magacin_od->title;
        //     $documents[$i]->warehouse_to_id = $magacin_do_title;
        // }
        // $i++;
        // }

        $dt = Datatables::of($documents)
            ->filter(function ($query) use ($req) {
                $search = $req->get('search')['value'];

                if ($search && $search !== '') {
                    $query->where(function ($q) use ($search) {
                        $q->where('document_json', 'like', '%' . addslashes($search) . '%')
                            ->orWhere('customer_name', 'like', '%' . addslashes($search) . '%')
                            ->orWhere('document_number', 'like', '%' . addslashes($search) . '%')
                            ->orWhere('courier_tracking_id', 'like', '%' . addslashes($search) . '%');
                    });
                }
            })
            ->addColumn('action', function ($document) use ($documentType) {
                if ($documentType == "narachka" || $documentType == "нарачка") {
                    return '<div class="text-center">
                <a  class="margin-left-5 tooltips" target="_blank" data-container="body" data-placement="top" data-original-title=""
                    href="/admin/document/' . $document->type . '/edit/' . $document->id . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a  class="margin-left-5 tooltips"
                    style="margin-left: 10px;"
                    data-container="body"
                    target="_blank"
                    data-placement="top" data-original-title="Подели нарачка"
                    href="/admin/documents/split/' . $document->id . '">
                    <i class="fa fa-list-ol"></i>
                </a>
                </div>';
                } else {
                    return '<div class="text-center">
                    <a  class="margin-left-5 tooltips" target="_blank" data-container="body" data-placement="top" data-original-title=""
                        href="/admin/document/' . $document->type . '/edit/' . $document->id . '">
                        <i class="fa fa-pencil"></i>
                    </a>';
                }
            })
            ->editColumn('courier_id', function ($document) {
                if (isset($document->courier_id) && !is_null($document->courier_id)) {
                    $courier = Courier::find($document->courier_id);
                    return $courier->name;
                } else {
                    return "/";
                }
            })
            ->editColumn('courier_status', function ($document) {
                if (isset($document->courier_status) && !is_null($document->courier_status)) {
                    return $document->courier_status;
                } else {
                    return "/";
                }
            })
            ->editColumn('checkbox', function ($document) {
                return $document->status . '_' . $document->id;
            })
            ->editColumn('status', function ($document) {
                $statusLabel = '';
                switch ($document->status) {
                    case 'podgotovka':
                        $statusLabel = 'bg-yellow-soft';
                        break;
                    case 'generirana':
                        $statusLabel = 'bg-red-soft';
                        break;
                    case 'ispratena':
                        $statusLabel = 'bg-blue-hoki';
                        break;
                    case 'dostavena':
                        $statusLabel = 'bg-green-soft';
                        break;
                    case 'vratena':
                        $statusLabel = 'bg-gray-mint';
                        break;
                    case 'reklamacija':
                        $statusLabel = 'bg-purple-soft';
                        break;
                    case 'stornirana':
                        $statusLabel = 'bg-default font-dark';
                        break;
                }
                $document->status = '<span class="label label-sm label-success ' . $statusLabel . '">' . $this->transliterate('', $document->status) . '</span>';
                return $document->status;
            });


        // Don't show document type in the table for 'narachka'
        if ($documentType === Document::TYPE_NARACHKA) {
            $dt->editColumn('doc_articles', function ($document) use ($documentType) {
                if ($documentType === Document::TYPE_NARACHKA) {
                    // najdi gi varijaciite
                    $doc_articles  = DocumentItems::where('document_id', $document->id)
                        ->leftJoin('products', 'products.id', '=', 'document_items.product_id')
                        ->select('document_items.*', 'products.total_stock', 'minimum_stock_alert', 'products.unit_code')
                        ->get()->toArray();
                    // dd($doc_articles);
                    foreach ($doc_articles as $key => $article) {
                        $variations_ids = explode(',', $article['variation_id']);
                        $variations = Variations::whereIn('id', $variations_ids)->get();
                        foreach ($variations as $v) {
                            $doc_articles[$key]['variations'][$v->name] = $v->value;
                        }
                    }
                    foreach ($doc_articles as $key => $docArticle) {
                        $temp_variation = '';
                        $temp_total_stock = 0;
                        if (!empty($docArticle['variations'])) {
                            foreach ($docArticle['variations'] as $key => $value) {
                                $temp_variation .= '<br>' . $key . ' - ' . $value;
                            }
                        }
                        if ($docArticle['variation_id']) {
                            $temp_vq = VariationQuantity::where('product_id', $docArticle['product_id'])->where('variation_id', $docArticle['variation_id'])->sum('quantity');
                            $temp_total_stock = (int) $temp_vq;
                        } else {
                            $temp_total_stock = $docArticle['total_stock'];
                        }
                        $style = '';
                        if ($temp_total_stock <= $docArticle['minimum_stock_alert'])
                            $style = " style='color:red;' ";

                        $unit_code_config = \EasyShop\Models\AdminSettings::getField('sifra');

                        if (!empty($unit_code_config))
                            $docArticle['item_name'] = $docArticle['unit_code'] . '-' . $docArticle['item_name'];
                        $document->doc_articles .= "<span $style>" . $docArticle['item_name'] . $temp_variation . ' (' . $docArticle['quantity'] . ')[' . $temp_total_stock . ']</span><br/>';
                    }
                    return $document->doc_articles;
                }
            });
            $dt->editColumn('total', function ($document) use ($documentType) {
                if ($documentType === Document::TYPE_NARACHKA) {
                    $document->total = $document->sum_vat; //DocumentItems::where('document_id',$document->id)->sum('sum_vat');

                    if (!empty($document->total)) {
                        if (!empty($document->price_delivery)) {
                            $document->total = $document->total + $document->price_delivery;
                        }
                    }
                    return $document->total;
                }
            });
            $dt->editColumn('document_number', function ($document) {
                return '<div class="text-center">
                            <a  class="margin-left-5 tooltips" target="_blank" data-container="body" data-placement="top" data-original-title=""
                                href="/admin/document/' . $document->type . '/edit/' . $document->id . '">
                                ' . $document->document_number . '
                            </a>
                        </div>';
            });
            if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
                $dt->editColumn('created_by', function ($document) {
                    $temp_doc = DB::table('documents')->where('id', $document->id)->first();
                    if (isset($temp_doc->created_by) && !is_null($temp_doc->created_by)) {
                        $user = DB::table('users')->where('id', $temp_doc->created_by)->first();
                        if (!is_null($user)) {
                            return $user->first_name . " " . $user->last_name;
                        } else {
                            return "/";
                        }
                    }
                });
            }
            
            $dt->editColumn('note', '<label style="white-space: normal !important;">{{$note}}</label>');
            $dt->removeColumn('type');
            $dt->editColumn('tracking_code', '<span class="xeditable tracking_class" data-pk="{{$id}}">{{$tracking_code}}</span>');
            if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)|| config( 'app.client') == Settings::CLIENT_HERLINE) {
                $dt->editColumn('tracking_code', function ($document) {
                    return '<span class="xeditable tracking_class" data-pk="' . $document->id . '">' . $document->courier_tracking_id . '</span>';
                });
            }
            $dt->editColumn('nacin_na_plakanje', function ($document) {
                $document->nacin_na_plakanje = '<span class="label label-sm label-warning ' . ($document->payment === 'gotovo' ? 'bg-green-hard' : 'bg-blue-soft') . '">' . $document->payment . '</span>';
                return $document->nacin_na_plakanje;
            });
            $dt->editColumn('paid', function ($document) {
                $document->paid = '<span class="label label-sm label-success ' . ($document->paid === 'platena' ? 'bg-green-soft' : 'bg-red-soft') . '">' . $this->transliterate('', $document->paid) . '</span>';
                return $document->paid;
            });
            $dt->editColumn('promo_code_id', function ($order) {
                if (!is_null($order->promo_code_id)) {
                    $coupon_code = PromoCode::where('id', $order->promo_code_id)->first()->code;
                    $coupon_percent = PromoCode::where('id', $order->promo_code_id)->first()->value;
                    return $coupon_code . "(" . $coupon_percent . "%)";
                } else {
                    return '/';
                }
            });
            $dt->editColumn('client', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;

                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->first_name) && isset($documentJson->userShipping->last_name)) {
                        $client_name = $documentJson->userShipping->first_name . " " . $documentJson->userShipping->last_name;
                        return $client_name;
                    }

                    if (isset($documentJson->userBilling) && isset($documentJson->userBilling->first_name) && isset($documentJson->userBilling->last_name)) {
                        $client_name = $documentJson->userBilling->first_name . " " . $documentJson->userBilling->last_name;
                        return $client_name;
                    }
                }
                return '/';
            });
            $dt->editColumn('phone', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->phone)) {
                        $order->phone = $documentJson->userShipping->phone;
                        return $order->phone;
                    }
                }
                return '/';
            });
            $dt->editColumn('phone2', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->phone2)) {
                        $order->phone2 = $documentJson->userShipping->phone2;
                        return $order->phone2;
                    }
                }
                return '/';
            });
            $dt->editColumn('address', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->address_shiping)) {
                        $order->address = $documentJson->userShipping->address_shiping;
                        return $order->address;
                    }
                }
                return '/';
            });
            $dt->editColumn('city', function ($order) use ($cites_mk) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping)) {
                        if (isset($documentJson->userShipping->city_id_shipping)) {
                            if ($documentJson->userShipping->country_id_shipping == 1)
                                $order->city = $cites_mk[$documentJson->userShipping->city_id_shipping];
                            else
                                $order->city = $documentJson->userShipping->city_other_shipping;

                            return $order->city;
                        }
                    }
                }
                return '/';
            });
            $dt->editColumn('municipality', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->municipality_shipping)) {
                        $order->municipality = $documentJson->userShipping->municipality_shipping;
                        return $order->municipality;
                    }
                }
                return '/';
            });
            if (in_array(config( 'app.client'), ['tehnopolis', 'mojoutlet'])) {
                $dt->editColumn('vlezen_document', '<span class="xeditable vlezen_doc_class" data-pk="{{$id}}">{{$vlezen_document}}</span>');
            }
            //$dt->removeColumn('currency');
            $dt->removeColumn('doc_status');
            $dt->removeColumn('sum_vat');
            $dt->removeColumn('price_delivery');
        } elseif ($documentType === Document::TYPE_IZLEZ) {
            $dt->removeColumn('document_json');
            $dt->removeColumn('user_id');
            $dt->removeColumn('client');
            $dt->removeColumn('nacin_na_plakanje');
            $dt->removeColumn('type');
            //$dt->removeColumn('document_number');
            $dt->removeColumn('paid');
        } else {
            // Remove tracking code for other documents
            $dt->removeColumn('tracking_code');
            $dt->removeColumn('nacin_na_plakanje');
            $dt->removeColumn('checkbox');
            $dt->removeColumn('paid');
        }
        $dt->removeColumn('document_json')
            ->removeColumn('user_id')
            ->removeColumn('original_type');

        return $dt->make(true);
    }

    /**
     * Change document field via xeditable
     *
     * @param $request
     */
    public function changeDocumentField(Request $request)
    {
        switch ($request->input('name')) {
            case 'tracking_code':
                $this->validate($request, [
                    'value' => 'required'
                ]);

                $id = $request->input('pk');
                $value = $request->input('value');

                if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS) || config( 'app.client') == Settings::CLIENT_HERLINE) {
                    Document::where('id', '=', $id)
                        ->update(['courier_tracking_id' => $value]);
                } else {
                    Document::where('id', '=', $id)
                        ->update(['tracking_code' => $value]);
                }
                break;

            case 'vlezen_document':
                $this->validate($request, [
                    'value' => 'required'
                ]);

                $id = $request->input('pk');
                $value = $request->input('value');
                Document::where('id', '=', $id)
                    ->update(['vlezen_document' => $value]);
                break;

            case 'document_date':
                $this->validate($request, [
                    'value' => 'required'
                ]);
                $id = $request->input('pk');
                $value = $request->input('value');
                $value = date('Y-m-d H:i:s', strtotime($value));
                $value2 = date('Y-m-d', strtotime($value));

                Document::where('id', '=', $id)
                    ->update(['document_date' => $value, 'maturity_date' => $value2]);
                break;
            case 'kolicina':
                $this->validate($request, [
                    'value' => 'required|integer'
                ]);
                $id = $request->input('pk');
                $value = $request->input('value');
                $di = DocumentItems::where('id', '=', $id)->first();
                if ($di) {
                    $di->quantity   = $value;
                    $di->sum_no_vat = $value * $di->price_no_vat;
                    $di->sum_vat    = $value * $di->price;
                    if ($di->discount_type == 'fixed') {
                        $di->discount_type_value = $di->original_price - $di->price;
                        $di->discount_value      = $di->original_price - $di->price;
                    } elseif ($di->discount_type == 'percentage') {
                        $di->discount_type_value = 1 - ($di->price / $di->original_price);
                        $di->discount_value      = $di->original_price - $di->price;
                    }
                    $di->save();
                }

                break;
            case 'price_no_vat':
                $this->validate($request, [
                    'value' => 'required|numeric'
                ]);
                $id = $request->input('pk');
                $value = $request->input('value');
                $di = DocumentItems::where('id', '=', $id)->first();
                $divideVat = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($di->vat);

                if ($di) {
                    $di->price_no_vat   = $value;
                    $di->price          = $value * $divideVat;
                    $di->sum_no_vat     = $di->quantity * $di->price_no_vat;
                    $di->sum_vat        = $di->quantity * $di->price;

                    if ($di->discount_type == 'fixed') {
                        $di->discount_type_value = $di->original_price - $di->price;
                        $di->discount_value      = $di->original_price - $di->price;
                    } elseif ($di->discount_type == 'percentage') {
                        $di->discount_type_value = 1 - ($di->price / $di->original_price);
                        $di->discount_value      = $di->original_price - $di->price;
                    }

                    $di->save();
                }
                break;
            case 'price':
                $this->validate($request, [
                    'value' => 'required|numeric'
                ]);
                $id = $request->input('pk');
                $value = $request->input('value');
                $di = DocumentItems::where('id', '=', $id)->first();
              
                $divideVat = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($di->vat);

                if ($di) {
                    $di->price          = $value;
                    $di->price_no_vat   = round($value / $divideVat, 2);
                    $di->sum_no_vat     = $di->price_no_vat * $di->quantity;
                    $di->sum_vat        = $di->quantity * $di->price;
                    if ($di->discount_type == 'fixed') {
                        $di->discount_type_value = $di->original_price - $di->price;
                        $di->discount_value      = $di->original_price - $di->price;
                    } elseif ($di->discount_type == 'percentage') {
                        $di->discount_type_value = 1 - ($di->price / $di->original_price);
                        $di->discount_value      = $di->original_price - $di->price;
                    }
                    $di->save();
                }
                break;
        }
        $promenato = 1;
        if (in_array($request->input('name'), ['kolicina', 'price_no_vat', 'price'])) {
            $doc_type = Document::where('id', $di->document_id)->select('type')->first();

            if (!in_array($doc_type->type, ['priemnica', 'vlez', 'izlez'])) {
                $doc_type_temp = $doc_type->type;
                if ($doc_type_temp == 'narachka')
                    $doc_type_temp = 'naracka';

                $related_docs = DocumentsRelated::where($doc_type_temp . '_id', $di->document_id)
                    ->select('ostanato_id',    'naracka_id', 'profaktura_id', 'faktura_id', 'ispratnica_id', 'rezervacija_id', 'fiskalna_id', 'povratnica_id', 'faktura_online_id', 'paragon_id')
                    ->first();

                if ($related_docs) {
                    $related_docs = $related_docs->toArray();
                    $related_ids = array_filter($related_docs);

                    $related_dis = DocumentItems::whereIn('document_id', $related_ids)->where('unit_code', $di->unit_code)->get();

                    foreach ($related_dis as $rd) {
                        $rd->quantity               = $di->quantity;
                        $rd->price_no_vat           = $di->price_no_vat;
                        $rd->price                  = $di->price;
                        $rd->sum_no_vat             = $di->sum_no_vat;
                        $rd->sum_vat                = $di->sum_vat;
                        $rd->discount_type_value    = $di->discount_type_value;
                        $rd->discount_value         = $di->discount_value;
                        $rd->save();
                        $promenato = $promenato + 1;
                    }
                }
            }

            return [
                'success' => 1,
                'quantity' => $di->quantity,
                'price' => number_format(round($di->price), 2, '.', ','),
                'sum_vat' => number_format(round($di->sum_vat), 2, '.', ','),
                'price_no_vat' => number_format($di->price_no_vat, 2, '.', ','),
                'id' => $di->id,
                'promenato_docs' => $promenato
            ];
        }
    }

    /**
     * @param null $textcyr
     * @param null $textlat
     * @return mixed|null
     */
    private function transliterate($textcyr = null, $textlat = null)
    {
        $cyr = array(
            'ж', 'ч', 'щ', 'ш', 'ю', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'j', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж', 'Ч', 'Щ', 'Ш', 'Ю', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'J', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я'
        );
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
            'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q'
        );
        if ($textcyr) return str_replace($cyr, $lat, $textcyr);
        else if ($textlat) {
            $text = str_replace($lat, $cyr, $textlat);
            if ($text == 'фактура_онлине')
                $text = 'Фактура Online';
            return $text;
        } else return null;
    }

    private function copyClientAddressToDocument($doc, $client)
    {
        $temp_array = [];
        if (!empty($doc) && !empty($client)) {

            $setings = Settings::first();
            if (empty($setings)) {
                $temp_array['company'] = [
                    'company_name' => '', 'company_address' => '', 'company_city' => '',
                    'company_country' => '', 'company_vat_number' => '', 'company_bank_account' => '', 'company_bank_name' => ''
                ];
            } else {
                $temp_array['company']['company_name']              = $setings['company_name'];
                $temp_array['company']['company_address']           = $setings['company_address'];
                $temp_array['company']['company_city']              = $setings['company_city'];
                $temp_array['company']['company_country']           = $setings['company_country'];
                $temp_array['company']['company_vat_number']        = $setings['company_vat_number'];
                $temp_array['company']['company_bank_account']      = $setings['company_bank_account'];
                $temp_array['company']['company_bank_name']         = $setings['company_bank_name'];
            }

            if (isset($client->company_name))
                $temp_array['userBilling']['company_name']              =  $client->company_name;

            if (isset($client->company))
                $temp_array['userBilling']['company_name']              =  $client->company;

            $temp_array['userBilling']['first_name']                =  $client->first_name;
            $temp_array['userBilling']['last_name']                 =  $client->last_name;
            $temp_array['userBilling']['phone']                     =  $client->phone;
            $temp_array['userBilling']['phone2']                     =  $client->phone2;
            $temp_array['userBilling']['email']                     =  $client->email;
            $temp_array['userBilling']['city_id']                   =  $client->city_id;
            $temp_array['userBilling']['country_id']                =  $client->country_id;
            $temp_array['userBilling']['city_other']                =  $client->city_other;
            $temp_array['userBilling']['zip_other']                 =  $client->zip_other;
            $temp_array['userBilling']['country_other']             =  $client->country_other;
            $temp_array['userBilling']['address']                   =  $client->address;
            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP)
            {
                if($client->loyalty_code != null && $client->loyalty_code != ''){
                    $temp_array['userBilling']['loyalty_code']          =  $client->loyalty_code;
                }
                else{
                    $temp_array['userBilling']['loyalty_code']          = null;
                }
            }
            $temp_array['userShipping']['city_id_shipping']         =  $client->city_id_shipping;
            $temp_array['userShipping']['country_id_shipping']      =  $client->country_id_shipping;
            $temp_array['userShipping']['city_other_shipping']      =  $client->city_other_shipping;
            $temp_array['userShipping']['zip_other_shipping']       =  $client->zip_other_shipping;
            $temp_array['userShipping']['country_other_shipping']   =  $client->country_other_shipping;
            $temp_array['userShipping']['address_shiping']          =  $client->address_shiping;
            $doc->document_json = json_encode($temp_array);
            $doc->save();
        }
    }


    public function createInvoiceFromPartnerReview(Request $req)
    {

        $doc = new Document();

        $doc->document_date = \Carbon\Carbon::parse($req->input('reviewed_at'))->format('Y-m-d');
        $doc->type = 'faktura';
        $doc->user_id = $req->input('partner');
        $doc->paid = 'platena';
        $doc->warehouse_id = Auth::user()->warehouse_id;
        $count_docs = Document::where('type', 'faktura')
            ->whereNotNull('document_number')
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->where('warehouse_id', $doc->warehouse_id)
            ->count();
        $doc->maturity_date = \Carbon\Carbon::parse($req->input('reviewed_at'))->format('Y-m-d');
        $doc->status = 'generirana';
        $doc->document_number =  'P-' . sprintf('%05d', $count_docs + 1) . '/' . date('y');
        $doc->currency = \EasyShop\Models\AdminSettings::getField('currency');

        $client = User::find($req->input('partner'));
        $this->copyClientAddressToDocument($doc, $client);
        $doc->save();


        $products = $req->input('array');
        foreach ($products as $item) {
            $record = new PartnerReview();
            $record->user_id = $req->input('partner');
            $record->reviewed_at = \Carbon\Carbon::parse($req->input('reviewed_at'))->format('Y-m-d');
            $record->quantity = $item['quantity'];
            $record->product_id = $item['product_id'];
            $record->after_review_quantity = $item['after_review_quantity'];
            $record->difference = $item['difference'];
            $record->document_id = $doc->id;
            $record->save();
            $stockRecord = PartnerStock::where('product_id', $record->product_id)->where('user_id', $record->user_id)->first();
            $stockRecord->quantity = $record->after_review_quantity;
            $stockRecord->save();
        }

        foreach ($products as $item) {
            $productRecord = Product::find($item['product_id']);

            $price_temp = $productRecord->price_retail_1;
            $check_product_discount = EasyShop\Models\Product::hasDiscount($productRecord->discount);
            if (!empty($check_product_discount)) {
                $price_temp = Product::getPriceRetail1($productRecord, false);
            }

            $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($productRecord->vat);

            $itemRecord = new DocumentItems();
            $itemRecord->document_id       =  $doc->id;
            $itemRecord->product_id        =  $item['product_id'];
            $itemRecord->item_name         =  $productRecord->title;
            $itemRecord->quantity          =  $item['difference'];
            $itemRecord->document_number   =  $doc->document_number;
            $itemRecord->price             =  $price_temp;
            $itemRecord->vat               =  $productRecord->vat;
            $itemRecord->price_no_vat      =  $price_temp / $danok;
            $itemRecord->sum_no_vat        =  $itemRecord->price_no_vat * $item['difference'];
            $itemRecord->sum_vat           =  $itemRecord->price * $item['difference'];

            if (!empty($check_product_discount)) {
                $itemRecord->original_price = $productRecord->price_retail_1;
                $itemRecord->original_price_no_vat = $itemRecord->original_price / $danok;
                $itemRecord->original_sum_no_vat = $itemRecord->original_price_no_vat * $item['difference'];
                $itemRecord->original_sum_vat = $itemRecord->original_price * $item['difference'];
            }
            $itemRecord->unit_code = $productRecord->unit_code;
            $itemRecord->save();
        }




        $redirect = 'document/faktura/edit/' . $doc->id;

        return $redirect;
    }

    /**
     * DataTable call for call-center document list
     *
     * @param $documentType
     * @return mixed
     */
    public function showMediaPlan(Request $req, $name)
    {
        
        $texts = DB::table('media_plan')->where("name", $name)->first();

        if(empty($texts)){
            return view('admin.documents.'.$name);
            
        }
        $texts = json_decode($texts->content);
        
        return view('admin.documents.'.$name)->with('texts', $texts);
    }
    public function storeMediaPlan(Request $request, $name)
    {
        $data = $request->all();
        unset($data["_token"]);

        $texts = [];
        foreach ($data as $key => $value) {
            
            $exploded = explode("_", $key);
            $row = $exploded[2];
            $col = $exploded[1];
            $texts[$col][$row] = $value;
        }

        $texts = json_encode($texts);

        $table = DB::table('media_plan')->where("name", $name)->first();

        if($table){
            DB::table('media_plan')->where("name", $name)->update(['content' => $texts, 'name' => $name]);
        }else{
            DB::table('media_plan')->insert([
                'content' => $texts,
                'name' => $name
            ]);
        }

        return redirect("/admin/mediaplan/".$name);
    }
    public function getCallCenterOrders(Request $req, $documentType)
    {
        $status_input       = $req->get('status');
        $warehouse_input    = $req->get('warehouse');
        $products_input     = $req->get('products');
        $new_from           = $req->get('new_from');
        $new_to             = $req->get('new_to');
        $paid_filter        = $req->get('paid');
        $paiddate_filter    = $req->get('platena_na');
        $ispratena_filter   = $req->get('ispratena_na');
        $posta              = $req->get('posta');
        $client_selected    = $req->get('client_id');
        $orderType          = $req->get('orderType');
        $created_by_select    = $req->get('created_by_select');
        /*====== LIST OF FIELDS FOR THE TABLE=======*/
        $selectArray = ['document_number as checkbox', 'document_number', 'document_date', 'documents.type', 'status', 'documents.id', 'document_json', 'documents.user_id'];

        // Get all documents with passed type
        $documents = Document::query()->where('documents.type', $documentType)->where(function ($query) {

            $query->where('type_of_order', 'Inbound')
                ->orWhere('type_of_order', 'Outbound')
                ->orWhere('type_of_order', 'Социјални мрежи');
        });

        if (!auth()->user()->canDo('admin')) {
            $documents->where('documents.created_by', auth()->id());
        }


        if ($documentType == 'faktura_online') {
            $selectArray = ['document_number as checkbox', 'document_number', 'document_date', 'faktura_online.type', 'status', 'faktura_online.id', 'document_json', 'faktura_online.user_id'];
            $documents = FakturaOnline::where('faktura_online.type', $documentType);
        }

        if ($documentType == Document::TYPE_REZERVACIJA) {
            $documents->where('paid', 'neplatena');
        }

        // Add Client or Supplier field
        if ($documentType == Document::TYPE_PRIEMNICA) {
            $documents->leftJoin('suppliers', 'supplier_id', '=', 'suppliers.id');
            array_push($selectArray, 'suppliers.company_name');
        } else {
            $documents->leftJoin('users', 'users.id', '=', 'user_id');
            array_push($selectArray, DB::raw('concat(users.first_name , " " , users.last_name) as client'));
        }

        if (!empty($status_input)) {
            $documents->whereIn('status', $status_input);
        }
        if (!empty($paid_filter)) {
            $documents->whereIn('paid', $paid_filter);
        }
        if (!empty($posta)) {
            $documents->whereIn('posta', $posta);
        }
        if (!empty($orderType)) {
            $documents->whereIn('type_of_order', $orderType);
        }
        if (!empty($ispratena_filter)) {
            $documents->where('naracka_ispratena_na', '>=', date('Y-m-d 00:00:00', strtotime($ispratena_filter)))
                ->where('naracka_ispratena_na', '<=', date('Y-m-d 23:59:59', strtotime($ispratena_filter)));
        }
        if (!empty($created_by_select)) {
            $documents->where('documents.created_by', $created_by_select);
        }
        if (!empty($client_selected)) {
            if ($documentType == Document::TYPE_PRIEMNICA || $documentType == Document::TYPE_POVRATNICA_DOBAVUVAC) {
                $documents->where('supplier_id', $client_selected);
            } else {
                $documents->where('users.id', $client_selected);
            }
        }
        if (!empty($paiddate_filter)) {
            $documents->where('naracka_platena_na', '>=', date('Y-m-d 00:00:00', strtotime($paiddate_filter)))
                ->where('naracka_platena_na', '<=', date('Y-m-d 23:59:59', strtotime($paiddate_filter)));
        }
        if (!empty($warehouse_input)) {
            if ($documentType == 'faktura_online')
                $documents->whereIn('faktura_online.warehouse_id', $warehouse_input);
            else
                $documents->whereIn('documents.warehouse_id', $warehouse_input);
        }

        if (!empty($products_input)) {
            if ($documentType == 'faktura_online')
                $dis = FakturaOnlineItems::whereIn('product_id', $products_input)->get();
            else
                $dis = DocumentItems::whereIn('product_id', $products_input)->get();

            $documents_id_product = [];
            foreach ($dis as $key => $value) {
                $documents_id_product[] = $value['document_id'];
            }
            if ($documentType == 'faktura_online')
                $documents->whereIn('faktura_online.id', $documents_id_product);
            else
                $documents->whereIn('documents.id', $documents_id_product);
        }

        if (!empty($new_from) && !empty($new_to)) {
            $new_from = date('Y-m-d 00:00:00', strtotime($new_from));
            $new_to = date('Y-m-d 23:59:58', strtotime($new_to));
            $documents->where('document_date', '>=', $new_from)->where('document_date', '<=', $new_to);
        }
        // Add tracking code  for 'narachka'

        if ($documentType === Document::TYPE_NARACHKA) {
            $selectArray[] = 'status as doc_status';
            $selectArray[] = 'documents.note as note';
            $selectArray[] = 'paid';
            $selectArray[] = 'tracking_code';
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP || config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL || config( 'app.client') == Settings::CLIENT_HERLINE) {
                $selectArray[] = 'courier_id';
                $selectArray[] = 'courier_tracking_id';
                $selectArray[] = 'courier_status';
            }
            $selectArray[] = 'payment';

            if (in_array(config( 'app.client'), ['tehnopolis', 'mojoutlet']))
                $selectArray[] = 'vlezen_document';

            $selectArray[] = 'tracking_code as doc_articles';
            $selectArray[] = 'tracking_code as total';
            $selectArray[] = 'currency';
            $selectArray[] = 'price_delivery';
            $selectArray[] = \DB::raw('(SELECT COALESCE(SUM(di.sum_vat), 0)  FROM document_items as di WHERE di.document_id = documents.id  ) as sum_vat');
            $selectArray[] = 'naracka_ispratena_na';
            $selectArray[] = 'naracka_platena_na';
            $selectArray[] = 'posta';
            $selectArray[] = 'promo_code_id';

            if (config( 'clients.' . config( 'app.client') . '.type_of_order' . '.active')) {
                $selectArray[] = 'type_of_order';
            }
        }
        $selectArray[] = 'documents.created_by';

        if ($documentType === Document::TYPE_IZLEZ) {
            $selectArray[] = 'documents.warehouse_id as od_magacin';
            $selectArray[] = 'warehouse_to_id';
        }

        $documents = $documents->select($selectArray)->orderBy('id', 'desc')->get();
        $cites_mk = City::all()->pluck('city_name', 'id')->toArray();

        //OVA SREDI GO
        // if ($documentType === Document::TYPE_IZLEZ) {
        //     $magacin_od = Warehouse::where('id', $documents[$i]->od_magacin)->first();
        //     $magacin_do_title = '';
        //     if (!empty($documents[$i]->warehouse_to_id)) {
        //         $magacin_do = Warehouse::where('id', $documents[$i]->warehouse_to_id)->first();
        //         $magacin_do_title = $magacin_do->title;
        //     }
        //     $documents[$i]->od_magacin = $magacin_od->title;
        //     $documents[$i]->warehouse_to_id = $magacin_do_title;
        // }
        // $i++;
        // }
        $dt = Datatables::of($documents)
            ->addColumn('action', function ($document) use ($documentType) {
                if ($documentType == "narachka" || $documentType == "нарачка") {
                    return '<div class="text-center">
                <a  class="margin-left-5 tooltips" target="_blank" data-container="body" data-placement="top" data-original-title=""
                    href="/admin/document/' . $document->type . '/edit/' . $document->id . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a  class="margin-left-5 tooltips"
                    style="margin-left: 10px;"
                    data-container="body"
                    target="_blank"
                    data-placement="top" data-original-title="Подели нарачка"
                    href="/admin/documents/split/' . $document->id . '">
                    <i class="fa fa-list-ol"></i>
                </a>
                </div>';
                } else {
                    return '<div class="text-center">
                    <a  class="margin-left-5 tooltips" target="_blank" data-container="body" data-placement="top" data-original-title=""
                        href="/admin/document/' . $document->type . '/edit/' . $document->id . '">
                        <i class="fa fa-pencil"></i>
                    </a>';
                }
            })
            ->editColumn('courier_id', function ($document) {
                if (isset($document->courier_id) && !is_null($document->courier_id)) {
                    $courier = Courier::find($document->courier_id);
                    return $courier->name;
                } else {
                    return "/";
                }
            })
            ->editColumn('courier_status', function ($document) {
                if (isset($document->courier_status) && !is_null($document->courier_status)) {
                    return $document->courier_status;
                } else {
                    return "/";
                }
            })
            ->editColumn('checkbox', function ($document) {
                return $document->status . '_' . $document->id;
            })
            ->editColumn('status', function ($document) {
                $statusLabel = '';
                switch ($document->status) {
                    case 'podgotovka':
                        $statusLabel = 'bg-yellow-soft';
                        break;
                    case 'generirana':
                        $statusLabel = 'bg-red-soft';
                        break;
                    case 'ispratena':
                        $statusLabel = 'bg-blue-hoki';
                        break;
                    case 'dostavena':
                        $statusLabel = 'bg-green-soft';
                        break;
                    case 'vratena':
                        $statusLabel = 'bg-gray-mint';
                        break;
                    case 'reklamacija':
                        $statusLabel = 'bg-purple-soft';
                        break;
                    case 'stornirana':
                        $statusLabel = 'bg-default font-dark';
                        break;
                }
                $document->status = '<span class="label label-sm label-success ' . $statusLabel . '">' . $this->transliterate('', $document->status) . '</span>';
                return $document->status;
            });


        // Don't show document type in the table for 'narachka'
        if ($documentType === Document::TYPE_NARACHKA) {
            $dt->editColumn('doc_articles', function ($document) use ($documentType) {
                if ($documentType === Document::TYPE_NARACHKA) {
                    // najdi gi varijaciite
                    $doc_articles  = DocumentItems::where('document_id', $document->id)
                        ->leftJoin('products', 'products.id', '=', 'document_items.product_id')
                        ->select('document_items.*', 'products.total_stock', 'minimum_stock_alert', 'products.unit_code')
                        ->get()->toArray();
                    // dd($doc_articles);
                    foreach ($doc_articles as $key => $article) {
                        $variations_ids = explode(',', $article['variation_id']);
                        $variations = Variations::whereIn('id', $variations_ids)->get();
                        foreach ($variations as $v) {
                            $doc_articles[$key]['variations'][$v->name] = $v->value;
                        }
                    }
                    foreach ($doc_articles as $key => $docArticle) {
                        $temp_variation = '';
                        $temp_total_stock = 0;
                        if (!empty($docArticle['variations'])) {
                            foreach ($docArticle['variations'] as $key => $value) {
                                $temp_variation .= '<br>' . $key . ' - ' . $value;
                            }
                        }
                        if ($docArticle['variation_id']) {
                            $temp_vq = VariationQuantity::where('product_id', $docArticle['product_id'])->where('variation_id', $docArticle['variation_id'])->sum('quantity');
                            $temp_total_stock = (int) $temp_vq;
                        } else {
                            $temp_total_stock = $docArticle['total_stock'];
                        }
                        $style = '';
                        if ($temp_total_stock <= $docArticle['minimum_stock_alert'])
                            $style = " style='color:red;' ";
                        $unit_code_config = \EasyShop\Models\AdminSettings::getField('sifra');
                        if (!empty($unit_code_config))
                            $docArticle['item_name'] = $docArticle['unit_code'] . '-' . $docArticle['item_name'];
                        $document->doc_articles .= "<span $style>" . $docArticle['item_name'] . $temp_variation . ' (' . $docArticle['quantity'] . ')[' . $temp_total_stock . ']</span><br/>';
                    }
                    return $document->doc_articles;
                }
            });
            $dt->editColumn('total', function ($document) use ($documentType) {
                if ($documentType === Document::TYPE_NARACHKA) {
                    $document->total = $document->sum_vat; //DocumentItems::where('document_id',$document->id)->sum('sum_vat');

                    if (!empty($document->total)) {
                        if (!empty($document->price_delivery)) {
                            $document->total = $document->total + $document->price_delivery;
                        }
                    }
                    return $document->total;
                }
            });

            $dt->editColumn('document_number', function ($document) {
                return '<div class="text-center">
                            <a  class="margin-left-5 tooltips" target="_blank" data-container="body" data-placement="top" data-original-title=""
                                href="/admin/document/' . $document->type . '/edit/' . $document->id . '">
                                ' . $document->document_number . '
                            </a>
                        </div>';
            })
                ->editColumn('created_by', function ($document) {
                    if (isset($document->created_by) && !is_null($document->created_by)) {
                        $user = User::find($document->created_by);
                        if (!is_null($user)) {
                            return $user->first_name . " " . $user->last_name;
                        } else {
                            return "/";
                        }
                    }
                });
            $dt->editColumn('note', '<label style="white-space: normal !important;">{{$note}}</label>');
            $dt->removeColumn('type');
            $dt->editColumn('tracking_code', '<span class="xeditable tracking_class" data-pk="{{$id}}">{{$tracking_code}}</span>');
            if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS) || config( 'app.client') == Settings::CLIENT_HERLINE) {
                $dt->editColumn('tracking_code', function ($document) {
                    return '<span class="xeditable tracking_class" data-pk="' . $document->id . '">' . $document->courier_tracking_id . '</span>';
                });
            }
            $dt->editColumn('nacin_na_plakanje', function ($document) {
                $document->nacin_na_plakanje = '<span class="label label-sm label-warning ' . ($document->payment === 'gotovo' ? 'bg-green-hard' : 'bg-blue-soft') . '">' . $document->payment . '</span>';
                return $document->nacin_na_plakanje;
            });
            $dt->editColumn('paid', function ($document) {
                $document->paid = '<span class="label label-sm label-success ' . ($document->paid === 'platena' ? 'bg-green-soft' : 'bg-red-soft') . '">' . $this->transliterate('', $document->paid) . '</span>';
                return $document->paid;
            });
            $dt->editColumn('promo_code_id', function ($order) {
                if (!is_null($order->promo_code_id)) {
                    $coupon_code = PromoCode::where('id', $order->promo_code_id)->first()->code;
                    $coupon_percent = PromoCode::where('id', $order->promo_code_id)->first()->value;
                    return $coupon_code . "(" . $coupon_percent . "%)";
                } else {
                    return '/';
                }
            });
            $dt->editColumn('client', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->first_name) && isset($documentJson->userShipping->last_name)) {
                        $client_name = $documentJson->userShipping->first_name . " " . $documentJson->userShipping->last_name;
                        return $client_name;
                    }
                }
                return '/';
            });
            $dt->editColumn('phone', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->phone)) {
                        $order->phone = $documentJson->userShipping->phone;
                        return $order->phone;
                    }
                }
                return '/';
            });

            $dt->editColumn('phone2', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->phone2)) {
                        $order->phone2 = $documentJson->userShipping->phone2;
                        return $order->phone2;
                    }
                }
                return '/';
            });
            $dt->editColumn('address', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->address_shiping)) {
                        $order->address = $documentJson->userShipping->address_shiping;
                        return $order->address;
                    }
                }
                return '/';
            });
            $dt->editColumn('city', function ($order) use ($cites_mk) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping)) {
                        if (isset($documentJson->userShipping->city_id_shipping)) {
                            if ($documentJson->userShipping->country_id_shipping == 1)
                                $order->city = $cites_mk[$documentJson->userShipping->city_id_shipping];
                            else
                                $order->city = $documentJson->userShipping->city_other_shipping;

                            return $order->city;
                        }
                    }
                }
                return '/';
            });
            $dt->editColumn('municipality', function ($order) {
                $documentJson = $order->document_json ? json_decode($order->document_json) : null;
                if ($documentJson) {
                    if (isset($documentJson->userShipping) && isset($documentJson->userShipping->municipality_shipping)) {
                        $order->municipality = $documentJson->userShipping->municipality_shipping;
                        return $order->municipality;
                    }
                }
                return '/';
            });
            if (in_array(config( 'app.client'), ['tehnopolis', 'mojoutlet'])) {
                $dt->editColumn('vlezen_document', '<span class="xeditable vlezen_doc_class" data-pk="{{$id}}">{{$vlezen_document}}</span>');
            }
            //$dt->removeColumn('currency');
            $dt->removeColumn('doc_status');
            $dt->removeColumn('sum_vat');
            $dt->removeColumn('price_delivery');
        } elseif ($documentType === Document::TYPE_IZLEZ) {
            $dt->removeColumn('document_json');
            $dt->removeColumn('user_id');
            $dt->removeColumn('client');
            $dt->removeColumn('nacin_na_plakanje');
            $dt->removeColumn('type');
            //$dt->removeColumn('document_number');
            $dt->removeColumn('paid');
        } else {
            // Remove tracking code for other documents
            $dt->removeColumn('tracking_code');
            $dt->removeColumn('nacin_na_plakanje');
            $dt->removeColumn('checkbox');
            $dt->removeColumn('paid');
        }
        $dt->removeColumn('document_json')
            ->removeColumn('user_id')
            ->removeColumn('original_type');

        return $dt->make(true);
    }
}
