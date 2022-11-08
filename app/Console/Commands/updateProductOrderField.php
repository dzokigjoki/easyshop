<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;

use EasyShop\Models\Product;
use DB;

class updateProductOrderField extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:update_order_field';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the order field in products.';

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
        $products = Product::all();
        $count_products = 1;
        foreach($products as $product){
            $product->order = $count_products;
            $product->save();
            $count_products+=1;
        }
    }
}
