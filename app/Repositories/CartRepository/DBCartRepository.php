<?php namespace EasyShop\Repositories\CartRepository;

use DB;
use EasyShop\Models\ShoppingCart;

class DBCartRepository implements CartRepositoryInterface {

    /**
     * Get cart product by id
     *
     * @param $id
     * @return mixed
     */

    public function getById($id, $userId,$variation = null)
    {
        $column = !\Auth::check() ? 'guest_id' : 'user_id';
        $db     = DB::table('shopping_cart')->where('product_id', '=', $id)->where($column, $userId);
        if($variation)
            $db->where('variation',$variation);
        return  $db->first();
    }

    public function getAll($userId)
    {
        $column = !\Auth::check() ? 'guest_id' : 'user_id';

        return DB::table('shopping_cart')            
            ->where($column, $userId)
            ->get();
    }

    /**
     * Updates the cart quantity of a given product
     *
     * @param $id
     * @param $quantity
     * @return int - the number of affected rows
     */

    public function updateVariationById($id, $variation, $userId)
    {
        $column = !\Auth::check() ? 'guest_id' : 'user_id';

        $product_id     =   explode('_',$id);   

        $db     =   DB::table('shopping_cart')->where('product_id', '=', $product_id[0])->where($column, '=', $userId)->where('variation',$product_id[1]);
        
        $db->update(['variation' => $variation]);
    }

    public function updateQuantityById($id, $quantity, $userId,$variation=null)
    {
        
        $column = !\Auth::check() ? 'guest_id' : 'user_id';
        $db     = DB::table('shopping_cart')->where('id', '=', $id)->where($column, '=', $userId);

        if($variation)
            $db->where('variation',$variation);
        
        return $db->update(['quantity' => $quantity]);
    }

    public function insert($userId, $productId, $quantity, $variation)
    {
        $column = !\Auth::check() ? 'guest_id' : 'user_id';

        if(is_null(self::getById($productId, $userId,$variation)))
        {
            $shoppingCart = new ShoppingCart();
            $shoppingCart->{$column} = $userId;
            $shoppingCart->product_id = $productId;
            $shoppingCart->quantity = $quantity;
            $shoppingCart->variation = empty($variation) ? null : $variation;
            $shoppingCart->save();
        }
        else
        {
            self::updateQuantityById($productId, $quantity, $userId,$variation);
        }
    }

    public function remove($productId, $userId, $variation=null)
    {
        $column = !\Auth::check() ? 'guest_id' : 'user_id';
        $db     = DB::table('shopping_cart')->where('product_id', '=', $productId)->where($column, '=', $userId);

        if($variation)
            $db->where('variation',$variation);
        
        return $db->delete();
    }

    public function removeAll($userId)
    {
        $column = !\Auth::check() ? 'guest_id' : 'user_id';

        return DB::table('shopping_cart')
            ->where($column, '=', $userId)
            ->delete();
    }

    public function swap($guestId, $userId)
    {
        return DB::table('shopping_cart')
            ->where('guest_id', '=', $guestId)
            ->update(['guest_id' => null, 'user_id' => $userId]);
    }
}