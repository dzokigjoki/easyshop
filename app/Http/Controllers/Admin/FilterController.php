<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Filters;
use EasyShop\Models\Category;
use EasyShop\Models\CategoryFilters;
use Datatables;
use Response;

class FilterController extends Controller
{
    /**
     * Get all filters for admin attributes
     *
     * @return mixed
     */
    public function getFilters()
    {

        $filters = Filters::select('id', 'filter', 'name', 'show')->get();

        return Datatables::of($filters)
            ->addColumn('Action', '<div class="text-center">
                                        <a  href="javascript://" class="show_att margin-right-10 tooltips" data-id="filter_{{$id}}_{{$filter}}">
                                            <i class="fa fa-tags"></i>
                                        </a>
                                        <a class="margin-right-10 tooltips edit_filter" data-container="body" data-placement="top" data-original-title="Едитирај"
                                            id="filterEdit_{{$id}}"
                                            href="#filter-edit" data-toggle="modal">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="margin-left-5 tooltips delete_filter" data-container="body" data-placement="top" data-original-title="Избриши"
                                            href="#filter-delete" data-toggle="modal"
                                            id="filterDelete_{{$id}}">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </div>
                                    ')
            ->editColumn('show', '<div class="text-center">
									@if($show == 1)
									<span class="label label-sm label-success"> Да </span>
									@else
									<span class="label label-sm label-danger"> Не </span>
									@endif
								</div>
								')
            ->editColumn('filter', '<a style="display: block;" href="javascript://" class="show_att" data-id="filter_{{$id}}">
									{{$filter}}
								    </a>
								')
            ->removeColumn('id')
            ->make();
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function deleteFilter(Request $req)
    {
        $id = $req->get('filter');
        Filters::where('id', $id)->delete();
        return Response::json(array('success' => 1));
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function store(Request $req)
    {

        // TODO: add validation

        if($req->has('filter_id'))
            $filter = Filters::where('id',$req->get('filter_id'))->first();
        else
            $filter = new Filters();
        
        $filter->filter = $req->get('filter');
        $filter->name = $req->get('name');

        $filter->name_lang2 = ($req->get('name2') != "") ? $req->get('name2') : null;
        $filter->show = $req->get('show');
        
        $filter->save();
        return Response::json(array('success' => 1, 'filter_id'=>$filter->id));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $filter = Filters::where('id', $id)->first();
        return Response::json(array('success' => 1, 'data' => $filter));
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function getFiltersCategory($category_id)
    {
        $category = Category::where('id', $category_id)->first();
        $category_filters = CategoryFilters::where('category_id', $category_id)
            ->get()
            ->toArray();

        $selected_id = array();
        foreach ($category_filters as $cf) {
            $selected_id[] = (string)$cf['filter_id'];
        }
        return Response::json(array('success' => 1, 'selected' => $selected_id, 'category' => $category));
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function storeFiltersCategory(Request $req)
    {
        $filters = $req->get('filter_id');
        foreach ($filters as $filter) {
            $check = CategoryFilters::where('category_id', $req->get('category_id'))
                ->where('filter_id', $filter)
                ->first();

            if (!$check) {
                $category_filters = new CategoryFilters();
                $category_filters->category_id = $req->get('category_id');
                $category_filters->filter_id = $filter;
                $category_filters->save();
            }
        }

        return Response::json(array('success' => 1));
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function deleteFiltersCategory(Request $req)
    {
        $category_filters = CategoryFilters::where('category_id', $req->get('category_id'))->where('filter_id', $req->get('filter_id'))->delete();
        return Response::json(array('success' => 1));
    }

}
