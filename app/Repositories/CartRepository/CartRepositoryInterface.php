<?php

namespace EasyShop\Repositories\CartRepository;

interface CartRepositoryInterface {

    /**
     * Get cart product by id
     *
     * @param $id
     * @return mixed
     */

    public function getById($id, $userId);
    public function getAll($userId);

    /**
     * Updates the cart quantity of a given product
     *
     * @param $id
     * @param $quantity
     * @return int - the number of affected rows
     */

    public function updateQuantityById($id, $quantity, $userId,$variation);

    public function insert($userId, $productId, $quantity, $variation);

    public function remove($productId, $userId, $variation);

    public function removeAll($userId);

    public function swap($guestId, $userId);

}