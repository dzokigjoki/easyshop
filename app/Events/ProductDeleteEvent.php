<?php

namespace EasyShop\Events;

use EasyShop\Events\Event;
use Illuminate\Queue\SerializesModels;
use EasyShop\Models\Product;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductDeleteEvent extends Event
{
    use SerializesModels;

    public $product;

    public function __construct(Product $product)
    {
        
        $this->product = $product;
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
