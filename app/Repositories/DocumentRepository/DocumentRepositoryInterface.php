<?php namespace EasyShop\Repositories\DocumentRepository;

interface DocumentRepositoryInterface {

    /**
     * Get document by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);
    public function create($document);

    /**
     * @param $warehouseId
     * @return mixed
     */
    public function countUndeliveredOrdersByWarehouse($warehouseId);
    public function getNext100UnprocessedOrdersByWarehouse($warehouseId, $lastOrderId);

    public function updateOrderStatus($documentNumber, $status);
}