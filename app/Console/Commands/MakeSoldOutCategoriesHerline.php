<?php

namespace EasyShop\Console\Commands;

use EasyShop\Models\Product;
use Illuminate\Console\Command;

class MakeSoldOutCategoriesHerline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'herline:make-sold-out-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change the sold_out boolean to 1 to show the Sold Out Badge on the categories';

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
        foreach($products as $product) {
            $productCategories = Product::with('categories')->find($product->id)->categories->pluck('id')->toArray();
            if(!in_array(17, (array)$productCategories) && !in_array(14, (array)$productCategories) && !in_array(10, (array)$productCategories) && !in_array(15, (array)$productCategories)) {
                $product->sold_out = 1;
            } else {
                $product->sold_out = 0;
            }

            $product->save();
        }
    }
}
