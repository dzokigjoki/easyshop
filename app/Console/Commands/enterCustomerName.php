<?php

namespace EasyShop\Console\Commands;

use EasyShop\Models\Document;
use Illuminate\Console\Command;

class enterCustomerName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enter_customers_name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        $documents = Document::all();
        foreach( $documents as $document ){
            $d = json_decode($document->document_json);
            if(!isset($d->customer_name)){
                if (isset($d->userBilling)) {
                    if (!isset($d->userBilling->first_name) && !isset($d->userBilling->last_name)) {
                        $document->customer_name = "/";
                    } else if(!isset($d->userBilling->first_name)){
                        $document->customer_name = $d->userBilling->last_name;
                    }else if(!isset($d->userBilling->last_name)){
                        $document->customer_name = $d->userBilling->first_name;
                    }else {
                        $document->customer_name = $d->userBilling->first_name . " " . $d->userBilling->last_name;
                    }
                    
                } else if (isset($d->userShipping)) {
                    if (!isset($d->userShipping->first_name) && !isset($d->userShipping->last_name)) {
                        $document->customer_name = "/";
                    } else if (!isset($d->userShipping->first_name)) {
                        $document->customer_name = $d->userShipping->last_name;
                    } else if (!isset($d->userShipping->last_name)) {
                        $document->customer_name = $d->userShipping->first_name;
                    } else{
                        $document->customer_name = $d->userShipping->first_name . " " . $d->userBilling->last_name;
                    } 
                }
                $document->save();
            }
            
        }
    }
}
