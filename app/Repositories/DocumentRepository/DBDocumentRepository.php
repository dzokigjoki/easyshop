<?php namespace EasyShop\Repositories\DocumentRepository;

use DB;
use EasyShop\Models\Document;


class DBDocumentRepository implements DocumentRepositoryInterface {

    /**
     * Get document by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return DB::table('documents')->where('id', '=', $id)->first();
    }

    public function getDocumentData($id)
    {
        return DB::table('document_items')->where('document_id', '=', $id)->get();
    }

    public function create($document)
    {
        if(empty($document->document_number)){
            $stringId = DB::table('documents')->orderBy('id', 'desc')->first()->document_number;
            $explode = explode("/", $stringId);
            $document->document_number = sprintf('%05d', ++$explode[0]).'/'.date('y');
        }
        $document->save();
    }

    /**
     * @param $warehouseId
     * @return mixed
     */
    public function countUndeliveredOrdersByWarehouse($warehouseId)
    {
        return DB::table('documents')
            ->where('warehouse_id', '=', $warehouseId)
            ->where('type', '=', Document::TYPE_NARACHKA)
            ->where('status', '=', 'ispratena')
            ->count();
    }

    public function getNext100UnprocessedOrdersByWarehouse($warehouseId, $lastOrderId)
    {
        return DB::table('documents')
            ->select('id', 'document_number')
            ->where('warehouse_id', '=', $warehouseId)
            ->where('type', '=', Document::TYPE_NARACHKA)
            ->where('status', '=', 'ispratena')
            ->where('id', '>', $lastOrderId)
            ->orderBy('id', 'ASC')
            ->take(100)
            ->get();
    }

    public function updateOrderStatus($documentNumber, $status)
    {
        DB::table('documents')
            ->where('document_number', '=', $documentNumber)
            ->where('type', '=', Document::TYPE_NARACHKA)
            ->update(['status' => $status]);
    }
}