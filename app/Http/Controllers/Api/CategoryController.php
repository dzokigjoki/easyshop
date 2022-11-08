<?php

namespace EasyShop\Http\Controllers\Api;

use EasyShop\Http\Controllers\Controller;

use Illuminate\Http\Request;
use JWTAuth;
use EasyShop\Services\CategoryService;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\ApiResponse;
use EasyShop\Models\Product;

class CategoryController extends Controller
{
	protected $apiResponse;
    protected $categoryService;
    protected $categoryRepository;

    public function __construct(
        ApiResponse $apiResponse, 
        CategoryService $categoryService,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->apiResponse = $apiResponse;
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get categories that are in main menu
     *
     */
    public function getAll()
    {
        $records = $this->categoryService->getJsonCategoryList();

        return $this->apiResponse->success(['records' => $records]);
    }

    /**
     * Get category with initial products
     *
     */
    public function getCategory(Request $request, $id)
    {

        $category = $this->categoryRepository->getById($id);

        if (is_null($category) || !$category->active) {
             return $this->apiResponse->error([], 'No category found.', 404);
        }

        $productFilters = $this->categoryService->getFilters($request->all(), 'price_retail_1');
        $productFilters->limit = 24;

        $categoryFilters = $category->filters()->with('attributes')->get();

        $sliderRange = $this->categoryRepository->getSliderPrices('price_retail_1', $id);
        $sliderRange->max = (float)$sliderRange->max_price;
        $sliderRange->min = (float)$sliderRange->min_price;

        list($products, $count) = $this->categoryRepository->getFilteredProducts($category->id, 'price_retail_1', $productFilters);

        $totalPages = ceil($count / $productFilters->limit);
        $productFilters->totalPages = $totalPages;
        $productFilters->totalProducts = $count;



        foreach ($products as $product) {
            $product->price = (float)$product->price_retail_1;
            $product->discountPrice = (float)Product::getPriceRetail1($product, false, 2);
            $product->sku = $product->unit_code;
            $product->imageSM = asset('uploads/products/' . $product->id . '/' . 'sm' . '_' . $product->image);
            $product->imageMD = asset('uploads/products/' . $product->id . '/' . 'md' . '_' . $product->image);
            $product->imageLG = asset('uploads/products/' . $product->id . '/' . 'lg' . '_' . $product->image);

            unset($product->unit_code);
            unset($product->discount_type);
            unset($product->discount_value);
            unset($product->price_retail_1);
        }

        return $this->apiResponse->success([
            'category' => $category,
            'categoryFilters' => $categoryFilters,
            'productFilters' => $productFilters,
            'sliderRange' => $sliderRange,
            'products' => $products,
        ]);
    }

    /**
     * Get category filtered products
     *
     */
    public function getCategoryProducts(Request $request, $id)
    {

        $category = $this->categoryRepository->getById($id);

        if (is_null($category) || !$category->active) {
             return $this->apiResponse->error([], 'No category found.', 404);
        }

        $productFilters = $this->categoryService->getFilters($request->all(), 'price_retail_1');
        $productFilters->limit = 24;

        list($products, $count) = $this->categoryRepository->getFilteredProducts($category->id, 'price_retail_1', $productFilters);

        $totalPages = ceil($count / $productFilters->limit);
        $productFilters->totalPages = $totalPages;
        $productFilters->totalProducts = $count;


        foreach ($products as $product) {
            $product->price = (float)$product->price_retail_1;
            $product->discountPrice = (float)Product::getPriceRetail1($product, false, 2);
            $product->sku = $product->unit_code;
            $product->imageSM = asset('uploads/products/' . $product->id . '/' . 'sm' . '_' . $product->image);
            $product->imageMD = asset('uploads/products/' . $product->id . '/' . 'md' . '_' . $product->image);
            $product->imageLG = asset('uploads/products/' . $product->id . '/' . 'lg' . '_' . $product->image);

            unset($product->unit_code);
            unset($product->discount_type);
            unset($product->discount_value);
            unset($product->price_retail_1);
        }

        return $this->apiResponse->success([
            'category' => $category,
            'productFilters' => $productFilters,
            'products' => $products,
        ]);
    }


}
