<?php

namespace EasyShop\Console\Commands;

use EasyShop\Models\Product;
use Illuminate\Console\Command;

class FillLocationFieldKopkompani extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kopkompani:fill-location-field';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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
        $products = Product::whereNotNull('short_description')->get();
        foreach($products as $product) {
            $product->location = (int)$product->short_description; 
            $product->save();
        }
    }
}
