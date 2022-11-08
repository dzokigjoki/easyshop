<?php

namespace EasyShop\Http\Controllers;

use EasyShop\Models\Posts;
use EasyShop\Repositories\BlogRepository\BlogRepositoryInterface;
use Illuminate\Http\Request;
use EasyShop\Models\Category;
use EasyShop\Http\Requests;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\CategoryService;


use Cache;
use EasyShop\Models\Settings;


class CategoryController extends FrontController
{

    /**
     * @var
     */
    protected $user;

    /**
     * @var
     */
    protected $categoryService;

    /**
     * @var
     */


    /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    protected $articleRepository;

    protected $blogRepository;
    /**
     * @param CategoryService $categoryService
     */
    public function __construct(
        CategoryService $categoryService,
        CategoryRepositoryInterface $categoryRepository,
        ArticleRepositoryInterface $articleRepository,
        BlogRepositoryInterface $blogRepository
    ) {
        parent::__construct($categoryService);

        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->articleRepository = $articleRepository;
        $this->blogRepository = $blogRepository;
        $this->user = \Auth::user();
    }

    /**
     * @param $id
     * @param $slug
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request,  $id, $slug, $lang = "lang1")
    {

        $locale = $this->locale;

        $lang = detectLang();

        $category = Category::getCategoryById($id, $lang);

        if (is_null($category) || !$category->active) {

            abort(404);
        }


        $data['category'] = $category;
        $data['pageName'] = 'page-category';
        // Define the view that will be shown
        switch ($category->type) {
            case 'list_category':
                $categoriesChunk = 4;
                switch (config( 'app.client')) {
                }

                $view = 'category-list-categories';
                $data['categories'] = $this->categoryRepository->getActiveChildren($id, 'order', 'asc', $lang);

                $data['categoriesChunked'] = array_chunk($data['categories'], $categoriesChunk);
                break;
            case 'list_product':

                $newestArticlesNumber = 5;
                $bestSellersArticlesNumber = 5;
                $recommendedArticlesNumber = 5;
                $popularArticlesNumber = 5;
                $newestArticles = $this->articleRepository->getNewest($newestArticlesNumber, $this->categoriesLastChildIds);
                $bestSellersArticles = $this->articleRepository->getBestSellers($bestSellersArticlesNumber, $this->categoriesLastChildIds);
                $recommendedArticles = $this->articleRepository->getRecommended($recommendedArticlesNumber, $this->categoriesLastChildIds);
                $popularArticles = $this->articleRepository->getPopular($popularArticlesNumber, $this->categoriesLastChildIds);

                // Get the prices for the user
                foreach ($newestArticles as $product) {
                    if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                        $product->price = $product->{$this->priceGroup};
                    } else {
                        $product->price = (int) $product->{$this->priceGroup};
                    }
                }

                // Get the prices for the user
                foreach ($bestSellersArticles as $product) {
                    if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                        $product->price = $product->{$this->priceGroup};
                    } else {
                        $product->price = (int) $product->{$this->priceGroup};
                    }
                }

                // Get the prices for the user
                foreach ($recommendedArticles as $product) {
                    if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                        $product->price = $product->{$this->priceGroup};
                    } else {
                        $product->price = (int) $product->{$this->priceGroup};
                    }
                }

                // Get the prices for the user
                foreach ($popularArticles as $product) {
                    if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                        $product->price = $product->{$this->priceGroup};
                    } else {
                        $product->price = (int) $product->{$this->priceGroup};
                    }
                }

                $data['newestArticles'] = $newestArticles;
                $data['bestSellersArticles'] = $bestSellersArticles;
                $data['recommendedArticles'] = $recommendedArticles;
                $data['popularArticles'] = $popularArticles;

                $divider = \Session::get('selectedCurrencyDivider');
                if (is_null($divider) || $divider === 0) {
                    $divider = 1;
                }

                $data['sliderRange'] = $this->categoryRepository->getSliderPrices($this->priceGroup, $id);
                $data['sliderRange']->min_price = $data['sliderRange']->min_price / $divider;
                $data['sliderRange']->max_price = $data['sliderRange']->max_price / $divider;
                $productFilters = $this->categoryService->getFilters($request->all(), $this->priceGroup);

                switch (config( 'app.client')) {
                    case 'kliknikupi_mk':
                        if (empty($productFilters->priceFrom) && empty($productFilters->priceTo)) {
                            $productFilters->limit = 99;
                        }
                        break;
                    case 'shopathome':
                        if (empty($productFilters->priceFrom) && empty($productFilters->priceTo)) {
                            $productFilters->limit = 99;
                        }
                        break;
                    case 'herline':
                        if (empty($productFilters->priceFrom) && empty($productFilters->priceTo)) {
                            $productFilters->limit = 36;
                        }
                        break;
                }

                list($data['products'], $data['count']) = $this->categoryRepository->getFilteredProducts($category->id, $this->priceGroup, $productFilters, $lang);


                $data['totalPages'] = ceil($data['count'] / $productFilters->limit);
                $data['categoryId'] = $category->id;

                // Set price
                foreach ($data['products'] as $product) {
                    if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                        $product->price = $product->{$this->priceGroup};
                    } else {
                        $product->price = (int) $product->{$this->priceGroup};
                    }
                }

                switch (config( 'app.client')) {
                    case 'ibutik':
                    case 'perla':
                    case 'tehnopolis':
                    case 'mojoutlet':
                    case 'kliknikupi_mk':
                        $data['productsChunk'] = array_chunk($data['products'], 3);
                        break;
                    case 'topmarket':
                        $data['productsChunk'] = array_chunk($data['products'], 3);
                        break;
                    default:
                        $data['productsChunk'] = $data['products'];
                        break;
                }

                //TODO: clear cache for filters in admin when there is change
                //                $categoryFilters = \Cache::remember(config( 'app.client') . '.category.' . $category->id, 60 * 24, function() use ($category) {
                //                    return $category->filters()->with('attributes')->get();
                //                });
                $categoryFilters = $category->filters()->with('attributes')->get();

                $data['filters'] = $categoryFilters;
                $data['productFilters'] = $productFilters;

                $view = 'category-list-articles';
                break;


            case 'list_posts':
                $data['categories'] = $this->categoryRepository->getAllBlogListing();
                $data['posts'] = Posts::getFilteredPostsPagination($id, 20,  $lang);

                $view = 'category-list-posts';
                break;
            case 'content':
                $view = 'category-post';
                break;
            default:
                $view = 'category-list-articles';
        }

        if ($lang == 'lang1') {
            $data['metaTags']['title'] = $data['category']->meta_title;
            $data['metaTags']['description'] = $data['category']->meta_description;
            $data['metaTags']['image'] = $data['category']->title;
        } else {
            $data['metaTags']['title'] = $data['category']->{'meta_title_'.$lang};
            $data['metaTags']['description'] = $data['category']->{'meta_description_'.$lang};
            $data['metaTags']['image'] = $data['category']->{'title_'.$lang};
        }

        return view('clients.' . config( 'app.theme') . '.' . $view, $data);
    }

    /**
     * Returns products based on the filters provided
     *
     * @param $priceFrom
     * @param $priceTo
     * @param string $sort
     * @param int $limit
     *
     * @returns string
     */

