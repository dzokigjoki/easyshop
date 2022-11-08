<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;
use EasyShop\Models\Product;
use DB;

class DeleteExpiredDiscounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired-discounts:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete the expired Discounts';

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
                $discount = DB::table('discounts')->where('product_id', $product->id)->first();

                if (is_null($discount)) continue;

                // Between
                if (strtotime($discount->start) <= time() && strtotime($discount->end) >= time()) {
                    if ($product->final_price_retail_1 === $product->price_retail_1) {
                        $product->discount_type  = $discount->type;
                        $product->discount_value = $discount->value;

                        if ($product->discount_type === 'fixed') {
                            $product->final_price_retail_1 = $product->price_retail_1 - $product->discount_value;
                        } else {
                            $product->final_price_retail_1 = $product->price_retail_1 - ($product->price_retail_1 / 100) * $product->discount_value;
                        }
                        DB::table('products')->where('id', $product->id)->update([
                            'final_price_retail_1' => $product->final_price_retail_1,
                            'discount_value' => $product->discount_value,
                            'discount_type' => $product->discount_type,
                        ]);
                    }
                    // Not between
                } else {
                    if ($product->final_price_retail_1 !== $product->price_retail_1) {
                        $product->discount_type  = NULL;
                        $product->discount_value = NULL;
                        $product->final_price_retail_1 = $product->price_retail_1;
                        DB::table('products')->where('id', $product->id)->update([
                            'final_price_retail_1' => $product->final_price_retail_1,
                            'discount_value' => $product->discount_value,
                            'discount_type' => $product->discount_type,
                        ]);
                    }
                }
            }
        });
    }
}
