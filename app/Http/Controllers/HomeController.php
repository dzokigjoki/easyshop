<?php

namespace EasyShop\Http\Controllers;

use EasyShop\Repositories\BannerRepository\BannerRepositoryInterface;
use EasyShop\Repositories\BlogRepository\BlogRepositoryInterface;
use EasyShop\Repositories\ManufacturerRepository\ManufacturerRepositoryInterface;
use EasyShop\Http\Requests;
use Illuminate\Http\Request;
use EasyShop\Models\Settings;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Services\CategoryService;
use ImagesHelper;
use EasyShop\Models\Posts;
use EasyShop\Services\GeoIpService;
use Agent;
use Session;
use Illuminate\Support\Facades\App;

class HomeController extends FrontController
{
    /**
     * @var
     */
    protected $bannerRepository;
    /**
     * @var
     */
    protected $manufacturerRepository;

    /**
     * @var
     */
    protected $articleRepository;

    /**
     * @var
     */
    protected $blogRepository;

    /**
     * @var
     */
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @param BannerRepositoryInterface $bannerRepository
     * @param CategoryService $categoryService
     * @param ArticleRepositoryInterface $articleRepository
     * @param BlogRepositoryInterface $blogRepository
     * @param ManufacturerRepositoryInterface $manufacturerRepository
     */
    public function __construct(
        CategoryService $categoryService,
        ArticleRepositoryInterface $articleRepository,
        BlogRepositoryInterface $blogRepository,
        ManufacturerRepositoryInterface $manufacturerRepository,
        BannerRepositoryInterface $bannerRepository
    ) {
        parent::__construct($categoryService);

        $this->articleRepository = $articleRepository;
        $this->blogRepository = $blogRepository;
        $this->categoryService = $categoryService;
        $this->manufacturerRepository = $manufacturerRepository;
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Used for testing on live server
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function test()
    {
        session()->put('test', true);
        return redirect()->route('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (config('app.env') !== 'local' && session()->get('test') !== true) {

            switch (config( 'app.client')) {
                case 'kopkompani':
                    return redirect()->to('https://kopkompani.generadevelopment.com/admin');
                    // case Settings::CLIENT_SOFU:
                    //     return view('clients.sofu.maintainance');

            }
        }


        $locale = detectLocale(request()->segment(1));

        return $this->_index_desktop();
    }

    /**
     * Index - Desktop
     *
     * @return mixed
     */
    private function _index_desktop()
    {
        $pageName = 'page-home';
        $newestArticlesNumber = 20;
        $bestSellersArticlesNumber = 20;
        $recommendedArticlesNumber = 20;
        $popularArticlesNumber = 20;
        $exclusiveArticlesNumber = 20;
        $getManufacturers = false;
        $lastBlog = null;

        $bestSellersByCategoryArticles = [];
        $popularArticles = [];
        $recommendedArticles = [];
        $newestArticles = [];
        $exclusiveArticles = [];
        $bestSellersArticles = [];
        $manufacturers = [];

        switch (config( 'app.client')) {
            case 'e-commerce':
                $newestArticlesNumber = 4;
                $bestSellersArticlesNumber = 4;
                $recommendedArticlesNumber = 4;
                $exclusiveArticlesNumber = 4;
                break;
            case 'finki-giftshop':
                $newestArticlesNumber = 4;
                $bestSellersArticlesNumber = 4;
                $recommendedArticlesNumber = 4;
                $exclusiveArticlesNumber = 4;
                break;

            case 'luxbox':
                $newestArticlesNumber = 4;
                $bestSellersArticlesNumber = 4;
                $recommendedArticlesNumber = 12;
                $exclusiveArticlesNumber = 4;
                break;

            case 'shopathome':
                $newestArticlesNumber = 12;
                $bestSellersArticlesNumber = 12;
                $recommendedArticlesNumber = 12;
                $exclusiveArticlesNumber = 12;
                break;
            case 'watchstore':
                $getManufacturers = true;
                $newestArticlesNumber = 12;
                $bestSellersArticlesNumber = 12;
                $recommendedArticlesNumber = 12;
                $popularArticlesNumber = 0;
                $exclusiveArticlesNumber = 12;
                $dailyPromotionsArticles = 8;
                break;
            case 'expressbook':
                $newestArticlesNumber = 4;
                $bestSellersArticlesNumber = 5;
                $recommendedArticlesNumber = 5;
                $exclusiveArticlesNumber = 15;
                break;
            case 'pekabesko':
                $newestArticlesNumber = 4;
                $bestSellersArticlesNumber = 5;
                $recommendedArticlesNumber = 6;
                $exclusiveArticlesNumber = 15;
                break;
            case 'peletcentar':
                $recommendedArticlesNumber = 6;
                $popularArticlesNumber = 6;
                $bestSellersArticlesNumber = 6;
                break;
            case 'lilit':
                $recommendedArticlesNumber = 6;
                $popularArticlesNumber = 6;
                $bestSellersArticlesNumber = 6;
                break;
            case 'drbrowns':
                $recommendedArticlesNumber = 4;
                $bestSellersArticlesNumber = 8;
                $exclusiveArticlesNumber = 4;
                break;
            case 'mojoutlet':
                $recommendedArticlesNumber = 12;
                $bestSellersArticlesNumber = 16;
                $exclusiveArticlesNumber = 4;
                $newestArticlesNumber = 4;
                $dailyPromotionsArticles = 3;
                break;
            case 'crystal-bella':
                $recommendedArticlesNumber = 4;
                $bestSellersArticlesNumber = 4;
                $exclusiveArticlesNumber = 0;
                $newestArticlesNumber = 0;
                $dailyPromotionsArticles = 0;
                break;
            case 'bloomtea':
                $recommendedArticlesNumber = 4;
                $bestSellersArticlesNumber = 4;
                $exclusiveArticlesNumber = 0;
                $newestArticlesNumber = 0;
                $dailyPromotionsArticles = 0;
                break;
            case 'mymoda':
                $newestArticlesNumber = 8;
                $recommendedArticlesNumber = 8;
                $exclusiveArticlesNumber = 5;
                break;
            case 'matica':
                $bestSellersArticlesNumber = 12;
                break;
            case 'sofu':
                $newestArticlesNumber = 12;
                $bestSellersArticlesNumber = 4;
                $recommendedArticlesNumber = 4;
                $exclusiveArticlesNumber = 12;
                break;
            case 'skin-care':
                $newestArticlesNumber = 12;
                $bestSellersArticlesNumber = 4;
                $recommendedArticlesNumber = 4;
                $exclusiveArticlesNumber = 12;
                break;
            case 'clarissabalkan':
                $bestSellersArticlesNumber = 12;
                break;
            case 'herline':
                $recommendedArticlesNumber = 8;
                $recommendedArticlesNumber = 8;
                $bestSellersArticlesNumber = 8;
                break;
            case 'yeppeuda':
                $recommendedArticlesNumber = 7;
                $newestArticlesNumber = 7;
                $bestSellersArticlesNumber = 7;
                break;


            case 'naturatherapy':
                $exclusiveArticlesNumber = 4;
                $recommendedArticlesNumber = 4;
                break;

            case 'naturatherapyshop':
                $exclusiveArticlesNumber = 12;
                $recommendedArticlesNumber = 12;
                break;

            case 'torti':
                $exclusiveArticlesNumber = 4;
                $recommendedArticlesNumber = 16;
                break;

            case 'david_kompjuteri':
                $exclusiveArticlesNumber = 4;
                $recommendedArticlesNumber = 16;
                $bestSellersArticlesNumber = 20;
                break;

            case 'hotspot':
                $recommendedArticlesNumber = 12;
                $bestSellersArticlesNumber = 12;
                $exclusiveArticlesNumber = 12;
                break;
        }

        $locale = $this->locale;

        $lang = $this->lang;


        if ($newestArticlesNumber) {
            $newestArticles = $this->articleRepository->getNewest($newestArticlesNumber, $this->categoriesLastChildIds, $lang);
        }

        if ($bestSellersArticlesNumber) {
            $bestSellersArticles = $this->articleRepository->getBestSellers($bestSellersArticlesNumber, $this->categoriesLastChildIds, $lang);
        }

        if ($recommendedArticlesNumber) {
            $recommendedArticles = $this->articleRepository->getRecommended($recommendedArticlesNumber, $this->categoriesLastChildIds, $lang);
        }

        if ($popularArticlesNumber) {
            $popularArticles = $this->articleRepository->getPopular($popularArticlesNumber, $this->categoriesLastChildIds, $lang);
        }
        $dailyPromotionsArticles = $this->articleRepository->getDailyPromotions();

        if ($exclusiveArticlesNumber) {
            $exclusiveArticles = $this->articleRepository->getExclusive($exclusiveArticlesNumber, $this->categoriesLastChildIds, $lang);
        }

        if ($getManufacturers) {
            $manufacturers = $this->manufacturerRepository->getAll();
        }

        $lastBlogs = [];

        if (in_array(config( 'app.client'), [
            'peletcentar',
            'drbrowns',
            'crystal-bella',
            'shopathome',
            'bloomtea',
            'barbakan',
            'watchstore',
            'david_kompjuteri',
            'matica',
        ])) {
            $lastBlogs = Posts::getLatest(7, $lang);
        }


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
        // Get the prices for the user
        foreach ($dailyPromotionsArticles as $product) {
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $product->price = $product->{$this->priceGroup};
            } else {
                $product->price = (int) $product->{$this->priceGroup};
            }
        }

        // Get the prices for the user
        foreach ($exclusiveArticles as $product) {
            if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP_AL) {
                $product->price = $product->{$this->priceGroup};
            } else {
                $product->price = (int) $product->{$this->priceGroup};
            }
        }


