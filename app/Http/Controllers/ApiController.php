<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\Payment;
use EasyShop\Models\Product;
use EasyShop\Models\User;
use EasyShop\Models\Variations;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\DocumentRepository\DocumentRepositoryInterface;
use EasyShop\Services\ProductService;
use EasyShop\Services\ApiResponse;
use EasyShop\Services\CategoryService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use stdClass;

class ApiController extends Controller
{
    protected $apiResponse;
    protected $categoryService;
    protected $productRepository;
    protected $productService;
    protected $documentRepository;

    public function __construct(
        ApiResponse $apiResponse,
        CategoryService $categoryService,
        ArticleRepositoryInterface $productRepository,
        DocumentRepositoryInterface $documentRepository,
        ProductService $productService
    ) {
        $this->apiResponse = $apiResponse;
        $this->categoryService = $categoryService;
        $this->productRepository = $productRepository;
        $this->documentRepository = $documentRepository;
        $this->productService = $productService;
    }
}
