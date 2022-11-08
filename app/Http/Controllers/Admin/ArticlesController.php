<?php

namespace EasyShop\Http\Controllers\Admin;

use Carbon\Carbon;
use EasyShop\Http\Requests\AdminArticleRequest;
use EasyShop\Models\Country;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\Importer;
use EasyShop\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Category;
use EasyShop\Models\Product;
use EasyShop\Models\Manufacturers;
use EasyShop\Models\Variations;
use EasyShop\Models\ProductOptionsPackage;
use EasyShop\Models\ProductVariations;
use EasyShop\Models\PriceHistory;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Warehouse;
use EasyShop\Models\ProductImages;
use EasyShop\Models\ProductAttributes;
use EasyShop\Models\WarehouseProduct;
use EasyShop\Models\VariationQuantity;
use EasyShop\Models\Discount;
use EasyShop\Models\Wishlist;
use EasyShop\Models\Settings;
use Easyshop\Models\ProductOptionValue;
use EasyShop\Events\ProductDeleteEvent;
use Event;
use DateTime;
use Config;
use File;
use URL;
use Image;
use DB;
use View;
use Excel;
use Response;
use Storage;
use Validator;

use Datatables;
use EasyShop\AvailableProductDesign;
use EasyShop\BundleProduct;
use EasyShop\Services\CategoryService;
use EasyShop\Services\PageService;
use EasyShop\Services\ProductService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Helpers\ArticleHelper;
use EasyShop\Models\Sticker;
use Ixudra\Curl\Facades\Curl;

