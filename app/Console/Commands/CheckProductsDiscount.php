<?php

namespace EasyShop\Console\Commands;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Console\Command;
use EasyShop\Models\Product;
use EasyShop\Models\Discount;

class CheckProductsDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:getDiscounts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get products discount and set values in product table';

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
        // Delete old discounts
        $date = date('Y-m-d H:i:s');
        $old_discounts_ids = Discount::where('end','<',$date )->pluck('product_id');
        Product::whereIn('id',$old_discounts_ids)->update(['discount_type' => NULL,'discount_value' => NULL]);
        Discount::where('end','<',$date)->delete();

        // Get new discounts and set in product table
        $updated_products = 0;
        $max_products = 100;
        //$this->info("Get products discount");
        $count_discount = Discount::where('start',"<=",$date )->where('end','>=',$date )->count();
        //$this->info("Count products on discount $count_discount");
        $steps =  $count_discount / $max_products;
        $steps = (int) $steps;
        //$this->info("Get products in $steps steps");
        for($i = 0; $i <= $steps ; $i++)
        {
            $products = Discount::where('start',"<=",$date )
                                ->where('end','>=',$date )
                                ->offset($i * $max_products)
                                ->limit($max_products)
                                ->select('product_id','type','value','start','end','price_retail_1', 'price_retail_2','price_wholesale_1', 'price_wholesale_2','price_wholesale_3')
                                ->get();
            
            foreach($products as $key => $value)
            {

                $json_array =
                [
                    'start'             => $value['start'],
                    'end'               => $value['end'],
                    'type'              => $value['type'],
                    'value'             => $value['value'],
                    'price_retail_1'    => $value['price_retail_1'],
                    'price_retail_2'    => $value['price_retail_2'],
                    'price_wholesale_1' => $value['price_wholesale_1'],
                    'price_wholesale_2' => $value['price_wholesale_2'],
                    'price_wholesale_3' => $value['price_wholesale_3']
                ];

                $json = json_encode($json_array);
            
                $update_array = 
                [
                    'discount' => $json,
                    'discount_type' => $value['type'],
                    'discount_value' => $value['value']
                ];
                
                Product::where('id',$value['product_id'])
                        ->update($update_array);
                //$updated_products++;
            }
        }
        //$this->info("Updated $updated_products products ".count($product_ids));
    }
}
