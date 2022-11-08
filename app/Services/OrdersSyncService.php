<?php namespace EasyShop\Services;

use SoapClient;
use stdClass;

class OrdersSyncService {

    public function __construct() {
    }

    /**
     * @param $orders List of order numbers
     */
    public function bulgaria($orders) {
        $loginParam = new stdClass();
        $loginParam->user = config( 'clients.' .config( 'app.client') . '.sync.bulgaria.user');
        $loginParam->pass = config( 'clients.' .config( 'app.client') . '.sync.bulgaria.password');

        $client = @new SoapClient('https://www.rapido.bg/rsystem2/schema.wsdl');
        $result = $client->track_order_ref_array($loginParam, $orders);

        return $result;

    }



}