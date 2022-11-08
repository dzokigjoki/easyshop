<?php

namespace EasyShop\Http\Controllers;

use EasyShop\Models\Product;
use EasyShop\Repositories\ManufacturerRepository\ManufacturerRepositoryInterface;
use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use Cache;


class ManufacturerController extends FrontController
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
    protected $manufacturerRepository;

    /**
     * @param CategoryService $categoryService
     */
	public function __construct(
        CategoryService $categoryService,
        ManufacturerRepositoryInterface $manufacturerRepository
    )
    {
        parent::__construct($categoryService);

        $this->categoryService = $categoryService;
        $this->manufacturerRepository = $manufacturerRepository;
        $this->user = \Auth::user();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $request, $id)
    {
        $manufacturer = $this->manufacturerRepository->getById($id);

        if (is_null($manufacturer)) {
            abort(404);
        }

        $perPage = 40;

        switch(config( 'app.client')) {
            case 'matica':
                $perPage = 48;
                break;
        }

        $products = Product::where('manufacturer_id', '=', $id)
            ->where('active', '=', 1)
            // ->where('show_on_web', '=', 1)
            ->paginate($perPage);

        return view('clients.' . config( 'app.theme') . '.' . 'manufacturer',
            compact('products', 'manufacturer'));
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

        $category = Product::getProductByIdInLang($request->input('id'), $lang);

        if (is_null($category) || !$category->active) {
            abort(404);
        }

        $productFilters = $this->categoryService->getFilters($request->all(), $this->priceGroup);

        list($data['products'], $data['count']) = $this->categoryRepository->getFilteredProducts($category->id, $this->priceGroup, $productFilters);

        $data['totalPages'] = ceil($data['count'] / $productFilters->limit);

        // Set price
        foreach($data['products'] as $product) {
            $product->price = (int)$product->{$this->priceGroup};
        }

        switch (config( 'app.client')) {
            case 'ibutik':
            case 'perla':
            case 'tehnopolis':
                $data['productsChunk'] = array_chunk($data['products'], 3);
                break;
            default:
                $data['productsChunk'] = $data['products'];
                break;
        }

        $data['productFilters'] = $productFilters;


        return view('clients.' . config( 'app.theme') . '.' . 'partials.category-products-list', $data)->render();
    }

}
