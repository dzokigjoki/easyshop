<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Category;
use EasyShop\Models\Attributes;
use EasyShop\Models\FiltersAttributes;
use EasyShop\Models\Filters;
use EasyShop\Services\CategoryService;
use EasyShop\Models\CategoryFilters;
use EasyShop\Models\ProductAttributes;

use Datatables;
use Response;

class AttributesController extends Controller
{
    public function getIndex(CategoryService $categoryService)
    {
        $category_tree = $categoryService->loadCategoryTreeData();
        $nestedCategories = $categoryService->nestedListForAttributes($category_tree);
        $filters = Filters::all();
        $selected_category = 0;
        if(isset($category_tree[0]))
            $selected_category = $category_tree[0]['id'];

        return view('admin.attributes.index', compact('nestedCategories','filters','selected_category'));
    }

    public function getAtributes(Request $req){

    	$filter_id = $req->get('filter');
    	$attributes = Attributes::select('id','value')->where('filter_id',$filter_id)->get();
    	return Datatables::of($attributes)
            ->addColumn('Action', '<div class="text-center">
                                    <a id="att_{{$id}}" class="margin-right-10 tooltips edit_att" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="#atribute-edit" data-toggle="modal">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a data-id="{{$id}}" class="margin-left-5 tooltips delete_att" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="#atribute-delete"  data-toggle="modal">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    ')
            ->removeColumn('id')
            ->make();
    }

    public function store(Request $req) {

        // TODO: add validation
        if($req->has('att_id'))
            $fa = FiltersAttributes::where('id',$req->get('att_id'))->first();
        else{
            $fa = new FiltersAttributes();
            $fa->filter_id = $req->get('filter'); 
        }                
        $fa->value = $req->get('value');
        $fa->value_lang2 = ($req->get('value2') != "") ? $req->get('value2') : null; 
        $fa->save(); 
        return Response::json(array('success'=>1));
    }

    public function show($id)
    {
        $fa = FiltersAttributes::where('id',$id)->first();
        return Response::json(array('success'=>1,'data'=>$fa));
    }

    public function update(Request $req){

        $fa = FiltersAttributes::where('id',$req->get('id'))->first();
        $fa->filter_id = $req->get('filter'); 
        $fa->value = $req->get('value');
        $fa->value_lang2 = ($req->get('value2') != "") ? $req->get('value2') : null; 
        $fa->save(); 
        return Response::json(array('success'=>1));
    }

    public function delete(Request $req){

        $fa = FiltersAttributes::where('id',$req->get('id'))->delete();
        return Response::json(array('success'=>1));
    }

    /**
     * Get attributes by category
     *
     * @param Request $req
     * @return mixed
     */
    public function getByCategory(Request $req)
    {
        $filters = array();
        $return_array = array();
        $categories = $req->get('categories');
        $product_id = $req->get('product_id');

        // get filters from this category
        $cf = CategoryFilters::leftJoin('filters','category_filters.filter_id','=','filters.id')
            ->whereIn('category_id', $categories)
            ->select('filters.id')
            ->get()
            ->toArray();
        // get filters ids and get attributes for filters
        $cf_ids = array();
        foreach ($cf as $key => $value) {
            $cf_ids[] = $value['id'];
        }         
        $fa = FiltersAttributes::whereIn('filter_id', $cf_ids)
            ->join('filters','filters.id','=','filters_attributes.filter_id')
            ->select('filter_id','filter','name','value','filters_attributes.id as fa_id')
            ->get()
            ->toArray();
        
        foreach($fa as $value){
            if(!in_array($value['filter_id'], $filters))
                $filters[] = $value['filter_id'];
            $return_array['attribute_'.$value['filter_id']]['filter_id'] = $value['filter_id'];
            $return_array['attribute_'.$value['filter_id']]['filter'] = $value['filter'];
            $return_array['attribute_'.$value['filter_id']]['name'] = $value['name'];
            $return_array['attribute_'.$value['filter_id']]['values'][$value['fa_id']] = $value['value'];
            $return_array['attribute_'.$value['filter_id']]['selected'] = array();          
        }


        if(!empty($product_id)){
                foreach ($filters as $key => $value) {
                    $products = ProductAttributes::where('filter_id',$value)
                            ->where('product_id',$product_id)->get();

                    foreach ($products as $prod) {
                        $return_array['attribute_'.$value]['selected'][] = $prod['filter_att_id'];
                    }
                }                                           
                
            }

        // Split them for bootstrap in 2 columns
        $return_array = array_chunk($return_array, 2);
        return Response::json([
            'success'=>1,
            'article_att'=>$return_array]
        );

    }

}
