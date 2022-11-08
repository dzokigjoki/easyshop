<?php

namespace EasyShop\Events;

use EasyShop\Events\Event;
use EasyShop\Models\Product;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductWasPurchasedEvent extends Event
{
    use SerializesModels;

    /**
     * @var
     */
//    public $product;

    /**
     * Create a new event instance.
     *
     * @param $product Product
     *
     */
    //Product $product
    public function __construct()
    {
//        $this->product = $product;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
