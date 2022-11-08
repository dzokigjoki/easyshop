<?php

namespace EasyShop\Listeners;

use EasyShop\Events\ProductDeleteEvent;
use Illuminate\Queue\InteractsWithQueue;
use EasyShop\Models\Discount;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeleteProductDiscounts
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductDeleteEvent  $event
     * @return void
     */
    public function handle(ProductDeleteEvent $event)
    {
        $product = $event->product;

        Discount::where("product_id", $product->id)->delete();
        
    }
}
