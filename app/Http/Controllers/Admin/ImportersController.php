<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Models\Country;
use EasyShop\Models\Importer;
use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Http\Requests;
use View;
use Datatables;

class ImportersController extends Controller
{
    /**
     * List all suppliers
     *
     * @return View
     */
    public function getIndex()
    {
        return View::make('admin.importers.index');
    }

    /**
     * Create new supplier
     *
     * @param Request $req
     * @return mixed
     */
    public function create(Request $req)
    {
        $importer = new Importer();
        $importer_id = 0;
        $importer->country_id = 1;
        $countries = Country::all();

        return View::make('admin.importers.create', compact('importer', 'countries', 'importer_id'));
    }

    /**
     * Edit supplier
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $importer_id = $id;
        $countries = Country::all();
        $importer = Importer::find($id);
        if (empty($importer->country_id)) {
            $importer->country_id = 1;
        }
        return View::make('admin.importers.create',  compact('importer', 'countries', 'importer_id'));
    }

    public function delete($id)
    {

    }

    /**
     *  Store supplier
     *
     * @param Requests\AdminSuppliersRequest $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\EasyShop\Http\Requests\AdminImportersRequest $request)
    {
        $importer_id = $request->input('importer_id');
        if (!empty($importer_id)) {
            $importer = Importer::where('id', $importer_id)->first();
        } else {
            $importer = new Importer();
        }

        $importer->country_id = $request->input('country_id');
        $importer->name = $request->input('name');

        $importer->save();

        return redirect()->route('admin.importers');

    }

    /**
     * Get suppliers for DataTables
     *
     * @return mixed
     */
    public function getImporters()
    {
        $supp = Importer::select('importers.id', 'importers.name', 'importers.country_id')
            ->join('countries', 'countries.id', '=', 'importers.country_id')
            ->get();

        return Datatables::of($supp)
            ->addColumn('Akcija', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/importers/edit/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                 <!--   <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/suppliers/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a> -->
                                    </div>
                                    ')
            ->removeColumn('country_id')
            ->make();
    }
}
