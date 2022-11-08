<?php

namespace EasyShop\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'EasyShop\Events\UserRegisterEvent' => [
            'EasyShop\Listeners\SendRegistrationEmailListener',
        ],
        'EasyShop\Events\ProductWasPurchasedEvent' => [
            'EasyShop\Listeners\SendWebPushNotificationListener',
        ],
        'EasyShop\Events\UserLoginEvent' => [
            'EasyShop\Listeners\SwapProductsFromSessionToDatabase',
        ],
        'EasyShop\Events\ProductDeleteEvent' => [
            'EasyShop\Listeners\DeleteProductDiscounts',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
