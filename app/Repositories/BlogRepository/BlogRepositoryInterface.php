<?php

namespace EasyShop\Repositories\BlogRepository;

use EasyShop\Models\Posts;

interface BlogRepositoryInterface {

    /**
     * Find blog by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id);
    
    /**
     * Get blogs pagination
     *
     * @param $perPage 
     * @return mixed
     */
    public function getAll($perPage = 6);

    /**
     * Increment visits of a blog
     *
     * @param $id
     * @return mixed
     */
    public function incrementVisits($id);

    /**
     * Get last blog item from category
     *
     * @param $categoryId
     * @return mixed
     */
    public function getLastFromCategory($categoryId);

    /**
     * Get filtered products for category
     *
     * @param int $categoryId
     * @param int $paginate
     * @return mixed
     */
    public function getFilteredPostsPagination($categoryId, $paginate = 20);

    public function getLatest();
    public function getNewest($count = 10);

    public function setCategoriesHtml($array, $selected_ids, $start = 0, $parentsDisabled = true);

}