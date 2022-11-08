<?php namespace EasyShop\Services;

use Carbon\Carbon;
use EasyShop\Models\Warehouse;
use EasyShop\Models\ReportNivelacija;
use EasyShop\Models\ReportNivelacijaItems;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentsFiskalna;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\DocumentsFiskalnaItems;
use EasyShop\Models\ReportDFI;
use EasyShop\Models\ReportKDFI;

class ReporsService {

    public function checkLastDateNivelacija()
    {
        $date = ReportNivelacija::orderBy('datum_knizenje','desc')->first();
        if(empty($date))
            return 0;
        else
            return $date->datum_knizenje;
    }

    public function checkLastDateDfi()
    {
        $date = ReportDFI::orderBy('datum_knizenje','desc')->first();
        if(empty($date))
            return 0;
        else
            return $date->datum_knizenje;
    }

    public function checkLastDateKdfi()
    {
        $date = ReportKDFI::orderBy('datum_prenos','desc')->first();
        if(empty($date))
            return 0;
        else
            return $date->datum_prenos;
    }
    /**
     * Generate nivelacija
     *
     */
    public function generateNivelacija($dateString)
    {

        $date = new Carbon($dateString);

        $nivelacija_count   = 0;

        // Zemi gi site dukjani
        $warehouses = Warehouse::where('prodavnica', 1)->select('id')->get();
        $datum      = date('Y-m-d H:i:s');

        foreach ($warehouses as $key => $value) {
            $from_date  = $date->timestamp;
            $to_date    = $date->timestamp;

            $check = ReportNivelacija::where('warehouse_id',$value->id)->where('datum_knizenje', date('Y-m-d', $from_date))->count();

            if($check < 1) {

                $documents_id = Document::where('warehouse_id',$value->id)->where('type','faktura')
                    ->where('status','generirana')
                    ->where('document_date','>=',date('Y-m-d 00:00:00', $from_date))
                    ->where('document_date','<=',date('Y-m-d 23:59:59', $to_date))
                    ->pluck('id');

                $documents_id_fiskalna = DocumentsFiskalna::where('warehouse_id',$value->id)
                    ->where('document_date','>=',date('Y-m-d 00:00:00',$from_date))
                    ->where('document_date','<=',date('Y-m-d 23:59:59',$to_date))
                    ->whereIn('status',['generirana', 'paragon'])
                    ->pluck('id');


                $dit = DocumentItems::whereIn('document_id',$documents_id)
                    ->join('products','products.id','=','document_items.product_id')
                    ->where('products.type','')
                    ->whereNotNull('document_items.discount_type')
                    ->select('document_items.*')
                    ->get();

                $iznos_count = 0;
                $created_rn = 0;
                if(!$dit->isEmpty())
                {
                    $rn = new ReportNivelacija();
                    $rn->datum_knizenje     = $date->format('Y-m-d H:i:s');
                    $rn->datum_dokument     = $date->format('Y-m-d H:i:s');
                    $rn->warehouse_id       = $value->id;
                    $rn->employee_id        = 1;
                    $rn->save();
                    $created_rn = 1;

                    foreach ($dit as $kdit => $di) {
                        # code...

                        $dn =   Document::where('id',$di->document_id)->select('document_number')->first();

                        $nitms  = new ReportNivelacijaItems();

                        $nitms->nivelacija_id          =    $rn->id;
                        $nitms->document_number        =    'Фактура '.$dn->document_number;
                        $nitms->product_id             =    $di->product_id;
                        $nitms->unit_code              =    $di->unit_code;
                        $nitms->item_name              =    $di->item_name;
                        $nitms->quantity               =    $di->quantity;
                        $nitms->old_price              =    $di->original_price;
                        $nitms->old_price_sum          =    $di->original_sum_vat;
                        $nitms->new_price              =    $di->price;
                        $nitms->new_price_sum          =    $di->sum_vat;
                        $nitms->price_difference       =    $di->quantity * $di->discount_value;
                        $nitms->vat_difference         =    $di->quantity * ($di->discount_value - ($di->discount_value / (1 + ($di->vat / 100))));
                        $nitms->vat                    =    $di->vat;
                        $nitms->variation_id           =    $di->variation_id;
                        $nitms->save();
                        $iznos_count                   =    $iznos_count + $nitms->price_difference;
                    }


                }

                $dfit = DocumentsFiskalnaItems::whereIn('document_id',$documents_id_fiskalna)->whereNotNull('discount_type')->where('proizvod_usluga','P')->get();
                if(!$dfit->isEmpty()){

                    if(empty($created_rn)){
                        $rn = new ReportNivelacija();
                        $rn->datum_knizenje     = $date->format('Y-m-d H:i:s');
                        $rn->datum_dokument     = $date->format('Y-m-d H:i:s');
                        $rn->warehouse_id       = $value->id;
                        $rn->employee_id        = 1;
                        $rn->save();
                        $created_rn = 1;
                    }

                    foreach ($dfit as $kdit => $di) {
                        # code...

                        $dn =   DocumentsFiskalna::where('id',$di->document_id)->select('document_number')->first();

                        $nitms  = new ReportNivelacijaItems();

                        $nitms->nivelacija_id          =    $rn->id;
                        $nitms->document_number        =    'Фискална '.$dn->document_number;
                        $nitms->product_id             =    $di->product_id;
                        $nitms->unit_code              =    $di->unit_code;
                        $nitms->item_name              =    $di->item_name;
                        $nitms->quantity               =    $di->quantity;
                        $nitms->old_price              =    $di->original_price;
                        $nitms->old_price_sum          =    $di->original_sum_vat;
                        $nitms->new_price              =    $di->price;
                        $nitms->new_price_sum          =    $di->sum_vat;
                        $nitms->price_difference       =    $di->quantity * $di->discount_value;
                        $nitms->vat_difference         =    $di->quantity * ($di->discount_value - ($di->discount_value / (1 + ($di->vat / 100))));
                        $nitms->vat                    =    $di->vat;
                        $nitms->variation_id           =    $di->variation_id;
                        $nitms->save();
                        $iznos_count                   =    $iznos_count + $nitms->price_difference;
                    }

                }

                if(!empty($created_rn)){
                    $count_docs = ReportNivelacija::where('datum_knizenje','>=',date('Y-01-01 00:00:00'))
                        ->where('datum_knizenje','<=',date('Y-m-d H:i:s'))
                        ->whereNotNull('document_number')
                        ->count();

                    $rn->document_number    = sprintf('%02d', $value->id).'-'.sprintf('%05d', $count_docs).'/'.date('y');
                    $rn->iznos              = $iznos_count;

                    $rn->save();
                    $nivelacija_count       = $nivelacija_count + 1;
                }
            }

        }
        //ReportNivelacijaItems::whereNull('nivelacija_id')->delete();
        return 'Generirani nivelacii (' . $dateString . '): ' . $nivelacija_count;

    }