class ArticlesController extends Controller
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

    /**
     * @var $pageService
     */
    protected $pageService;

    /**
     * @var
     */
    protected $imageService;

    /**
     * @param ArticleRepositoryInterface $articleRepository
     * @param CategoryRepositoryInterface $categoryRepository
     * @param $categoryService
     * @param $productService
     * @param $pageService
     * @param ImageService $imageService
     *
     */
    public function __construct(
        ArticleRepositoryInterface $articleRepository,
        CategoryRepositoryInterface $categoryRepository,
        CategoryService $categoryService,
        ProductService $productService,
        PageService $pageService,
        ImageService $imageService
    ) {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->pageService = $pageService;
        $this->imageService = $imageService;
    }

    /**
     * Show list of articles
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $pageData = $this->pageService->getArticleListPageData();
        $categires_html = $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), [], $start = 0, $parentsDisabled = false);
        $stickers = Sticker::whereNotNull('name')->get();
        return view('admin.articles.index', compact('pageData', 'breadcrumbs', 'categires_html', 'stickers'));
    }

    /**
     * Show the view for add/edit article
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id = NULL)
    {
        if (!auth()->user()->canDo('katalog_manage_articles')) {
            return redirect()->back();
        }

        $pageData = $this->pageService->getArticleEditPageData();

        $data['pageData'] = $pageData;
        $data['product'] = new Product();
        $data['product']->new_from = date('Y-m-d');
        $data['product']->new_to = date('Y-m-d', strtotime("+30 days"));
        $data['product']->visits = 0;
        // $data['product']->minimum_stock = 0;
        $data['product']->warranty_months = 0;
        $data['product']->sell_on_web = 1;
        $data['product']->show_on_web = 1;
        $data['product']->discount = '';
        $data['product_id'] = 0;
        $data['selected_variations'] = [];
        $data['categories'] = $this->categoryService->loadCategoryTreeData();

        // Get from config if the manufacturers need to be shown
        $data['showManufacturer'] = \EasyShop\Models\AdminSettings::getField('showManufacturer');
        if ($data['showManufacturer']) {
            $data['manufacturers'] = Manufacturers::all();
        }

        // Get from config if the importers need to be shown
        $data['shopImporter'] = \EasyShop\Models\AdminSettings::getField('shopImporter');
        if ($data['shopImporter']) {
            $data['importers'] = Importer::all();
        }

        // Get from config if the importers need to be shown
        $data['showZemjaNaPoteklo'] = \EasyShop\Models\AdminSettings::getField('showZemjaNaPoteklo');
        if ($data['showZemjaNaPoteklo']) {
            $data['countries'] = Country::all();
        }

        // Get from config if the variations need to be shown
        $data['showVariation'] = \EasyShop\Models\AdminSettings::getField('showVariations');
        if ($data['showVariation']) {
            $data['variations'] = Variations::all()->groupBy('name');
            if (!is_null($id)) {
                $selected_variations = ProductVariations::where('product_id', $id)->get();
                foreach ($selected_variations as $key => $value) {
                    $data['selected_variations'][] = $value->variation_id;
                }
            } else {
                $data['selected_variations'] = [];
            }
        }

        // Get order number for new product
        if (\EasyShop\Models\AdminSettings::getField('defaultRecommeded')) {
            $productsNumber = count(Product::all());
            $data['orderNumber'] = $productsNumber + 1;
        }

        // Check if it is new or edit product
        if (!is_null($id)) {
            $data['product'] = $this->articleRepository->getById($id);
            $data['orderNumber'] = null;
            $discount = Discount::where('product_id', $id)->where('end', '2111-12-31  23:59:58')->first();

            if (!empty($discount)) {
                $data['product']->discount = $data['product']->price_retail_1 - $discount->value;
            }

            if (is_null($data['product'])) {
                return redirect()->route('admin.articles')->withError('Артиклот не постои!');
            }
            $data['product_id'] = $id;
        }

        // Get selected categories for existing product
        $selected_categories = [];
        if ($id) {
            $tmp = ProductCategory::where('product_id', $id)->select('category_id')->get();
            foreach ($tmp as $v) {
                $selected_categories[] = $v['category_id'];
            }
        }

        $data['parent'] = \EasyShop\Models\AdminSettings::getField('children');
        
        if($data['parent']) {
            $data['products'] = Product::all();
        }


        if (\EasyShop\Models\AdminSettings::isSetTrue('bundle', 'modules')) {
            if ($data['product']->bundle) {
                $bundleProducts = Product::join('bundle_products', 'products.id', '=', 'bundle_products.product_id')
                    ->where('bundle_products.bundle', $data['product']->id)
                    ->orderBy('bundle_products.created_at', 'asc')
                    ->select('products.*', 'bundle_products.quantity as quantity')->get();

                $data['bundleProductsSaved'] = $bundleProducts;
            }
            $data['bundleProducts'] = Product::whereNull('bundle')->orWhere('bundle', 0)->orderBy('title', 'asc')->get();
        }


        $languages = config( 'clients.' . config( 'app.client') . '.languages');

        
        $data['languages'] = $languages;

        //istorija na ceni
        if ($id) {
            $prices = PriceHistory::where('product_id', $id)->get();
            $data['prices_history'] = $prices;
        }

        $languages = config( 'clients.' . config( 'app.client') . '.languages');

        $data['languages'] = $languages;
        $data['galery_images'] = ProductImages::where('product_id', $id)->get();
        $data['categires_html'] = $this->categoryService->htmlOptionsFromArrayForArticles($data['categories'], $selected_categories);
        $data['stickers'] = Sticker::whereNotNull('name')->get();
        return view('admin.articles.article', $data);
    }

    /**
     * Upload files for the description
     *
     * @return array
     */
    public function uploadRedactor()
    {
        if (!File::isDirectory(public_path() . '/uploads/redactor_articles')) {
            File::makeDirectory(public_path() . '/uploads/redactor_articles', 0775);
        }

        if (!Input::hasFile('file')) {
            return Response::json(array('error' => 1), 400);
        }

        $file = Input::file('file');
        $destinationPath = 'uploads/redactor_articles';
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename);
        return array('success' => 1, 'url' => URL::to("$destinationPath") . '/' . $filename);
    }

    public function removeRedactor(Request $request)
    {
        $image = $request->get('src');
        list($a, $b) = explode('/uploads/', $image);
        $image = "uploads/" . $b;

        File::delete($image);
    }

    public function removeImage(Request $req)
    {
        $image_id = $req->get('image_id');
        if (!empty($image_id)) {
            //$pi = ProductImages::where('id',$image_id)->first();
            //\Storage::delete($pi->filename);
            $pi = ProductImages::where('id', $image_id)->delete();
            return Response::json(['success' => 1]);
        }

        return Response::json(['error' => 1, 'text' => 'Image not found']);
    }

    /**
     * Upload gallery images
     *
     * @return mixed
     */
    public function uploadGalleryImage()
    {
        $product_id = Input::get('product_id');
        if (!Input::hasFile('file')) {
            return Response::json([
                'error' => 1
            ], 400);
        }

        $file = Input::file('file');

        if (!File::isDirectory('uploads/products_temp_images')) {
            File::makeDirectory('uploads/products_temp_images', 0775);
        }
        $destinationTempPath = 'uploads/products_temp_images';
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = uniqid() . '.' . $extension;

        if (!empty($product_id)) {
            $destinationPath = 'uploads/products/' . $product_id;
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }
        }

        if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif', 'svg'))) {
            if (!empty($product_id)) {
                $this->productService->saveGalleryImages($file->getRealPath(), $filename, $product_id);
            }

            $product_image_id = 0;
            $uploadSuccess = $file->move($destinationTempPath, $filename);
            if ($uploadSuccess) {

                $response = [
                    'success' => 1,
                    'filename' => $filename,
                    'product_id' => $product_id
                ];

                if (!empty($product_id)) {


                    $pi = new ProductImages();
                    $pi->product_id = $product_id;
                    $pi->filename = $filename;
                    $pi->save();
                    $product_image_id = $pi->id;

                    // Prefix for large image
                    $response['filename'] = 'lg_' . $filename;
                }

                $response['product_image_id'] = $product_image_id;

                return response()->json($response);
            }
        }
    }

    /**
     * Store product
     *
     * @param AdminArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AdminArticleRequest $request)
    {
        $id = $request->input('product_id');

        if (empty($id)) {
            $product = new Product();
        } else {
            $product = Product::find($id);
            if (is_null($product)) {
                return redirect()->route('admin.articles');
            }
        }

        //***********************
        // GENERAL
        //***********************
        $article_title = $request->input('title');
        $article_title_lang2 = $request->input('title_lang2');
        $article_url = str_slug($request->input('url'));
        $article_url_lang2 = str_slug($request->input('url_lang2'));

        if ($product->title != $article_title)
            $product->title = $request->input('title');

        if ($product->url != $article_url)
            $product->url = str_slug(Input::get('url'));

        $product->title_lang2 = $article_title_lang2;
        $product->url_lang2 = $article_url_lang2;

        $product->google_product_category = $request->input('google_product_category');
        if($request->input('unit_code') != null || $request->input('unit_code') != ""){
            $product->unit_code = $request->input('unit_code');
        }
        $product->sku = $request->has('sku') ? $request->input('sku') : null;
        $product->package = $request->has('package') ? $request->input('package') : null;
        $product->type = $request->input('type');
        $product->short_description = $request->input('short_description');
        $product->short_description_lang2 = $request->input('short_description_lang2');

        if (config( 'app.client') == 'kopkompani') {
            $product->location = (int)$request->input('short_description');
        }

        $product->description = $request->input('description');
        $product->description_lang2 = $request->input('description_lang2');
        // $product->minimum_stock = $request->input('minimum_stock');
        $product->warranty_months = $request->input('warranty_months');
        $product->vat = $request->input('vat');
        $product->minimum_stock_alert = !is_null($request->input('minimum_stock_alert')) ? $request->input('minimum_stock_alert') : 0;
        $product->manufacturer_id = strlen($request->input('manufacturer')) ? $request->input('manufacturer') : NULL;
        $product->importer_id = strlen($request->input('importer')) ? $request->input('importer') : NULL;
        $product->zemja_poteklo = strlen($request->input('zemja_poteklo')) ? $request->input('zemja_poteklo') : NULL;
        $product->daily_promotion = strlen($request->input('daily_promotion')) ? date('Y-m-d', strtotime($request->input('daily_promotion'))) : NULL;
        $product->visits = $request->input('visits');
        if ($request->has('sticker')) {
            $product->sticker_id = !!$request->has('sticker') ? $request->input('sticker') : null;
        }

        // If client has recommendedSort enabled
        if (\EasyShop\Models\AdminSettings::getField('defaultRecommeded')) {
            $product->order = $request->has('orderNumber') ? $request->input('orderNumber') : 1;
            if (empty($id)) {
                ArticleHelper::changePositionOnCreate($product->id, $product->order);
                $product->save();
            } else {
                ArticleHelper::changePositionOnUpdate($product->id, $product->order);
                $product->save();
            }
        }

        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {

            if ($request->file('pdf_document')) {
                if (!File::isDirectory(public_path() . '/uploads/products/' . $product->id)) {
                    File::makeDirectory(public_path() . '/uploads/products/' . $product->id, 0775);
                }

                $upload = $request->file('pdf_document');
                $destination = public_path() . '/uploads/products/' . $product->id;                
                
                $upload->move($destination, "pdf" . "." . $request->file('pdf_document')->getClientOriginalExtension());
            }
        }
        // Format date for database
        $new_from = $request->input('new_from');
        $new_to = $request->input('new_to');
        $product->new_from = date('Y-m-d H:i:s', strtotime($new_from));
        $product->new_to = date('Y-m-d H:i:s', strtotime($new_to));

        // Parent Product
        if ($request->has('parent_product')) {
            $product->parent_product = $request->input('parent_product');
        } else {
            $product->parent_product =  NULL;
        }

        if (\EasyShop\Models\AdminSettings::isSetTrue('bundle', 'modules')) {

            if ($request->input('bundle')) {
                $product->bundle = $request->input('bundle');
                $product->bundle_products_number = $request->input('bundle_products_number');
                $product->bundle_price_type = $request->input('bundle_price_type');
                $product->vat = 0;
                $product->total_stock = 1000;
            }
        }

        // Best before 
        $best_before = $request->input('best_before');
        $product->best_before = date('Y-m-d H:i:s', strtotime($best_before));
        // Flags
        $product->active = $request->input('active', 0);
        if (config( 'app.client') == 'torti') {
            $product->custom = $request->input('custom', 0);
        }
        $product->is_exclusive = $request->input('is_exclusive', 0);
        $product->is_best_seller = $request->input('is_best_seller', 0);
        $product->physical_buy_only = $request->input('physical_buy_only', 0);
        $product->is_recommended = $request->input('is_recommended', 0);
        $product->show_on_web = $request->input('show_on_web', 0);
        $product->sell_on_web = $request->input('sell_on_web', 0);
        $product->sold_out = $request->input('sold_out', 0);

        //*****************
        // Meta Information
        //*****************
        $product->meta_title = Input::get('meta_title');
        $product->meta_keywords = Input::get('meta_keywords');
        $product->meta_description = Input::get('meta_description');
        $product->meta_title_lang2 = Input::get('meta_title_lang2');
        $product->meta_description_lang2 = Input::get('meta_description_lang2');
        //**********
        // Prices
        //**********

        $product->save();

        //add price to history table

        if ($product->price_retail_1 != $request->input('price_retail_1')) {

            $price_history = new PriceHistory();
            $price_history->product_id = $product->id;
            $price_history->price = $request->input('price_retail_1');

            $price_history->save();
        }




        $product->price_retail_1 = $request->input('price_retail_1', 0);
        $product->price_retail_2 = $request->input('price_retail_2', 0);
        $product->price_wholesale_1 = $request->input('price_wholesale_1', 0);
        $product->price_wholesale_2 = $request->input('price_wholesale_2', 0);
        $product->price_wholesale_3 = $request->input('price_wholesale_3', 0);
        $product->price_diners_24 = $request->input('price_diners_24', 0);
        $product->price_nlb_24 = $request->input('price_nlb_24', 0);

        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
            $product->points = $request->input('points', 0);
        }
        
        $product->save();



        if (!$request->has('unit_code')) {
            $product->unit_code = sprintf('%06d', $product->id);
            $product->save();
        }

        if ($request->has('variation')) {
            $variation_count = 0;
            $variations = $request->input('variation');
            ProductVariations::where('product_id', $product->id)->delete();
            foreach ($variations as $val) {
                $pc = new ProductVariations();
                $pc->variation_id = $val;
                $pc->product_id = $product->id;
                $pc->save();
                $variation_count = $variation_count + 1;
            }
            if ($variation_count > 0) {
                $product->has_variations = 1;
                $product->save();
            }
        }

        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $this->categoryRepository->deleteForProduct($product->id);
            // $firstCategoryStickerId = null;
            // foreach ($categories as $val) {
            //     $category = Category::find($val);
            //     if (isset($category->sticker_id) && !is_null($category->sticker_id)) {
            //         $firstCategoryStickerId = $category->sticker_id;
            //         break;
            //     }
            // }

            // if(!is_null($firstCategoryStickerId)) {
            //     $product->sticker_id = $firstCategoryStickerId;
            // }
            foreach ($categories as $val) {
                $pc = new ProductCategory();
                $pc->category_id = $val;
                $pc->product_id = $product->id;
                $pc->save();
            }
        } else {
            $this->categoryRepository->deleteForProduct($product->id);
        }

        // Insert Filters
        if ($request->has('filter')) {
            $filters = $request->input('filter');

            foreach ($filters as $key => $fil) {

                ProductAttributes::where('product_id', '=', $product->id)->where('filter_id', $key)->delete();

                if (is_array($fil)) {
                    foreach ($fil as $mf) {
                        $pa = new ProductAttributes();
                        $pa->filter_id = $key;
                        $pa->filter_att_id = $mf;
                        $pa->product_id = $product->id;
                        $pa->save();
                    }
                } else {
                    $pa = new ProductAttributes();
                    $pa->filter_id = $key;
                    $pa->filter_att_id = $fil;
                    $pa->product_id = $product->id;
                    $pa->save();
                }
            }
        } else {
            ProductAttributes::where('product_id', $product->id)->delete();
        }
        /*=====================*/
        /*      Images         */
        /*=====================*/
        // TODO: move this in separate function
        if (!File::isDirectory(public_path() . '/uploads/products/' . $product->id)) {
            File::makeDirectory(public_path() . '/uploads/products/' . $product->id, 0775);
        }

        // galery images
        $galery_images = array();
        if (Input::has('galery')) {
            $galery_images = Input::get('galery');
        }

        foreach ($galery_images as $key => $value) {

            if (is_numeric($key)) {
                $pi = ProductImages::where('id', $key)->first();
                $pi->label = $value['label'];
                $pi->product_id = $product->id;
                $pi->sort_order = $value['sort_order'];
                $pi->save();
            } else {
                foreach ($value as $key => $v) {

                    $oldfile = public_path() . '/uploads/products_temp_images/' . $key;
                    $filePartList = explode('.', $oldfile);
                    $filename = uniqid() . '.' . end($filePartList);

                    $this->productService->saveGalleryImages($oldfile, $filename, $product->id);

                    @unlink($oldfile);

                    $pi = new ProductImages();
                    $pi->filename = $filename;
                    $pi->label = $v['label'];
                    $pi->sort_order = $v['sort_order'];
                    $pi->product_id = $product->id;
                    $pi->save();
                }
            }
        }

        // Upload image
        $file = $request->file('image');

        if (!empty($file)) {
            $data = $this->productService->saveMainImage($file, $product->id);
            $product->image = $data['filename'];
            $product->save();
        }

        $popust_field = $request->get('discount');
        if ($popust_field) {
            $popust_field = (float) $popust_field;
            \Log::info('discount for ' . $product->id . ' is ' . $popust_field);
            $disc = Discount::where('product_id', $product->id)->where('end', '2111-12-31  23:59:58')->first();
            if (!$disc) {
                $disc = new Discount();
            }

            Discount::where("product_id", $product->id)->delete();

            $disc->product_id = $product->id;
            $disc->type = 'fixed';
            $disc->value = (float) $product->price_retail_1 - $popust_field;
            $disc->name = 'Попуст';


            $disc->start = Carbon::now()->setTimezone('UTC')->format('Y-m-d');

            $date = new DateTime(date('2111-12-31'));
            $disc->end = $date->format('2111-12-31');

            $disc->price_retail_1    = 1;
            $disc->price_retail_2    = 0;
            $disc->price_wholesale_1 = 0;
            $disc->price_wholesale_2 = 0;
            $disc->price_wholesale_3 = 0;

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

            $product->discount = json_encode($json_array);
            $product->discount_type  = $disc->type;
            $product->discount_value = $disc->value;
            $product->final_price_retail_1 = $product->price_retail_1 - $product->discount_value;
            $product->save();
        } else {
            Discount::where('product_id', $product->id)->where('end', date('2111-12-31 00:00:00'))->delete();
            $product->discount  = NULL;
            $product->discount_type  = NULL;
            $product->discount_value = NULL;
            $product->final_price_retail_1 = $product->price_retail_1;
            $product->save();
        }

        if ($request->has('zacuvaj_editiraj')) {
            return redirect('admin/articles/show/' . $product->id);
        }

        return redirect()->route('admin.articles');
    }

    /**
     * @param null $id
     */
    public function getDelete($id = NULL)
    {
        $product = Product::find($id);
        $product->unit_code = uniqid();
        $product->save();
        if (\EasyShop\Models\AdminSettings::getField('defaultRecommeded')) {
            ArticleHelper::changePositionOnDelete($product);
        }

        event(new ProductDeleteEvent($product));

        $product->delete();
        return redirect()->route('admin.articles')->withSuccess('Успешно избришан производ.');
    }


    /**
     * @return mixed
     */
    public function getProductsDatatable()
    {
        $my_user_global = \Auth::user();
        $global_price = \EasyShop\Models\AdminSettings::getField('prices');
        
        $kupon        = \EasyShop\Models\AdminSettings::isSetTrue('coupons', 'modules');
        $promocija    = \EasyShop\Models\AdminSettings::getField('promotion');


        $in_stock_filter = Input::get('inStock');
        $category = Input::get('category');
        $sifra    = \EasyShop\Models\AdminSettings::getField('sifra');
        $select_array = array('products.id');
        if ($sifra)
            $select_array[] = 'unit_code';
        $select_array[] = 'products.title as nona';
        if (config( 'app.client') == 'kopkompani') {
            $select_array[] = 'products.location';
        }
        $select_array[] = 'products.title as categories';
        $select_array[] = 'price_retail_1';
        // $select_array[] = 'price_retail_2';
        // $select_array[] = 'price_wholesale_1';
        // $select_array[] = 'price_wholesale_2';
        // $select_array[] = 'price_wholesale_3';
        // $select_array[] = 'price_diners_24';
        // $select_array[] = 'price_nlb_24';

        $select_array[] = 'products.total_stock';
        $select_array[] = 'products.minimum_stock_alert';
        $select_array[] = 'products.active as active';
        $select_array[] = 'products.discount as discount';
        $select_array[] = 'products.discount_type as discount_type';
        $select_array[] = 'products.discount_value as discount_value';


        $date_today = date('Y-m-d H:i:s');
        if (\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules') && !empty($kupon))
            $select_array[] = 'products.short_description as count_coupon';
        if (\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules') && !empty($promocija)) 
            $select_array[] = 'products.short_description as count_discounts';

        $products = Product::query()->select($select_array)->distinct('id');
        // ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id');

        if ($in_stock_filter == 'near_end') {
            $products->whereColumn('products.total_stock', '<=', 'products.minimum_stock_alert');
        } else if ($in_stock_filter == 'no_stock') {
            $products->where('products.total_stock', '=', 0);
        } else if ($in_stock_filter == 'in_stock') {
            $products->where('products.total_stock', '>', 0);
        }

        // IF category is selected
        if ($category > 0) {
            $allCategories = $this->categoryRepository->getAll($orderBy = 'order');
            $categoryTree = Category::formatTree($allCategories, $category);
            $lastChildIds = $this->categoryService->getLastChildIds($categoryTree);

            $products->leftJoin('product_category', 'product_category.product_id', '=', 'products.id');
            $products->whereIn('product_category.category_id', array_merge($lastChildIds, [$category]));
        }

        $datatable = Datatables::of($products)
            ->editColumn('categories', '{!!$categories!!}')
            ->editColumn('price_retail_1', function ($product) {
                if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                    return '<span style="display:block; white-space: nowrap; text-align: right;"><span style="text-decoration: line-through; display:inline-block; color: red;">' . number_format($product->price_retail_1, 2, ',', '.') . '</span>' .
                        '<span style="display:inline-block; margin-left: 5px;">' . Product::getPriceRetail1($product, true, 2) . '</span></span>';
                } else {
                    return '<span style="display:block; text-align: right;">' . number_format($product->price_retail_1, 2, '.', ',') . '</span>';
                }
            });
        if (\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules') && !empty($kupon))
            $datatable->editColumn('count_coupon', '<div class="text-center"><span class="label label-sm {{{ $count_coupon ? \'label-success\' : \'label-danger\' }}}"> {{{ $count_coupon ? \'Да\' : \'Не\' }}} </span></div>');
        if (\EasyShop\Models\AdminSettings::isSetTrue('promotionsMenu', 'modules') && !empty($promocija))
            $datatable->editColumn('count_discounts', '<div class="text-center"><span class="label label-sm {{{ $count_discounts ? \'label-success\' : \'label-danger\' }}}"> {{{ $count_discounts ? \'Да\' : \'Не\' }}} </span></div>');

        $datatable->editColumn('active', '<div class="text-center"><span class="label label-sm {{{ $active ? \'label-success\' : \'label-danger\' }}}"> {{{ $active ? \'Да\' : \'Не\' }}} </span></div>');

        $datatable->removeColumn('minimum_stock_alert');
        $datatable->editColumn('categories', function ($product) {
            $return_cat = '';
            $cat_tem = ProductCategory::where('product_id', $product->id)->join('categories', 'categories.id', '=', 'product_category.category_id')->get();
            foreach ($cat_tem as $key => $value) {
                $return_cat .= '<span class="label label-sm label-success" style="margin-right: 5px;">' . $value->title . '</span>';
            }
            return $return_cat;
        });

        $datatable->removeColumn('discount');
        $datatable->removeColumn('discount_type');
        $datatable->removeColumn('discount_value');

        if ($my_user_global->canDo('katalog_manage_articles')) {
            $datatable->editColumn('nona', function ($product) {
                if ($product->total_stock <= $product->minimum_stock_alert) {
                    return "<div style='white-space: nowrap; display:flex; align-items:center; justify-content:space-between;'>
                    <a href='/admin/articles/show/$product->id'>
                    $product->nona</a> <span class='label label-sm label-danger'>Залихата е при крај</span></div>";
                } else {
                    return "<div style='white-space: nowrap; display:flex; align-items:center; justify-content:space-between;'>
                    <a href='/admin/articles/show/$product->id'>$product->nona</a></div>";
                }
            });
        }

        if ($my_user_global->canDo('katalog_manage_articles')) {
            $datatable->addColumn('Action', function ($product) {
                return '<div class="text-center" style="white-space: nowrap;">
                <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                    href="/admin/articles/show/' . $product->id . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="margin-right-10 tooltips" data-article-delete data-id="' . $product->id . '" data-container="body" data-placement="top" data-original-title="Избриши">
                    <i class="fa fa-trash-o"></i>
                </a>
                <a target="_blank" class="tooltips" data-container="body" data-placement="top" data-original-title="Копирај производ"
                    href="/admin/articles/clone/' . $product->id . '">
                    <i class="fa fa-plus"></i>
                </a>
                </div>
                ';
            });
        } else {
            $datatable->addColumn('Action', '');
        }
        return $datatable->make();
    }


    /**
     * Lager lista
     */
    public function getInStock()
    {
        $pageData = [];
        $pageData['containerClass'] = 'container-fluid';

        $warehouses = Warehouse::orderBy('priority')->get();
        $products = Product::orderBy('title')->select('id', 'unit_code', 'title')->get();
        $manufacturers = Manufacturers::orderBy('name')->get();
        $categires_html = $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), [], $start = 0, $parentsDisabled = false);
        return view('admin.articles.instock', compact('warehouses', 'products', 'categires_html', 'manufacturers', 'pageData'));
    }

    /**
     * @param Request $request
     */
    public function printInStockPrices(Request $request)
    {
        $dimenzija = $request->input('dimenzija');
        $warehouseId = is_numeric($request->input('warehouse_id')) ? $request->input('warehouse_id') : null;
        $productIds = is_array($request->input('products_ids')) ? $request->input('products_ids') : null;
        $documentId = is_numeric($request->input('document_id')) ? $request->input('document_id') : null;
        $documentType = is_string($request->input('document_type')) ? $request->input('document_type') : null;
        $quantity = is_numeric($request->input('quantity')) ? $request->input('quantity') : 1;

        if (is_null($documentId) && is_null($documentType)) {

            if ($warehouseId) {
                $products = Product::join('product_warehouse', 'products.id', '=', 'product_warehouse.product_id')
                    ->leftJoin('countries', 'products.zemja_poteklo', '=', 'countries.id')
                    ->where('product_warehouse.warehouse_id', '=', $warehouseId);
            } else {
                $products = Product::leftJoin('countries', 'products.zemja_poteklo', '=', 'countries.id');
            }

            if (!is_null($productIds)) {
                $products = $products->whereIn('products.id', array_values($productIds));
            }
        } else {
            // Print from document IZLEZ
            if ($documentType === Document::TYPE_VLEZ) {
                $documentRelated = DocumentsRelated::where('vlez_id', '=', $documentId)->first();
                $documentIzlez = null;
                if (!is_null($documentRelated)) {
                    $documentIzlez = Document::find($documentRelated->izlez_id);
                }

                $documentItems = DocumentItems::where('document_id', '=', $documentIzlez->id)->select('product_id')->get();

                $documentItemsIds = [];
                foreach ($documentItems as $documentItem) {
                    array_push($documentItemsIds, $documentItem->product_id);
                }

                $products =  Product::leftJoin('countries', 'products.zemja_poteklo', '=', 'countries.id')
                    ->whereIn('products.id', $documentItemsIds);
            }
        }


        $products = $products->select(
            'products.id',
            'products.title',
            'products.unit_code',
            'products.warranty_months',
            'products.zemja_poteklo',
            'products.importer_id',
            'products.price_retail_1',
            'products.short_description',
            'countries.country_name as country'
        )
            ->distinct('products.id')
            ->get();




        foreach ($products as &$product) {
            $product->discount = Product::getPriceRetail1($product, false);
            $product->importer = $product->getImporter;
        }

        switch ($dimenzija) {
            case "dimenzija_1":
            case "dimenzija_3":
            case "dimenzija_4":
                $chunk = 2;
                if (count($products) > 2) {
                    $productsChunk = $products->chunk(2);
                } else {
                    $productsChunk = [$products];
                }
                break;
            case "dimenzija_2":
                $chunk = 5;
                if (count($products) > 5) {
                    $productsChunk = $products->chunk(5);
                } else {
                    $productsChunk = [$products];
                }
                break;
            default:
                $productsChunk = [$products];
                break;
        }

        return view('admin.documents.pdf.document-prices', compact('productsChunk', 'quantity', 'chunk'));

        //$pdf = \PDF::loadView('admin.documents.pdf.document-prices', compact('productsChunk'));
        //return @$pdf->stream();


    }

    /**
     * @return mixed
     */
    public function getInStockDatatable(Request $request)
    {

        $category_id    = $request->get('category');
        $zaliha         = $request->get('inStock');
        $manufacturer   = $request->get('manufacturer');
        $my_user_global = \Auth::user();

        $pc_ids         = [];

        if (!empty($category_id)) {
            $categories_ids = $this->fetchCategoryTree($category_id);
            $categories_ids[] = (int) $category_id;
            $pc_ids = ProductCategory::whereIn('category_id', $categories_ids)->pluck('product_id')->toArray();
        }

        if ($my_user_global->canDo('katalog_lager_lista_nabavni')) {
            if (empty($category_id) && empty($pc_ids)) {
                $select_array = ['products.id', 'products.unit_code', 'products.total_stock',  'products.title', 'products.price_retail_1', 'products.price_nabavna', 'products.has_variations'];
                if (config( 'app.client') == 'kopkompani') {
                    $select_array[] = 'products.location';
                } else {
                    $select_array[] = 'products.short_description';
                }
                $products = Product::select($select_array);
            } else {
                $select_array = ['products.id', 'products.unit_code', 'products.total_stock', 'products.title', 'products.price_retail_1', 'products.price_nabavna', 'products.has_variations'];
                if (config( 'app.client') == 'kopkompani') {
                    $select_array[] = 'products.location';
                } else {
                    $select_array[] = 'products.short_description';
                }
                $products = Product::select($select_array)->whereIn('id', $pc_ids);
            }
        } else {
            if (empty($category_id) && empty($pc_ids)) {
                $products = Product::select('products.id', 'products.unit_code', 'products.title', 'products.price_retail_1', 'products.has_variations');
            } else {
                $products = Product::select('products.id', 'products.unit_code', 'products.title', 'products.price_retail_1', 'products.has_variations')->whereIn('id', $pc_ids);
            }
        }


        if ($manufacturer) {
            $products = $products->where('manufacturer_id', '=', $manufacturer);
        }

        if (!empty($zaliha)) {
            switch ($zaliha) {
                case 'in_stock':
                    $products = $products->where('total_stock', '>', 0);
                    break;
                case 'no_stock':
                    $products = $products->where('total_stock', '<', 1);
                    break;
                case 'near_end':
                    $products = $products->whereColumn('total_stock', '<=', 'minimum_stock_alert');
                case 'custom_stock':
                    $stockFrom = $request->input('stock_from');
                    $stockTo = $request->input('stock_to');
                    $stockFrom = is_numeric($stockFrom) ? $stockFrom : 1;
                    $stockTo = is_numeric($stockTo) ? $stockTo : 1000;

                    $products = $products->where('total_stock', '>=', $stockFrom)->where('total_stock', '<=', $stockTo);
                    break;
            }
        }

        $products = $products->where('type', '=', 'product');

        $order_dt = $request->get('order');
        $order_column = $order_dt[0]["column"];

        if (config( 'app.client') == 'kopkompani') {
            $condition = ($order_column < 6);
        } else {
            $condition = ($order_column < 4);
        }

        if ($request->has('search')) {
            $word = $request->get('search');
            $word = $word['value'];
            if (!empty($word) && $condition)
                $products = $products->where('title', 'like', "%$word%")->orWhere('unit_code', 'like', "%$word%");
        }

        if ($request->has('order')) {
            $order_dir    = $order_dt[0]["dir"];
            if (config( 'app.client') == 'kopkompani') {
                $order_column_array = ['id', 'unit_code', 'title', 'price_retail_1', 'price_nabavna', 'location'];
            } else {
                $order_column_array = ['id', 'unit_code', 'title', 'price_retail_1'];
            }
            if ($condition) {
                $products = $products->orderBy($order_column_array[$order_column], $order_dir);
            } else if ($order_column == 5 && config( 'app.client') == 'kopkompani') {
                $products = $products->orderBy('location', $order_dir);
            }
        }

        if ($condition) {
            $count_products = $products->count();
            $start_temp = $request->get('start');
            $length_temp = $request->get('length');
            if ($length_temp < 1)
                $length_temp = $count_products;

            $products = $products->offset($start_temp)->limit($length_temp)->get();
        } else
            $products = $products->get();

        if (!empty($products)) {

            $warehouses = Warehouse::orderBy('priority')->get();
            $warehousesHash = [];

            foreach ($warehouses as $warehouse) {
                $warehousesHash[$warehouse->id] = $warehouse;
            }

            foreach ($products as $product) {
                if ($product->has_variations) {

                    foreach ($warehouses as $warehouse) {
                        $product->{'warehouse_' . $warehouse->id} = 0;
                    }

                    $results = VariationQuantity::where('product_id', $product->id)
                        ->join('warehouses', 'warehouses.id', '=', 'variation_quantity.warehouse_id')
                        ->join('variations', 'variations.id', '=', 'variation_quantity.variation_id')
                        ->leftJoin('products', 'products.id', '=', 'variation_quantity.product_id')
                        ->select('warehouses.id', 'warehouses.title', 'products.title as pt', 'variations.value', 'variation_quantity.quantity')
                        ->get();

                    foreach ($results as $wh) {
                        if ($product->{'warehouse_' . $wh->id} === 0) {
                            $product->{'warehouse_' . $wh->id} = '';
                        }
                        $product->{'warehouse_' . $wh->id} .=  '[' . $wh->value . '] - (' . $wh->quantity . ');  ';
                    }
                } else {

                    foreach ($warehouses as $warehouse) {
                        $product->{'warehouse_' . $warehouse->id} = 0;
                    }

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

                        $product_out = WarehouseProduct::where('product_id', $product->id)
                            ->where(function ($q) {
                                $q->where('document_type', 'ispratnica')
                                    ->orWhere('document_type', 'povratnica_dobavuvac')
                                    ->orWhere('document_type', 'izlez');
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

                        $reservation_items_count = DocumentItems::whereIn('document_id', $reservation_ids)->where('product_id', $product->id)->sum('quantity');

                        if (empty($reservation_items_count)) {
                            $reservation_items_count = 0;
                        }


                        $product_in = (int) $product_in;
                        $product_out = (int) $product_out;
                        // MODIFY DATA FOR DATATABLE FRONTEND
                        $warehouse_ids[$i]->quantity = $product_in - $product_out - $reservation_items_count;
                        $warehouse_ids[$i]->product_id = $product->title;
                        $wids[] = $warehouse_ids[$i]->warehouse_id;
                        $i = $i + 1;
                    }


                    foreach ($warehouse_ids as $wh) {
                        $product->{'warehouse_' . $wh->warehouse_id} = $wh->quantity;
                    }
                }
                unset($product->has_variations);
                if (config( 'app.client') == 'kopkompani' && (!isset($product->location) || $product->location == '' || is_null($product->location))) {
                    $product->location = '/';
                }
            }
        }
        if (config( 'app.client') == 'kopkompani') {
            $condition = ($order_column < 6);
        } else {
            $condition = ($order_column < 4);
        }
        if ($condition) {
            $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => $count_products,
                "recordsFiltered" => $count_products,
                "data"            => $products
            );

            return $json_data;
        } else {
            $datatable = Datatables::of($products)->with(['recordsFiltered' => 500, 'data' => $products])->make();

            return $datatable;
        }
    }

    /**
     * Show karta na artikl
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showKartaArtikal()
    {
        $products = Product::get();
        $warehouses = Warehouse::get();
        return view('admin.articles.karta', compact('products', 'warehouses'));
    }

    /**
     * Datatable for karta artikl
     *
     * @param Request $req
     * @return mixed
     */
    public function kartaArtikal(Request $req)
    {
        $warehouse_id   = $req->get('warehouse');
        $product_id     = $req->get('product');

        $doc_items  = Document::where('product_id', $product_id)
            ->where(function ($query) use ($warehouse_id) {
                $query->where('warehouse_id', $warehouse_id)
                    ->orWhere('warehouse_to_id', $warehouse_id);
            })
            ->where('documents.status', 'generirana')
            ->whereIn('documents.type', ['priemnica', 'povratnica', 'povratnica_dobavuvac', 'izlez', 'ispratnica'])
            ->join('document_items', 'documents.id', '=', 'document_items.document_id')
            ->select(
                'documents.document_date',
                'documents.type',
                'documents.document_number',
                'document_json',
                'quantity as vlez',
                'sum_no_vat as vlez_cena',
                'quantity as izlez',
                'sum_no_vat as izlez_cena',
                'quantity as sostojba',
                'documents.id',
                'warehouse_to_id'
            )
            ->get();

        $dokumenti = [];

        foreach ($doc_items as $value) {

            $warehouseToId = $value->warehouse_to_id;

            // VLEZ NA ARTIKAL
            if (in_array($value->type, [Document::TYPE_POVRATNICA, Document::TYPE_PRIEMNICA])) {
                $value->izlez = '';
                $value->izlez_cena = '';
                if ($value->type == 'priemnica' || $value->type == 'povratnica') {
                    $array = json_decode($value->document_json);
                    if (isset($array->company->company_name))
                        $value->document_json = $array->company->company_name;
                    else
                        $value->document_json = '';
                }
            }

            // IZLEZ NA ARTIKAL
            if (in_array($value->type, [Document::TYPE_IZLEZ, Document::TYPE_ISPRATNICA, Document::TYPE_POVRATNICA_DOBAVUVAC])) {
                $value->vlez = '';
                $value->vlez_cena = '';

                if ($value->type == Document::TYPE_ISPRATNICA) {
                    $documentData = json_decode($value->document_json);
                    $value->document_json = $documentData->userBilling->first_name . ' ' . $documentData->userBilling->last_name;
                } else if ($value->type == Document::TYPE_POVRATNICA_DOBAVUVAC) {
                    $documentData = json_decode($value->document_json);
                    $value->document_json = $documentData->userBilling->company_name;
                } else if ($value->type == Document::TYPE_IZLEZ) {
                    $warehouseTo = Warehouse::find($warehouseToId);
                    $value->document_json = $warehouseTo->title;
                }
            }

            $dokumenti_key = $value->id;
            if (!($value->type == 'izlez' && $value->warehouse_to_id == $warehouse_id)) {

                // Potrebno zasto vo nekoi dokumenti po 2 ili povekje pati e dodaden proizvodot
                if (isset($dokumenti[$dokumenti_key]) && $dokumenti[$dokumenti_key]->type == $value->type) {
                    if (is_numeric($value->izlez) && is_numeric($dokumenti[$dokumenti_key]->izlez)) {
                        $dokumenti[$dokumenti_key]->izlez += $value->izlez;
                        $dokumenti[$dokumenti_key]->sostojba += $value->sostojba;
                    } else if (is_numeric($value->vlez) && is_numeric($dokumenti[$dokumenti_key]->vlez)) {
                        $dokumenti[$dokumenti_key]->vlez += $value->vlez;
                        $dokumenti[$dokumenti_key]->sostojba += $value->sostojba;
                    }
                } else {
                    $dokumenti[$dokumenti_key] = $value;
                }
            }
        }

        $izlezi_ids = Document::where('type', 'izlez')->where('warehouse_to_id', $warehouse_id)->pluck('id')->toArray();

        $items      = DocumentItems::whereIn('document_id', $izlezi_ids)
            ->where('product_id', $product_id)
            //->select()
            ->get();
        // vlezovi

        foreach ($items as $valueItem) {

            $vlez = DocumentsRelated::join('documents', 'documents.id', '=', 'documents_related.vlez_id')
                ->where('izlez_id', $valueItem->document_id)
                ->select('documents.document_date', 'documents.type', 'documents.document_number', 'document_json', 'documents.type as vlez', 'documents.type as vlez_cena', 'documents.type as izlez', 'documents.type as izlez_cena', 'documents.type as sostojba', 'documents.id')
                ->first();

            if ($vlez) {
                $vlez->izlez = '';
                $vlez->izlez_cena = '';
                $dokumenti_key = $vlez->id;
                //dd($vlez);
                unset($vlez->id);
                $izlezi = DocumentItems::where('document_id', $valueItem->document_id)->where('product_id', $product_id)->select('quantity', 'sum_no_vat')->get();

                foreach ($izlezi as $keyizlezi => $izlez) {
                    $vlez->vlez = $izlez->quantity;
                    $vlez->vlez_cena = $izlez->sum_no_vat;
                    $vlez->sostojba = $izlez->quantity;
                }
                $dokumenti[$dokumenti_key] = $vlez;
            }
        }

        usort($dokumenti, function ($a, $b) {
            $date1 = strtotime($a->document_date);
            $date2 = strtotime($b->document_date);

            if ($date1 === $date2) {
                return 0;
            }

            return $date1 < $date2 ? -1 : 1;
        });

        $sostojba = 0;

        foreach ($dokumenti as $keyDoc => $valueDoc) {
            if (in_array($valueDoc->type, [Document::TYPE_POVRATNICA_DOBAVUVAC, Document::TYPE_IZLEZ, Document::TYPE_ISPRATNICA])) {
                $sostojba = $sostojba - $valueDoc->sostojba;
            } else if (in_array($valueDoc->type, [Document::TYPE_PRIEMNICA, Document::TYPE_VLEZ, Document::TYPE_POVRATNICA])) {
                $sostojba = $sostojba + $valueDoc->sostojba;
            }

            $dokumenti[$keyDoc]['sostojba'] = $sostojba;
        }

        $collection = collect($dokumenti);

        return Datatables::of($collection)
            ->editColumn('type', '<div class="text-center"><span class="label label-sm {{{ in_array($type, [\'priemnica\', \'vlez\', \'povratnica\']) ? \'label-success\' : \'label-danger\' }}}"> {{{ $type }}} </span></div>')
            ->make();
    }

    public function getFromApi()
    {
        $config_array =
            [
                'unit_code'     =>  'ItemID',
                'title'         =>  'ItemName',
                'unit_id'       =>  'UnitID',
                'vat'           =>  'VatValue',
                'total_stock'   =>  'StockQTY',
                'price_retail_1' =>  'Price',
            ];

        $api_url = "http://pekabesko.ddns.net/SSBService/api/inventory";

        $unit_codes = Product::pluck('unit_code')->toArray();

        $response = Curl::to($api_url)->asJson()->get();
        $count = 0;
        foreach ($response as $res) {
            $res = (array) $res;
            $temp =
                [
                    'unit_code'     =>  $res[$config_array['unit_code']],
                    'title'         =>  $res[$config_array['title']],
                    'unit_id'       =>  $res[$config_array['unit_id']],
                    'vat'           =>  $res[$config_array['vat']],
                    'total_stock'   =>  $res[$config_array['total_stock']],
                    'price_retail_1' =>  $res[$config_array['price_retail_1']],
                    'url'           =>  str_slug($res[$config_array['title']])
                ];

            Product::updateOrCreate(
                ['unit_code' =>  $res[$config_array['unit_code']]],
                $temp
            );
            echo "<br/>";
            if (in_array($res[$config_array['unit_code']], $unit_codes))
                echo "<span style='color:blue'>(АЖУРИРАН)</span>";
            else
                echo "<span style='color:green'>(НОВ АРТИКАЛ)</span>";

            echo "  Шифра : <span style='color:red'>" . $res[$config_array['unit_code']] . "</span>";
            echo "  Име артикал : <span style='color:red'>" . $res[$config_array['title']] . "</span>";
            echo "  Тип : <span style='color:red'>" . $res[$config_array['unit_id']] . "</span>";
            echo "  Данок : <span style='color:red'>" . $res[$config_array['vat']] . "</span>";
            echo "  Количина : <span style='color:red'>" . $res[$config_array['total_stock']] . "</span>";
            echo "  Цена : <span style='color:red'>" . $res[$config_array['price_retail_1']] . "</span>";
            echo "  URL : <span style='color:red'>" . str_slug($res[$config_array['title']]) . "</span>";
            echo "<br/>";
            $count++;
        }
        echo "Obraboteni $count produkti";
    }

    public function cloneProduct($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if ($product) {
            $new_product = $product->replicate();
            $new_product->title = $new_product->title . '_duplicat_' . time();
            $new_product->unit_code = $product_id . time();
            $new_product->sku       = null;
            $new_product->url = $new_product->url . '-' . time();
            $new_product->save();

            $new_product->unit_code = sprintf('%06d', $new_product->id);
            $new_product->save();


            $variations = ProductVariations::where('product_id', $product->id)->get();
            foreach ($variations as $val) {
                $pc = new ProductVariations();
                $pc->variation_id = $val->variation_id;
                $pc->product_id = $new_product->id;
                $pc->save();
            }

            $categories = ProductCategory::where('product_id', $product->id)->get();
            foreach ($categories as $val) {
                $pc = new ProductCategory();
                $pc->category_id = $val->category_id;
                $pc->product_id = $new_product->id;
                $pc->save();
            }


            // Insert Filters

            $filters = ProductAttributes::where('product_id', $product->id)->get();
            foreach ($filters as $key => $fil) {
                $pa = new ProductAttributes();
                $pa->filter_id = $fil->filter_id;
                $pa->filter_att_id = $fil->filter_att_id;
                $pa->product_id = $new_product->id;
                $pa->save();
            }

            // copy images

            if (!File::isDirectory(public_path() . '/uploads/products/' . $new_product->id)) {
                File::makeDirectory(public_path() . '/uploads/products/' . $new_product->id, 0775);
            }
            $from_dir = public_path() . '/uploads/products/' . $product->id;
            $to_dir   = public_path() . '/uploads/products/' . $new_product->id;
            $copy_string = "cp -R $from_dir/* $to_dir";
            exec($copy_string);

            return redirect('admin/articles/show/' . $new_product->id);
        }
    }

    private function fetchCategoryTree($parent = 0,  $user_tree_array = '')
    {

        if (!is_array($user_tree_array))
            $user_tree_array = array();

        //$sql = "SELECT `cid`, `name`, `parent` FROM `category` WHERE 1 AND `parent` = $parent ORDER BY cid ASC";
        $rows = DB::table('categories')->select('id', 'title', 'parent')->where('parent', $parent)->orderBy('id', 'asc')->get();
        $count = DB::table('categories')->select('id', 'title', 'parent')->where('parent', $parent)->orderBy('id', 'asc')->count();
        //$query = mysql_query($sql);
        if ($count > 0) {
            foreach ($rows as $row) {
                //$user_tree_array[] = array("id" => $row->id, "name" => $spacing . $row->title);
                $user_tree_array[] = $row->id;
                $user_tree_array = $this->fetchCategoryTree($row->id, $user_tree_array);
            }
        }
        return $user_tree_array;
    }

    // store product to wishlist, productId as parameter
    public function addProductToWishlist(Request $request)
    {


        if (!Auth()->check()) {
            return response()->json([
                'error' => 'Најавете се за да додавате во листата на желби.'
            ], 500);
        }
        $record = Wishlist::where('product_id', $request->input('pid'))->where('user_id', auth()->user()->id)->first();
        if (is_null($record)) {
            $record = new Wishlist();
            $record->user_id = auth()->user()->id;
            $record->product_id = $request->input('pid');
            $record->save();

            $data['wishlistItems'] = Wishlist::join('products', 'product_id', '=', 'products.id')->where('user_id', auth()->user()->id)->get();
            if (View::exists('clients.' . config( 'app.theme') . '.' . 'wishlist-partial')) {
                return response()->json([
                    'success' => 'Продуктот е успешно додаден кон листата на желби',
                    'totalProducts' => count($data['wishlistItems']),
                    'html' => view('clients.' . config( 'app.theme') . '.' . 'wishlist-partial', $data)->render(),
                ], 200);
            } else {
                return response()->json([
                    'success' => 'Продуктот е успешно додаден кон листата на желби',
                ], 200);
            }
        }
        return response()->json([
            'error' => 'Продуктот е веќе во листата на желби'
        ], 500);
    }

    public function removeProductFromWishlist(Request $request)
    {
        $record = Wishlist::where('product_id', $request->input('pid'))->where('user_id', auth()->user()->id)->first();
        if (!is_null($record)) {
            $record->delete();
            return response()->json([
                'success' => 'Продуктот е успешно избришан од листата на желби'
            ], 200);
        }
        return response()->json([
            'error' => 'Продуктот не постои во листата на желби'
        ], 500);
    }

    public function showArticleOptions($productId)
    {
        $record = $this->articleRepository->getById($productId);
        $packages = ProductOptionsPackage::where('product_id', $record->id)->get();

        $exportPackages = [];

        foreach ($packages as $package) {
            $explodedValues = explode(',', $package->values);
            $temp = [];
            $singlePacket = [];
            $singlePacket['id'] = $package->id;
            foreach ($explodedValues as $v) {
                array_push($temp,  substr($v, strpos($v, "_") + 1));
            }
            $optionValues = ProductOptionValue::whereIn('id', $temp)->with('option')->get();
            foreach ($optionValues as $optionValue) {
                $singlePacket[$optionValue->option->name] = $optionValue->name;
            }
            $singlePacket['Kоличина'] = $package->quantity;
            $singlePacket['Цена'] = $package->price;

            array_push($exportPackages, $singlePacket);
        }





        return view('admin.articles.options', compact('record', 'optionValues', 'exportPackages'));
    }

    public function addProductToBundle(Request $request)
    {
        $record = BundleProduct::where('product_id', $request->input('product_id'))->where('bundle', $request->input('bundle'))->first();

        if (!is_null($record)) {
            $record->delete();
        }

        $record = new BundleProduct();
        $record->bundle = $request->input('bundle');
        $record->quantity = $request->has('quantity') ? $request->input('quantity') : 1;
        $record->product_id = $request->input('product_id');
        $record->save();

        $product = Product::find($record->product_id);

        return $product;
    }


    public function deleteProductFromBundle(Request $request)
    {
        $record = BundleProduct::where('product_id', $request->input('product_id'))->where('bundle', $request->input('bundle'))->first();
        if (!is_null($record)) {
            $record->delete();
        }
        return $record;
    }

    public function generateExcel()
    {
        $products = Product::with('categories')->get();
        $products = $products->toArray();
        $product = $products[0];

        $data['products'] = $products;
        $data['categories'] = Category::all()->toArray();
        Excel::create("export_products", function ($excel) use ($data) {
            $excel->sheet('sheet1', function ($sheet) use ($data) {
                $sheet->loadView('admin.articles.excel.excel', $data);
            });
        })->download('xls');
    }

    public function deletePdf($id)
    {
        
        if (\File::exists(public_path() . '/uploads/products/' . $id . "/" . "pdf.pdf")) {
            \File::delete(public_path() . '/uploads/products/' . $id . "/" . "pdf.pdf");
        }
        return redirect()->back();
    }

}
