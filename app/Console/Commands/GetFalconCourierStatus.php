<?php

namespace EasyShop\Console\Commands;

use EasyShop\Courier;
use Illuminate\Console\Command;
use EasyShop\Models\Document;

class GetFalconCourierStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documents:get-falcon-courier-status';

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
        $all_documents_count = Document::whereNotNull('courier_tracking_id')->where('courier_status', '!=', 'Нарачката е доставена')->count();
        $limit = 50;
        $offset = 0;
        while ($all_documents_count - $offset > 0) {
            $documents = Document::whereNotNull('courier_tracking_id')->where('courier_status', '!=', 'Нарачката е доставена')->limit($limit)->offset($offset)->get();
            $offset = $offset + $limit;
            foreach ($documents as $document) {
                if (!is_null($document->courier_id)) {
                    $courier = Courier::find($document->courier_id);
                    if ($courier->name == 'Falcon Logistics') {
                        $url = 'https://flk.mk/API/flkapi_order.php';

                        $params = array(
                            'key' => urlencode($courier->api_token),
                            'qrcode' => urlencode($document->courier_tracking_id),
                            'shipment_id' => urlencode($document->courier_tracking_id)
                        );

                        $params_string_for_status = '';

                        foreach ($params as $key => $value) {
                            $params_string_for_status .= $key . '=' . $value . '&';
                        }
                        
                        rtrim($params_string_for_status, '&');

                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL             => $url,
                            CURLOPT_POST             => count($params),
                            CURLOPT_FOLLOWLOCATION    => 1,
                            CURLOPT_POSTFIELDS         => $params_string_for_status,
                            CURLOPT_RETURNTRANSFER     => 1
                        ));

                        $statusResult = curl_exec($curl);
                        curl_close($curl);
                        $resp_arr = json_decode($statusResult);

                        switch ($resp_arr->Result) {
                            case '0':
                                $document->courier_status = 'Нова нарачка';
                                $document->save();
                                break;
                            case '1':
                                $document->courier_status = 'Назначена на курир';
                                $document->save();
                                break;
                            case '2':
                                $document->courier_status = 'Се чека курирот да ја подигне нарачката';
                                $document->save();
                                break;
                            case '3':
                                $document->courier_status = 'Преземана од курирот';
                                $document->save();
                                break;
                            case '4':
                                $document->courier_status = 'Во магацин';
                                $document->save();
                                break;
                            case '5':
                                $document->courier_status = 'Курирот е на пат за да ја достави нарачката';
                                $document->save();
                                break;
                            case '6':
                                $document->courier_status = 'Нарачката е доставена';
                                $document->save();
                                break;
                            case '7':
                                $document->courier_status = 'Проблем со нарачката';
                                $document->save();
                                break;
                            case '8':
                                $document->courier_status = 'Нарачката е избришана од системот на FLK';
                                $document->save();
                                break;
                            case '-1':
                                $document->courier_status = 'Проблем со API request';
                                $document->save();
                                break;
                        }
                    }
                }
            }
        }
    }
}
