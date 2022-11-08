<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\DocumentsFiskalnaItems as FiskalnaItems;
class FixProductsInRelatedDocuments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:fixProductsInRelatedDocuments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix products, quantity and prices and update total products by warehouses';

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
        // FIX ALL FISKALNI FIRST
        $all_documents_count    = DocumentsRelated::whereNotNull('fiskalna_id')->count();
        $razlika_fiskalna       = $this->fix($all_documents_count,'fiskalna_id');
        // FIX FAKTURI
        $all_documents_count    = DocumentsRelated::whereNotNull('faktura_id')->count();
        $razlika_faktura        = $this->fix($all_documents_count,'faktura_id');

        $this->info(" Fiskalni so pronajdena razlika " . json_encode($razlika_fiskalna)); 
        $this->info(" Fakturi so pronajdena razlika " . json_encode($razlika_faktura)); 

    }

    public function fix($all_documents_count,$document_key)
    {
        $limit = 5;
        $offset = 0;
        $razlika_fiskalna = [];
        $razlika_faktura = [];
        while ($all_documents_count - $offset > 0) {
            $documents = DocumentsRelated::whereNotNull("$document_key")->limit($limit)->offset($offset)->get();
            $offset = $offset + $limit;
            foreach ($documents as $document) {
                //dd($document);
                if($document_key == 'fiskalna_id')
                {
                    
                    $select = ['product_id','item_name','quantity','price','vat','price_no_vat','sum_no_vat','sum_vat','variation_id','original_price','original_price_no_vat','original_sum_vat','original_sum_no_vat','discount_type','discount_type_value','discount_value'];
                    $fiskalna_items     = FiskalnaItems::where('document_id',$document->fiskalna_id)->select($select)->get()->toArray();
                    $ispratnica_items   = DocumentItems::where('document_id',$document->ispratnica_id)->select($select)->get()->toArray();
                    $naracka_items      = DocumentItems::where('document_id',$document->naracka_id)->select($select)->get()->toArray();
                    // Compare all values by a json_encode
                    $diff1 = array_diff(array_map('json_encode', $fiskalna_items), array_map('json_encode', $ispratnica_items));
                    // Json decode the result
                    $diff1 = array_map('json_decode', $diff1);
                    // Compare all values by a json_encode
                    $diff2 = array_diff(array_map('json_encode', $ispratnica_items), array_map('json_encode', $naracka_items));
                    // Json decode the result
                    $diff2 = array_map('json_decode', $diff2);
                    
                    if(count($diff1) || count($diff2)){
                        $this->info("Za fiskalna_id - $document->fiskalna_id pronajdena e razlika vo ispratnica ($document->ispratnica_id) / naracka ($document->naracka_id) ");
                        $razlika_fiskalna[] = $document->fiskalna_id;                        
                    }else
                        $this->info("Za fiskalna_id - $document->fiskalna_id  ne e pronajdena razlika vo ispratnica ($document->ispratnica_id) / naracka ($document->naracka_id) ");
                }

                if($document_key == 'faktura_id')
                {
                    
                    $select = ['product_id','item_name','quantity','price','vat','price_no_vat','sum_no_vat','sum_vat','variation_id','original_price','original_price_no_vat','original_sum_vat','original_sum_no_vat','discount_type','discount_type_value','discount_value'];
                    $faktura_items      = DocumentItems::where('document_id',$document->faktura_id)->select($select)->get()->toArray();
                    $ispratnica_items   = DocumentItems::where('document_id',$document->ispratnica_id)->select($select)->get()->toArray();
                    $naracka_items      = DocumentItems::where('document_id',$document->naracka_id)->select($select)->get()->toArray();
                   // Compare all values by a json_encode
                    $diff1 = array_diff(array_map('json_encode', $faktura_items), array_map('json_encode', $ispratnica_items));
                    // Json decode the result
                    $diff1 = array_map('json_decode', $diff1);
                    // Compare all values by a json_encode
                    $diff2 = array_diff(array_map('json_encode', $ispratnica_items), array_map('json_encode', $naracka_items));
                    // Json decode the result
                    $diff2 = array_map('json_decode', $diff2);
                    if(count($diff1) || count($diff2)){
                        $this->info("Za faktura_id - $document->faktura_id pronajdena e razlika vo ispratnica ($document->ispratnica_id) / naracka ($document->naracka_id) ");
                        $razlika_faktura[] = $document->faktura_id;                        
                    }else
                        $this->info("Za faktura_id - $document->faktura_id  ne e pronajdena razlika vo ispratnica ($document->ispratnica_id) / naracka ($document->naracka_id) ");
                }
                
            }            
        }
        if($document_key == 'fiskalna_id')
            return json_encode($razlika_fiskalna); 
        if($document_key == 'faktura_id')
            return json_encode($razlika_faktura); 
    }
}
