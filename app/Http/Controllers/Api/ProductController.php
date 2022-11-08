<?php

namespace EasyShop\Http\Controllers\Api;

use EasyShop\Http\Controllers\Controller;

use Illuminate\Http\Request;
use JWTAuth;
use EasyShop\Services\ApiResponse;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Models\Product;
use EasyShop\Models\Wishlist;

class ProductController extends Controller
{
    protected $apiResponse;
    protected $articleRepository;

    public function __construct(
        ApiResponse $apiResponse,
        ArticleRepositoryInterface $articleRepository
    ) {
        $this->apiResponse = $apiResponse;
        $this->articleRepository = $articleRepository;
    }


    public function getHomeProducts(Request $request)
    {
        $type = $request->input('type');
        if (!in_array($type, ['exclusive', 'best_seller', 'recommended', 'newest'])) {
            return $this->apiResponse->success(['records' => []]);
        }

        $limit = $request->input('limit');
        $limit = is_numeric($limit) && $limit > 0 ? $limit : 20;


        $records = $this->articleRepository->getHomeProducts($type, $limit);

        return $this->apiResponse->success(['records' => $records]);
    }


    public function getProduct($id)
    {
        $product = $this->articleRepository->getActiveById($id);

        if (!$product) {
            return $this->apiResponse->error([], '', 404);
        }

        // Set up images
        $images = [asset('uploads/products/' . $product->id . '/' . 'md' . '_' . $product->image)];
        $additionalImages = $this->articleRepository->getProductImages($id);
        foreach ($additionalImages as $image) {
            $images[] = asset('uploads/products/' . $image->product_id . '/' . 'md' . '_' . $image->filename);
        }

        $record = new \stdClass();
        $record->id = $product->id;
        $record->title = $product->title;
        $record->sku = $product->unit_code;
        $record->description = $product->description;
        $record->totalStock = $product->total_stock;
        $record->price = (float)$product->price_retail_1;
        $record->discountPrice = (float)Product::getPriceRetail1($product, false, 2);
        $record->images = $images;
        $record->variations = $product->variationValuesAndIds()->groupBy('name');

        return $this->apiResponse->success(['record' => $record]);
    }

    /**
     * Comma separated product ids
     */
    public function getProductsByIds(Request $request)
    {

        $ids = $request->input('ids');

        if (!$ids) {
            return $this->apiResponse->success([
                'records' => []
            ]);
        }

        $ids = explode(',', $ids);

        $products = $this->articleRepository->getActiveByIds($ids);

        if (!$products) {
            return $this->apiResponse->success([
                'records' => []
            ]);
        }

        $records = [];

        foreach ($products as $product) {

            $product->price = (float)$product->price_retail_1;
            $product->discountPrice = (float)Product::getPriceRetail1($product, false, 2);
            $product->sku = $product->unit_code;
            $product->imageSM = asset('uploads/products/' . $product->id . '/' . 'sm' . '_' . $product->image);
            $product->imageMD = asset('uploads/products/' . $product->id . '/' . 'md' . '_' . $product->image);
            $product->imageLG = asset('uploads/products/' . $product->id . '/' . 'lg' . '_' . $product->image);


            $record = new \stdClass();
            $record->id = $product->id;
            $record->title = $product->title;
            $record->sku = $product->unit_code;
            $record->price = (float)$product->price_retail_1;
            $record->discountPrice = (float)Product::getPriceRetail1($product, false, 2);
            $record->imageSM = asset('uploads/products/' . $product->id . '/' . 'sm' . '_' . $product->image);
            $record->imageMD = asset('uploads/products/' . $product->id . '/' . 'md' . '_' . $product->image);
            $record->imageLG = asset('uploads/products/' . $product->id . '/' . 'lg' . '_' . $product->image);
            $records[] = $record;
        }

        return $this->apiResponse->success(['records' => $records]);
    }

    public function getWishlist()
    {
        $loggedUser = JWTAuth::parseToken()->toUser();

        if (!is_null($loggedUser)) {
            $records = $this->articleRepository->getUserWishlist($loggedUser->id);
            return $this->apiResponse->success(['records' => $records]);
        }

        return $this->apiResponse->error([], '', 422);
    }

    public function putWishlistItem($productId)
    {
        $loggedUser = JWTAuth::parseToken()->toUser();

        if (!is_null($loggedUser)) {
            $record = Wishlist::where('product_id', $productId)->where('user_id', $loggedUser->id)->first();

            if (is_null($record)) {
                $record = new Wishlist();
                $record->user_id = $loggedUser->id;
                $record->product_id = $productId;
                $record->save();
                return $this->apiResponse->success(['message' => 'Продуктот е успешно додаден кон листата на желби']);
            }
        } else {
            return $this->apiResponse->success(['message' => 'Продуктот е веќе во листата на желби']);
        }

        return $this->apiResponse->error([], '', 422);
    }


    public function deleteWishlistItem($productId)
    {
        $loggedUser = JWTAuth::parseToken()->toUser();
        
        if (!is_null(($loggedUser))) {
            $record = Wishlist::where('product_id', $productId)->where('user_id', $loggedUser)->first();

            if (!is_null($record)) {
                $record->delete();
                return $this->apiResponse->success(['message' => 'Продуктот е успешно избришан кон листата на желби']);
            }
        }
        return $this->apiResponse->success(['message' => 'Продуктот не постои во листата на желби']);
    }
}
