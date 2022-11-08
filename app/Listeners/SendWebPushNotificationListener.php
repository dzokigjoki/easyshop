<?php

namespace EasyShop\Listeners;

use EasyShop\Events\ProductWasPurchasedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use GuzzleHttp\Client;

class SendWebPushNotificationListener
{
    /**
     * @var
     */
    protected $client;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * Handle the event.
     *
     * @param  ProductSoldEvent  $event
     * @return void
     */
    public function handle(ProductWasPurchasedEvent $event)
    {
        $this->client->post('https://onesignal.com/api/v1/notifications',[
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Basic ' . config('onesignal.rest_key'),
            ],
            'json' => [
                'app_id' => config('onesignal.key'),
                'included_segments' => ['Active Users'],
                'headings' => [
                    'en' => 'Нова нарачка!'
                ],
                'contents' => [
                    'en' => 'Платено е 3000 денари'
                ],
//                'data' => [
//                    'foo' => 'bar'
//                ]
            ]
        ]);
    }

}
