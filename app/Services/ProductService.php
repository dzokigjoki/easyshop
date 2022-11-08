<?php

namespace EasyShop\Services;

use EasyShop\Models\Warehouse;
use EasyShop\Models\VariationQuantity;
use EasyShop\Models\WarehouseProduct;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Product;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use File;
use Image;
use EasyShop\Models\ProductImages;

class ProductService
{
    /**
     * @var
     */
    protected $productRepository;

    /**
     * @var
     */
    protected $imageService;

    public function __construct(ArticleRepositoryInterface $productRepository)
    {
        $this->imageService = new ImageService();
        $this->productRepository = $productRepository;
    }

    /**
     * @param $productId
     * @return string
     */
    public function getProductImageDir($productId)
    {
        return public_path() . '/uploads/products/' . $productId . '/';
    }


    /**
     * Save product's main image
     *
     * @param UploadedFile $file
     * @param $productId
     * @return array
     */
    function saveMainImage($file, $productId)
    {
        

        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $watermark = Image::make(public_path() . '/assets/admin/easyshop/' . config( 'app.client') . '/watermark.png');
        }
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Image LG
        $imageLG = Image::make($file->getRealPath());
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            if (config( 'app.client') == 'shopathome') {
                $watermark->resize(30, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $watermark->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }
        
            $imageLG = $this->imageService->crop($imageLG, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'lg', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'lg', 'height'));
            
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageLG->insert($watermark, 'bottom-right');
        }
        $imageLG->save(ProductImages::imagePath($productId) . 'lg_' . $filename, 90);
        $imageLG->destroy();


        // Image MD
        $imageMD = Image::make($file->getRealPath());
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            if (config( 'app.client') == 'shopathome') {
                $watermark->resize(30, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $watermark->resize(80, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }

        $imageMD = $this->imageService->crop($imageMD, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'md', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'md', 'height'));
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageMD->insert($watermark, 'bottom-right');
        }
        $imageMD->save(ProductImages::imagePath($productId) . 'md_' . $filename, 90);
        $imageMD->destroy();

        // Image SM
        $imageSM = Image::make($file->getRealPath());
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $watermark->resize(30, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $imageSM = $this->imageService->crop($imageSM, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'sm', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'sm', 'height'));
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageSM->insert($watermark, 'bottom-right');
        }
        $imageSM->save(ProductImages::imagePath($productId) . 'sm_' . $filename, 80);
        $imageSM->destroy();

        return ['filename' => $filename];
    }

    /**
     * Save gallery images
     *
     * @param $file
     */
    public function saveGalleryImages($filepath, $filename, $productId)
    {

        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $watermark = Image::make(public_path() . '/assets/admin/easyshop/' . config( 'app.client') . '/watermark.png');
        }

        // Image LG
        $imageLG = Image::make($filepath);
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            if (config( 'app.client') == 'shopathome') {
                $watermark->resize(30, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $watermark->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }
        $imageLG = $this->imageService->crop($imageLG, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'lg', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'lg', 'height'));
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageLG->insert($watermark, 'bottom-right');
        }
        $imageLG->save(public_path() . '/uploads/products/' . $productId . '/lg_' . $filename, 90);
        $imageLG->destroy();

        // Image MD
        $imageMD = Image::make($filepath);
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            if (config( 'app.client') == 'shopathome') {
                $watermark->resize(30, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $watermark->resize(80, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
        }
        $imageMD = $this->imageService->crop($imageMD, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'md', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'md', 'height'));
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageMD->insert($watermark, 'bottom-right');
        }
        $imageMD->save(public_path() . '/uploads/products/' . $productId . '/md_' . $filename, 90);
        $imageMD->destroy();

        // Image SM
        $imageSM = Image::make($filepath);
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $watermark->resize(30, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $imageSM = $this->imageService->crop($imageSM, \EasyShop\Models\AdminSettings::getDimensions('productssize', 'sm', 'width'), \EasyShop\Models\AdminSettings::getDimensions('productssize', 'sm', 'height'));
        if (\EasyShop\Models\AdminSettings::getField('watermark')) {
            $imageSM->insert($watermark, 'bottom-right');
        }
        $imageSM->save(public_path() . '/uploads/products/' . $productId . '/sm_' . $filename, 80);
        $imageSM->destroy();
    }

    /**
     * Get total stock of product for main warehouse
     *
     * @param $productId - The id of the product
     * @return  product total stock for main warehouse
     */
    public function getTotalStockInMainWarehouse($productId)
    {

        $product = Product::find($productId);

        if ($product->has_variations) {

            $results = VariationQuantity::where('product_id', $productId)
                ->join('warehouses', 'warehouses.id', '=', 'variation_quantity.warehouse_id')
                ->join('variations', 'variations.id', '=', 'variation_quantity.variation_id')
                ->leftJoin('products', 'products.id', '=', 'variation_quantity.product_id')
                ->where('warehouses.id', '=', Warehouse::MAIN_WAREHOUSE)
                ->select('warehouses.id', 'warehouses.title', 'products.title as pt', 'variations.value', 'variation_quantity.quantity')
                ->get();

            $sum = 0;
            foreach ($results as $wh) {
                $sum += $wh->quantity;
            }
        } else {

            $warehouse_ids = WarehouseProduct::where('product_id', $productId)
                ->where('product_warehouse.warehouse_id', '=', Warehouse::MAIN_WAREHOUSE)
                ->join('warehouses', 'warehouses.id', '=', 'product_warehouse.warehouse_id')
                ->groupBy('warehouse_id')
                ->select('warehouses.title', 'product_id', 'quantity', 'warehouse_id')
                ->get();
            $i = 0;

            foreach ($warehouse_ids as $key => $value) {

                $product_in = WarehouseProduct::where('product_id', $productId)
                    ->where(function ($q) {
                        $q->where('document_type', 'priemnica')
                            ->orWhere('document_type', 'vlez')
                            ->orWhere('document_type', 'povratnica');
                    })
                    ->where('warehouse_id', $value['warehouse_id'])
                    ->sum('quantity');

                if (empty($product_in))
                    $product_in = 0;

                $product_out = WarehouseProduct::where('product_id', $productId)
                    ->where(function ($q) {
                        $q->where('document_type', 'ispratnica')
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

                $reservation_items_count = DocumentItems::whereIn('document_id', $reservation_ids)->where('product_id', $productId)->sum('quantity');

                if (empty($reservation_items_count)) {
                    $reservation_items_count = 0;
                }


                $product_in = (int)$product_in;
                $product_out = (int)$product_out;
                $warehouse_ids[$i]->quantity = $product_in - $product_out - $reservation_items_count;
                $i = $i + 1;
            }

            $sum = 0;
            foreach ($warehouse_ids as $wh) {
                $sum += $wh->quantity;
            }
        }

        return $sum;
    }

    /**
     * Get if the product is foreign or is it domestic
     *
     * @param Product $product
     * @return string
     */
    public function flagForeignDomestic(Product $product)
    {
        return $product->zemja_poteklo === 1 ? 'D' : 'S';
    }

    /**
     * Flag if the product is 'product' or 'service'
     *
     * @param Product $product
     * @return string
     */
    public function flagProductService(Product $product)
    {
        return $product->type === Product::TYPE_PRODUCT ? 'P' : 'S';
    }


    /**
     * @param array $cateogyIds
     * @return mixed
     */
    public function getProductIdsInCategories($cateogyIds = [])
    {
        return $this->productRepository->getProductIdsInCategories($cateogyIds);
    }


    public function getHomeProducts($type)
    {
        $products = $this->productRepository->getHomeProducts($type);
        foreach ($products as $product) {
        }

        return json_encode($products);
    }
}
