<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Category;
use EasyShop\Models\ReportKDFI;
use EasyShop\Models\ReportDFI;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Services\CategoryService;
use EasyShop\Services\ProductService;
use Illuminate\Support\Facades\Input;
use DB;
use Datatables;
use EasyShop\Models\Product;
use EasyShop\Models\Manufacturers;
use EasyShop\Models\Variations;
use EasyShop\Models\ProductVariations;
use EasyShop\Models\ProductCategory;
use EasyShop\Models\ProductImages;
use EasyShop\Models\ProductAttributes;
use EasyShop\Models\Discount;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Document;
use EasyShop\Models\Warehouse;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\ReportNivelacija;
use EasyShop\Models\ReportNivelacijaItems;
use EasyShop\Models\DocumentsFiskalna;
use EasyShop\Models\DocumentsFiskalnaItems;
use EasyShop\Models\FakturaOnline;
use Carbon\Carbon;

class FiskalnaController extends Controller
{

	    /**
     * @var $articleRepository
     */
    protected $articleRepository;

    /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    /**
     * @var $categoryService
     */
    protected $categoryService;

    /**
     * @var $productService
     */
    protected $productService;

	public function __construct(ArticleRepositoryInterface $articleRepository,
                                CategoryRepositoryInterface $categoryRepository,
                                CategoryService $categoryService,
                                ProductService $productService)
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->productService = $productService;

    }

    /**
     * @param Request $request
     */
    public function getDnevenPromet(Request $request)
    {
        $data['warehouses'] = Warehouse::where('prodavnica',1)->get();
        $when = $request->get('when', 0);

        if(!empty($when))
        {
            $from_date = strtotime("-$when day", strtotime(date('Y-m-d 00:00:00')));
            $from_date = date('Y-m-j H:i:s', $from_date);
            if($when == '1' ){
                $to_date = strtotime('-1 day', strtotime(date('Y-m-d 23:59:58')));
                $to_date = date('Y-m-j H:i:s', $to_date);
            } else {
                $to_date = date('Y-m-d 23:59:58');
            }

        } else {

            if($request->has('from_date'))
                $from_date  = date('Y-m-j 00:00:00',strtotime($request->get('from_date')));
            else
                $from_date  = date('Y-m-j 00:00:00');
            
            if($request->has('to_date'))
                $to_date    = date('Y-m-j 00:00:00',strtotime($request->get('to_date')));
            else
                $to_date	= date('Y-m-j 23:59:58');
        }

        $warehouseId = $request->input('warehouse_id');

        if(!isset($warehouseId))
            $warehouseId = $data['warehouses'][0]->id;

        $data['selected_wh'] = $warehouseId;

        $getKasi = DocumentsFiskalna::distinct('fiskalna_id')->where('warehouse_id', '=', $warehouseId)->pluck('fiskalna_id')->toArray();

        foreach ($getKasi as $key => $kv) {
            # code...

            //prometot
            $documents_id_fiskalna = DocumentsFiskalna::where('warehouse_id',$warehouseId)->where('document_date','>=',date('Y-m-d 00:00:00',strtotime($from_date)))->where('document_date','<=',date('Y-m-d 23:59:59',strtotime($to_date)))->where('fiskalna_id',$kv)->where('status','generirana')->pluck('id');
            $data['br_smetki'] = count($documents_id_fiskalna);
            
            $data['br_items'] = DocumentsFiskalnaItems::whereIn('document_id',$documents_id_fiskalna)->sum('quantity');

            $data['iznos_count'] = DocumentsFiskalnaItems::whereIn('document_id',$documents_id_fiskalna)->sum('sum_vat');

            if(empty($data['iznos_count']))
                $data['iznos_count'] = 0;

            //storno smetktite
            $documents_id_fiskalna_storno = DocumentsFiskalna::where('warehouse_id',$warehouseId)->where('document_date','>=',date('Y-m-d 00:00:00',strtotime($from_date)))->where('document_date','<=',date('Y-m-d 23:59:59',strtotime($to_date)))->where('fiskalna_id',$kv)->where('status','stornirana')->pluck('id');
            $data['br_smetki_storno'] = count($documents_id_fiskalna_storno);

            $data['iznos_count_storno'] = DocumentsFiskalnaItems::whereIn('document_id',$documents_id_fiskalna_storno)->sum('sum_vat');

            if(empty($data['iznos_count_storno']))
                $data['iznos_count_storno'] = 0;

            //promet - storno
            $data['vkupno'] = $data['iznos_count'] - $data['iznos_count_storno'];
        }

        $data['when'] = $when;
        
        if($request->has('ajax'))
        {
            $data['iznos_count'] = number_format($data['iznos_count'], 2, ',', '.');
            $data['iznos_count_storno'] = number_format($data['iznos_count_storno'], 2, ',', '.');
            return $data;
        }
            

        return view('admin.fiskalna.dnevenPromet', $data);
    }

    /**
     * @param Request $request
     */
    public function getFiskalni(Request $request)
    {
        $when = 0;
        $selected_wh = \Auth::user()->warehouse_id;
        if(\Auth::user()->canDo('admin_izbor_magacin'))
            $warehouses = Warehouse::where('prodavnica',1)->get();
        else
            $warehouses = Warehouse::where('id',\Auth::user()->warehouse_id)->get();
       
        return view('admin.fiskalna.fiskalni', compact('warehouses','when','selected_wh'));
    }

    /**
     * @param Request $request
     */
    public function getFiskalniDatatable(Request $request)
    {
        $fromDate = date('Y-m-d 00:00:00', strtotime($request->input('from_date')));
        $toDate =  date('Y-m-d 23:59:59', strtotime($request->input('to_date')));
        $warehouseId = $request->input('warehouse_id');
        $warehouse   = Warehouse::where('id',$warehouseId)->first();
        $reports = DocumentsFiskalna::where('document_date', '>=', $fromDate)
            ->where('document_date', '<=', $toDate)
            ->where('documents_fiskalna.warehouse_id', '=', $warehouseId)
            ->select(
                'documents_fiskalna.id',
                'users.first_name',
                'document_date',
                'fiskalna_id',
                'document_number',
                'status',
                'payment',                
                'payment_cash',
                'payment_card',
                'payment_card_type',
                'payment_card_installment',
                'bank_name',
                'employee_id',
                'documents_fiskalna.id as articles',
                'documents_fiskalna.note',
                'documents_fiskalna.id as related_documents'
            )->leftJoin('users','employee_id','=','users.id');

        return Datatables::of($reports) 
            ->editColumn('fiskalna_id', function ($report) use ($warehouse){

                return $warehouse->title;
            })           
            ->editColumn('status', function ($report){
                return $this->transliterate(null,$report->status);
            })
            ->editColumn('payment', function ($report){
                return $this->transliterate(null,$report->payment);
            })
            ->editColumn('articles', function ($model) {
                $articles = DocumentsFiskalnaItems::where('document_id', '=', $model->id)
                    ->select('unit_code', 'item_name', 'quantity')->get();

                $articleNames = [];
                foreach($articles as $article) {
                    $articleNames[] = '<span style="white-space: nowrap">(' . $article->unit_code . ')' . ' ' . $article->item_name . '<span style="color:blue"> [' . $article->quantity . ']</span></span>';
                }

                return implode('<br/>', $articleNames);
            })
            ->editColumn('related_documents', function ($model) {
                $related = DocumentsRelated::where('fiskalna_id', '=', $model->id)->first();

                if (is_null($related)) {
                    return '';
                }

                $relatedLinks = [];

                if ($related->naracka_id) {
                    $relatedLinks[] = '<a style="white-space: nowrap" target="_blank" href="' . route('admin.document.edit', ['narachka', $related->naracka_id]) . '">Нарачка</a>';
                }

                if ($related->ispratnica_id) {
                    $relatedLinks[] = '<a style="white-space: nowrap" target="_blank" href="' . route('admin.document.edit', ['ispratnica', $related->ispratnica_id]) . '">Испратница</a>';
                }

                if ($related->povratnica_id) {
                    $relatedLinks[] = '<a style="white-space: nowrap" target="_blank" href="' . route('admin.document.edit', ['povratnica', $related->povratnica_id]) . '">Повратница</a>';
                }

                return implode('<br/>', $relatedLinks);
            })
            ->addColumn('action','<div class="text-center">
            <a  class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title=""
                href="/admin/document/fiskalna/print/{{$id}}">
                <i class="fa fa-file"></i>
            </a>
            @if(Auth::user()->hasRole("admin"))
            <a  class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title=""
                href="#" onclick="YNconfirm(\'{{URL::to("/admin/fiskalni/delete")}}/{{$id}}\'); return false;">
                <i class="fa fa-trash"></i>
            </a>
            @endif
            </div>')
            ->make(true);
    }

    public function changeDocumentField(Request $request)
    {
        switch($request->input('name')) {

            case 'document_number':
                $this->validate($request, [
                    'value' => 'required'
                ]);

                $id = $request->input('pk');
                $value = $request->input('value');
                DocumentsFiskalna::where('id', '=', $id)
                        ->update(['document_number' => $value]);
                break;   
            
            case 'document_date':
                $this->validate($request, [
                    'value' => 'required'
                ]);
                $id = $request->input('pk');
                $value = $request->input('value');
                $value = date('Y-m-d H:i:s',strtotime($value));
                 

                DocumentsFiskalna::where('id', '=', $id)->update(['document_date' => $value]);
                $this->changeFieldOnRelatedDocument('document_date',$value,$id);
                break;        
        }
    }

    private function changeFieldOnRelatedDocument($field,$value,$document_id)
    {
        $dr = DocumentsRelated::where('fiskalna_id',$document_id)->first();
        if(!empty($dr))
        {
            if(!empty($dr->ostanato_id))
            {
                Document::where('id',$dr->ostanato_id)->update([$field=>$value]);               
            }

            if(!empty($dr->naracka_id))
            {
                Document::where('id',$dr->naracka_id)->update([$field=>$value]);                
            }

            if(!empty($dr->profaktura_id))
            {
                Document::where('id',$dr->profaktura_id)->update([$field=>$value]);               
            }

            if(!empty($dr->faktura_id))
            {
                Document::where('id',$dr->faktura_id)->update([$field=>$value]);                
            }

            if(!empty($dr->ispratnica_id))
            {
                Document::where('id',$dr->ispratnica_id)->update([$field=>$value]);                
            }

            if(!empty($dr->rezervacija_id))
            {
                Document::where('id',$dr->rezervacija_id)->update([$field=>$value]);               
            }

            if(!empty($dr->povratnica_id))
            {
                Document::where('id',$dr->povratnica_id)->update([$field=>$value]);               
            }

            if(!empty($dr->faktura_online_id))
            {
                FakturaOnline::where('id',$dr->faktura_online_id)->update([$field=>$value]);                
            }

            if(!empty($dr->paragon_id))
            {
                Document::where('id',$dr->paragon_id)->update([$field=>$value]);               
            }
        } 
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
        else if ($textlat){
            $text = str_replace($lat, $cyr, $textlat);
            if($text == 'фактура_онлине')
                $text = 'Фактура Online';
            if($text == 'картицка')
                $text = 'картичка';
            return $text;
        } 
        else return null;
    }

}
