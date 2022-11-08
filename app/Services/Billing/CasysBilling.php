<?php

namespace EasyShop\Services\Billing;

use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;

class CasysBilling
{
    /**
     * @param $totalPrice
     * @param $tempOrderId
     * @param $input
     * @return mixed
     */
    public function generateChecksum($input, $totalPrice, $tempOrderId)
    {

        $headerList = [
            'AmountToPay',
            'PayToMerchant',
            'MerchantName',
            'AmountCurrency',
            'PaymentOKURL',
            'PaymentFailURL',
            'OriginalAmount',
            'OriginalCurrency',
            'Details1',
            'Details2',
        ];

        $checkSumHeader = sprintf('%02d', count($headerList)) . implode(',', $headerList) . ',';

        $input['Details2'] = $tempOrderId;
        $input['AmountToPay'] = $totalPrice * 100;
        $input['OriginalAmount'] = $totalPrice;

        foreach ($headerList as $headerName) {
            $count = sprintf('%03d', strlen(urldecode(utf8_decode($input[$headerName]))));
            $checkSumHeader .= $count;
        }

        /*
         * ********************************************************************************
         */
        $checksum = $checkSumHeader;

        foreach ($headerList as $headerName)
        {
            $checksum .= urldecode($input[$headerName]);
        }

        $checksum .= \EasyShop\Models\AdminSettings::getField('merchantPassword');

        $checksum = md5($checksum);

        return [
            'header' => $checkSumHeader,
            'checksum' => strtoupper($checksum),
            'documentId' => $tempOrderId
        ];
    }
}