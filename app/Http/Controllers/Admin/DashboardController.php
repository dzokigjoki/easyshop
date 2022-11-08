<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\User;
use EasyShop\Models\Document;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Warehouse;
use EasyShop\Models\Settings;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(Request $req)
    {
        if (!\Auth::user()->canDo('dashboard'))
            return redirect()->route('admin.articles');

        if ($req->has('warehouse_id') && \Auth::user()->canDo('admin_izbor_magacin')) {
            $data['selected_wh'] = $req->get('warehouse_id');
        } else {
            $data['selected_wh'] = \Auth::user()->warehouse_id;
        }

        $when = $req->get('when', 0);

        if ($req->has('start') && $req->has('end')) {
            $date = $req->get('start');
            $end_date = $req->get('end');
            $date = $date . ' 00:00:00';
            $end_date = $end_date . ' 23:59:59';
        } else if (!empty($when)) {
            $date = strtotime("-$when day", strtotime(date('Y-m-d 00:00:00')));
            $date = date('Y-m-j H:i:s', $date);
            if ($when == '1') {
                $date = strtotime("-$when day", strtotime(date('Y-m-d 00:00:00')));
                $date = date('Y-m-j H:i:s', $date);
                $end_date = strtotime('-1 day', strtotime(date('Y-m-d 23:59:58')));
                $end_date = date('Y-m-j H:i:s', $end_date);
            } else {
                $end_date = date('Y-m-d 23:59:58');
            }
        } else {
            $date         = date('Y-m-j 00:00:00');
            $end_date    = date('Y-m-j 23:59:58');
            
        }

        //$ids = [];
        $ids = Document::where('type', 'narachka')
            ->where('status', '!=', 'stornirana')
            ->where('document_date', '>=', $date)
            ->where('document_date', '<=', $end_date)
            ->where('warehouse_id', $data['selected_wh'])
            ->pluck('id')
            ->toArray();
            
        $sum = DocumentItems::whereIn('document_id', $ids)->sum('sum_vat');
        if (!$sum)
            $sum = 0;
        $data['sum'] = $sum;
        $data['naracki_count']     = count($ids);
        $data['klienti_count']     = count($ids);
        $data['warehouses']        = Warehouse::all();
        $data['sum_all']           = 0;
        $data['naracki_count_all'] = 0;
        $data['klienti_count_all'] = 0;
        $hide_calculate_eur   = in_array('EUR', collect(\EasyShop\Models\AdminSettings::getField('currencies'))->pluck("name")->toArray());
        if($hide_calculate_eur)
        {
            $ids_new = Document::where('type','narachka')
                        ->where('status','!=','stornirana')
                        ->where('document_date','>=',$date)
                        ->where('document_date','<=',$end_date)
                        ->pluck('id')
                        ->toArray();

            $sum_all = DocumentItems::whereIn('document_id',$ids_new)->sum('sum_vat');
            $data['sum_all'] = $sum_all;
            $data['naracki_count_all']      = count($ids_new);
            $data['klienti_count_all']      = count($ids_new);
        }

        $data['najprodavani']      = DocumentItems::whereIn('document_id', $ids)->select('item_name', 'product_id', \DB::raw('sum(quantity) as sum'), \DB::raw('sum(sum_vat) as sum_vat'))->groupBy('product_id')->orderBy('sum', 'desc')->get();

        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {

            $order_type_dashboard = !is_null($req->session()->get('order_type_dashboard')) ? $req->session()->get('order_type_dashboard') : 'Inbound';
            $created_by_dashboard = !is_null($req->session()->get('created_by_dashboard')) ? $req->session()->get('created_by_dashboard') : auth()->id();
            $data['documentOrderType_select'] = array('Inbound' => 'Inbound', 'Outbound' => 'Outbound', 'Web' => 'Web', 'Социјални мрежи' => 'Социјални мрежи', 'Продавници' => 'Продавници');
            $data['employees'] = User::join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->select('users.first_name', 'users.last_name', 'users.id')->distinct()->get();

            if ($created_by_dashboard != -1) {
                $bestSellers = DocumentItems::whereIn('document_id', $ids)->join('documents', 'document_id', '=', 'documents.id')->where('type_of_order', $order_type_dashboard)
                    ->where('created_by', $created_by_dashboard)->select(
                        'item_name',
                        'product_id',
                        \DB::raw('sum(quantity) as sum'),
                        \DB::raw('sum(sum_vat) as sum_vat')
                    )->groupBy('product_id')->orderBy('sum', 'desc')->get();
            } else {
                $bestSellers = DocumentItems::whereIn('document_id', $ids)->join('documents', 'document_id', '=', 'documents.id')->where('type_of_order', $order_type_dashboard)
                    ->select(
                        'item_name',
                        'product_id',
                        \DB::raw('sum(quantity) as sum'),
                        \DB::raw('sum(sum_vat) as sum_vat')
                    )->groupBy('product_id')->orderBy('sum', 'desc')->get();
            }

            $data['order_type_dashboard'] = $order_type_dashboard;
            $data['created_by_dashboard'] = $created_by_dashboard;
            $data['bestSellers'] = $bestSellers;
            $data['bestSellersSum'] = array_sum($bestSellers->pluck('sum_vat')->toArray());
            $data['bestSellersQua'] = array_sum($bestSellers->pluck('sum')->toArray());
        }

        $vk = 0;
        foreach ($data['najprodavani'] as $np) {
            $vk += $np->sum;
        }



        $data['najprodavani']->take(10);


        $data['vk'] = $vk;


        $seven_days = strtotime("-10 day", strtotime(date('Y-m-d 23:59:58')));
        $seven_days = date('Y-m-j H:i:s', $seven_days);

        $data['naracki_datum']   = [];

        $naracki_datum   =  Document::where('type', 'narachka')->where('created_at', '>=', $seven_days)->where('warehouse_id', $data['selected_wh'])->select('maturity_date', \DB::raw('count(*) as sum'))->groupBy('maturity_date')->get();

        foreach ($naracki_datum as $key => $value) {
            $data['naracki_datum'][] = [
                'date' => date('d/m/Y', strtotime($value->maturity_date)),
                'value' => (int)$value->sum
            ];
        }

        $data['naracki_datum'] = json_encode($data['naracki_datum']);

        $data['when'] = $when;
        $data['eur'] = $req->get('eur');
        $data['starts_at_range'] = date('d/m/Y', strtotime($date));
        $data['ends_at_range'] = date('d/m/Y', strtotime($end_date));
        $data['selected_warehouse'] = Warehouse::where('id', $data['selected_wh'])->first();
        
        return view('admin.dashboard', $data);
    }


    public function filterBestsellerProducts(Request $request)
    {
        $request->session()->set('order_type_dashboard', $request->field1);
        $request->session()->set('created_by_dashboard', $request->field2);
    }
}
