<?php

namespace EasyShop\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\CategoryService;
use EasyShop\Services\ProductService;
use DB;
use Datatables;
use EasyShop\Models\Product;
use EasyShop\Models\Document;
use EasyShop\Models\Warehouse;

class ProdazbaController extends Controller
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

    public function __construct(ArticleRepositoryInterface $articleRepository,
                                CategoryRepositoryInterface $categoryRepository,
                                CategoryService $categoryService,
                                ProductService $productService)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->productService = $productService;

    }

    /**
     * Report za prodazba na artikli vo period
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function prodazbaPoArtikli()
    {
        $warehouses = Warehouse::all();
        return view('admin.report.prodazba.artikli', compact('warehouses'));
    }

    /**
     * @param Request $request
     */
    public function prodazbaPoArtikliDatatable(Request $request)
    {
        $fromDate = date('Y-m-d 00:00:00', strtotime($request->input('from_date')));
        $toDate = date('Y-m-d 23:59:59', strtotime($request->input('to_date')));
        $warehouseId = $request->input('warehouse_id');

        $select_array = array('products.id', 'products.unit_code', 'products.title as product_title');

        $select_array[] = 'price_retail_1 as broj_proizvodi';
        $select_array[] = 'price_retail_1 as sredna_prodazna';

//        $select_array[] = 'products.active as vkupno_prodadeno';
        $select_array[] = 'products.price_nabavna';


        $products = Product::select($select_array)
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id');

        $products = $products->distinct('id')->get();
        $i = 0;
        $unset_array = [];

        foreach ($products as $product) {

            // Vkupen broj na proizvodi
            $vkupenBrojNaProizvodi = Document::where('type', 'narachka')
                ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                ->where('document_items.product_id', $product->id)
                ->where('document_date', '>=', $fromDate)
                ->where('document_date', '<=', $toDate);

            if (!empty($warehouseId) && $warehouseId > 0) {
                $vkupenBrojNaProizvodi->where('warehouse_id', $warehouseId);
            }

            $vkupenBrojNaProizvodi = $vkupenBrojNaProizvodi->sum('quantity');
            $products[$i]->broj_proizvodi = (int)$vkupenBrojNaProizvodi;

            if ($products[$i]->broj_proizvodi > 0) {

                // Sredna prodazna cena
                $products[$i]->sredna_prodazna = Document::where('type', 'narachka')
                    ->join('document_items', 'document_items.document_id', '=', 'documents.id')
                    ->where('document_items.product_id', $product->id)
                    ->where('document_date', '>=', $fromDate)
                    ->where('document_date', '<=', $toDate);

                if (!empty($warehouseId) && $warehouseId > 0) {
                    $products[$i]->sredna_prodazna->where('warehouse_id', $warehouseId);
                }

                $products[$i]->sredna_prodazna = $products[$i]->sredna_prodazna->avg('price');
                $products[$i]->sredna_prodazna = number_format(round($products[$i]->sredna_prodazna), 2, '.', '');

            } else {
                $unset_array[] = $i;
            }

            $i++;
        }
        foreach ($unset_array as $key => $value) {
            unset($products[$value]);
        }
        $datatable = Datatables::of($products)
            ->removeColumn('id');

        return $datatable->make();
    }
}
