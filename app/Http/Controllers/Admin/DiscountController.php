<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Discount;
use View;
use DateTime;
use DB;
use Response;
use EasyShop\Models\Category;
use EasyShop\Models\Product;
use EasyShop\Models\Manufacturers;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\ProductImages;
use EasyShop\Models\ProductAttributes;
use Datatables;
use EasyShop\Services\CategoryService;
use EasyShop\Services\PageService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class DiscountController extends Controller
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
        $discounts = Discount::select('name')->distinct()->get()->toArray();
        $data['disc_name'] = array();
        foreach ($discounts as $key => $value) {
            $data['disc_name'][] = $value['name'];
        }

        return View::make('admin.discount.index', $data);
    }

    public function create(CategoryService $categoryService)
    {
        $categires_html =  $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), array());
        return View::make('admin.discount.discount', compact('categires_html'));
    }

    public function removeArticle($id)
    {
        $discount = Discount::where('id', $id)->first();

        $product = Product::where('id', $discount->product_id)->first();
        $product->discount = NULL;
        $product->discount_type  = NULL;
        $product->discount_value = NULL;
        $product->final_price_retail_1 = $product->price_retail_1;
        $product->save();

        Discount::where('id', $id)->delete();

        return redirect()->route('admin.discount');
    }

    public function deleteDicsounts(Request $req)
    {
        $ids = $req->get('discounts');
        $discounts = Discount::whereIn('id', $ids)->get();
        foreach ($discounts as $key => $value) {
            $product = Product::where('id', $value->product_id)->first();
            $product->discount = NULL;
            $product->discount_type  = NULL;
            $product->discount_value = NULL;
            $product->save();
        }

        Discount::whereIn('id', $ids)->delete();
        return Response::json(array('success' => 1));
    }

    public function store(Request $req)
    {
        $products = $req->get('products');
        $categories = $req->get('categories');

        if ($products) {
            foreach ($products as $product_id) {

                Discount::where("product_id", $product_id)->delete();

                $disc = new Discount();
                $disc->product_id = $product_id;
                $disc->type = $req->get('type');
                $disc->value = $req->get('value');
                $disc->name = $req->get('name');

                $date = $req->get('start');
                $disc->start = Carbon::parse($date)->setTimezone('UTC')->format('Y-m-d');

                $date = new DateTime($req->get('end'));
                $disc->end =   $date->format('Y-m-d');

                $disc->price_retail_1 = $req->get('group_retail_1');
                $disc->price_retail_2 = $req->get('group_retail_2');
                $disc->price_wholesale_1 = $req->get('group_wholesale_1');
                $disc->price_wholesale_2 = $req->get('group_wholesale_2');
                $disc->price_wholesale_3 = $req->get('group_wholesale_3');
                $disc->save();

                $json_array =
                    [
                        'start'             => $disc->start,
                        'end'               => $disc->end,
                        'type'              => $disc->type,
                        'value'             => $disc->value,
                        'price_retail_1'    => $disc->price_retail_1,
                        'price_retail_2'    => $disc->price_retail_1,
                        'price_wholesale_1' => $disc->price_wholesale_1,
                        'price_wholesale_2' => $disc->price_wholesale_2,
                        'price_wholesale_3' => $disc->price_wholesale_3
                    ];

                $prod = Product::where('id', $product_id)->first();
                $prod->discount = json_encode($json_array);
                $prod->discount_type  = $disc->type;
                $prod->discount_value = $disc->value;

                if ($prod->discount_type === 'fixed') {
                    $prod->final_price_retail_1 = $prod->price_retail_1 - $prod->discount_value;
                } else {
                    $prod->final_price_retail_1 = $prod->price_retail_1 - ($prod->price_retail_1 / 100) * $prod->discount_value;
                }

                $prod->save();
            }
        } else if ($categories) {

            foreach ($categories as $category_id) {

                $category = Category::find($category_id);

                if ($category->type != "list_product") {
                    continue;
                }

                $products = $category->products()->get();

                foreach ($products as $prod) {

                    $disc = new Discount();

                    Discount::where("product_id", $prod->id)->delete();

                    $disc->product_id = $prod->id;
                    $disc->type = $req->get('type');
                    $disc->value = $req->get('value');
                    $disc->name = $req->get('name');

                    $date = $req->get('start');
                    $disc->start = Carbon::parse($date)->format('Y-m-d');
                    $date = new DateTime($req->get('end'));
                    $disc->end =   $date->format('Y-m-d');

                    $disc->price_retail_1 = $req->get('group_retail_1');
                    $disc->price_retail_2 = $req->get('group_retail_2');
                    $disc->price_wholesale_1 = $req->get('group_wholesale_1');
                    $disc->price_wholesale_2 = $req->get('group_wholesale_2');
                    $disc->price_wholesale_3 = $req->get('group_wholesale_3');

                    $disc->save();

                    $json_array =
                        [
                            'start'             => $disc->start,
                            'end'               => $disc->end,
                            'type'              => $disc->type,
                            'value'             => $disc->value,
                            'price_retail_1'    => $disc->price_retail_1,
                            'price_retail_2'    => $disc->price_retail_1,
                            'price_wholesale_1' => $disc->price_wholesale_1,
                            'price_wholesale_2' => $disc->price_wholesale_2,
                            'price_wholesale_3' => $disc->price_wholesale_3
                        ];

                    $prod->discount = json_encode($json_array);
                    $prod->discount_type  = $disc->type;
                    $prod->discount_value = $disc->value;

                    if ($prod->discount_type === 'fixed') {
                        $prod->final_price_retail_1 = $prod->price_retail_1 - $prod->discount_value;
                    } else {
                        $prod->final_price_retail_1 = $prod->price_retail_1 - ($prod->price_retail_1 / 100) * $prod->discount_value;
                    }

                    $prod->save();
                }
            }
        }
    }

    public function getDiscounts()
    {

        $global_price = \EasyShop\Models\AdminSettings::getField('prices');
        $select_array = array('discounts.id as id', 'products.unit_code', 'products.title', 'name', 'discounts.type', 'value', 'start', 'end');
        if ($global_price['retail1']) {
            $select_array[] = 'products.price_retail_1';
            $select_array[] = 'discounts.price_retail_1 as pr1';
        }
        if ($global_price['retail2']) {
            $select_array[] = 'products.price_retail_2';
            $select_array[] = 'discounts.price_retail_2 as pr2';
        }
        if ($global_price['wholesale1']) {
            $select_array[] = 'products.price_wholesale_1';
            $select_array[] = 'discounts.price_wholesale_1 as pw1';
        }
        if ($global_price['wholesale2']) {
            $select_array[] = 'products.price_wholesale_2';
            $select_array[] = 'discounts.price_wholesale_2 as pw2';
        }
        if ($global_price['wholesale3']) {
            $select_array[] = 'products.price_wholesale_3';
            $select_array[] = 'discounts.price_wholesale_3 as pw3';
        }

        $discounts = Discount::select($select_array)
            ->join('products', 'products.id', '=', 'discounts.product_id');

        if (Input::has('type'))
            $discounts->where('discounts.type', Input::get('type'));

        if (Input::has('name'))
            $discounts->where('name', Input::get('name'));

        $discounts = $discounts->get();

        $i = 0;

        foreach ($discounts as $key => $value) {

            if ($discounts[$i]['pr1'] == 1 && $global_price['retail1']) {
                if ($discounts[$i]['type'] == 'fixed') {
                    $price = (float) $discounts[$i]['price_retail_1'] - $discounts[$i]['value'];
                } else {
                    $price = (float) $discounts[$i]['price_retail_1'] - (($discounts[$i]['value'] * $discounts[$i]['price_retail_1']) / 100);
                }
                if ($price < 0)
                    $price = 0.00;

                $discounts[$i]['price_retail_1'] = "<span style='text-decoration: line-through;float:left;'>" . round($discounts[$i]['price_retail_1'], 2) . "</span><span style='float:right;'>$price</span>";

                unset($discounts[$i]['pr1']);
            } else {
                unset($discounts[$i]['pr1']);
            }

            if ($discounts[$i]['pr2'] == 1 && $global_price['retail2']) {
                if ($discounts[$i]['type'] == 'fixed') {
                    $price = (float) $discounts[$i]['price_retail_2'] - $discounts[$i]['value'];
                } else {
                    $price = (float) $discounts[$i]['price_retail_2'] - (($discounts[$i]['value'] * $discounts[$i]['price_retail_2']) / 100);
                }
                if ($price < 0)
                    $price = 0.00;

                $discounts[$i]['price_retail_2'] = "<span style='text-decoration: line-through;float:left;'>" . round($discounts[$i]['price_retail_2'], 2) . "</span><span style='float:right;'>$price</span>";

                unset($discounts[$i]['pr2']);
            } else {
                unset($discounts[$i]['pr2']);
            }

            if ($discounts[$i]['pw1'] == 1 && $global_price['wholesale1']) {
                if ($discounts[$i]['type'] == 'fixed') {
                    $price = (float) $discounts[$i]['price_wholesale_1'] - $discounts[$i]['value'];
                } else {
                    $price = (float) $discounts[$i]['price_wholesale_1'] - (($discounts[$i]['value'] * $discounts[$i]['price_wholesale_1']) / 100);
                }
                if ($price < 0)
                    $price = 0.00;

                $discounts[$i]['price_wholesale_1'] = "<span style='text-decoration: line-through;float:left;'>" . round($discounts[$i]['price_wholesale_1'], 2) . "</span><span style='float:right;'>$price</span>";

                unset($discounts[$i]['pw1']);
            } else {
                unset($discounts[$i]['pw1']);
            }

            if ($discounts[$i]['pw2'] == 1 && $global_price['wholesale2']) {
                if ($discounts[$i]['type'] == 'fixed') {
                    $price = (float) $discounts[$i]['price_wholesale_2'] - $discounts[$i]['value'];
                } else {
                    $price = (float) $discounts[$i]['price_wholesale_2'] - (($discounts[$i]['value'] * $discounts[$i]['price_wholesale_2']) / 100);
                }
                if ($price < 0)
                    $price = 0.00;

                $discounts[$i]['price_wholesale_2'] = "<span style='text-decoration: line-through;float:left;'>" . round($discounts[$i]['price_wholesale_2'], 2) . "</span><span style='float:right;'>$price</span>";

                unset($discounts[$i]['pw2']);
            } else {
                unset($discounts[$i]['pw2']);
            }

            if ($discounts[$i]['pw3'] == 1 && $global_price['wholesale3']) {
                if ($discounts[$i]['type'] == 'fixed') {
                    $price = (float) $discounts[$i]['price_wholesale_3'] - $discounts[$i]['value'];
                } else {
                    $price = (float) $discounts[$i]['price_wholesale_3'] - (($discounts[$i]['value'] * $discounts[$i]['price_wholesale_3']) / 100);
                }
                if ($price < 0)
                    $price = 0.00;

                $discounts[$i]['price_wholesale_3'] = "<span style='text-decoration: line-through;float:left;'>" . round($discounts[$i]['price_wholesale_3'], 2) . "</span><span style='float:right;'>$price</span>";

                unset($discounts[$i]['pw3']);
            } else {
                unset($discounts[$i]['pw3']);
            }

            $i++;
        }
        return Datatables::of($discounts)
            ->editColumn('type', '@if($type=="percent") Процент @else Износ @endif')
            ->editColumn('value', '@if($type=="percent") {{$value}}% @else {{$value}} @endif')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/discount/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    ')
            //->removeColumn('id')
            ->make();
    }

    public function getProductsDatatable()
    {
        $global_price = \EasyShop\Models\AdminSettings::getField('prices');
        $sifra = \EasyShop\Models\AdminSettings::getField('sifra');

        $in_stock_filter = Input::get('inStock');
        $category = Input::get('category');

        $select_array = array('products.id');
        if ($sifra)
            $select_array[] = 'unit_code';

        $select_array[] = 'products.title as nona';
        $select_array[] = 'discount';

        if ($global_price['retail1'])    $select_array[] = 'products.price_retail_1';
        if ($global_price['retail2'])    $select_array[] = 'products.price_retail_2';
        if ($global_price['wholesale1']) $select_array[] = 'products.price_wholesale_1';
        if ($global_price['wholesale2']) $select_array[] = 'products.price_wholesale_2';
        if ($global_price['wholesale3']) $select_array[] = 'products.price_wholesale_3';

        $select_array[] = 'products.total_stock';
        $select_array[] = 'products.active as active';

        $products = Product::select($select_array)
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id')
            ->leftJoin('discounts', 'discounts.product_id', '=', 'products.id');

        if ($in_stock_filter == 'no_stock')
            $products->where('total_stock', '=', 0);
        elseif ($in_stock_filter == 'in_stock')
            $products->where('total_stock', '>', 0);

        if ($category > 0) {
            $products->join('product_category', 'product_category.product_id', '=', 'products.id');
            $products->where('product_category.category_id', $category);
        }
        $products = $products->get();

        $i = 0;
        foreach ($products as $key => $value) {

            $disc = DB::table('discounts')->whereRaw("(NOW() between `start` and `end`)")->where('product_id', $value->id)->first();
            if ($disc) {

                if (strtotime(date('Y-m-d H:i:s')) < strtotime($disc->end)) {
                    unset($products[$i]);
                }
            } else {
                unset($products[$i]->discount);
            }
            $i++;
        }

        return Datatables::of($products)
            ->editColumn('active', '<div class="text-center"><span class="label label-sm {{{ $active ? \'label-success\' : \'label-danger\' }}}"> {{{ $active ? \'Да\' : \'Не\' }}} </span></div>')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/articles/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/articles/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    ')
            ->removeColumn('discount')
            ->make();
    }
}
