<?php

namespace EasyShop\Repositories\CategoryRepository;

interface CategoryRepositoryInterface {

    /**
     * Get category by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id);


    /**
     * Get all articles
     *
     * @param $orderBy
     * @param $order
     *
     * @return mixed
     */
    public function getAll($orderBy = NULL, $order = 'asc');
    
    /**
     * Get all active category lists
     *
     * @param $orderBy
     * @param $order
     *
     * @return array
     */
    public function getAllActive($orderBy = NULL, $order = 'asc');

    public function getCategoriesForJson($orderBy = NULL, $order = 'asc');


    public function getAllBlogListing($orderBy = 'title', $order = 'asc');

    /**
     * Get active children of category
     *
     * @param $categoryId
     * @param null $orderBy
     * @param string $order
     * @return mixed
     */
    public function getActiveChildren($categoryId, $orderBy = NULL, $order = 'asc');

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id);

    /**
     * Delete all categories related with product
     *
     * @param $productId
     * @return mixed
     */
    public function deleteForProduct($productId);

    /**
     * @param $parentId
     * @return mixed
     */
    public function getNextOrder($parentId = NULL);

    /**
     * @param $categoryId
     * @param $parentId
     * @param $position
     * @return mixed
     */
    public function updateOrders($categoryId, $parentId, $position);

    /**
     * Returns an array that consists of filter names for a given category
     *
     * @param $cid
     *
     * @returns array
     */

    public function getFiltersForCategory($cid);

    /**
     * Returns an array that consists of filter attributes for a given filter
     *
     * @param $fid
     *
     * @returns array
     */

    public function getAttributesForFilter($fid);
    public function getFilterName($fid);
    public function getFiltersArray($filters);

    /**
     * Get min and max prices for category slider
     *
     * @param $priceGroup
     * @param $categoryId
     * @return mixed
     */
    public function getSliderPrices($priceGroup, $categoryId);

    /**
     * Get filtered products for category
     *
     * @param int $categoryId
     * @param string $priceGroup
     * @param object $filters
     * @return mixed
     */
    public function getFilteredProducts($categoryId, $priceGroup, $filters, $lang);
}