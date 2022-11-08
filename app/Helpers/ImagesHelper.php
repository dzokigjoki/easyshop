<?php

namespace EasyShop\Helpers;

use DB;

class ImagesHelper
{

    /**
     * Get category image
     *
     * @param $category
     * @return string
     */
    public function getCategoryImage($category)
    {
        $image = NULL;

        if (is_object($category)) {
            $image = $category->image;
        } else if (is_array($category)) {
            $image = $category['image'];
        } else if (is_string($category)) {
            $image = $category;
        }

        return !empty($image)
            ? (!is_null(config('app.imageDomain')) ? config('app.imageDomain') : '') .  '/uploads/category/' . $image
            : ''; // TODO: add default image
    }

    /**
     * Get product image
     *
     * @param $product
     * @param $id - Product id
     * @param $size
     * @return string
     */
    public function getProductImage($product, $id = null, $size = 'md_')
    {
        $image = NULL;

        if (is_object($product)) {
            $image = $product->image;
            $id = $product->id;
        } else if (is_array($product)) {
            $image = $product['image'];
            $id = $product['id'];
        } else if (is_string($product) && !is_null($id)) {
            $image = $product;
        }

        // TODO: add different dimensions of the image for category
        return !empty($image)
            ? (!is_null(config('app.imageDomain')) ? config('app.imageDomain') : '') .  '/uploads/products/' . $id . '/' . $size . $image
            : ''; // TODO: add default image
    }

    /**
     * Get blog image
     *
     * @param $blog
     * @param $id - Blog`id
     * @param $size
     * @return string
     */
    public function getBlogImage($blog, $id = null, $size = 'md_')
    {
        $image = NULL;

        if (is_object($blog)) {
            $image = $blog->image;
            $id = $blog->id;
        } else if (is_array($blog)) {
            $image = $blog['image'];
            $id = $blog['id'];
        } else if (is_string($blog) && !is_null($id)) {
            $image = $blog;
        }

        // TODO: add different dimensions of the image for blog
        return !empty($image) ? '/uploads/posts/' . $id . '/' . $size . $image
            : ''; // TODO: add default image
    }

    public function getBannerImage($banner, $id = null, $size = 'md_')
    {
        $image = NULL;

        if (is_object($banner)) {
            $image = $banner->image;
            $id = $banner->id;
        } else if (is_array($banner)) {
            $image = $banner['image'];
            $id = $banner['id'];
        } else if (is_string($banner) && !is_null($id)) {
            $image = $banner;
        }

        // TODO: add different dimensions of the image for blog
        return !empty($image) ? '/uploads/banners/' . $id . '/' . $size . $image
            : ''; // TODO: add default image
    }

    /**
     * Get product image
     *
     * @param $product
     * @param $id - Product id
     * @param $size
     * @return string
     */
    public function getFirstGalleryImage($product, $id = null, $size = 'md_')
    {

        $image = NULL;

        if (is_object($product)) {
            $image = DB::table('product_images')->where('product_id', '=', $product->id)->orderBy('sort_order', 'asc')->first();
            if (!empty($image)) {
                $image = $image->filename;
            }
            $id = $product->id;
        } else if (is_array($product)) {
            $image = DB::table('product_images')->where('product_id', '=', $product->id)->orderBy('sort_order', 'asc')->first();
            if (!empty($image)) {
                $image = $image->filename;
            }
            $id = $product['id'];
        } else if (is_string($product) && !is_null($id)) {
            $image = DB::table('product_images')->where('product_id', '=', $product->id)->orderBy('sort_order', 'asc')->first();
            if (!empty($image)) {
                $image = $image->filename;
            }
        }
        // TODO: add different dimensions of the image for category
        return !empty($image)
            ? (!is_null(config('app.imageDomain')) ? config('app.imageDomain') : '') .  '/uploads/products/' . $id . '/' . $size . $image
            : ''; // TODO: add default image
    }

    /**
     * Get product image
     *
     * @param $product
     * @param $id - Product id
     * @param $size
     * @return string
     */
    public function getSecondGalleryImage($product, $id = null, $size = 'md_', $imagePosition = 1)
    {

        $image = null;

        if (is_object($product)) {
            $images = DB::table('product_images')->where('product_id', '=', $product->id)->orderBy('sort_order', 'asc')->get();
            if(count($images) > $imagePosition) {
                $image = $images[$imagePosition];
            }
            $id = $product->id;
        } else if (is_array($product)) {
            $images = DB::table('product_images')->where('product_id', '=', $product['id'])->orderBy('sort_order', 'asc')->get();
            if(count($images) > $imagePosition) {
                $image = $images[$imagePosition];
            }
            $id = $product['id'];
        } else if (is_string($product) && !is_null($id)) {
            $images = DB::table('product_images')->where('product_id', '=', $product)->orderBy('sort_order', 'asc')->get();
            if(count($images) > $imagePosition) {
                $image = $images[$imagePosition];
            }
        }
        
        return !empty($image) 
            ? (!is_null(config('app.imageDomain')) ? config('app.imageDomain') : '') .  '/uploads/products/' . $id . '/' . $size . $image->filename
            : ''; // TODO: add default image
    }
}
