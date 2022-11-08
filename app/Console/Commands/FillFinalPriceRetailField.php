<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;
use DB;

class FillFinalPriceRetailField extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:final-price-retail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill the new field "final_price_retail_1"';

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
        DB::table('products')->orderBy('id')->chunk(100, function ($products) {
            foreach ($products as $product) {
                if ($product->active && is_null($product->deleted_at)) {
                    if (!is_null($product->discount_type) || !is_null($product->discount_value)) {
                        if ($product->discount_type === 'fixed') {
                            $product->final_price_retail_1 = $product->price_retail_1 - $product->discount_value;
                        } else {
                            $product->final_price_retail_1 = $product->price_retail_1 - ($product->price_retail_1 / 100) * $product->discount_value;
                        }
                    } else {
                        $product->final_price_retail_1 = $product->price_retail_1;
                    }

                    DB::table('products')->where('id', $product->id)->update([
                        'final_price_retail_1' => $product->final_price_retail_1,
                    ]);
                }
            }
        });
    }
}
