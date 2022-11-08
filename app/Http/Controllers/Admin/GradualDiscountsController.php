<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\GradualDiscount;
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
use EasyShop\Models\GradualDiscountItem;
use EasyShop\Models\GradualDiscountProduct;
use Exception;

class GradualDiscountsController extends Controller
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
        $discounts = GradualDiscount::select('name')->distinct()->get()->toArray();
        $data['disc_name'] = array();
        foreach ($discounts as $key => $value) {
            $data['disc_name'][] = $value['name'];
        }

        return View::make('admin.gradual_discount.index', $data);
    }

    public function create(CategoryService $categoryService)
    {
        $categires_html =  $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), array());
        return View::make('admin.gradual_discount.gradual_discount', compact('categires_html'));
    }

    public function delete($id)
    {
        $gradualDiscount = GradualDiscount::find($id);
        $gradualDiscountProducts = GradualDiscountProduct::where('gradual_discount_id', $id)->get();
        $gradualDiscountItems = GradualDiscountItem::where('gradual_discount_id', $id)->get();

        if (isset($gradualDiscountItems) && count($gradualDiscountItems) > 0) {
            foreach ($gradualDiscountItems as $gdi) {
                $gdi->delete();
            }
        }
        if (isset($gradualDiscountProducts) && count($gradualDiscountProducts) > 0) {
            foreach ($gradualDiscountProducts as $gdp) {
                $gdp->delete();
            }
        }

        $gradualDiscount->delete();

        return response()->json(['message' => 'Степенастиот попуст е успешно избришан!']);
    }

    public function deleteItem($id)
    {
        $gradualDiscountItem = GradualDiscountItem::find($id);

        if (!is_null($gradualDiscountItem)) {
            $gradualDiscountItem->delete();
        }

        return response()->json(['message' => 'Степенастиот попуст е успешно избришан!']);
    }

    public function deleteProduct($gradualDiscountId, $productId)
    {
        $gradualDiscountProduct = GradualDiscountProduct::where('gradual_discount_id', $gradualDiscountId)->where('product_id', $productId)->first();

        if (!is_null($gradualDiscountProduct)) {
            $gradualDiscountProduct->delete();
        }

        return response()->json(['message' => 'Продуктот е успешно избришан од степенастиот попуст!']);
    }

    public function store(Request $request)
    {
        $products = $request->get('products');
        $gradualDiscount = new GradualDiscount();
        $gradualDiscount->name = $request->get('name');
        $gradualDiscount->start = Carbon::parse($request->get('start'))->setTimezone('UTC')->format('Y-m-d');
        $gradualDiscount->end = Carbon::parse($request->get('end'))->setTimezone('UTC')->format('Y-m-d');

        try {
            $gradualDiscount->save();
        } catch (Exception $e) {
            return response()->json(['message' => 0]);
        }

        foreach ($products as $product_id) {
            $gradualDiscountProduct = new GradualDiscountProduct();
            $gradualDiscountProduct->gradual_discount_id = $gradualDiscount->id;
            $gradualDiscountProduct->product_id = $product_id;
            try {
                $gradualDiscountProduct->save();
            } catch (Exception $e) {
                return response()->json(['message' => 0]);
            }
        }

        return response()->json([
            'message' => 1,
            'gradualDiscountId' => $gradualDiscount->id,
            'numberOfGradualDiscounts' => $gradualDiscount->number_of_gradual_discounts
        ]);
    }

    public function update(Request $request)
    {
        $products = $request->get('products');
        $gradualDiscount = GradualDiscount::find($request->input('gradualDiscountId'));
        $gradualDiscount->name = $request->get('name');
        $gradualDiscount->start = Carbon::parse($request->get('start'))->setTimezone('UTC')->format('Y-m-d');
        $gradualDiscount->end = Carbon::parse($request->get('end'))->setTimezone('UTC')->format('Y-m-d');
        $gradualDiscount->save();

        if (!is_null($products)) {
            foreach ($products as $product_id) {
                $gradualDiscountProduct = new GradualDiscountProduct();
                $gradualDiscountProduct->gradual_discount_id = $gradualDiscount->id;
                $gradualDiscountProduct->product_id = $product_id;
                try {
                    $gradualDiscountProduct->save();
                } catch (Exception $e) {
                    return response()->json(['message' => 0]);
                }
            }
        }

        return redirect()->route('admin.gradual-discounts')->withSuccess('Успешно ажуриран степенаст попуст.');
    }

    public function storeItem(Request $request)
    {
        $gradualDiscountItem = new GradualDiscountItem();
        if (
            !is_null($request->get('number_of_items')) && is_numeric($request->get('number_of_items'))
        ) {
            $gradualDiscountItem->number_of_items = $request->get('number_of_items');
        } else {
            return response()->json([
                'message' => 'Ве молиме внесете валиден број'
            ]);
        }

        if (!is_null($request->get('discount_percentage')) && is_numeric($request->get('discount_percentage'))) {
            if ($request->get('discount_percentage') <= 100 && $request->get('discount_percentage') >= 1) {
                $gradualDiscountItem->discount_percentage = $request->get('discount_percentage');
            } else {
                return response()->json([
                    'message' => 'Ве молиме внесете валиден процент'
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Ве молиме внесете валиден број'
            ]);
        }

        $gradualDiscountItem->gradual_discount_id = $request->get('gradual_discount_id');
        $gradualDiscountItem->save();

        return response()->json([
            'gradualDiscountItemId' => $gradualDiscountItem->id,
            'message' => 1
        ]);
    }

    public function storeProduct(Request $request)
    {
        $gradualDiscountProduct = new GradualDiscountProduct();

        if (!is_null($request->get('productId'))) {
            $gradualDiscountProduct->product_id = $request->get('productId');
            $gradualDiscountProduct->gradual_discount_id = $request->get('gradual_discount_id');
            $gradualDiscountProduct->save();
            $product = Product::find($request->get('productId'));
        } else {
            return response()->json([
                'message' => 'Ве молиме внесете продукт'
            ]);
        }

        return response()->json([
            'gradualDiscountProductId' => $gradualDiscountProduct->id,
            'product' => $product,
            'message' => 1
        ]);
    }

    public function list()
    {
        $gradual_discounts = GradualDiscount::select('id', 'name', 'start', 'end')->get();
        return Datatables::of($gradual_discounts)
            ->editColumn('start', function ($gradual_discount) {
                return Carbon::parse($gradual_discount->start)->format('d-m-Y');
            })
            ->editColumn('end', function ($gradual_discount) {
                return Carbon::parse($gradual_discount->end)->format('d-m-Y');
            })
            ->addColumn('number_of_gradual_discounts', function ($gradual_discount) {
                return count(GradualDiscountProduct::where('gradual_discount_id', $gradual_discount->id)->get());
            })
            ->addColumn('action', function ($gradual_discount) {
                return '<div class="text-center">
                <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                    href="/admin/gradual-discounts/' . $gradual_discount->id . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="margin-left-5 tooltips" data-gradual-discount-delete data-id="' . $gradual_discount->id . '" data-container="body" data-placement="top" data-original-title="Избриши">
                    <i class="fa fa-trash-o"></i>
                </a> 
                </div>';
            })
            ->removeColumn('id')
            ->make();
    }

    public function edit($id)
    {
        $gradualDiscount = GradualDiscount::with('items', 'products')->find($id);
        $productsList = Product::where('total_stock', '>', 0)->get();
        return view('admin.gradual_discount.edit_gradual_discount', compact('gradualDiscount', 'productsList'));
    }

    public function getProductsDatatable()
    {
        $global_price = \EasyShop\Models\AdminSettings::getField('prices');
        $sifra = \EasyShop\Models\AdminSettings::getField('sifra');
        $in_stock_filter = Input::get('inStock');
        $category = Input::get('category');
        $select_array = array('products.id');

        if ($sifra) {
            $select_array[] = 'unit_code';
        }
        $select_array[] = 'products.title as nona';
        $select_array[] = 'discount';
        $select_array[] = 'products.price_retail_1';
        $select_array[] = 'products.total_stock';
        $select_array[] = 'products.active as active';

        $products = Product::select($select_array)
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id')
            ->leftJoin('discounts', 'discounts.product_id', '=', 'products.id');

        if ($in_stock_filter == 'no_stock') {
            $products->where('total_stock', '=', 0);
        } elseif ($in_stock_filter == 'in_stock') {
            $products->where('total_stock', '>', 0);
        }

        if ($category > 0) {
            $products->join('product_category', 'product_category.product_id', '=', 'products.id');
            $products->where('product_category.category_id', $category);
        }
        $products = $products->distinct()->get();
        $i = 0;
        foreach ($products as $key => $value) {
            if (!empty($value->discount)) {
                $disc = json_decode($value->discount);
                if (strtotime(date('Y-m-d H:i:s')) < strtotime($disc->end)) {
                    unset($products[$i]);
                }
            } else {
                unset($products[$i]->discount);
            }
            $i++;
        }
        return Datatables::of($products)
            // ->addColumn('check_products', function ($product) {
            //     return '<input type="checkbox" class="productIds" name="productIds[]" value="'.$product->id .'>';
            // })
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
