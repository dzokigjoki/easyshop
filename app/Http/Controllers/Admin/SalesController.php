<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Payment;
use Auth;
use Datatables;
use Response;
use Validator;

class SalesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOrders()
    {
        return view('admin.sales.orders');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPayments()
    {
        return view('admin.sales.payments');
    }

    public function getPaymentsForDocument(Request $req)
    {
        $document_id = $req->get('document_id');
        $paid = Payment::where('document_id',$document_id)->sum('price');
        $doc_price = DocumentItems::where('document_id',$document_id)->sum('sum_vat');
        $return = ['full_price' => $doc_price, 'paid' => $paid, 'show_price' => $doc_price - $paid];
        return Response::json($return);
    }

    public function paymentsDatatable()
    {
        $select_array = array('documents.document_number','documents.type as dt','payments.type','payments.price','payments.created_at');
        $payments = Payment::select($select_array)
                    ->join('documents','documents.id','=','payments.document_id')
                    ->get();

        $i=0;
        foreach ($payments as $key => $value) {
            $payments[$i]['price'] = '<span style="float:right;">'.$value['price'].'</span>';
            $payments[$i]['dt'] = $this->transliterate(null,$value['dt']);
            if($value['type'] == 'karticka')
                $value['type'] = 'kartichka';
            if($value['type'] == 'ziro')
                $value['type'] = 'zhiro';
            $payments[$i]['type'] = $this->transliterate(null,$value['type']);
            $i = $i + 1;
        }


        return Datatables::of($payments)->make();
    }

    public function showPayment($payment_id)
    {
        $data['payment_id'] = $payment_id;
        $data['payment'] = Payment::where('id',$payment_id)->first();
        $data['documents'] = Document::where('type','faktura')->orWhere('type','profaktura')->get();
        return view('admin.sales.createPayment',$data);
    }

    public function createPayment()
    {
        $data['payment_id'] = 0;
        $data['payment'] = new Payment();

        $fakturi = Document::where('documents.type','faktura')
                    ->where(function($q) {
                          $q->where('documents.paid', 'delumno-platena')
                           ->orWhere('documents.paid','neplatena');
                    })
                    ->where('documents.status','generirana')
                    ->select('documents.type','documents.document_json','documents.document_number','documents.id')
                    ->get();

        $profakturi = Document::where('documents.type','profaktura')
                        ->where(function($q) {
                          $q->where('documents.paid', 'delumno-platena')
                           ->orWhere('documents.paid','neplatena');
                    })
                    ->where('documents.status','generirana')
                    ->select('documents.type','documents.document_json','documents.document_number','documents.id')
                    ->get();

        $data['documents'] = $fakturi->merge($profakturi);
        return view('admin.sales.createPayment',$data);
    }

    public function storePayment(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'document_id' => 'required',
            'type' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("admin/sales/payments/create")
                ->withErrors($validator)
                ->withInput();
        }

        $document_id = $req->get('document_id');        
        $payment_id = $req->get('payment_id');
        
        if( !empty($payment_id) )        
            $payment =  Payment::where('id',$payment_id)->first();
        else
            $payment = new Payment();
        
        if(!$req->has('user_id'))
            $payment->user_id     = Auth::user()->id;
        else
            $payment->user_id     = $req->get('user_id');

        $payment->document_id = $document_id;
        $payment->type        = $req->get('type');
        $payment->price       = $req->get('price');
        $payment->save();

        $document_price = DocumentItems::where('document_id',$document_id)->sum('sum_vat');
        $payment_price  = Payment::where('document_id',$document_id)->sum('price');
   

        if($payment_price != 0){
            $doc = Document::where('id',$document_id)->first();
            
            if($payment_price < $document_price) {
                $doc->paid = 'delumno-platena';
            } else {
                $doc->paid = 'platena';
            }
            $doc->save();
        }

        return redirect()->route('admin.sales.payments');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getInvoices()
    {
        return view('admin.sales.invoices');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProInvoices()
    {
        return view('admin.sales.pro-invoices');
    }

    private function transliterate($textcyr = null, $textlat = null)
    {
        $cyr = array(
            'ж', 'ч', 'щ', 'ш', 'ю', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'j', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж', 'Ч', 'Щ', 'Ш', 'Ю', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'J', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
            'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q');
        if ($textcyr) return str_replace($cyr, $lat, $textcyr);
        else if ($textlat) return str_replace($lat, $cyr, $textlat);
        else return null;
    }
}
