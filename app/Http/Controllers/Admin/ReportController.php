<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Models\Settings;
use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Category;
use EasyShop\Models\ReportKDFI;
use EasyShop\Models\ReportDFI;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\CategoryService;
use EasyShop\Services\ProductService;
use Illuminate\Support\Facades\Input;
use DB;
use Datatables;
use EasyShop\Models\Product;
use EasyShop\Models\Manufacturers;
use EasyShop\Models\Variations;
use EasyShop\Models\ProductVariations;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\ProductImages;
use EasyShop\Models\ProductAttributes;
use EasyShop\Models\Discount;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Document;
use EasyShop\Models\Warehouse;
use EasyShop\Models\WarehouseProduct;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\ReportNivelacija;
use EasyShop\Models\ReportNivelacijaItems;
use EasyShop\Models\DocumentsFiskalna;
use EasyShop\Models\DocumentsFiskalnaItems;
use Carbon\Carbon;
use EasyShop\Models\User;
use Excel;

class ReportController extends Controller
{

    /**
     * @var $articleRepository
     */
    protected $articleRepository;

    /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    /**
     * @var $categoryService
     */
    protected $categoryService;

    /**
     * @var $productService
     */
    protected $productService;

    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        CategoryRepositoryInterface $categoryRepository,
        CategoryService $categoryService,
        ProductService $productService
    ) {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        set_time_limit(0);
    }

    /**
     * Sales by product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function salesByProducts()
    {
        //$pageData = $this->pageService->getArticleListPageData();
        $products = $this->articleRepository->getAll(); // TODO: remove
        $categires_html = $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), [], $start = 0, $parentsDisabled = false);
        $warehouses = Warehouse::all();
        return view('admin.report.salesByProduct', compact('pageData', 'breadcrumbs', 'products', 'categires_html', 'warehouses'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ordersStatByDates()
    {
        $data['warehouses'] = Warehouse::all();
        $data['documentProducts_select'] = $this->articleRepository->getAll();
        return view('admin.report.ordersStatByDates', $data);
    }

    /**
     * @return mixed
     */
    public function getsalesByProductsDatatable()
    {

        $in_stock_filter = Input::get('inStock');
        $category = Input::get('category');

        $select_array = array('products.id', 'products.unit_code', 'products.title as nona');

        $select_array[] = 'price_retail_1 as broj_proizvodi';
        $select_array[] = 'price_retail_1 as broj_naracki';
        $select_array[] = 'price_retail_1';

        $select_array[] = 'products.active as active';
        $select_array[] = 'products.active as nabaveni';
        $select_array[] = 'products.active as nabaveni_sum';
        $date_today = date('Y-m-d H:i:s');

        // TODO: Check why if there are bundles, only the bundles are selected
        // if(\EasyShop\Models\AdminSettings::isSetTrue('bundle', 'modules')){
        //     $products = Product::select($select_array)->where('products.bundle', 0)
        //         ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id');
        // } else {
        //     $products = Product::select($select_array)
        //         ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id');
        // }

        $products = Product::select($select_array)
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id');

        if ($in_stock_filter == 'no_stock')
            $products->where('total_stock', '=', 0);
        elseif ($in_stock_filter == 'stock')
            $products->where('total_stock', '>', 0);

        // IF category is selected
        if ($category > 0) {

            $allCategories = $this->categoryRepository->getAll($orderBy = 'order');
            $categoryTree = \EasyShop\Models\Category::formatTree($allCategories, $category);
            $lastChildIds = $this->categoryService->getLastChildIds($categoryTree);

            $products->leftJoin('product_category', 'product_category.product_id', '=', 'products.id');
            $products->whereIn('product_category.category_id', array_merge($lastChildIds, [$category]));
        }
        $products = $products->distinct('id')->get();
        $i = 0;
        $unset_array = [];
        $warehouse_id = Input::get('warehouse_id');

        foreach ($products as $pr) {

            // Map category as broj na prodadeni
            $return_sum = Document::where('type', 'narachka')
                ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                ->where('document_items.product_id', $pr->id)
                ->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime(Input::get('new_from'))))
                ->where('document_date', '<', date('Y-m-d 23:59:59', strtotime(Input::get('new_to'))));

            if (!empty($warehouse_id) && $warehouse_id > 0)
                $return_sum->where('warehouse_id', $warehouse_id);

            $return_sum = $return_sum->sum('quantity');
            $products[$i]->broj_proizvodi     = (int)$return_sum;
            $products[$i]->broj_naracki = Document::where('type', 'narachka')
                ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                ->where('document_items.product_id', $pr->id)
                ->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime(Input::get('new_from'))))
                ->where('document_date', '<', date('Y-m-d 23:59:59', strtotime(Input::get('new_to'))));

            if (!empty($warehouse_id) && $warehouse_id > 0)
                $products[$i]->broj_naracki = $products[$i]->broj_naracki->where('warehouse_id', $warehouse_id);

            $products[$i]->broj_naracki = $products[$i]->broj_naracki->count();

            if ($products[$i]->broj_naracki > 0) {
                $products[$i]->price_retail_1 =  Document::where('type', 'narachka')
                    ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                    ->where('document_items.product_id', $pr->id)
                    ->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime(Input::get('new_from'))))
                    ->where('document_date', '<', date('Y-m-d 23:59:59', strtotime(Input::get('new_to'))));

                if (!empty($warehouse_id) && $warehouse_id > 0)
                    $products[$i]->price_retail_1->where('warehouse_id', $warehouse_id);

                $products[$i]->price_retail_1 = (float)$products[$i]->price_retail_1->avg('price');

                //$products[$i]->price_retail_1 =	number_format(round($products[$i]->price_retail_1),0,'.',',');

                $active_temp = Document::where('type', 'narachka')
                    ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                    ->where('document_items.product_id', $pr->id)
                    ->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime(Input::get('new_from'))))
                    ->where('document_date', '<', date('Y-m-d 23:59:59', strtotime(Input::get('new_to'))));

                if (!empty($warehouse_id) && $warehouse_id > 0)
                    $active_temp->where('warehouse_id', $warehouse_id);

                $products[$i]->active = (float)$active_temp->sum('sum_vat');

                //$products[$i]->active = number_format(round($products[$i]->active),0,'.',',');
                $temp = Document::where('type', 'priemnica')->where('status', 'generirana')
                    ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                    ->where('document_items.product_id', $pr->id)
                    ->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime(Input::get('new_from'))))
                    ->where('document_date', '<', date('Y-m-d 23:59:59', strtotime(Input::get('new_to'))));

                if (!empty($warehouse_id) && $warehouse_id > 0)
                    $temp->where('warehouse_id', $warehouse_id);

                $temp = $temp->avg('price');

                $products[$i]->nabaveni = (float)$temp;

                $nabaveni_temp = WarehouseProduct::where("product_id", $pr->id)
                    ->where(
                        function ($query) {
                            return $query
                                ->where("document_type", Document::TYPE_PRIEMNICA)
                                ->orWhere("document_type", Document::TYPE_VLEZ)
                                ->orWhere("document_type", Document::TYPE_POVRATNICA);
                        }
                    );

                if (!empty($warehouse_id) && $warehouse_id > 0)
                    $nabaveni_temp->where('warehouse_id', $warehouse_id);

                $products[$i]->nabaveni_sum = (float) $nabaveni_temp->sum('quantity');

                $products[$i]->dostava_sum = (float)0;
            } else {
                $unset_array[] = $i;
            }

            $i++;
        }
        foreach ($unset_array as $key => $value) {
            unset($products[$value]);
        }
        $datatable = Datatables::of($products);
        return $datatable->removeColumn('id')->make(true);
    }

    /**
     * DataTable call for document list
     *
     * @param $documentType
     * @return mixed
     */
    public function ordersReport(Request $req)
    {

        $documentType = 'narachka';
        $documentStatus_input       = $req->get('status');
        $paidstatus_input   = $req->get('paidstatus');
        $paidstatusselected_input   = $req->get('paidstatusselected');
        $warehouse_input    = $req->get('warehouse');
        $products_input     = $req->get('products');
        $new_from           = $req->get('new_from');
        $new_to             = $req->get('new_to');

        // Get all documents with passed type
        $documents = Document::where('documents.type', $documentType);


        if (!empty($new_from) && !empty($new_to)) {
            $new_from = date('Y-m-d 00:00:00', strtotime($new_from));
            $new_to = date('Y-m-d 23:59:58', strtotime($new_to));
            $documents->where('document_date', '>=', $new_from)->where('document_date', '<=', $new_to);
        }

        $doc_bkp = $documents;

        $docuemnt_dates = $documents->lists('document_date')->groupBy('document_date')->toArray();
        $docuemnt_dates = array_unique(end($docuemnt_dates));


        $doc_dates_wherein = [];
        foreach ($docuemnt_dates as $key => $value) {
            $doc_dates_wherein[date('Y-m-d', strtotime($value))] = date('Y-m-d', strtotime($value));
        }

        $documents->where('type', 'narachka');

        if ($documentType === Document::TYPE_NARACHKA) {
            $selectArray[] = 'id';
            $selectArray[] = 'status as datum';
            $selectArray[] = 'status as total_price';
            $selectArray[] = 'status as all_count';
            $selectArray[] = 'status as suma';
            $selectArray[] = 'status as procent_dostaveni';
        }

        $documents->select($selectArray);
        $documents = $documents->get()->take(count($doc_dates_wherein));
        $i = 0;
        $documents_dt = $documents;

        // COUNT TOTAL VARIABLES
        $totalPrice_count = 0;
        $totalPricePaid_count = 0;
        $all_count = 0;
        $procent_all_count = 0;
        $procent_all_count_total_full = 0;
        $procent_dostaveni_count = 0;
        // END COUNT TOTAL VARIABLES

        foreach ($doc_dates_wherein as $doc_date) {

            $documents_dt[$i]->datum = date('d.m.Y', strtotime($doc_date));

            $document_ids_for_period =  Document::where('type', 'narachka')->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime($doc_date)))->where('document_date', '<', date('Y-m-d 23:59:59', strtotime($doc_date)));

            $document_ids_for_period_paid =  Document::where('type', 'narachka')->where('document_date', '>=', date('Y-m-d 00:00:00', strtotime($doc_date)))->where('document_date', '<', date('Y-m-d 23:59:59', strtotime($doc_date)))->where('paid', 'platena');
            $procent_all_count = $document_ids_for_period->count();
            $procent_all_count_total_full = $procent_all_count_total_full + $procent_all_count;

            if (!empty($paidstatus_input)) {
                $document_ids_for_period = $document_ids_for_period->where('paid', $paidstatus_input);
                $document_ids_for_period_paid = $document_ids_for_period_paid->where('paid', $paidstatus_input);
            }

            if (!empty($documentStatus_input)) {
                $document_ids_for_period = $document_ids_for_period->where('status', $documentStatus_input);
                $document_ids_for_period_paid = $document_ids_for_period_paid->where('status', $documentStatus_input);
            }

            if (!empty($paidstatusselected_input)) {

                $document_ids_for_period = $document_ids_for_period->where('payment', $paidstatusselected_input);
                $document_ids_for_period_paid = $document_ids_for_period_paid->where('payment', $paidstatusselected_input);
            }


            $documents_dt[$i]->all_count = $document_ids_for_period->count();

            $all_count = $all_count + $documents_dt[$i]->all_count;

            $document_ids_for_period = $document_ids_for_period->pluck('id')->toArray();
            $document_ids_for_period_paid = $document_ids_for_period_paid->pluck('id')->toArray();

            $documents_dt[$i]->total_price = DocumentItems::whereIn('document_id', $document_ids_for_period)->sum('sum_vat');
            $totalPrice_count = $totalPrice_count + $documents_dt[$i]->total_price;
            $documents_dt[$i]->total_price = number_format($documents_dt[$i]->total_price, 2, '.', ',');
            $documents_dt[$i]->total_price_generirani = number_format($documents_dt[$i]->total_price_generirani, 2, '.', ',');

            $documents_dt[$i]->suma = DocumentItems::whereIn('document_id', $document_ids_for_period_paid)->sum('sum_vat');
            $totalPricePaid_count = $totalPricePaid_count + $documents_dt[$i]->suma;
            $documents_dt[$i]->suma = number_format($documents_dt[$i]->suma, 2, '.', ',');

            $documents_dt[$i]->procent_dostaveni = number_format((($documents_dt[$i]->all_count / $procent_all_count) * 100), 2, '.', ',');


            $i++;
        }








        // TOTAL ROW
        $nona = $documents_dt[$i - 1];
        $documents_dt[$i] = clone ($nona);
        $documents_dt[$i]->id = 'Вкупно';
        $documents_dt[$i]->datum = '<span style="font-weight:bold;">Вкупно</span>';

        $documents_dt[$i]->total_price = '<span style="font-weight:bold;">' . number_format($totalPrice_count, 2, '.', ',') . '</span>';

        $documents_dt[$i]->suma = '<span style="font-weight:bold;">' . number_format($totalPricePaid_count, 2, '.', ',') . '</span>';
        $documents_dt[$i]->all_count = '<span style="font-weight:bold;">' . $all_count . '</span>';
        $documents_dt[$i]->procent_dostaveni = '<span style="font-weight:bold;">' . number_format(($all_count / $procent_all_count_total_full) * 100, 2, '.', ',') . '</span>';
        // if (!is_null($req->get('generate_excel')) && !!$req->get('generate_excel')) {
        //     $file_name = 'reports_' . date('d_m_Y_h_i_s');
        //     Excel::create($file_name, function ($excel) use ($documents_dt) {

        //         $excel->sheet('sheet1', function ($sheet) use ($documents_dt) {

        //             $sheet->loadView('admin.report.excel.excel', $documents_dt);
        //         });
        //     })->download('xls');
        // }
        $dt = Datatables::of($documents_dt);
        $dt->editColumn('total_price', function ($row) {
            return $row->total_price . ' МКД';
        });
        $dt->editColumn('suma', function ($row) {
            return $row->suma . ' МКД';
        });
        $dt->editColumn('procent_dostaveni', function ($row) {
            return $row->procent_dostaveni . ' %';
        });
        $dt->removeColumn('id');

        return $dt->make();
    }


    /**
     * @param Request $request
     */
    public function getKDFIReport(Request $request)
    {
        $warehouses = Warehouse::where('prodavnica', 1)->get();
        return view('admin.report.kdfi', compact('warehouses'));
    }

    public function operatorStatistics()
    {
        $data['all_type_of_order_fields'] = config( 'clients.' . config( 'app.client') . '.type_of_order' . '.fields');
        $data['documentCreatedBy_select'] = Document::whereNotNull("documents.created_by")->join('users', 'documents.created_by', '=', 'users.id')->join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->select('users.*')->distinct()->get();
        return view('admin.report.naturatherapyshop.operator_statistics', $data);
    }

    public function operatorStatisticsDatatable(Request $request)
    {
        $createdBy      = $request->get('createdBy');
        $operatorType   = $request->get('operatorType');

        $operators = User::whereNotNull('operator_type')->with('documents')->leftJoin('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->distinct();

        $selectArray = [
            'users.id as id',
            'users.first_name as first_name',
            'users.last_name as last_name',
            'users.operator_type as operator_type',
            'users.first_name as broj_na_inban_narachki',
            'users.first_name as broj_na_outban_narachki',
            'users.first_name as broj_na_socialnetwork_narachki',
            'users.first_name as broj_na_narachki',
            'users.first_name as suma_inban_narachki',
            'users.first_name as suma_outban_narachki',
            'users.first_name as suma_socialnetwork_narachki',
            'users.first_name as suma_plateni_narachki',
            'users.first_name as isplata_vo_mkd',
        ];

        if (!is_null($operatorType) && $operatorType != "all") {
            $operators->where('operator_type', $operatorType);
        }

        // if (!is_null($createdBy) && $createdBy != "all") {
        //     $operators->where('id', (int)$createdBy);
        // }

        $operators->select($selectArray);
        $operators = $operators->get();

        if (!empty($request->get('from')) && !empty($request->get('to'))) {
            $from = date('Y-m-d 00:00:00', strtotime($request->get('from')));
            $to = date('Y-m-d 23:59:58', strtotime($request->get('to')));

            foreach ($operators as $operator) {
                if (count($operator->documents) > 0) {
                    foreach ($operator->documents as $key => $document) {
                        if ($document->document_date >= $from && $document->document_date <= $to) {
                            continue;
                        } else {
                            $operator->documents->forget($key);
                        }
                    }
                }
            }
        }

        foreach ($operators as $key => $operator) {
            if (count($operator->documents) == 0) {
                $operators->forget($key);
            }
        }

        $sumInBanOrders = Document::where(function ($query) use ($from, $to) {
            $query->where('type_of_order', 'Inbound')
                ->where('type', 'narachka')
                ->where('status', Document::STATUS_DOSTAVENA)
                ->where('paid', 'platena')
                ->where('document_date', '>=', $from)
                ->where('document_date', '<=', $to);
        })->join('document_items', 'documents.id', '=', 'document_items.document_id')->sum('sum_no_vat');

        $numberOfInBanOrders = Document::where(function ($query) use ($from, $to) {
            $query->where('type_of_order', 'Inbound')
                ->where('type', 'narachka')
                ->where('status', Document::STATUS_DOSTAVENA)
                ->where('paid', 'platena')
                ->where('document_date', '>=', $from)
                ->where('document_date', '<=', $to);
        })->count();

        $numberOfInBanReturnedOrders = Document::where(function ($query) use ($from, $to) {
            $query->where('type_of_order', 'Inbound')
                ->where('type', 'narachka')
                ->where('status', Document::STATUS_VRATENA)
                ->where('document_date', '>=', $from)
                ->where('document_date', '<=', $to);
        })->count();

        $finalSumInBanOrders = $sumInBanOrders - ($numberOfInBanOrders * 120) - ($numberOfInBanReturnedOrders * 120);

        $sumSocialNetworkOrders = Document::where(function ($query) use ($from, $to) {
            $query->where('type_of_order', 'Социјални Мрежи')
                ->where('type', 'narachka')
                ->where('status', Document::STATUS_DOSTAVENA)
                ->where('paid', 'platena')
                ->where('document_date', '>=', $from)
                ->where('document_date', '<=', $to);
        })->join('document_items', 'documents.id', '=', 'document_items.document_id')->sum('sum_no_vat');

        $numberOfSocialNetworkOrders = Document::where(function ($query) use ($from, $to) {
            $query->where('type_of_order', 'Социјални Мрежи')
                ->where('type', 'narachka')
                ->where('status', Document::STATUS_DOSTAVENA)
                ->where('paid', 'platena')
                ->where('document_date', '>=', $from)
                ->where('document_date', '<=', $to);
        })->count();

        $numberOfSocialNetworkReturnedOrders = Document::where(function ($query) use ($from, $to) {
            $query->where('type_of_order', 'Социјални Мрежи')
                ->where('type', 'narachka')
                ->where('status', Document::STATUS_VRATENA)
                ->where('document_date', '>=', $from)
                ->where('document_date', '<=', $to);
        })->count();

        $finalSumSocialNetworkOrders = $sumSocialNetworkOrders - ($numberOfSocialNetworkOrders * 120) - ($numberOfSocialNetworkReturnedOrders * 120);

        $inBanPercentForOperators = $finalSumInBanOrders * 0.02 / 5;
        $socialNetworkPercentForOperators = $finalSumSocialNetworkOrders * 0.025 / 2;

        $dt = Datatables::of($operators)
            ->filter(function ($operator) use ($request) {
                $search = $request->get('search')['value'];
                if ($search && $search !== '') {
                    $operator->where(function ($q) use ($search) {
                        $q->where('first_name', 'like', '%' . addslashes($search) . '%')
                            ->orWhere('last_name', 'like', '%' . addslashes($search) . '%')
                            ->orWhere('phone', 'like', '%' . addslashes($search) . '%');
                    });
                }
            });

        $dt->editColumn('first_name', function ($operator) {
            return '<div style="text-align:left;">' . $operator->first_name . " " . $operator->last_name . '</div>';
        });

        $dt->editColumn('operator_type', function ($operator) {
            if ($operator->operator_type == 'honorar') {
                return '<div style="text-align:left;">Хонорар</div>';
            } else if ($operator->operator_type == 'prijaven') {
                return '<div style="text-align:left;">Пријавен</div>';
            }
        });

        $dt->editColumn('broj_na_inban_narachki', function ($operator) {
            $numberOfInBanOrders = 0;
            foreach ($operator->documents as $document) {
                if ($document->type_of_order == 'Inbound') {
                    $numberOfInBanOrders++;
                }
            }
            return '<div style="text-align:left;">' . $numberOfInBanOrders . '</div>';
        });

        $dt->editColumn('broj_na_outban_narachki', function ($operator) {
            $numberOfOutBanOrders = 0;
            foreach ($operator->documents as $document) {
                if ($document->type_of_order == 'Outbound') {
                    $numberOfOutBanOrders++;
                }
            }
            return '<div style="text-align:left;">' . $numberOfOutBanOrders . '</div>';
        });

        $dt->editColumn('broj_na_socialnetwork_narachki', function ($operator) {
            $numberOfSocialNetworkOrders = 0;
            foreach ($operator->documents as $document) {
                if ($document->type_of_order == 'Социјални Мрежи') {
                    $numberOfSocialNetworkOrders++;
                }
            }
            return '<div style="text-align:left;">' . $numberOfSocialNetworkOrders . '</div>';
        });

        $dt->editColumn('broj_na_narachki', function ($operator) {
            return '<div style="text-align:left;">' . count($operator->documents) . '</div>';
        });

        $dt->editColumn('suma_inban_narachki', function ($operator) {
            $suma_inban_narachki = 0;
            $numberOfInBoundOrders = 0;

            if (count($operator->documents) > 0) {
                foreach ($operator->documents as $document) {
                    if ($document->type_of_order == 'Inbound') {
                        $numberOfInBoundOrders++;
                    }
                    foreach ($document->items as $item) {
                        if ($document->type_of_order == 'Inbound' && $document->status == Document::STATUS_DOSTAVENA) {
                            $suma_inban_narachki += $item->sum_no_vat;
                        }
                    }
                }
            }
            $suma_inban_narachki -= ($numberOfInBoundOrders * 120);
            $operator->suma_inban_narachki = number_format($suma_inban_narachki, 0, ',', '.');
            return '<div style="text-align:left;">' . $operator->suma_inban_narachki . ' МКД. </div>';
        });

        $dt->editColumn('suma_outban_narachki', function ($operator) {
            $suma_outban_narachki = 0;
            $numberOfOutBoundOrders = 0;

            if (count($operator->documents) > 0) {
                foreach ($operator->documents as $document) {
                    if ($document->type_of_order == 'Outbound') {
                        $numberOfOutBoundOrders++;
                    }
                    foreach ($document->items as $item) {
                        if ($document->type_of_order == 'Outbound' && $document->status == Document::STATUS_DOSTAVENA) {
                            $suma_outban_narachki += $item->sum_no_vat;
                        }
                    }
                }
            }
            $suma_outban_narachki -= ($numberOfOutBoundOrders * 120);
            $operator->suma_outban_narachki = number_format($suma_outban_narachki, 0, ',', '.');
            return '<div style="text-align:left;">' . $operator->suma_outban_narachki . ' МКД. </div>';
        });

        $dt->editColumn('suma_socialnetwork_narachki', function ($operator) {
            $suma_socialnetwork_narachki = 0;
            $numberOfSocialNetworkOrders = 0;
            if (count($operator->documents) > 0) {
                foreach ($operator->documents as $document) {
                    if ($document->type_of_order == 'Социјални Мрежи') {
                        $numberOfSocialNetworkOrders++;
                    }
                    foreach ($document->items as $item) {
                        if ($document->type_of_order == 'Социјални Мрежи' && $document->status == Document::STATUS_DOSTAVENA) {
                            $suma_socialnetwork_narachki += $item->sum_no_vat;
                        }
                    }
                }
            }
            $suma_socialnetwork_narachki -= ($numberOfSocialNetworkOrders * 120);
            $operator->suma_socialnetwork_narachki = number_format($suma_socialnetwork_narachki, 0, ',', '.');
            return '<div style="text-align:left;">' . $operator->suma_socialnetwork_narachki . ' МКД. </div>';
        });

        $dt->editColumn('suma_plateni_narachki', function ($operator) {
            $suma_plateni_narachki = 0;
            $numberOfOrders = 0;
            if (count($operator->documents) > 0) {
                foreach ($operator->documents as $document) {
                    if ($document->type_of_order == 'Социјални Мрежи' || $document->type_of_order == 'Inbound' || $document->type_of_order == 'Outbound') {
                        $numberOfOrders++;
                    }
                    foreach ($document->items as $item) {
                        if (($document->type_of_order == 'Социјални Мрежи' || $document->type_of_order == 'Inbound' || $document->type_of_order == 'Outbound') && $document->status == Document::STATUS_DOSTAVENA) {
                            $suma_plateni_narachki += $item->sum_no_vat;
                        }
                    }
                }
            }
            // $suma_plateni_narachki -= ($numberOfOrders * 120);
            $suma_plateni_narachki -= (count($operator->documents) * 120);
            $operator->suma_plateni_narachki = number_format($suma_plateni_narachki, 0, ',', '.');
            return '<div style="text-align:left;">' . $operator->suma_plateni_narachki . ' МКД. </div>';
        });

        $dt->editColumn('isplata_vo_mkd', function ($operator) use ($inBanPercentForOperators, $socialNetworkPercentForOperators) {
            $suma_plateni_narachki = 0;
            $suma_plateni_narachki_outBan = 0;
            $isplata = 0;

            switch ($operator->operator_type) {
                case 'honorar':
                    if (count($operator->documents) > 0) {
                        foreach ($operator->documents as $document) {
                            foreach ($document->items as $item) {
                                if ($document->status == Document::STATUS_DOSTAVENA) {
                                    $suma_plateni_narachki += $item->sum_no_vat;
                                }
                            }
                        }
                    }
                    $suma_plateni_narachki -= (count($operator->documents) * 120);
                    $isplata = $suma_plateni_narachki * 0.15;
                    break;
                case 'prijaven':
                    $hasInBound = false;
                    $hasSocialNetwork = false;
                    if (count($operator->documents) > 0) {
                        foreach ($operator->documents as $document) {
                            if ($document->type_of_order == 'Outbound') {
                                foreach ($document->items as $item) {
                                    if ($document->status == Document::STATUS_DOSTAVENA) {
                                        $suma_plateni_narachki_outBan += $item->sum_no_vat;
                                    }
                                }
                            } else if ($document->type_of_order == 'Inbound') {
                                $hasInBound = true;
                            } else if ($document->type_of_order == 'Социјални мрежи') {
                                $hasSocialNetwork = true;
                            }
                        }
                    }

                    $suma_plateni_narachki_outBan -= (count($operator->documents) * 120);

                    if ((int)$suma_plateni_narachki_outBan > 90000 && (int)$suma_plateni_narachki_outBan < 200000) {
                        $isplata = $suma_plateni_narachki_outBan * 0.05;
                    } else if ((int)$suma_plateni_narachki_outBan > 200000) {
                        $isplata = $suma_plateni_narachki_outBan * 0.075;
                    }

                    if ($hasInBound) {
                        $isplata += $inBanPercentForOperators;
                    }

                    if ($hasSocialNetwork) {
                        $isplata += $socialNetworkPercentForOperators;
                    }

                    break;
            }

            $operator->isplata_vo_mkd = number_format($isplata, 0, ',', '.');
            return '<div style="text-align:left;">' . $operator->isplata_vo_mkd . ' МКД. </div>';
        });

        $dt->removeColumn('last_name');
        $dt->removeColumn('document_date');
        $dt->removeColumn('documents');
        $dt->removeColumn('id');

        return $dt->make();
    }
}
