<?php

namespace EasyShop\Repositories\ArticleRepository;

interface ArticleRepositoryInterface
{

    /**
     * Get article by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);


    /**
     * Get active article by id
     *
     * @param $id
     * @return mixed
     */
    public function getActiveById($id);

    /**
     * Get all articles
     *
     * @return mixed
     */
    public function getAll();

    /**
     * @param null $categoryIds
     * @return mixed
     */
    public function getAllFeed($categoryIds = null);

    /**
     * @param $oldCategoryId
     * @param $newCategoryId
     * @return number - the number of affected rows
     */
    public function changeArticlesCategory($oldCategoryId, $newCategoryId);

    /**
     * Get newest articles
     *
     * @param integer $count
     * @param array $categoryIds
     */
    public function getNewest($count = 20, $categoryIds = null);

    /**
     * Get best sellers articles
     *
     * @param integer $count
     * @param array $categoryIds
     */
    public function getBestSellers($count = 20, $categoryIds = null);

    /**
     * Get best sellers articles
     *
     * @param integer $categoryIds
     * @param integer $count
     * @param array $exclude
     */
    public function getRelatedProducts($categoryIds, $count = 10, $exclude = [], $lang);

    /**
     * Get best sellers articles
     *
     * @param integer $count
     * @param array $categoryIds
     */
    public function getRecommended($count = 20, $categoryIds = null);

    /**
     * Get exclusive articles
     *
     * @param integer $count
     * @param array $categoryIds
     */
    public function getExclusive($count = 20, $categoryIds = null);

    /**
     * Get articles on discount
     *
     * @param integer $count
     * @param array $categoryIds
     */
    public function getOnDiscount($count = 20, $categoryIds = null);
    /**
     * Get daily promotions
     *
     */
    public function getDailyPromotions();

    /**
     * Get popular articles
     *
     * @param integer $count
     */
    public function getPopular($count = 20);

    public function search();

    public function getProductImages($id);

    public function getVariationValues($productId);

    public function getProductVariationQuantity($productId, $variationId);

    public function incrementVisit($productId);

    public function getProductAttributes($productId);

    /**
     * Get ids for products that are inside categories
     *
     * @param $categoryIds
     * @return mixed
     */
    public function getProductIdsInCategories($categoryIds);

    public function isInSession($sessionOfProductIDs, $pid);

    public function getHomeProducts($type);

    public function getUserWishlist($userId);

    public function getActiveByIds($ids);
}
