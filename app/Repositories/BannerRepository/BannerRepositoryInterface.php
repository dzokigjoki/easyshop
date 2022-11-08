<?php

namespace EasyShop\Repositories\BannerRepository;

interface BannerRepositoryInterface {

    /**
     * Get article by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);
    public function deleteBannerCategories($banner_id);
    public function getAllCategories();
    public function getNextPosition();
    
    /**
     * Get all articles
     *
     * @return mixed
     */
    public function getAll();
    public function getAllWebActive($order = 'position', $orderType = 'ASC');

    /**
     * @param null $categoryIds
     * @return mixed
     */
    public function setCategoriesHtml($array, $selected_ids, $start = 0, $parentsDisabled = true);
}