<?php namespace EasyShop\Repositories\ManufacturerRepository;

use DB;
use EasyShop\Models\Manufacturers;

class DBManufacturerRepository implements ManufacturerRepositoryInterface {

    /**
     * Get article by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return Manufacturers::where('id', '=', $id)->first();
    }

    /**
     * Get all articles
     *
     * @return mixed
     */
    public function getAll($order = 'order', $sort = 'ASC')
    {
        return DB::table('manufacturers')->orderBy($order, $sort)->get();
    }
}