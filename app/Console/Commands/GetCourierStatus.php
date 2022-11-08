<?php

namespace EasyShop\Console\Commands;

use EasyShop\Courier;
use Illuminate\Console\Command;
use EasyShop\Models\Document;

class GetCourierStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:get-courier-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the courier status based on the tracking id';

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
        $all_documents_count = Document::whereNotNull('courier_tracking_id')->where('courier_status', '!=', 'Delivered')->where('courier_id', '=', 1)->count();
        $limit = 50;
        $offset = 0;
        while ($all_documents_count - $offset > 0) {
            $documents = Document::whereNotNull('courier_tracking_id')->where('courier_status', '!=', 'Delivered')->where('courier_id', '=', 1)->limit($limit)->offset($offset)->get();
            $offset = $offset + $limit;
            foreach ($documents as $document) {
                if (!is_null($document->courier_id)) {
                    $courier = Courier::find($document->courier_id);

                    $params = array(
                        'auth_token' => $courier->api_token,
                        'tracking_id' => $document->courier_tracking_id
                    );

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://mex.mk/api/get_shipment_curl.php',
                        CURLOPT_POST => 1,
                        CURLOPT_POSTFIELDS => $params,
                        CURLOPT_RETURNTRANSFER => 1
                    ));

                    $resp = curl_exec($curl);
                    curl_close($curl);
                    $res_ob = json_decode($resp);

                    if (!is_null($res_ob)) {
                        $document->courier_status = $res_ob->current_status_name;

                        if ($res_ob->current_status_name == "Delivered") {
                            $document->status = "dostavena";
                        }
                        $document->save();
                    }
                }
            }
        }
    }
}
