<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use EasyShop\Models\AdminSettings;
use View;
use Illuminate\Http\Response;
use EasyShop\Models\Warehouse;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminSettingsAll = AdminSettings::all();

        $data['warehouses'] = Warehouse::all();


        foreach ($adminSettingsAll as $settings) {

            $data[$settings->name] = AdminSettings::getField($settings->name);
        }

        return View::make('admin.admin_settings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $array = [];
        foreach ($request->all() as $key => $value) {
            $exp_key = explode('_', $key);
            if (empty($exp_key[2])) {
                $exp_key[2] = $value;
            }

            if ($exp_key[0] == 'array') {
                if (gettype($exp_key[2]) == 'array') {

                    foreach($exp_key[2] as $i){

                        $array[$exp_key[1]][$i] = $i;
                    }
                }else{
                    
               
                $array[$exp_key[1]][$exp_key[2]] = $value;
                 }
            } else if ($exp_key[0] == 'string') {
                AdminSettings::setField($exp_key[1], $value);
            } else if ($exp_key[0] == 'boolean') {
                AdminSettings::setField($exp_key[1], $value);
            } else if ($exp_key[0] == 'integer') {
                AdminSettings::setField($exp_key[1], $value);
            } else if ($exp_key[0] == 'image') {
                // Upload image
                $file = Input::file($key);
                if (!empty($file)) {
                    $logo = $this->saveFileImage($file);
                    AdminSettings::setField($exp_key[1], $logo);
                }
            }
        }
        
        foreach ($array as $key => $subArray) {
            AdminSettings::setField($key, $subArray);
        }



        return redirect()->back();
    }

    public function addNewCurrencies(Request $request)
    {
        $currencies = AdminSettings::where('name', 'currencies')->first();
        if (!$currencies) {
            $error = 'Не постои запис со името currencies во базата';
            return redirect()->back()->withError($error);
        }

        if ($currencies->value) {
            $array = json_decode($currencies->value);
            foreach ($array as $i) {
                if ($i->name == $request->get('currency_name')) {
                    return response()->json(['error' => 'Веќе постои запис со името во базата'], 404);
                }
            }
        }
        $subArray['name'] = $request->get('currency_name');
        $subArray['divider'] = $request->get('currency_divider');
        $array[] = $subArray;
        AdminSettings::setField('currencies', $array);

        return response()->json($subArray);
    }


    public function addNewPayments(Request $request)
    {
        $payments = AdminSettings::where('name', 'paymentMethods')->first();
        if (!$payments) {
            $error = 'Не постои запис со името paymentMethods во базата';
            return redirect()->back()->withError($error);
        }

        if ($payments->value) {
            $array = json_decode($payments->value);
            foreach ($array as $i) {
                if ($i->name == $request->get('payment_name')) {
                    return response()->json(['error' => 'Веќе постои запис со името во базата'], 404);
                }
            }
        }
        $subArray['name'] = $request->get('payment_name');
        $subArray['display_name'] = $request->get('payment_display');
        $array[] = $subArray;
        AdminSettings::setField('paymentMethods', $array);


        return response()->json($subArray);
    }


    public function addNewPosti(Request $request)
    {
        $posti = AdminSettings::where('name', 'posti')->first();
        if (!$posti) {
            $error = 'Не постои запис со името posti во базата';
            return redirect()->back()->withError($error);
        }

        if ($posti->value) {
            $array = json_decode($posti->value);
            foreach ($array as $i) {
                if ($i->name == $request->get('display_name')) {
                    return response()->json(['error' => 'Веќе постои запис со името во базата'], 404);
                }
            }
        }
        $subArray['name'] = $request->get('posta_name');
        $subArray['display_name'] = $request->get('posta_display');
        $array[] = $subArray;
        AdminSettings::setField('posti', $array);

        return response()->json($subArray);
    }
    public function addNewDelivery(Request $request)
    {
        $deliveries = AdminSettings::where('name', 'deliveryTypes')->first();
        if (!$deliveries) {
            $error = 'Не постои запис со името posti во базата';
            return redirect()->back()->withError($error);
        }

        if ($deliveries->value) {

            $array = json_decode($deliveries->value);
        }
        $subArray['name'] = $request->get('name');
        $subArray['display_name'] = $request->get('display_name');
        $subArray['price'] = $request->get('price');
        $array[] = $subArray;
        AdminSettings::setField('deliveryTypes', $array);


        return response()->json($subArray);
    }

    public function addExcelColumns(Request $request)
    {
        $excelColumns = AdminSettings::where('name', 'excelColumns')->first();
        if (!$excelColumns) {
            $error = 'Не постои запис со името excelColumns во базата';
            return redirect()->back()->withError($error);
        }

        if ($excelColumns->value) {
            $array = json_decode($excelColumns->value);
            foreach ($array as $i) {
                if ($i->name == $request->get('display_name')) {
                    return response()->json(['error' => 'Веќе постои запис со името во базата'], 404);
                }
            }
        }
        $subArray['name'] = $request->get('name');
        $subArray['display_name'] = $request->get('display_name');
        $array[] = $subArray;
        AdminSettings::setField('excelColumns', $array);


        return response()->json($subArray);
    }


    public function deleteField(Request $request)
    {

        $records = json_decode(AdminSettings::where('name', $request->field)->first()->value);
        $newRecords = null;
        foreach ($records as $key => $i) {


            if ($i->name != $request->name) {
                $newRecords[] = $i;
            }
        }
        AdminSettings::setField($request->field, $newRecords);


        return response()->json([$request->name, 'count' => count($newRecords), 'field' => $request->field]);
    }
    public function saveFileImage($file)
    {

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        $image = Image::make($file->getRealPath());
        $path = public_path('assets/admin/easyshop/' . config( 'app.client'));

        if (!File::isDirectory($path)) {

            File::makeDirectory($path, 0777, true, true);
        }

        $image->save('assets/admin/easyshop/' . config( 'app.client') . '/' . $filename, 90);
        $image->destroy();

        return url('/') . '/assets/admin/easyshop/' . config( 'app.client') . '/' . $filename;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
