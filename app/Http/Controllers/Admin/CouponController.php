<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Coupon;
use EasyShop\Models\Product;
use View;
use DateTime;
use Datatables;
use Response;
use EasyShop\Services\CategoryService;
use EasyShop\Services\PageService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;

class CouponController extends Controller
{
    /**
     * @var $categoryService
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {        
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return View::make('admin.coupon.index');
    }

    public function delete(Request $req)
    {   
        $ids = $req->get('coupons');
        Coupon::whereIn('id',$ids)->delete();
        return Response::json(array('success'=>1));
    }

    public function create(CategoryService $categoryService)
    {   
        $categires_html =  $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), array());
        return View::make('admin.coupon.coupon', compact('categires_html'));
    }

    public function store(Request $req)
    {
        $products = $req->get('products');

        foreach ($products as $product_id) {
            
            $disc = new Coupon();            
            $disc->product_id = $product_id;
            $disc->type = $req->get('type');
            $disc->value = $req->get('value');
            $disc->name = $req->get('name');

            $date = new DateTime($req->get('start'));
            $disc->start = $date->format('Y-m-d  H:i:s');
            
            $date = new DateTime($req->get('end'));
            $disc->end =   $date->format('Y-m-d  H:i:s');

            $disc->group_retail_1 = $req->get('group_retail_1');
            $disc->group_retail_2 = $req->get('group_retail_2');
            $disc->group_wholesale_1 = $req->get('group_wholesale_1');
            $disc->group_wholesale_2 = $req->get('group_wholesale_2');
            $disc->group_wholesale_3 = $req->get('group_wholesale_3');
            $disc->reuse_number = $req->get('reuse_number');
            $disc->save();
            
        }
    }

    public function getCoupons(){
        $global_price = \EasyShop\Models\AdminSettings::getField('prices');
        
        $select_array = array('coupons.id','products.title','name','coupons.type','value','start','end');

        if($global_price['retail1']){
            $select_array[] = 'price_retail_1';
            $select_array[] = 'group_retail_1';
        }
        if($global_price['retail2']){
            $select_array[] = 'price_retail_2';
            $select_array[] = 'group_retail_2';
        }    
        if($global_price['wholesale1']){
            $select_array[] = 'price_wholesale_1';
            $select_array[] = 'group_wholesale_1';
        }
        if($global_price['wholesale2']){
            $select_array[] = 'price_wholesale_2';
            $select_array[] = 'group_wholesale_2';
        }
        if($global_price['wholesale3']){
            $select_array[] = 'price_wholesale_3';
            $select_array[] = 'group_wholesale_3';
        }



        $discounts = Coupon::select($select_array)
            ->join('products','products.id','=','coupons.product_id')
            ->get();        

        $i = 0;

        foreach ($discounts as $key => $value) {
            
            if($discounts[$i]['group_retail_1']== 1 && $global_price['retail1']){
                if($discounts[$i]['type'] == 'fixed'){
                    $price = (double) $discounts[$i]['price_retail_1'] - $discounts[$i]['value'];
                }else{
                    $price = (double)$discounts[$i]['price_retail_1'] - (($discounts[$i]['value']*$discounts[$i]['price_retail_1'])/100);
                }
                if($price < 0)
                    $price = 0.00;
                
                $discounts[$i]['price_retail_1'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_retail_1']."</span><span style='margin-left:10px;float:right;'>$price</span>";

                unset($discounts[$i]['group_retail_1']);
            }else{
                unset($discounts[$i]['group_retail_1']);
            }

            if($discounts[$i]['group_retail_2']== 1 && $global_price['retail2']){
                if($discounts[$i]['type'] == 'fixed'){
                    $price = (double) $discounts[$i]['price_retail_2'] - $discounts[$i]['value'];
                }else{
                    $price = (double)$discounts[$i]['price_retail_2'] - (($discounts[$i]['value']*$discounts[$i]['price_retail_2'])/100);
                }
                if($price < 0)
                    $price = 0.00;
                
                $discounts[$i]['price_retail_2'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_retail_2']."</span><span style='margin-left:10px;float:right;'>$price</span>";

                unset($discounts[$i]['group_retail_2']);
            }else{
                unset($discounts[$i]['group_retail_2']);
            }

            if($discounts[$i]['group_wholesale_1']== 1 && $global_price['wholesale1']){
                if($discounts[$i]['type'] == 'fixed'){
                    $price = (double) $discounts[$i]['price_wholesale_1'] - $discounts[$i]['value'];
                }else{
                    $price = (double)$discounts[$i]['price_wholesale_1'] - (($discounts[$i]['value']*$discounts[$i]['price_wholesale_1'])/100);
                }
                if($price < 0)
                    $price = 0.00;
                
                $discounts[$i]['price_wholesale_1'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_wholesale_1']."</span><span style='margin-left:10px;float:right;'>$price</span>";

                unset($discounts[$i]['group_wholesale_1']);
            }else{                
                unset($discounts[$i]['group_wholesale_1']);
            }

            if($discounts[$i]['group_wholesale_2']== 1 && $global_price['wholesale2']){
                if($discounts[$i]['type'] == 'fixed'){
                    $price = (double) $discounts[$i]['price_wholesale_2'] - $discounts[$i]['value'];
                }else{
                    $price = (double)$discounts[$i]['price_wholesale_2'] - (($discounts[$i]['value']*$discounts[$i]['price_wholesale_2'])/100);
                }
                if($price < 0)
                    $price = 0.00;
                
                $discounts[$i]['price_wholesale_2'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_wholesale_2']."</span><span style='margin-left:10px;float:right;'>$price</span>";

                unset($discounts[$i]['group_wholesale_2']);
            }else{                
                unset($discounts[$i]['group_wholesale_2']);
            }

            if($discounts[$i]['group_wholesale_3']== 1 && $global_price['wholesale3']){
                if($discounts[$i]['type'] == 'fixed'){
                    $price = (double) $discounts[$i]['price_wholesale_3'] - $discounts[$i]['value'];
                }else{
                    $price = (double) $discounts[$i]['price_wholesale_3'] - (($discounts[$i]['value']*$discounts[$i]['price_wholesale_3'])/100);
                }
                if($price < 0)
                    $price = 0.00;
                
                $discounts[$i]['price_wholesale_3'] = "<span style='text-decoration: line-through;float:right;'>".$discounts[$i]['price_wholesale_3']."</span><span style='margin-left:10px;float:right;'>$price</span>";

                unset($discounts[$i]['group_wholesale_3']);
            }else{                
                unset($discounts[$i]['group_wholesale_3']);
            }

            $i++;
        }

        return Datatables::of($discounts)->editColumn('type','@if($type=="percent") Процент @else Износ @endif')->make();
    }


    public function getProductsDatatable(Request $req)
    {
        $global_price = config( 'clients.' . config( 'app.client'));
        $global_price = $global_price['prices'];

        $in_stock_filter = $req->get('inStock');
        $category = $req->get('category');


        $select_array = array('products.id','products.title as nona');

        if($global_price['retail1'])    $select_array[] = 'products.price_retail_1';



        if(\EasyShop\Models\AdminSettings::isSetTrue('retail2', 'prices')) {
            if ($global_price['retail2']) $select_array[] = 'products.price_retail_2';
        }
        if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale1', 'prices')){
            if($global_price['wholesale1']) $select_array[] = 'products.price_wholesale_1';
        }

        if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale2', 'prices')) {
            if ($global_price['wholesale2']) $select_array[] = 'products.price_wholesale_2';
        }


        if(\EasyShop\Models\AdminSettings::isSetTrue('wholesale3', 'prices')) {
            if ($global_price['wholesale3']) $select_array[] = 'products.price_wholesale_3';
        }
        $select_array[]= 'products.total_stock';
        $select_array[]= 'products.active as active';

        $products = Product::select($select_array)
            ->leftJoin('manufacturers','manufacturers.id','=','products.manufacturer_id');            

        if($in_stock_filter == 'no_stock')
            $products->where('total_stock','=',0);
        elseif($in_stock_filter == 'in_stock')
            $products->where('total_stock','>',0);

        if($category > 0){
            $products->join('product_category','product_category.product_id','=','products.id');
            $products->where('product_category.category_id',$category);
        }
        $products = $products->get();
        
        $i = 0;

        return Datatables::of($products)            
            ->editColumn('active', '<div class="text-center"><span class="label label-sm {{{ $active ? \'label-success\' : \'label-danger\' }}}"> {{{ $active ? \'Да\' : \'Не\' }}} </span></div>')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/articles/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>                                    
                                    </div>
                                    ')
            ->removeColumn('discount')
            ->make();

    }


    public static function generate($length=6, $prefix='', $suffix='', $numbers=true, $letters=true, $symbols=false, $random_register=false, $mask=false) {
        /*$numbers = $numbers == 'false' ? false : true ;
        $letters = $letters == 'false' ? false : true ;
        $symbols = $symbols == 'true' ? true : false ;
        $random_register = $random_register == 'true' ? true : false ;
        $mask = $mask == 'false' ? false : $mask ;
        */
        
        $numbers_a   = array(0,1,2,3,4,5,6,7,8,9);
       
        $lowercase = array('q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m');
        $uppercase = array('Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M');
        $symbols_a = array('`','~','!','@','#','$','%','^','&','*','(',')','-','_','=','+','\\','|','/','[',']','{','}','"',"'",';',':','<','>',',','.','?');
        $string = Array();
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
            for ($i=0; $i < strlen($mask); $i++) { 
                if ($mask[$i] === 'X') {
                    $coupon .= $string[rand(0, count($string)-1)];
                } else {
                    $coupon .= $mask[$i];
                }
            }
        } else {

            for ($i=0; $i < $length ; $i++) { 
                $nona = $string[rand(0, count($string)-1)];
                //echo $nona;
                $coupon.= $nona;
            }
        }        
        return $prefix . $coupon . $suffix;
    }
}
