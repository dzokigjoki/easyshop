<?php

namespace EasyShop\Services;

use EasyShop\Models\DocumentItems;
use EasyShop\Models\VariationQuantity;
use EasyShop\Models\Product;

class DocumentService
{

    /**
     * Reserve products
     *
     * @param $documentId
     * @param $warehouseId
     */
    public function reserveProducts($documentId, $warehouseId)
    {
        $documentItems = DocumentItems::where('document_id', $documentId)->get();

        foreach ($documentItems as $documentItem) {

            // With variation
            if (is_null($documentItem->variation_id)) {
                $product = Product::where('id', $documentItem->product_id)->first();
                $product->total_stock = $product->total_stock - $documentItem->quantity;
                $product->save();
            }
            // Without variation
            else {
                $productVariation = VariationQuantity::where('product_id', $documentItem->product_id)
                    ->where('variation_id', $documentItem->variation_id)
                    ->where('warehouse_id', $warehouseId)->first();

                // If variation doesn't exists, create with ZERO quantity
                if (is_null($productVariation)) {
                    $productVariation = new VariationQuantity();
                    $productVariation->product_id = $documentItem->product_id;
                    $productVariation->variation_id = $documentItem->variation_id;
                    $productVariation->warehouse_id = $documentItem->{$warehouseId};
                    $productVariation->quantity = 0;
                    $productVariation->save();
                }

                $productVariation->quantity = $productVariation->quantity - $documentItem->quantity;
                $productVariation->save();
            }
        }
    }

    /**
     * Unreserve products
     *
     * @param $documentId
     * @param $warehouseId
     */
    public function unReserveProducts($documentId, $warehouseId)
    {
        $documentItems = DocumentItems::where('document_id', $documentId)->get();
        foreach ($documentItems as $documentItem) {
            // Without variation
            if (is_null($documentItem->variation_id)) {
                $product = Product::where('id', $documentItem->product_id)->first();
                $product->total_stock = $product->total_stock + $documentItem->quantity;
                $product->save();
            }
            // With variation
            else {
                $productVariation = VariationQuantity::where('product_id', $documentItem->product_id)
                    ->where('variation_id', $documentItem->variation_id)
                    ->where('warehouse_id', $warehouseId)->first();

                // If variation doesn't exists, create with ZERO quantity
                if (is_null($productVariation)) {
                    $productVariation = new VariationQuantity();
                    $productVariation->product_id = $documentItem->product_id;
                    $productVariation->variation_id = $documentItem->variation_id;
                    $productVariation->warehouse_id = $documentItem->{$warehouseId};
                    $productVariation->quantity = 0;
                    $productVariation->save();
                }

                $productVariation->quantity = $productVariation->quantity + $documentItem->quantity;
                $productVariation->save();
            }
        }
    }
}