    public function getPartialArticles(Request $request)
    {
        $locale = $this->locale;

        $lang = $this->lang;



        $category = Category::getCategoryById($request->input('id'), $lang);

        if (is_null($category) || !$category->active) {
            abort(404);
        }

        $productFilters = $this->categoryService->getFilters($request->all(), $this->priceGroup);

        list($data['products'], $data['count']) = $this->categoryRepository->getFilteredProducts($category->id, $this->priceGroup, $productFilters, $lang);


        $data['totalPages'] = ceil($data['count'] / $productFilters->limit);

        // Set price
        foreach ($data['products'] as $product) {
            $product->price = (int) $product->{$this->priceGroup};
        }

        switch (config( 'app.client')) {
                // case 'kliknikupi_mk':
                //     $data['productsChunk'] = array_chunk($data['products'], 3);
                //     break;
            default:
                $data['productsChunk'] = $data['products'];
                break;
        }

        $data['productFilters'] = $productFilters;
        $data['category'] = $category;

        return view('clients.' . config( 'app.theme') . '.' . 'partials.category-products-list', $data)->render();
    }

    public function allSubCategories()
    {
        $view = \Route::currentRouteName();
        $title = $view;
        
        $categories = $this->categoryService->getNestedCategoryList();
        return view(
            'clients.' . config( 'app.theme') . '.pages.' . $view,
            compact('categories', 'title')
        );
    }

    public function getMobilePage()
    {
        $categories = $this->categoryService->getNestedCategoryList($onlyActive = TRUE, $onlyMainMenu = TRUE);
        return view(
            'clients.' . config( 'app.theme') . '.pages.' . 'categories-mobile',
            compact('categories')
        );
    }
}
