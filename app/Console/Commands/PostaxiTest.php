<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;
use EasyShop\Models\Product;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use Monolog\Logger;


class PostaxiTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'postaxi:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Postaxi test';

    /**
     * Base uri of the post office
     *
     * @var string
     */
    protected  $baseUri = 'https://test.postaxi-ks.com';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $stack = HandlerStack::create();
        $stack->push(
            Middleware::log(
                new Logger('Logger'),
                new MessageFormatter('{req_body} - {res_body}')
            )
        );

        $client = new GuzzleHttpClient([
            'base_uri' => $this->baseUri,
            'handler' => $stack,
        ]);
        // $headers = [
        //     'Content-Type' => 'application/x-www-form-urlencoded',
        // ];
        // $apiRequest = $client->request('POST', 'token', [
        //     'headers' => $headers,
        //     'form_params' => [
        //         'grant_type' => 'password',
        //         'username' => 'naturatherapy@hotmail.com',
        //         'password' => '#001.Natura',
        //     ]
        // ]);
        // $content = json_decode($apiRequest->getBody()->getContents());
   
        $params = [
            'FullName' => 'Test Test',
            'Address' => 'Pristine',
            'City' => 'Pristine',
            'Phone' => '+38344115225',
            'Amount' => '150',
            'Comment' => 'TEst',
        ];  
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer 3D99anpHJX2nWFv3hPBW2yo3pntf7K0fa4MVqPVybVikxc0ddiNXdQ3pCzaSqHC6RzhAbiAstnNgcD8BKlIZ3jqpMdvvd3tGE5xb4gEBCcF39qPKwIFoOkk0BX0kTHqftO0iHMXM2_GoVEr41eERqLeGMpJn7ACLKnHN9Llt0y9DW7osSZWABc6mEbX6nexkDPUQvPKCDIYkGY4uFa30jSDNlb1tu4WwIxYJt0waFwN6ZnihxVHm6z1ZJuhGVBVcdObVfXu9zWshFCReOhkgNgRjZ5sildet_3oKvdwJIbA-Wk6-REUHVmiMJIbYUkZj8fN2nRrQuej490BvivDI9er7HhP-CDTUiXQO6mP9plE9CFdgFGpngqyxszoZJU5GD7sd3RGuMPydEKNJMc5z2nn19f7o-Z-d5NAdEVfMeFSEbTtxr20VHocppLi2c2E0L5muncDoDTzM_GcZc4oqA1mty7qp83gCRzKGBOC6Hctwf_k9V2V_OH7V_1f68YX1',
            // 'Authorization' => 'Bearer ' . $content->access_token,
        ];


        $apiRequest = $client->post('Api/Values', [
            'headers' => $headers,
            'form_params' => $params,
        ]);

        $content = json_decode($apiRequest->getBody()->getContents());

        dd($content);
    }
}