    public function generateDFI($dateString)
    {

        $date = new Carbon($dateString);

        $nivelacija_count   = 0;

        // Zemi gi site dukjani
        $warehouses = Warehouse::where('prodavnica', 1)->select('id')->get();
        $datum      = date('Y-m-d H:i:s');

        foreach ($warehouses as $key => $value) {
            $from_date  = $date->timestamp;
            $to_date    = $date->timestamp;

            $check = ReportNivelacija::where('warehouse_id',$value->id)->where('datum_knizenje', date('Y-m-d 23:59:00', $from_date))->count();

            if($check < 1) {

                $documents_id = Document::where('warehouse_id',$value->id)->where('type','faktura')
                    ->where('status','generirana')
                    ->where('document_date','>=',date('Y-m-d 00:00:00', $from_date))
                    ->where('document_date','<=',date('Y-m-d 23:59:59', $to_date))
                    ->pluck('id');

                $documents_id_fiskalna = DocumentsFiskalna::where('warehouse_id',$value->id)
                    ->where('document_date','>=',date('Y-m-d 00:00:00',$from_date))
                    ->where('document_date','<=',date('Y-m-d 23:59:59',$to_date))
                    ->whereIn('status',['generirana', 'paragon'])
                    ->pluck('id');


                $dit = DocumentItems::whereIn('document_id',$documents_id)
                    ->join('products','products.id','=','document_items.product_id')
                    ->where('products.type','')
                    ->whereNotNull('discount_type')
                    ->select('document_items.*')
                    ->get();

                $iznos_count = 0;
                $created_rn = 0;
                if(!$dit->isEmpty())
                {
                    $rn = new ReportNivelacija();
                    $rn->datum_knizenje     = $date->format('Y-m-d H:i:s');
                    $rn->datum_dokument     = $date->format('Y-m-d H:i:s');
                    $rn->warehouse_id       = $value->id;
                    $rn->employee_id        = 1;
                    $rn->save();
                    $created_rn = 1;

                    foreach ($dit as $kdit => $di) {
                        # code...

                        $dn =   Document::where('id',$di->document_id)->select('document_number')->first();

                        $nitms  = new ReportNivelacijaItems();

                        $nitms->nivelacija_id          =    $rn->id;
                        $nitms->document_number        =    'Фактура '.$dn->document_number;
                        $nitms->product_id             =    $di->product_id;
                        $nitms->unit_code              =    $di->unit_code;
                        $nitms->item_name              =    $di->item_name;
                        $nitms->quantity               =    $di->quantity;
                        $nitms->old_price              =    $di->original_price;
                        $nitms->old_price_sum          =    $di->original_sum_vat;
                        $nitms->new_price              =    $di->price;
                        $nitms->new_price_sum          =    $di->sum_vat;
                        $nitms->price_difference       =    $di->quantity * $di->discount_value;
                        $nitms->vat_difference         =    $di->quantity * ($di->discount_value - ($di->discount_value / (1 + ($di->vat / 100))));
                        $nitms->vat                    =    $di->vat;
                        $nitms->variation_id           =    $di->variation_id;
                        $nitms->save();
                        $iznos_count                   =    $iznos_count + $nitms->price_difference;
                    }


                }

                $dfit = DocumentsFiskalnaItems::whereIn('document_id',$documents_id_fiskalna)->whereNotNull('discount_type')->where('proizvod_usluga','P')->get();
                if(!$dfit->isEmpty()){

                    if(empty($created_rn)){
                        $rn = new ReportNivelacija();
                        $rn->datum_knizenje     = $date->format('Y-m-d H:i:s');
                        $rn->datum_dokument     = $date->format('Y-m-d H:i:s');
                        $rn->warehouse_id       = $value->id;
                        $rn->employee_id        = 1;
                        $rn->save();
                        $created_rn = 1;
                    }

                    foreach ($dfit as $kdit => $di) {
                        # code...

                        $dn =   DocumentsFiskalna::where('id',$di->document_id)->select('document_number')->first();

                        $nitms  = new ReportNivelacijaItems();

                        $nitms->nivelacija_id          =    $rn->id;
                        $nitms->document_number        =    'Фискална '.$dn->document_number;
                        $nitms->product_id             =    $di->product_id;
                        $nitms->unit_code              =    $di->unit_code;
                        $nitms->item_name              =    $di->item_name;
                        $nitms->quantity               =    $di->quantity;
                        $nitms->old_price              =    $di->original_price;
                        $nitms->old_price_sum          =    $di->original_sum_vat;
                        $nitms->new_price              =    $di->price;
                        $nitms->new_price_sum          =    $di->sum_vat;
                        $nitms->price_difference       =    $di->quantity * $di->discount_value;
                        $nitms->vat_difference         =    $di->quantity * ($di->discount_value - ($di->discount_value / (1 + ($di->vat / 100))));
                        $nitms->vat                    =    $di->vat;
                        $nitms->variation_id           =    $di->variation_id;
                        $nitms->save();
                        $iznos_count                   =    $iznos_count + $nitms->price_difference;
                    }

                }

                if(!empty($created_rn)){
                    $count_docs = ReportNivelacija::where('datum_knizenje','>=',date('Y-01-01 00:00:00'))
                        ->where('datum_knizenje','<=',date('Y-m-d H:i:s'))
                        ->whereNotNull('document_number')
                        ->count();

                    $rn->document_number    = sprintf('%02d', $value->id).'-'.sprintf('%05d', $count_docs).'/'.date('y');
                    $rn->iznos              = $iznos_count;

                    $rn->save();
                    $nivelacija_count       = $nivelacija_count + 1;
                }
            }

        }
        //ReportNivelacijaItems::whereNull('nivelacija_id')->delete();
        return 'Generirani nivelacii (' . $dateString . '): ' . $nivelacija_count;

    }

}