<?php

namespace EasyShop\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use View;
use DateTime;

use EasyShop\Services\CategoryService;
use Datatables;

use EasyShop\Http\Requests;
use EasyShop\Models\Coupon;
use EasyShop\PromoCode;
use Illuminate\Support\Facades\Cookie;

class PromoCodesController extends Controller
{


    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        return View::make('admin.promo-codes.index');
    }


    public function store(Request $req)
    {
        $id = $req->input('id');

        if (empty($id)) {
            $record = new PromoCode();
        } else {
            $record = PromoCode::where('id', $id)->first();

            if (is_null($record)) {
                return redirect()->route('admin.promo-codes');
            }
        }
        // $record->product_id = $product_id;
        $record->type = $req->get('type');
        $record->discount_type = $req->get('discount_type');
        $record->value = $req->get('value');
        $record->code = $req->get('code');
        $date = new DateTime($req->get('start'));
        $record->start = $date->format('Y-m-d  H:i:s');
        $date = new DateTime($req->get('end'));
        $record->end =   $date->format('Y-m-d  H:i:s');
        $record->reuse_number = $req->get('reuse_number');
        $record->save();

        return redirect()->route('admin.promo-codes');
    }

    public function show($id = NULL)
    {
        $coupon = new PromoCode();
        $coupon->code = "";
        $coupon->discount_type = "";
        $coupon->start = date('Y-m-d');
        $coupon->end = date('Y-m-d', strtotime("+30 days"));


        if (!is_null($id)) {
            $coupon = PromoCode::find($id);
        }
        return view('admin.promo-codes.promo-code')->with('coupon', $coupon);
    }


    public function delete($id)
    {

        $record = PromoCode::find($id);
        $record->delete();
        return redirect()->back();
    }



    public function getPromoCodes()
    {
        // $global_price = config('clients.'.config( 'app.client'));
        // $global_price = $global_price['prices'];

        $select_array = array('promo_codes.id', 'products.title', 'promo_codes.code', 'promo_codes.type', 'promo_codes.discount_type', 'promo_codes.value', 'promo_codes.start', 'promo_codes.end', 'promo_codes.reuse_number');

        // if($global_price['retail1']){
        //     $select_array[] = 'price_retail_1';
        //     $select_array[] = 'group_retail_1';
        // }
        // if($global_price['retail2']){
        //     $select_array[] = 'price_retail_2';
        //     $select_array[] = 'group_retail_2';
        // }    
        // if($global_price['wholesale1']){
        //     $select_array[] = 'price_wholesale_1';
        //     $select_array[] = 'group_wholesale_1';
        // }
        // if($global_price['wholesale2']){
        //     $select_array[] = 'price_wholesale_2';
        //     $select_array[] = 'group_wholesale_2';
        // }
        // if($global_price['wholesale3']){
        //     $select_array[] = 'price_wholesale_3';
        //     $select_array[] = 'group_wholesale_3';
        // }



        $discounts = PromoCode::select($select_array)
            ->leftJoin('products', 'products.id', '=', 'promo_codes.product_id')
            ->get();



        // $i = 0;

        // foreach ($discounts as $key => $value) {

        //     if($discounts[$i]['group_retail_1']== 1 && $global_price['retail1']){
        //         if($discounts[$i]['type'] == 'fixed'){
        //             $price = (double) $discounts[$i]['price_retail_1'] - $discounts[$i]['value'];
        //         }else{
        //             $price = (double)$discounts[$i]['price_retail_1'] - (($discounts[$i]['value']*$discounts[$i]['price_retail_1'])/100);
        //         }
        //         if($price < 0)
        //             $price = 0.00;

        //         $discounts[$i]['price_retail_1'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_retail_1']."</span><span style='margin-left:10px;float:right;'>$price</span>";

        //         unset($discounts[$i]['group_retail_1']);
        //     }else{
        //         unset($discounts[$i]['group_retail_1']);
        //     }

        //     if($discounts[$i]['group_retail_2']== 1 && $global_price['retail2']){
        //         if($discounts[$i]['type'] == 'fixed'){
        //             $price = (double) $discounts[$i]['price_retail_2'] - $discounts[$i]['value'];
        //         }else{
        //             $price = (double)$discounts[$i]['price_retail_2'] - (($discounts[$i]['value']*$discounts[$i]['price_retail_2'])/100);
        //         }
        //         if($price < 0)
        //             $price = 0.00;

        //         $discounts[$i]['price_retail_2'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_retail_2']."</span><span style='margin-left:10px;float:right;'>$price</span>";

        //         unset($discounts[$i]['group_retail_2']);
        //     }else{
        //         unset($discounts[$i]['group_retail_2']);
        //     }

        //     if($discounts[$i]['group_wholesale_1']== 1 && $global_price['wholesale1']){
        //         if($discounts[$i]['type'] == 'fixed'){
        //             $price = (double) $discounts[$i]['price_wholesale_1'] - $discounts[$i]['value'];
        //         }else{
        //             $price = (double)$discounts[$i]['price_wholesale_1'] - (($discounts[$i]['value']*$discounts[$i]['price_wholesale_1'])/100);
        //         }
        //         if($price < 0)
        //             $price = 0.00;

        //         $discounts[$i]['price_wholesale_1'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_wholesale_1']."</span><span style='margin-left:10px;float:right;'>$price</span>";

        //         unset($discounts[$i]['group_wholesale_1']);
        //     }else{                
        //         unset($discounts[$i]['group_wholesale_1']);
        //     }

        //     if($discounts[$i]['group_wholesale_2']== 1 && $global_price['wholesale2']){
        //         if($discounts[$i]['type'] == 'fixed'){
        //             $price = (double) $discounts[$i]['price_wholesale_2'] - $discounts[$i]['value'];
        //         }else{
        //             $price = (double)$discounts[$i]['price_wholesale_2'] - (($discounts[$i]['value']*$discounts[$i]['price_wholesale_2'])/100);
        //         }
        //         if($price < 0)
        //             $price = 0.00;

        //         $discounts[$i]['price_wholesale_2'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_wholesale_2']."</span><span style='margin-left:10px;float:right;'>$price</span>";

        //         unset($discounts[$i]['group_wholesale_2']);
        //     }else{                
        //         unset($discounts[$i]['group_wholesale_2']);
        //     }

        //     if($discounts[$i]['group_wholesale_3']== 1 && $global_price['wholesale3']){
        //         if($discounts[$i]['type'] == 'fixed'){
        //             $price = (double) $discounts[$i]['price_wholesale_3'] - $discounts[$i]['value'];
        //         }else{
        //             $price = (double) $discounts[$i]['price_wholesale_3'] - (($discounts[$i]['value']*$discounts[$i]['price_wholesale_3'])/100);
        //         }
        //         if($price < 0)
        //             $price = 0.00;

        //         $discounts[$i]['price_wholesale_3'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_wholesale_3']."</span><span style='margin-left:10px;float:right;'>$price</span>";

        //         unset($discounts[$i]['group_wholesale_3']);
        //     }else{                
        //         unset($discounts[$i]['group_wholesale_3']);
        //     }

        //     $i++;
        // }
        $datatable = Datatables::of($discounts)->editColumn('type', '@if($type=="cart") Цела кошничка @else Продукт @endif')
            ->editColumn('discount_type', '@if($discount_type=="percent") Процент @else Фиксно @endif')->removeColumn('title');
        $datatable->addColumn('Action', function ($discount) {
            return '<div class="text-center" style="white-space: nowrap;">
            <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                href="/admin/promo-code/show/' . $discount->id . '">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="margin-right-10 tooltips" href="/admin/promo-code/delete/' . $discount->id . '" data-id="' . $discount->id . '" data-container="body" data-placement="top" data-original-title="Избриши">
                <i class="fa fa-trash-o"></i>
            </a>
            </div>
            ';
        });
        return $datatable->make();
    }


    public function wheelSetCookie(){
        Cookie::queue('wheel_of_fortune', 1, 180);
    }

    public static function generateWheelOfFortuneCode(Request $request)
    {
        $discountPercentage = (int)$request->input('discountPercentage');
        $code = self::generate(8);
        $check = Coupon::where('name', $code)->count();
        while ($check > 0) {
            $code = self::generate(8);
            $check = Coupon::where('name', $code)->count();
        }
        $promo_code = new PromoCode();
        $promo_code->code = $code;
        $promo_code->discount_type = 'percent';
        $promo_code->value = $discountPercentage;
        $promo_code->type = "cart";
        $promo_code->reuse_number = 1;
        $promo_code->start = Carbon::now();
        $promo_code->end = Carbon::now()->addDays(7);
        $promo_code->save();

        Cookie::queue('wheel_of_fortune', 1);

        return response()->json([
            'promo_code' => $code
        ]);
    }

    public static function generate($length = 6, $prefix = '', $suffix = '', $numbers = true, $letters = true, $symbols = false, $random_register = false, $mask = false)
    {
        /*$numbers = $numbers == 'false' ? false : true ;
        $letters = $letters == 'false' ? false : true ;
        $symbols = $symbols == 'true' ? true : false ;
        $random_register = $random_register == 'true' ? true : false ;
        $mask = $mask == 'false' ? false : $mask ;
        */

        $numbers_a   = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);

        $lowercase = array('q', 'w', 'e', 'r', 't', 'y', 'u', 'i', 'o', 'p', 'a', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm');
        $uppercase = array('Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P', 'A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Z', 'X', 'C', 'V', 'B', 'N', 'M');
        $symbols_a = array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '[', ']', '{', '}', '"', "'", ';', ':', '<', '>', ',', '.', '?');
        $string = array();
        $coupon = '';

        if ($letters) {

            if ($random_register) {
                $string = array_merge($string, $lowercase, $uppercase);
            } else {
                $string = array_merge($string, $uppercase);
            }
        }
        if ($numbers) {
            $string = array_merge($string, $numbers_a);
        }
        if ($symbols) {
            $string = array_merge($string, $symbols_a);
        }
        if ($mask) {
            for ($i = 0; $i < strlen($mask); $i++) {
                if ($mask[$i] === 'X') {
                    $coupon .= $string[rand(0, count($string) - 1)];
                } else {
                    $coupon .= $mask[$i];
                }
            }
        } else {

            for ($i = 0; $i < $length; $i++) {
                $nona = $string[rand(0, count($string) - 1)];
                //echo $nona;
                $coupon .= $nona;
            }
        }
        return $prefix . $coupon . $suffix;
    }
}
