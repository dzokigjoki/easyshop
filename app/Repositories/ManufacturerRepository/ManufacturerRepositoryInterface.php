<?php 

    namespace EasyShop\Repositories\ManufacturerRepository;

interface ManufacturerRepositoryInterface {

    /**
     * Get article by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Get all articles
     *
     * @return mixed
     */
    public function getAll($order = 'order', $sort = 'ASC');

}