<?php

namespace EasyShop\Console\Commands;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Console\Command;
use EasyShop\Models\Product;

class GetProductsAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:getFromApi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get products from API';

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
        // MOVE THIS TO CONFIG
        $config_array = 
        [
            'unit_code'     =>  'ItemID',
            'title'         =>  'ItemName',
            'unit_id'       =>  'UnitID',
            'vat'           =>  'VatValue',
            'total_stock'   =>  'StockQTY',
            'price_retail_1'=>  'Price',
        ];

        $api_url = "http://pekabesko.ddns.net/SSBService/api/inventory";

        $this->info('Get products from API');
        $this->info($api_url);

        $response = Curl::to($api_url)->asJson()->get();
        $count = 0;
        foreach($response as $res)
        {
            $res = (array) $res;
            $temp = 
            [
                'unit_code'     =>  $res[$config_array['unit_code']],
                'title'         =>  $res[$config_array['title']],
                'unit_id'       =>  $res[$config_array['unit_id']],
                'vat'           =>  $res[$config_array['vat']],
                'total_stock'   =>  $res[$config_array['total_stock']],
                'price_retail_1'=>  $res[$config_array['price_retail_1']],
                'url'           =>  str_slug($res[$config_array['title']])
            ];

            Product::updateOrCreate(
                ['unit_code' =>  $res[$config_array['unit_code']]], 
                $temp
            );
            $count++;
        }
        $this->info("Inserted/Updated $count records in DB");
    }
}