        switch (config( 'app.client')) {
            case 'ibutik':
                $tempArticles = [];
                $tempArticles[] = array_slice($newestArticles, 0, 3);
                $tempArticles[] = array_slice($newestArticles, 3, 4);
                $tempArticles[] = array_slice($newestArticles, 7, 4);
                $tempArticles[] = array_slice($newestArticles, 11, 4);
                $newestArticles = $tempArticles;

                $tempArticles = [];
                $tempArticles[] = array_slice($bestSellersArticles, 0, 3);
                $tempArticles[] = array_slice($bestSellersArticles, 3, 4);
                $tempArticles[] = array_slice($bestSellersArticles, 7, 4);
                $tempArticles[] = array_slice($bestSellersArticles, 11, 4);
                $bestSellersArticles = $tempArticles;

                $tempArticles = [];
                $tempArticles[] = array_slice($recommendedArticles, 0, 3);
                $tempArticles[] = array_slice($recommendedArticles, 3, 4);
                $tempArticles[] = array_slice($recommendedArticles, 7, 4);
                $tempArticles[] = array_slice($recommendedArticles, 11, 4);
                $recommendedArticles = $tempArticles;
                break;
            case 'tehnopolis':
                //                $newestArticles = array_chunk($newestArticles, 3);
                //                $bestSellersArticles = array_chunk($bestSellersArticles, 3);
                //                $recommendedArticles = array_chunk($recommendedArticles, 3);
                //                $exclusiveArticles = array_chunk($exclusiveArticles, 3);
                $pageName = 'front_page';
                break;
            case 'topmarket':
                $tempArticles = [];
                $tempArticles[] = array_slice($newestArticles, 0, 3);
                $tempArticles[] = array_slice($newestArticles, 3, 4);
                $tempArticles[] = array_slice($newestArticles, 7, 4);
                $tempArticles[] = array_slice($newestArticles, 11, 4);
                $newestArticles = $tempArticles;

                $tempArticles = [];
                $tempArticles[] = array_slice($bestSellersArticles, 0, 3);
                $tempArticles[] = array_slice($bestSellersArticles, 3, 4);
                $tempArticles[] = array_slice($bestSellersArticles, 7, 4);
                $tempArticles[] = array_slice($bestSellersArticles, 11, 4);
                $bestSellersArticles = $tempArticles;

                $tempArticles = [];
                $tempArticles[] = array_slice($recommendedArticles, 0, 3);
                $tempArticles[] = array_slice($recommendedArticles, 3, 4);
                $tempArticles[] = array_slice($recommendedArticles, 7, 4);
                $tempArticles[] = array_slice($recommendedArticles, 11, 4);
                $recommendedArticles = $tempArticles;
                break;
            case 'kliknikupi_mk':
                break;
        }

        $metaTags['title'] = trans('global.meta.first_page');
        $metaTags['image'] = \URL::to('/') . \EasyShop\Models\AdminSettings::getField('logo');
        $metaTags['firstPage'] = true;
        $settings = Settings::first();
        if (is_null($settings)) {
            $metaTags['meta_string_homepage'] = false;
        } else {
            $metaTags['meta_string_homepage'] = $settings->meta_string_homepage;
        }

        $sliderBanners = $this->bannerRepository->getAllWebActive();

        return view(
            'clients.' . config( 'app.theme') . '.home',
            compact(
                'manufacturers',
                'newestArticles',
                'bestSellersArticles',
                'recommendedArticles',
                'popularArticles',
                'exclusiveArticles',
                'dailyPromotionsArticles',
                'bestSellersByCategoryArticles',
                'lastBlog',
                'metaTags',
                'pageName',
                'lastBlogs',
                'sliderBanners'
            )
        );
        
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages(Request $request)
    {
        $view = \Route::currentRouteName(); //$request->route()->getName();
        $title = $view;
        return view(
            'clients.' . config( 'app.theme') . '.pages.' . $view,
            compact('title')
        );
    }
}
