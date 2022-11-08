<?php

namespace EasyShop\Http\Controllers;

use EasyShop\AvailableProductDesign;
use EasyShop\BundleProduct;
use EasyShop\Models\Category;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Models\Product;
use EasyShop\Models\ProductOptionsPackage;
use EasyShop\Models\Settings;
use EasyShop\Models\Wishlist;
use Illuminate\Support\Facades\Cookie;
use ImagesHelper;
// use Illuminate\Support\Facades\Response

class ProductController extends FrontController
{
    /**
     * @var
     */
    protected $categoryService;

    /**
     * @var
     */
    protected $articleRepository;

    /**
     * @var
     */
    protected $categoryRepository;

    /**
     * @var
     */
    protected $user;

    /**
     * @param CategoryService $categoryService
     * @param ArticleRepositoryInterface $articleRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        CategoryService $categoryService,
        ArticleRepositoryInterface $articleRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        parent::__construct($categoryService);
        $this->categoryService = $categoryService;
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->user = \Auth::user();
    }

    /**
     * @param $id
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request, $id, $slug)
    {

        $locale = $this->locale;

        $lang = $this->lang;

        // TODO: clear all cache on admin change
        $product = Product::getProductByIdInLang($id, $lang);

        //        $product = \Cache::remember(config( 'app.client') . '.product.' . $id, 60 * 24, function() use ($id){
        //            return $this->articleRepository->getById($id);
        //        });


        if (is_null($product) || !$product->active || !$product->show_on_web) {
            abort(404);
        }

        // proveri dali go imat vo sesija
        // Stavi go produktot vo sesija
        //

        $product->images = $this->articleRepository->getProductImages($id);


        //            \Cache::remember(config( 'app.client') . '.product.images.' . $id, 60 * 24, function() use ($id){
        //            return $this->articleRepository->getProductImages($id);
        //        });

        $bestSellersLimit = 5;
        $relatedProductsLimit = 10;


        switch (config( 'app.client')) {
            case 'expressbook':
            case 'dorikele':
                $relatedProductsLimit = 3;
                break;
            case 'peletcentar':
                $relatedProductsLimit = 4;
                break;
            case 'drbrowns':
                $relatedProductsLimit = 4;
                break;
            case 'shopathome':
                $relatedProductsLimit = 8;
                break;
            case 'lilit':
                $relatedProductsLimit = 3;
                break;
            case 'mymoda':
                $relatedProductsLimit = 6;
                break;
            case 'sofu':
                $relatedProductsLimit = 4;
                break;
            case 'finki-giftshop':
                $relatedProductsLimit = 4;
                break;
            case 'naturatherapy':
                $relatedProductsLimit = 4;
                break;
            case 'herline':
                $relatedProductsLimit = 8;
                break;
            case 'e-commerce':
                $relatedProductsLimit = 8;
                    break;
        }

        if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
            $product->price = $product->{$this->priceGroup};
        } else {
            $product->price = (int) $product->{$this->priceGroup};
        }
        $productCategoriesIds = $product->categories()->pluck('categories.id');
        $firstCategory = count($productCategoriesIds) > 0 ? $this->categoryRepository->find($productCategoriesIds[0]) : null;
        $firstCategoryTitle = !is_null($firstCategory) ? $firstCategory->title : '';

        // Get best sellers
        $bestSellerProducts = $this->articleRepository->getBestSellers($bestSellersLimit, $this->categoriesLastChildIds);
        //            \Cache::remember(config( 'app.client') . '.product.bestSellers', 60 * 24, function() use ($bestSellersLimit){
        //            return $this->articleRepository->getBestSellers($bestSellersLimit);
        //        });
        foreach ($bestSellerProducts as $bestSellerProduct) {
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $bestSellerProduct->price =  $product->{$this->priceGroup};
            } else {
                $bestSellerProduct->price =  (int) $product->{$this->priceGroup};
            }
        }

        // Get related products
        //        $relatedProducts = \Cache::remember(config( 'app.client') . '.product.related', 60 * 24, function() use ($product, $relatedProductsLimit){
        //            return
        $relatedProducts = $this->articleRepository->getRelatedProducts(
            $product->categories()->pluck('categories.id'),
            $relatedProductsLimit,
            [$product->id],
            $lang
        );

        //        });
        foreach ($relatedProducts as $relatedProduct) {
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $relatedProduct->price =  $relatedProduct->{$this->priceGroup};
            } else {
                $relatedProduct->price =  (int) $relatedProduct->{$this->priceGroup};
            }
        }

        // Get newestArticles
        $newestArticles = $this->articleRepository->getNewest($bestSellersLimit, $this->categoriesLastChildIds);
        //            \Cache::remember(config( 'app.client') . '.product.newest', 60 * 24, function() use ($bestSellersLimit){
        //            return $this->articleRepository->getNewest($bestSellersLimit);
        //        });
        foreach ($newestArticles as $newestArticle) {
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $newestArticle->price =  $product->{$this->priceGroup};
            } else {
                $newestArticle->price =  (int) $product->{$this->priceGroup};
            }
        }

        $product->attributes = Product::getProductAttributes($product->id, $lang);
        $product->smallImage = \ImagesHelper::getProductImage($product, $id = null, $size = 'sm_');
        $product->mediumImage = \ImagesHelper::getProductImage($product, $id = null, $size = 'md_');
        $product->image = \ImagesHelper::getProductImage($product, $id = null, $size = 'lg_');
        $product->proizvoditel = $product->manufacturer;

        $this->articleRepository->incrementVisit($product->id);



        if (auth()->id()) {
            $productArray = '';
            if (Cookie::get("recently_viewed")) {
                $productArray = Cookie::get("recently_viewed");
            }

            //Brisi go najstariot zapis za da ne se cuvaat povekje od 50 zapisi.
            $productArrayArray = explode(',', $productArray);
            if ((count($productArrayArray) - 1) >= 50) {
                array_shift($productArrayArray);
                $productArray = implode(',', $productArrayArray);
            }


            $productArray .= (string) $product->id . ',';
            Cookie::queue("recently_viewed", $productArray, 2678400);
        }

        $parentProducts = Product::where('parent_product', $product->id)->get();

        if (!is_null($product->parent_product)) {
            $childrenProducts = Product::with('children')->where('id', $product->parent_product)->get();
            $data['childrenProducts'] = $childrenProducts;
        }

        if (isset($product->bundle) && $product->bundle) {
            $bundleProducts = Product::join('bundle_products', 'products.id', '=', 'bundle_products.product_id')
                ->where('bundle_products.bundle', $product->id)
                ->where('products.total_stock', '>', 0)
                ->orderBy('bundle_products.created_at', 'asc')
                ->select('products.*', 'bundle_products.quantity as quantity')->get();
            $data['bundleProducts'] = $bundleProducts;
        }

        $data['bestSellerProducts'] = $bestSellerProducts;
        $data['relatedProducts'] = $relatedProducts;
        $data['newestArticles'] = $newestArticles;
        $data['product'] = $product;
        $data['pageName'] = 'page-product';
        $data['firstCategoryTitle'] = $firstCategoryTitle;
        $data['metaTags']['description'] = mb_substr(strip_tags($product->description), 0, 300);
        $data['metaTags']['title'] = $product->title;
        $data['metaTags']['product'] = true;
        $data['metaTags']['image']  = \URL::to("/") . $product->image;
        $data['metaTags']['original_price_amount']  = $product->price;
        $data['metaTags']['product_price_amount']  = (float) $product->price;
        $data['metaTags']['keywords'] = $product->meta_keywords;
        $data['metaTags']['product_sale_amount']  = (float) Product::getPriceRetail1($product, false, 0);
        $data['metaTags']['currency'] = \EasyShop\Models\AdminSettings::getField('currency');
        if ($data['metaTags']['currency'] == 'МКД')
            $data['metaTags']['currency'] = 'MKD';
        $td = config( 'clients.' . config( 'app.client') . '.type_delivery');
        if (!empty($td)) {
            $td = end($td);
            $data['metaTags']['shipping_cost_amount'] = $td['price'];
        }
        $data['parentProducts'] = $parentProducts;
        
        return view('clients.' . config( 'app.theme') . '.product', $data);
    }


    /**
     * Facebook product catalog for topprodukti
     */
    public function getTopproduktiXmlFeed($country = null)
    {
        $categoryIds = null;

        if (!is_null($country)) {
            $menuCategories = $this->categoryService->getNestedCategoryList($onlyActive = TRUE, $onlyMainMenu = TRUE);

            switch ($country) {
                case 'mk':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[0]]);
                    break;
                case 'rs':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[1]]);
                    break;
                case 'bg':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[2]]);
                    break;
                case 'hr':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[3]]);
                    break;
                case 'si':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[8]]);
                    break;
                case 'sk':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[7]]);
                    break;
                case 'hu':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[4]]);
                    break;
                case 'pl':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[6]]);
                    break;
                case 'cz':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[5]]);
                    break;
                case 'ro':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[9]]);
                    break;
            }
        }

        $products = $this->articleRepository->getAllFeed($categoryIds);

        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Link', 'Title', 'Description', 'category', 'brand', 'price', 'availability', 'Condition', 'Image_link', 'google_product_category']);
        $client = config( 'app.client');


        foreach ($products as $product) {

            if (!$product->description) {
                $description = $client;
            } else {
                $description = strip_tags($product->description);
            }

            $category = $product->categories()->first();
            fputcsv($out, [
                $product->id,
                route('product', [$product->id, $product->url]),
                $product->title,
                $description,
                is_null($category) ? 'No Category' : $category->title,
                'China Logistics',
                $product->price_retail_1,
                'In stock',
                'New',
                'https://topprodukti.mk' . \ImagesHelper::getProductImage($product, null, 'lg_'),
                $product->google_product_category,
            ]);
        }


        fclose($out);
    }



    public function productJsonAttributes($id, $filename = null)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            if (!is_null($filename)) {
                $filePath = AvailableProductDesign::where('filename', $filename)->first();
                return response()->json(
                    [
                        [
                            array(
                                'title' => $product->title,
                                'thumbnail' => '/uploads/predefined_designs/' . $filePath->product_id . '/' . $filePath->filename,
                                'elements' => $filePath->json[0]['elements'],
                                'options' => $filePath->json[0]['options']
                            )
                        ]
                    ]
                );
            } else {
                return response()->json(
                    [
                        [
                            array(
                                'title' => $product->title,
                                'thumbnail' => DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $product->id . DIRECTORY_SEPARATOR . 'lg_' . $product->image,
                                'elements' => [array(
                                    'type' => 'image',
                                    'source' => DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $product->id . DIRECTORY_SEPARATOR . 'lg_' . $product->image,
                                    "title" => 'Base',
                                    'parameters' => array(
                                        "left" => 450,
                                        "top" => 290,
                                        "colors" => "#d59211",
                                        // "price" => 20,
                                        "colorLinkGroup" => "Base",
                                        "fill" => false
                                    )
                                )]
                            )
                        ]
                    ]
                );
            }
        }
    }



    public function productJsonAttributesTorti($id, $shape)
    {
        $product = Product::find($id);
        return response()->json(
            [
                [
                    array(
                        'title' => $product->title,
                        'thumbnail' => DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'torti_plugin_images' . DIRECTORY_SEPARATOR . $shape . '.png',
                        'elements' => [array(
                            'type' => 'image',
                            'source' => DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'torti_plugin_images' . DIRECTORY_SEPARATOR . $shape . '.png',
                            "title" => 'Base',
                            'parameters' => array(
                                'autoCenter' =>  true,
                                "colors" => "#d59211",
                                // "price" => 20,
                                "colorLinkGroup" => "Base",
                                "fill" => true,
                            )
                        )]
                    )
                ]
            ]
        );
    }

    /**
     * Facebook product catalog for topprodukti
     */
    public function getGlobalStoreXmlFeed($country = null)
    {
        $categoryIds = null;

        if (!is_null($country)) {
            $menuCategories = $this->categoryService->getNestedCategoryList($onlyActive = TRUE, $onlyMainMenu = TRUE);

            switch ($country) {
                case 'mk':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[0]]);
                    break;
                case 'rs':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[1]]);
                    break;
                case 'bg':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[2]]);
                    break;
                case 'hr':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[3]]);
                    break;
                case 'si':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[8]]);
                    break;
                case 'sk':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[7]]);
                    break;
                case 'hu':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[4]]);
                    break;
                case 'pl':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[6]]);
                    break;
                case 'cz':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[5]]);
                    break;
                case 'ro':
                    $categoryIds = $this->categoriesLastChildIds = $this->categoryService->getLastChildIds([$menuCategories[9]]);
                    break;
            }
        }

        $products = $this->articleRepository->getAllFeed($categoryIds);

        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Link', 'Title', 'Description', 'category', 'brand', 'price', 'availability', 'Condition', 'Image_link', 'google_product_category']);
        $client = config( 'app.client');


        foreach ($products as $product) {

            if (!$product->description) {
                $description = $client;
            } else {
                $description = strip_tags($product->description);
            }
            if (!is_null($product->discount)) {
                $productPrice = (float) Product::getPriceRetail1($product);
            } else {
                $productPrice = Product::getPriceRetail1($product);
            }

            if ($productPrice == 0)
                $productPrice = Product::getPriceRetail1($product);

            $category = $product->categories()->first();

            fputcsv($out, [
                $product->id,
                route('product', [$product->id, $product->url]),
                $product->title,
                $description,
                is_null($category) ? 'No Category' : $category->title,
                'China Logistics',
                $productPrice,
                'In stock',
                'New',
                'http://bg.global-store.co/' . \ImagesHelper::getProductImage($product, null, 'lg_'),
                $product->google_product_category,
            ]);
        }


        fclose($out);
    }


    /**
     *
     */
    public function getXmlFeed()
    {
        $products = Product::where('active', '=', 1)->get();

        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Link', 'Title', 'Description', 'Category', 'Brand', 'Price', 'availability', 'Condition', 'Image_link', 'google_product_category']);
        $client = config( 'app.client');


        foreach ($products as $product) {

            if (!$product->description) {
                $description = $client;
            } else {
                $description = strip_tags($product->description);
            }

            $manufacturer = $product->manufacturer;
            $category = $product->categories()->first();
            fputcsv($out, [
                $product->id,
                route('product', [$product->id, $product->url]),
                $product->title,
                $description,
                is_null($category) ? 'No Category' : $category->title,
                is_null($manufacturer) ? 'No Brand' : $manufacturer->name,
                Product::getPriceRetail1($product),
                //                $product->price_retail_1,
                'In stock',
                'New',
                'https://' . \EasyShop\Models\AdminSettings::getField('emaildomain') . \ImagesHelper::getProductImage($product, null, 'lg_'),
                $product->google_product_category,
            ]);
        }


        fclose($out);
    }

    public function getWishlist()
    {
        $pids = Wishlist::where('user_id', auth()->user()->id)->pluck('product_id');
        $products = Product::whereIn('id', $pids)->get();
        foreach ($products as $product) {
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $product->price = $product->{$this->priceGroup};
            } else {
                $product->price = (int) $product->{$this->priceGroup};
            }
            if (\EasyShop\Models\Product::hasDiscount($product->discount)) {
                $product->price_discount = Product::getPriceRetail1($product, false);
            }
            $product->image = ImagesHelper::getProductImage($product, $id = null, $size = 'sm_');
        }
        return view('clients.' . config( 'app.theme') . '.wishlist', compact('products'));
    }

    public function uploadPluginDesign(Request $request)
    {


        $image = $request->input('image');

        // https://stackoverflow.com/a/11511605/4437206
        if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
            $encoded_base64_image = substr($image, strpos($image, ',') + 1);
            $type = strtolower($type[1]);

            $decoded_image = base64_decode($encoded_base64_image);

            $image = \Image::make($decoded_image);
            // AND NOW I WANT TO STORE $resized_image using Laravel filesystem BUT...
        }



        // $extension = $image->getClientOriginalExtension();

        // $image = \Image::make($image);
        $destinationTempPath = 'uploads/customUploads/';
        $filename = uniqid() . '.png';


        $uploadSuccess = $image->save($destinationTempPath . $filename, 90);
        if ($uploadSuccess) {
            $response = [
                'success' => 'Успешно поставен дизајн',
                'filename' => $filename,
            ];
            return response()->json($response);
        }
    }

    public function recentlyViewedProducts()
    {
        if (!auth()->id()) {
            return redirect()->back();
        }

        if (Cookie::get('recently_viewed')) {
            $recentlyViewedProductsIds = explode(',', Cookie::get('recently_viewed'));
            array_pop($recentlyViewedProductsIds);

            $products = Product::whereIn('id', $recentlyViewedProductsIds)->rout('categories')->get();
            foreach ($products as $product) {
                if (!is_null($product->categories[0]->parent)) {
                    $parent_category = Category::where('id', $product->categories[0]->parent)->first();
                    $product->parentCategory = $parent_category->title;
                } else {
                    $parent_category = null;
                }
            }
            return view('clients.' . config( 'app.client') . '.recently-viewed-products', compact('products', 'parent_category'));
        } else {
            return redirect()->back()->withErrors('Вашата листа е празна');
        }
    }


    public function allProducts(){
        
        $products = Product::all();
        
        return view('clients.' . config( 'app.client') . '.all-products')->with(["products" => $products]);

    }
}
