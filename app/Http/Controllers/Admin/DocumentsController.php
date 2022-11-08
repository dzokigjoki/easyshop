<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Repositories\DocumentRepository\DocumentRepositoryInterface;
use EasyShop\Models\Suppliers;
use EasyShop\Models\Document;
use EasyShop\Models\Product;
use EasyShop\Models\User;
use EasyShop\Models\WarehouseProduct;
use EasyShop\Models\Warehouse;
use EasyShop\Models\Discount;
use EasyShop\Models\Settings;
use EasyShop\Models\Services;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\DocumentsRelated;
use EasyShop\Models\DocumentsFiskalna;
use EasyShop\Models\DocumentsFiskalnaItems;
use EasyShop\Models\VariationQuantity;
use EasyShop\Models\FakturaOnline;
use EasyShop\PromoCode;
use EasyShop\Models\FakturaOnlineItems;
use DB;
use View;
use Auth;
use EasyShop\Courier;
use Validator;
use Excel;

class DocumentsController extends Controller
{

    /**
     * @var
     */
    protected $documentRepository;

    /**
     * @var array
     */
    protected $document_types = array();

    public function __construct(DocumentRepositoryInterface $documentRepository)
    {
        $this->documentRepository = $documentRepository;
    }

    /**
     * Show documents table
     *
     * @param $document
     * @return mixed
     */
    public function index($document)
    {

        $data['my_warehouse'] = Auth::user()->warehouse_id;
        $data['document_type'] = $document;
        $data['document_type_show'] = $this->transliterate(null, $document);
        if ($document == 'povratnica_dobavuvac')
            $data['document_type_show'] = 'Повратница добавувач';
        // GET DATA - Warehouses FILTER
        $data['documentWarehouse_select'] = Warehouse::all();
        // GET DATA - Warehouses FILTER
        $data['documentProducts_select'] = Product::all();
        // GET DATA - document status FILTER
        $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');

        if ($document == 'narachka') {
            $data['posta_select'] = Document::distinct()->select('posta')->groupBy('posta')->pluck('posta');
        }

        if (in_array($document, ['priemnica', 'povratnica_dobavuvac'])) {
            $data['documentClient_select'] = Suppliers::all();
        } else {
            $data['documentClient_select'] = User::all();
        }
        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {
            $data['documentOrderType_select'] = array('inbound' => 'InBan', 'outbound' => 'OutBan', 'web' => 'Web', 'Социјални мрежи' => 'Социјални мрежи', 'Продавници' => 'Продавници');
            $data['documentCreatedBy_select'] = Document::whereNotNull("documents.created_by")->join('users', 'documents.created_by', '=', 'users.id')->join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->select('users.*')->distinct()->get();
        } 

        return View::make('admin.documents.showTable', $data);
    }

    /**
     * @param $document
     * @param Request $req
     * @return mixed
     */
    public function create($document, Request $req)
    {
        if ($document == 'vlez') {
            $data['document_type'] = $document;
            $data['document_type_show'] = $this->transliterate(null, $document);
            $data['document_id'] = 0;
            $data['selected_company'] = 0;
            $data['warehouses'] = Warehouse::all();
            $data['documents'] = Document::where('type', 'izlez')
                ->where('status', 'generirana')
                ->where('warehouse_to_id', $data['warehouses'][0]->id)
                ->whereNotIn('id', function ($query) {
                    $query->from('documents_related')
                        ->select('izlez_id')
                        ->whereNotNull('izlez_id');
                })->get();
            return View::make('admin.documents.create', $data);
        }

        $doc = new Document();

        $client = [];

        $hour = date('H');
        $minute = date('i');
        $sec = date('s');

        $doc->document_date = date("Y-m-d $hour:$minute:$sec");
        $doc->type = $document;
        $doc->warehouse_id = Auth::user()->warehouse_id;

        $count_docs = Document::where('type', $doc->type)
            ->whereNotNull('document_number')
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->where('warehouse_id', $doc->warehouse_id)
            ->count();

        if ($doc->type == 'priemnica' || $doc->type == 'povratnica_dobavuvac') {
            $doc->supplier_id = 1;
            $client = Suppliers::find($doc->supplier_id);
            if (!$client) {
                return redirect()->route('admin.dashboard')->with('error', 'Немате внесено добавувач! Ве молиме внесете на следниов <a href="' . route('admin.suppliers.create') . '"> линк </a>');
            }
        } elseif ($doc->type == 'vlez') {

            $zafateni_vlezovi = DocumentsRelated::whereNotNull('vlez_id')->whereNotNull('izlez_id')->pluck('izlez_id')->toArray();

            $doc_id_temp = Document::where('type', 'izlez')->whereNotIn('id', $zafateni_vlezovi)->pluck('id')->toArray();

            if (count($doc_id_temp) < 1)
                return redirect("admin/document/{$doc->type}");
            $doc_id_temp = array_values($doc_id_temp);
            if (!isset($doc_id_temp[0]))
                return redirect("admin/document/{$doc->type}");

            $dr = DocumentsRelated::where('izlez_id', $doc_id_temp[0])->first();
            if (!$dr) {
                $dr = new DocumentsRelated();
            }
            $dr->izlez_id = $doc_id_temp[0];
        } elseif ($doc->type == 'izlez') {
            $doc->warehouse_id = Auth::user()->warehouse_id;
        } elseif ($doc->type == 'narachka') {
            $doc->user_id = 1;
            $client = User::find($doc->user_id);
        } else {
            $doc->user_id = 1;
            $client = User::find($doc->user_id);
        }
        if(in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)){
            $doc->created_by = Auth::user()->id;
        }
        $doc->maturity_date = date("Y-m-d $hour:$minute:$sec");
        $doc->status = 'podgotovka';
        //$doc->document_number =  sprintf('%05d', $count_docs + 1).'/'.date('y');
        $doc->type_delivery = "cargo";
        $doc->currency = \EasyShop\Models\AdminSettings::getField('currency');
        $doc->save();

        if ($doc->type == 'vlez') {
            $dr->vlez_id = $doc->id;
            $dr->save();
        }


        $this->copyClientAddressToDocument($doc, $client);
        return redirect("admin/document/{$doc->type}/edit/{$doc->id}");
    }

    /**
     * Show the document
     *
     * @param $document The name of the document
     * @param $document_id
     * @return mixed
     */
    public function show($document, $document_id)
    {
        // Document data
        $data['document_type'] = $document;
        $data['document_type_show'] = $this->transliterate(null, $document);
        if ($document == 'povratnica_dobavuvac')
            $data['document_type_show'] = 'Повратница добавувач';
        $data['document_id'] = $document_id;
        $data['document_id_ajax'] = $document_id;
        $data['document_data'] = Document::where('id', $document_id)->first();

        if (!$data['document_data']->document_json) {
            abort(404);
        }

        $column = $document;

        if ($column == 'narachka')
            $column = 'naracka';
        if ($column != 'priemnica' && $column != 'povratnica' && $column != 'povratnica_dobavuvac') {
            $doc_rel = DocumentsRelated::where($column . '_id', $document_id)->first();
        } else
            $doc_rel = 0;

        if (!empty($doc_rel)) {
            if (isset($doc_rel->ispratnica_id) && $document != 'ispratnica')
                $data['related_ispratnica'] = Document::where('id', $doc_rel->ispratnica_id)->select('id', 'document_number')->first();
            if (isset($doc_rel->povratnica_id) && $document != 'povratnica')
                $data['related_povratnica'] = Document::where('id', $doc_rel->povratnica_id)->select('id', 'document_number')->first();
            if (isset($doc_rel->naracka_id) && $document != 'narachka')
                $data['related_naracka'] = Document::where('id', $doc_rel->naracka_id)->select('id', 'document_number')->first();
            if (isset($doc_rel->profaktura_id) && $document != 'profaktura')
                $data['related_profaktura'] = Document::where('id', $doc_rel->profaktura_id)->select('id', 'document_number')->first();
            if (isset($doc_rel->faktura_id) && $document != 'faktura')
                $data['related_faktura'] = Document::where('id', $doc_rel->faktura_id)->select('id', 'document_number')->first();
            if (isset($doc_rel->rezervacija_id) && $document != 'rezervacija')
                $data['related_rezervacija'] = Document::where('id', $doc_rel->rezervacija_id)->select('id', 'document_number')->first();
            if (isset($doc_rel->fiskalna_id) && $document != 'fiskalna')
                $data['related_fiskalna'] = DocumentsFiskalna::where('id', $doc_rel->fiskalna_id)->select('id', 'document_number')->first();
        }

        // Company data
        if ($document == 'priemnica' || $document == 'povratnica_dobavuvac') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
            $company = Suppliers::where('id', $data['document_data']->supplier_id)->first();
            $data['companies'] = Suppliers::all();
        } elseif ($document == 'izlez') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
            $data['hide_docinfo'] = 1;
        } elseif ($document == 'vlez') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
            $data['hide_docinfo'] = 1;
            $dr = DocumentsRelated::where('vlez_id', $document_id)->first();
            $data['document_id_ajax'] = $dr->izlez_id;
        } elseif ($document == 'narachka') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генерирана');

            // Listanje na narachki samo za odreden operator
            // if ((in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) && Auth::user()->hasRole('operator')) {
            //     $data['companies'] = User::where('created_by', Auth::user()->id)->orWhere('created_by', null)->get();
            // } else {
            //     $data['companies'] = User::all();
            // }
            $data['companies'] = User::all();
            $company = User::where('id', $data['document_data']->user_id)->first();
        } elseif ($document == 'rezervacija') {

            if (!empty($data['document_data']->generirana_od)) {
                $data['documentStatus_select'] = array('generirana' => 'Генерирана');
            } else {
                $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генерирана');
            }
            $data['companies'] = User::all();
            $company = User::where('id', $data['document_data']->user_id)->first();
        } elseif ($document == 'faktura_online') {
            $data['document_data'] = FakturaOnline::where('id', $document_id)->first();
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генерирана');
            $company = User::where('id', $data['document_data']->user_id)->first();
            $data['companies'] = User::all();
            if ($document == 'faktura') {
                $col = $document . '_id';
                $data['document_related'] = DocumentsRelated::where($col, $document_id)->first();
            }
        } else {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генерирана');
            $company = User::where('id', $data['document_data']->user_id)->first();
            $data['companies'] = User::all();
            if ($document == 'faktura') {
                $col = $document . '_id';
                $data['document_related'] = DocumentsRelated::where($col, $document_id)->first();
            }
        }


        $data['paiddocumentStatus_select'] = array('platena' => 'Платена', 'neplatena' => 'Неплатена');
        //type of order data config
        $data['all_type_of_order_fields'] = config( 'clients.' . config( 'app.client') . '.type_of_order' . '.fields');
        $data['couriers'] = Courier::all();
        $data['warehouses'] = Warehouse::all();
        $data['company'] = !empty($company) ? $company : new User();
        $data['city'] = City::all();
        $data['country'] = Country::all();
        if (empty($data['company']->country_id)) {
            $data['company']->country_id = 1;
        }
        if (empty($data['company']->country_id_shipping)) {
            $data['company']->country_id_shipping = 1;
        }

        if ($document == 'ispratnica') {

            $products = Product::where('active', 1)->get();

            $date = date('Y-m-d H:i:s');
            foreach ($products as $prod) {
                $productid_temp = $prod->id;
                $prod->discount = Discount::select('*')->whereRaw(" product_id = $productid_temp  and '$date' between start and end")->count();
                $data['products'][] = $prod;
            }
        } else
            $data['products'] = Product::where('active', 1)->get();

        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {
            $packages = Product::productsByCategories(14);
            $data['packages'] = array_filter($packages, function ($item) {
                return $item->bundle === 1;
            });
        }

        $data['document_status_show'] = $this->transliterate(null, $data['document_data']['status']);
        $data['document_paidstatus_show'] = $this->transliterate(null, $data['document_data']['paid']);
        $data['currency_select'] = collect(\EasyShop\Models\AdminSettings::getField('currencies'))->pluck("name")->toArray();
        $data['document_warehouse'] = Warehouse::where('id', $data['document_data']->warehouse_id)->first();
        $data['city_mk'] = City::all()->pluck('city_name', 'id')->toArray();
        $data['city_mk_zip'] = City::all()->pluck('zip', 'id')->toArray();

        if (!is_null($data['document_data']->promo_code_id)) {
            $data['promo_code'] = PromoCode::where('id', $data['document_data']->promo_code_id)->first()->code;
            $data['promo_code_percent'] = PromoCode::where('id', $data['document_data']->promo_code_id)->first()->value;
        }
        return View::make('admin.documents.edit', $data);
    }

    /**
     * Print the document
     *
     * @param $name - The name of the document
     * @param $id
     * @return mixed
     */
    public function printDocument(Request $request, $name, $id)
    {
        $printDocumentView = 'admin.documents.pdf.document';

        $printType = $request->input('document', null);
        switch ($printType) {
            case 'plt':
                $printDocumentView = 'admin.documents.pdf.document-plt';
                break;
            default:
                $printDocumentView = 'admin.documents.pdf.document';
                break;
        }

        if ($name == 'fiskalna') {
            $document = DocumentsFiskalna::where('id', $id)->first();
            $documentName = $this->transliterate(null, ucfirst($name));
            $document->type = 'fiskalna';
        } elseif ($name == 'faktura_online') {
            $document = FakturaOnline::where('id', $id)->first();
            $documentName = $this->transliterate(null, ucfirst($document->type));
        } else if ($name == 'nalepnica') {
            $document = $this->documentRepository->getById($id);
            $documentName = $this->transliterate(null, ucfirst($document->type));
            $printDocumentView = 'admin.documents.pdf.nalepnica';


            $document_items = $this->documentRepository->getDocumentData($id);
            $sums = ['sum_no_vat' => 0, 'sum_vat' => 0, 'original_sum_no_vat' => 0, 'original_sum_vat' => 0];
            foreach ($document_items as $di) {
                $sums['sum_no_vat']  = $sums['sum_no_vat'] + $di->sum_no_vat;
                $sums['sum_vat']  = $sums['sum_vat'] + $di->sum_vat;
                $sums['original_sum_no_vat']  = $sums['original_sum_no_vat'] + $di->original_sum_no_vat;
                $sums['original_sum_vat']  = $sums['original_sum_vat'] + $di->original_sum_vat;
            }

            $sums['total_vat'] = $sums['sum_vat'] - $sums['sum_no_vat'];
            $sums['original_total_vat'] = $sums['original_sum_vat'] - $sums['original_sum_no_vat'];


            $pdf = \PDF::loadView(
                $printDocumentView,
                compact('document', 'documentName', 'document_items', 'sums')
            )->setPaper('a6', 'landscape');
            return @$pdf->stream();
        } else {
            // TODO: Define document list        
            $document = $this->documentRepository->getById($id);
            $documentName = $this->transliterate(null, ucfirst($document->type));
        }
        if (is_null($document)) {
            return redirect()->route('admin.document.index', [$name])->withError('Документот не постои.');
        }

        if ($document->type == Document::TYPE_PRIEMNICA) {

            $from_data = json_decode($document->document_json);
            $from_data = $from_data->userBilling;

            if (!isset($from_data->country_name) || empty($from_data->country_name)) {
                if ($from_data->country_id < 62) {
                    $from_data->country_name    =   Country::where('id', $from_data->country_id)->first();
                    $from_data->country_name    =   $from_data->country_name->country_name;
                } else
                    $from_data->country_name    =   $from_data->country_other;
            }

            if (!isset($from_data->city_name) || empty($from_data->city_name)) {
                if ($from_data->city_id < 35) {
                    $from_data->city_name    =   City::where('id', $from_data->city_id)->first();
                    $from_data->zip          =   $from_data->city_name->zip;
                    $from_data->city_name    =   $from_data->city_name->city_name;
                } else
                    $from_data->city_name    =   $from_data->city_name;
            }

            $to_data                = Settings::first();
            $to_data->address       = $to_data->company_address;
            $to_data->city_name     = $to_data->company_city;
            $to_data->country_name  = $to_data->company_country;
        } else if ($document->type == Document::TYPE_POVRATNICA_DOBAVUVAC) {
            $to_data = json_decode($document->document_json);

            $to_data = $to_data->userBilling;

            if (!isset($to_data->country_name) || empty($to_data->country_name)) {
                if ($to_data->country_id < 62) {
                    $to_data->country_name    =   Country::where('id', $to_data->country_id)->first();
                    $to_data->country_name    =   $to_data->country_name->country_name;
                } else
                    $to_data->country_name    =   $to_data->country_other;
            }

            if (!isset($to_data->city_name) || empty($to_data->city_name)) {
                if ($to_data->city_id < 35) {
                    $to_data->city_name    =   City::where('id', $to_data->city_id)->first();
                    $to_data->zip          =   $to_data->city_name->zip;
                    $to_data->city_name    =   $to_data->city_name->city_name;
                } else
                    $to_data->city_name    =   $to_data->city_name;
            }

            $from_data                = Settings::first();
            $from_data->address       = $from_data->company_address;
            $from_data->city_name     = $from_data->company_city;
            $from_data->country_name  = $from_data->company_country;
        } else if ($document->type === Document::TYPE_IZLEZ) {

            $from_data = Warehouse::where('warehouses.id', '=', $document->warehouse_id)
                ->join('cities', 'warehouses.city_id', '=', 'cities.id')
                ->join('countries', 'warehouses.country_id', '=', 'countries.id')
                ->first();
            $from_data->company_name = $from_data->title;


            $to_data = Warehouse::where('warehouses.id', '=', $document->warehouse_to_id)
                ->join('cities', 'warehouses.city_id', '=', 'cities.id')
                ->join('countries', 'warehouses.country_id', '=', 'countries.id')
                ->first();

            $to_data->company_name = $to_data->title;
        } else if ($document->type === Document::TYPE_VLEZ) {

            $documentRelated = DocumentsRelated::where('vlez_id', '=', $document->id)->first();

            $documentIzlez = Document::find($documentRelated->izlez_id);
            $from_data = Warehouse::where('warehouses.id', '=', $documentIzlez->warehouse_id)
                ->join('cities', 'warehouses.city_id', '=', 'cities.id')
                ->join('countries', 'warehouses.country_id', '=', 'countries.id')
                ->first();
            $from_data->company_name = $from_data->title;

            $to_data = Warehouse::where('warehouses.id', '=', $document->warehouse_id)
                ->join('cities', 'warehouses.city_id', '=', 'cities.id')
                ->join('countries', 'warehouses.country_id', '=', 'countries.id')
                ->first();
            $to_data->company_name = $to_data->title;
        } else if ($document->type === 'fiskalna') {

            $to_data = false;
            $from_data                = Settings::first();
            $from_data->address       = $from_data->company_address;
            $from_data->city_name     = $from_data->company_city;
            $from_data->country_name  = $from_data->company_country;
        } else {

            $to_data = User::where('users.id',  $document->user_id)
                ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
                ->leftJoin('countries', 'users.country_id', '=', 'countries.id')
                ->first();

            if (!!$to_data && $to_data->type == 'company') {
                $to_data->company_name = $to_data->company;
            }

            $to_data = json_decode($document->document_json);

            $to_data = $to_data->userBilling;

            if (!isset($to_data->country_name) || empty($to_data->country_name)) {
                if ($to_data->country_id < 62) {
                    $to_data->country_name    =   Country::where('id', $to_data->country_id)->first();
                    $to_data->country_name    =   $to_data->country_name->country_name;
                } else
                    $to_data->country_name    =   $to_data->country_other;
            }

            if (!isset($to_data->city_name) || empty($to_data->city_name)) {

                if ($to_data->city_id != 35) {
                    $to_data->city_name    =   City::where('id', $to_data->city_id)->first();
                    $to_data->zip          =   $to_data->city_name->zip;
                    $to_data->city_name    =   $to_data->city_name->city_name;
                } else
                    $to_data->city_name    =   $to_data->city_name;
            }

            $from_data                = Settings::first();
            $from_data->address       = $from_data->company_address;
            $from_data->city_name     = $from_data->company_city;
            $from_data->country_name  = $from_data->company_country;
        }

        if ($document->type === Document::TYPE_VLEZ) {
            $document_items = $this->documentRepository->getDocumentData($documentIzlez->id);
        } else if ($document->type === 'fiskalna') {
            $document_items = DocumentsFiskalnaItems::where('document_id', $id)->get();
        } else if ($document->type === 'faktura_online') {
            $document_items = FakturaOnlineItems::where('document_id', $id)->get();
        } else {
            $document_items = $this->documentRepository->getDocumentData($id);
        }

        $sums = ['sum_no_vat' => 0, 'sum_vat' => 0, 'original_sum_no_vat' => 0, 'original_sum_vat' => 0];
        foreach ($document_items as $di) {
            $sums['sum_no_vat']  = $sums['sum_no_vat'] + $di->sum_no_vat;
            $sums['sum_vat']  = $sums['sum_vat'] + $di->sum_vat;
            $sums['original_sum_no_vat']  = $sums['original_sum_no_vat'] + $di->original_sum_no_vat;
            $sums['original_sum_vat']  = $sums['original_sum_vat'] + $di->original_sum_vat;
        }

        $sums['total_vat'] = $sums['sum_vat'] - $sums['sum_no_vat'];
        $sums['original_total_vat'] = $sums['original_sum_vat'] - $sums['original_sum_no_vat'];

        $warehouse_from_doc = Warehouse::where('id', $document->warehouse_id)->first();
        $document->warehouse_title = $warehouse_from_doc->title;

        $pdf = \PDF::loadView(
            $printDocumentView,
            compact('document', 'documentName', 'document_items', 'from_data', 'sums', 'to_data')
        );

        return @$pdf->stream();
        //        return $pdf->download('ispratnica.pdf');

    }


    public function addresslists(Request $request, $id, $courier_id)
    {
        if (config( 'app.client') == Settings::CLIENT_NATURATHERAPYSHOP) {
            $qrcode = 'NT-' . sprintf('%05d', $id);
        } else if (config( 'app.client') == Settings::CLIENT_HERLINE) {
            $qrcode = 'HERLINE-' . $id . '_';
        }

        $url = 'https://flk.mk/API/render_addresslist_array.php';
        // smeni go vo idnina za povekje qrkodovi
        $qrcodes = array($qrcode);
        $address_list_type = 'g3';

        $courier = Courier::find($courier_id);

        $params = array(
            'key' => urlencode($courier->api_token),
            'qrcode' => json_encode($qrcodes),
            'address_list_type' => urlencode($address_list_type)
        );

        $params_string = '';
        foreach ($params as $key => $value) {
            $params_string .= $key . '=' . $value . '&';
        }
        rtrim($params_string, '&');

        // Get cURL resource
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL             => $url,
            CURLOPT_POST             => count($params),
            CURLOPT_FOLLOWLOCATION    => 1,
            CURLOPT_POSTFIELDS         => $params_string,
            CURLOPT_RETURNTRANSFER     => 1
        ));

        $resp = curl_exec($curl);
        curl_close($curl);

        return redirect()->away($resp);
    }

    /**
     * Create Excel from order
     *
     * @param Request $req
     */
    public function createExcelFromOrder(Request $req)
    {
        $input_documents    = $req->get('excel_ids');
        $warehouses = $req->get('warehouses');
        // Check if the printing of the quantity of the product should be before or after the product name
        // e.g. 1xSnickers vs Snickers [1]
        $switchProductQuantityLabel = false;

        $data['docs']        = Document::whereIn('id', $input_documents)->get();
        $di  = DocumentItems::whereIn('document_id', $input_documents)
            ->leftJoin('variations', 'variations.id', '=', 'document_items.variation_id');

        $unit_code_config = \EasyShop\Models\AdminSettings::getField('sifra');

        $select_array = ['document_items.*', 'variations.*'];

        if (!empty($unit_code_config)) {
            $select_array[] = 'products.unit_code';
            $di  = $di->leftJoin('products', 'products.id', '=', 'document_items.product_id');
        }
        $di = $di->select($select_array)->get();

        foreach ($di as $key => $value) {
            $data['doc_items'][$value['document_id']][] = $value;
        }

        $data['countries']  = Country::all()->toArray();
        $data['cities']     = City::all()->toArray();
        $data['switchProductQuantityLabel'] = $switchProductQuantityLabel;
        //return View::make('admin.documents.excel.excel', $data);
        $file_name = 'orders_' . date('d_m_Y_h_i_s');



        // Calculate total price for order
        for ($i = 0; $i < count($data['docs']); $i++) {

            $sum = 0;

            if (isset($data['doc_items'][$data['docs'][$i]->id])) {
                foreach ($data['doc_items'][$data['docs'][$i]->id] as $documentItem) {
                    $sum += floatval($documentItem['sum_vat']);
                }
            }

            $data['docs'][$i]->totalSum = $sum;
            if (!empty($data['docs'][$i]->price_delivery)) {
                $data['docs'][$i]->totalSum = $data['docs'][$i]->totalSum + $data['docs'][$i]->price_delivery;
            }
        }
        Excel::create($file_name, function ($excel) use ($data) {
            $excel->sheet('sheet1', function ($sheet) use ($data) {
                $sheet->loadView('admin.documents.excel.excel', $data);
            });
        })->store('xls', public_path('uploads/excel/exports'));

        $downloadLink = route('admin.document.generate.excel.downloadfile', ['file' => $file_name]);
        return response()->json($downloadLink);
    }

    public function downloadExcelFile($file_name)
    {
        $file = public_path('uploads/excel/exports/' . $file_name . '.xls');
        return response()->download($file);
    }

    /**
     * Create Excel from order
     *
     * @param Request $req
     */
    public function excelKnigovodstvo(Request $req)
    {

        $input_documents    = $req->get('document_ids');
        $input_documents    = explode(',', $input_documents);

        $data['docs']        = Document::whereIn('id', $input_documents)
            ->select(
                'id',
                'document_number',
                'maturity_date',
                'tracking_code',
                'vlezen_document'
            )
            ->get();

        $file_name = 'excel_knigovodtsvo_' . date('d_m_Y_h_i_s');
        $i = 0;
        foreach ($data['docs'] as $doc) {
            $data_items = DocumentItems::select(DB::raw('sum(sum_vat) as sum_vat, sum(sum_no_vat) as sum_no_vat '))->where('document_id', $doc->id)->first();
            $data['docs'][$i]['other_data'] = $data_items;
            $i = $i + 1;
        }

        Excel::create($file_name, function ($excel) use ($data) {

            $excel->sheet('sheet1', function ($sheet) use ($data) {

                $sheet->loadView('admin.documents.excel.excel_knigovodstvo', $data);
            });
        })->download('xls');
    }
    /**
     * @param Request $req
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $req)
    {

        $doc = new Document();
        $doc->employee_id = Auth::user()->id;
        $client = [];
        //check date
        $doc_date = $req->get('document_date');
        $hour = date('H');
        $minute = date('i');
        $sec = date('s');

        if (empty($doc_date))
            $doc->document_date = date('Y-m-d H:i:s');
        else
            $doc->document_date = date("Y-m-d $hour:$minute:$sec", strtotime($doc_date));

        $doc->type = $req->get('type');
        $doc->warehouse_id = $req->get('warehouse_id');

        $count_docs = Document::where('type', $doc->type)
            ->whereNotNull('document_number')
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->where('warehouse_id', $doc->warehouse_id)
            ->count();

        $dr = DocumentsRelated::where('vlez_id', $req->get('doc_id'))->first();
        if (!$dr) {
            $dr = new DocumentsRelated();
            $dr->izlez_id = $req->get('doc_id');
        }

        $doc->maturity_date = $req->get('document_date');
        $doc->status = 'generirana';

        $top_produkti_array =
            [
                'topprodukti_mk',
                'topprodukti_bg',
                'topprodukti_cz',
                'topprodukti_hr',
                'topprodukti_hu',
                'topprodukti_sk',
                'topprodukti_pl',
                'topprodukti_ro',
                'topprodukti_rs',
                'topprodukti_si',
            ];
        if (in_array(config( 'app.client'), $top_produkti_array)) {
            $doc->document_number =  sprintf('%05d', $count_docs + 1) . date('y');
            $doc->document_number   = sprintf('%02d', $doc->warehouse_id) . $doc->document_number;
        } else {
            $doc->document_number =  sprintf('%05d', $count_docs + 1) . '/' . date('y');
            $doc->document_number   = sprintf('%02d', $doc->warehouse_id) . '-' . $doc->document_number;
        }


        $doc->currency = \EasyShop\Models\AdminSettings::getField('currency');
        $doc->save();
        $dr->vlez_id = $doc->id;
        $dr->save();
        $this->copyClientAddressToDocument($doc, $client);
        $my_warehouse = $doc->warehouse_id;
        $doc_items = DocumentItems::where('document_id', $req->get('doc_id'))->get();

        foreach ($doc_items as $key => $di) {

            $wp = new WarehouseProduct();
            $wp->product_id = $di->product_id;
            $wp->warehouse_id = $my_warehouse;
            $wp->quantity = $di->quantity;
            $wp->document_id = $doc->id;
            $wp->document_type = 'vlez';
            //$wp->other_warehouse = $doc->from_warehouse;
            $wp->variation_id = $di->variation_id;
            $wp->save();
        }

        $this->updateProductsTotal($doc->id, $doc_items, $my_warehouse);
        return redirect("admin/document/{$doc->type}/edit/{$doc->id}");
    }

    public function storeuserdata(Request $req)
    {

        $document_type = $req->get('document_type_userdata');
        $document_id   = $req->get('document_id_userdata');
        if ($document_type == 'faktura_online')
            $doc = FakturaOnline::where('id', $document_id)->first();
        else
            $doc  = Document::where('id', $document_id)->first();

        if (!empty($doc->document_json))
            $doc->document_json = json_decode($doc->document_json);

        if ($doc) {

            //Kreiraj User ako ne postoi

            if ($req->get('show_cost') == -1) {

                if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) {
                    $checkNewUser = User::where('phone', $req->get('phone'))->first();
                    if ($checkNewUser) {
                        return redirect()->back()->withError("Телефонскиот број е веќе искористен за креирање друг клиент");
                    }
                }  
                if (config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS) {
                    if($req->get('email')!=NULL || $req->get('email')!=''){
                        $checkNewUser = User::where('email', $req->get('email'))->first();
                        if ($checkNewUser) {
                            return redirect()->back()->withError("Е-поштата е веќе искористена за креирање друг клиент");
                        }
                    }
                }
                elseif($req->get('email')!=NULL || $req->get('email')!=''){
                    $checkNewUser = User::where('email', $req->get('email'))->first();
                    if ($checkNewUser) {
                        return redirect()->back()->withError("Е-поштата е веќе искористена за креирање друг клиент");
                    }
                }
                if (config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP) {
                    if($req->get('loyalty_code')!=NULL || $req->get('loyalty_code')!=''){
                        $checkNewUser = User::where('loyalty_code', $req->get('loyalty_code'))->first();
                        if ($checkNewUser) {
                            return redirect()->back()->withError("Лојалти шифрата е веќе искористена за креирање друг клиент");
                        }
                    }
                }

                $newuser = new User();
                $email = $req->get('email');
                if ($email == "") {
                    $email = md5(time());
                }
                $newuser->email = $email;
                $newuser->first_name = $req->get('first_name');
                $newuser->last_name = $req->get('last_name');
                $newuser->phone = $req->get('phone');
                if(config('app.client') == Settings::CLIENT_NATURATHERAPY_SHOPS){
                    $newuser->phone2 = $req->get('phone2');
                }

                $newuser->created_by = auth()->id();

                $birthdate = $req->get('birthdate');

                if (($birthdate) && $birthdate != "") {
                    $newuser->birthdate = \Carbon\Carbon::createFromFormat('d.m.Y', $birthdate)->toDateTimeString();
                }


                $newuser->veroispovest = $req->get('veroispovest');
                $newuser->city_id = $req->get('city_id');
                $newuser->city_other = $req->get('city_other');
                $newuser->country_id = $req->get('country_id');
                $newuser->country_other = $req->get('country_other');
                $newuser->municipality_shipping = $req->get('municipality_shipping');
                $newuser->municipality = $req->get('municipality');
                $newuser->zip_other = $req->get('zip_other');
                $newuser->address = $req->get('address');
                if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                    $newuser->loyalty_code = $req->get('loyalty_code');
                }
                $newuser->save();

                $req->merge([
                    'show_cost' => $newuser->id,
                ]);
            }

            if ($document_type != "priemnica") {
                if ($req->has('first_name') && $req->has('last_name')) {
                    $temp_array['userBilling']['first_name']    =  $req->get('first_name');
                    $temp_array['userBilling']['last_name']     =  $req->get('last_name');
                    $temp_array['userShipping']['first_name']    =  $req->get('first_name');
                    $temp_array['userShipping']['last_name']     =  $req->get('last_name');
                } else {
                    $temp_user = User::where('id', $req->get('show_cost'))->first();
                    $temp_array['userBilling']['first_name']    =  $temp_user->first_name;
                    $temp_array['userBilling']['last_name']     =  $temp_user->last_name;
                    $temp_array['userBilling']['company_name']    =  $temp_user->company;
                }
            } else {
                $temp_user = Suppliers::where('id', $req->get('show_cost'))->first();
                $temp_array['userBilling']['company_name']    =  $temp_user->company_name;
            }

            $city = City::where('id', $req->get('city_id'))->first();
            if ($city) {
                $temp_array['userBilling']['zip']   = $city->zip;
            }

            $temp_array['userBilling']['phone']                    =  $req->get('phone');
            $temp_array['userBilling']['phone2']                   =  $req->get('phone2');
            $temp_array['userBilling']['city_id']                  =  $req->get('city_id');
            $temp_array['userBilling']['country_id']               =  $req->get('country_id');
            $temp_array['userBilling']['city_other']               =  $req->get('city_other');
            $temp_array['userBilling']['zip_other']                =  $req->get('zip_other');
            $temp_array['userBilling']['country_other']            =  $req->get('country_other');
            $temp_array['userBilling']['birthdate'] = $req->get('birthdate');
            $temp_array['userBilling']['veroispovest'] = $req->get('veroispovest');
            $temp_array['userBilling']['email'] = $req->get('email');
            if ($req->has('municipality_shipping')) {
                $temp_array['userBilling']['municipality_shipping']         =  $req->get('municipality_shipping');
            }
            $temp_array['userBilling']['address']                  =  $req->get('address');
            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                $temp_array['userBilling']['loyalty_code']         =  $req->get('loyalty_code');
            }
            $temp_array['userShipping']['city_id_shipping']        =  $req->get('city_id_shipping');
            $city = City::where('id', $req->get('city_id_shipping'))->first();
            if ($city) {
                $temp_array['userShipping']['zip']   = $city->zip;
            }
            $temp_array['userShipping']['phone']                   =  $req->get('phone');
            $temp_array['userShipping']['phone2']                   =  $req->get('phone2');
            $temp_array['userShipping']['country_id_shipping']     =  $req->get('country_id_shipping');
            if ($req->has('municipality_shipping')) {
                $temp_array['userShipping']['municipality_shipping']        =  $req->get('municipality_shipping');
            }
            $temp_array['userShipping']['city_other_shipping']     =  $req->get('city_other_shipping');
            $temp_array['userShipping']['zip_other_shipping']      =  $req->get('zip_other_shipping');
            $temp_array['userShipping']['country_other_shipping']  =  $req->get('country_other_shipping');
            $temp_array['userShipping']['address_shiping']         =  $req->get('address_shiping');
            $temp_array['userShipping']['email'] = $req->get('email');
            if (isset($doc->document_json->userBilling->company))
                $temp_array['userBilling']['company']              =  $doc->document_json->userBilling->company;
            // if (isset($doc->document_json->userBilling->email))
            //     $temp_array['userBilling']['email']                =  $doc->document_json->userBilling->email;
            if (isset($doc->document_json->userBilling->company_name)){
                $temp_array['userBilling']['company_name']         =  $doc->document_json->userBilling->company_name;
            }
            $doc->type_of_order = $req->get('type_of_order');
            $doc->document_json = json_encode($temp_array);
            $doc->customer_name = $req->get('first_name') . " " . $req->get('last_name');
            $doc->user_id       = $req->get('show_cost');
            $doc->save();
        }

        return redirect("admin/document/{$document_type}/edit/{$document_id}");
    }

    /**
     * @param Request $req
     * @param $service_id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createFromService(Request $req, $service_id)
    {
        $service = Services::where('id', $service_id)->first();

        $count_docs = Document::where('type', 'narachka')
            ->whereNotNull('document_number')
            ->where('document_date', '>=', date('Y-01-01'))
            ->where('document_date', '<=', date('Y-m-d'))
            ->where('warehouse_id', $service->warehouse_id)
            ->count();

        $doc = new Document();
        $doc->document_date     = date('Y-m-d H:i:s');
        $doc->user_id           = $service->client_id;
        $doc->type              = 'narachka';
        $doc->maturity_date     = date('Y-m-d H:i:s');
        $doc->status            = 'podgotovka';
        $top_produkti_array =
            [
                'topprodukti_mk',
                'topprodukti_bg',
                'topprodukti_cz',
                'topprodukti_hr',
                'topprodukti_hu',
                'topprodukti_sk',
                'topprodukti_pl',
                'topprodukti_ro',
                'topprodukti_rs',
                'topprodukti_si',
            ];
        if (in_array(config( 'app.client'), $top_produkti_array)) {
            $doc->document_number   = sprintf('%05d', $count_docs + 1) . date('y');
            $doc->document_number   = sprintf('%02d', $service->warehouse_id) . $doc->document_number;
        } else {
            $doc->document_number   = sprintf('%05d', $count_docs + 1) . '/' . date('y');
            $doc->document_number   = sprintf('%02d', $service->warehouse_id) . '-' . $doc->document_number;
        }


        $doc->save();

        $service->order_id      = $doc->id;
        $service->status        = 'zavrsen';
        $service->save();

        return redirect("admin/document/{$doc->type}/edit/{$doc->id}");
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function splitDocument(Request $req)
    {

        $products       = $req->get('products');
        $kolicina       = $req->get('kolicina');
        $document_id    = $req->get('order_documentid');

        if (empty($products))
            return redirect('admin/document/narachka')->withError("Не избравте ни еден производ");

        $old_doc = Document::find($document_id);

        $count_docs = Document::where('type', 'narachka')
            ->whereNotNull('document_number')
            ->where('document_date', '>=', date('Y-01-01 00:00:00'))
            ->where('document_date', '<=', date('Y-m-d H:i:s'))
            ->where('warehouse_id', $old_doc->warehouse_id)
            ->count();



        $doc = new Document();
        $doc->document_date             = $old_doc->document_date;
        $doc->user_id                   = $old_doc->user_id;
        $doc->type                      = 'narachka';
        $doc->maturity_date             = date('Y-m-d H:i:s');
        $doc->status                    = 'generirana';
        $doc->currency = \EasyShop\Models\AdminSettings::getField('currency');

        // Hardcoded za top produkti da se bez specijalni znaci dokument number
        $top_produkti_array =
            [
                'topprodukti_mk',
                'topprodukti_bg',
                'topprodukti_cz',
                'topprodukti_hr',
                'topprodukti_hu',
                'topprodukti_sk',
                'topprodukti_pl',
                'topprodukti_ro',
                'topprodukti_rs',
                'topprodukti_si',
            ];
        if (in_array(config( 'app.client'), $top_produkti_array)) {
            $doc->document_number           = sprintf('%05d', $count_docs + 1) . date('y');
            $doc->document_number           = sprintf('%02d', $old_doc->warehouse_id) . $doc->document_number;
        } else {
            $doc->document_number           = sprintf('%05d', $count_docs + 1) . '/' . date('y');
            $doc->document_number           = sprintf('%02d', $old_doc->warehouse_id) . '-' . $doc->document_number;
        }

        $doc->document_json             =  $old_doc->document_json;
        //$doc->generirana_od             =  $old_doc->generirana_od;
        $doc->web                       =  $old_doc->web;
        $doc->tracking_code             =  $old_doc->tracking_code;
        $doc->warehouse_id              =  $old_doc->warehouse_id;
        $doc->payment                   =  $old_doc->payment;
        $doc->paid                      =  $old_doc->paid;
        $doc->type_delivery             =  $old_doc->type_delivery;
        $doc->supplier_id               =  $old_doc->supplier_id;
        $doc->checksum                  =  $old_doc->checksum;
        $doc->save();


        foreach ($products as $key => $value) {
            $di = DocumentItems::find($key);
            $ndi = new DocumentItems();
            $ndi->document_id       =  $doc->id;
            $ndi->product_id        =  $value;
            $ndi->item_name         =  $di->item_name;
            $ndi->quantity          =  $kolicina[$value];
            $ndi->document_number   =  $di->document_number;
            $ndi->price             =  $di->price;
            $ndi->vat               =  $di->vat;
            $ndi->price_no_vat      =  $di->price_no_vat;
            $ndi->sum_no_vat        =  (float) $kolicina[$value] * ($di->price - ($di->price * $di->vat / 100));
            $ndi->sum_vat           =  (float) $kolicina[$value] * $di->price;
            $ndi->variation_id      =  $di->variation_id;
            $ndi->save();

            $old_qu                 = $di->quantity - $kolicina[$value];
            if ($old_qu > 0) {
                $di->quantity       =  $old_qu;
                $di->sum_vat        =  (float) $old_qu * $di->price;
                $di->sum_no_vat     =  (float) $old_qu * ($di->price - ($di->price * $di->vat / 100));
                $di->save();
            } else {
                $di->delete();
            }
        }
        return redirect('admin/document/narachka');
    }






    /**
     * Import excel
     *
     * @param Request $req
     * @return mixed
     */
    public function importExcel(Request $req)
    {
        // Get import name and excel file
        $import = $req->get('import_name');
        $file   = $req->file('excel_file');
        // get from config maping columns
        $config_data = config( 'clients.' . config( 'app.client') . '.order.import_columns');

        if (isset($config_data[$import])) {
            Excel::load($file, function ($reader) use ($config_data, $import) {

                if (!empty($config_data[$import]['offset'])) {
                    $results = $reader->skip($config_data[$import]['offset']);
                } else
                    $results = $reader->get();

                $results->each(function ($sheet) use ($config_data, $import) {
                    $sheet->each(function ($value) use ($config_data, $import) {
                        $document_number    = $value[$config_data[$import]['document_number']];

                        if (isset($value[$config_data[$import]['status']['name']])) {
                            $excel_status       = $value[$config_data[$import]['status']['name']];
                            $excel_status       = strip_tags($excel_status, '\p');
                            if (isset($config_data[$import]['status']['mapping'][$excel_status]))
                                $our_status         = $config_data[$import]['status']['mapping'][$excel_status];
                            else
                                $our_status         = null;
                        } else {
                            $our_status         = null;
                        }

                        // FIND OUR DOC AND UPDATE IT 
                        $our_doc            = Document::where('document_number', $document_number)->where('type', 'narachka')->first();

                        if ($our_doc) {
                            echo "<p>$document_number";
                            if (!empty($our_status)) {
                                echo " | Статус: $our_status";
                                $our_doc->status                = $our_status;

                                if (!empty($our_doc->status_log)) {
                                    $status_log = (array) json_decode($our_doc->status_log);
                                    $status_log[] = ['name' => Auth::user()->first_name . ' ' . Auth::user()->last_name, 'status' => $our_status, 'date' => date('Y-m-d H:i:s')];
                                    $our_doc->status_log = json_encode($status_log);
                                } else {
                                    $status_log         = [];
                                    $status_log[]       = ['name' => Auth::user()->first_name . ' ' . Auth::user()->last_name, 'status' => $our_status, 'date' => date('Y-m-d H:i:s')];
                                    $our_doc->status_log    = json_encode($status_log);
                                }

                                if ($our_status == 'Dostavena') {
                                    $our_doc->naracka_ispratena_na = date('Y-m-d H:i:s', strtotime($value[$config_data[$import]['date_ispratena']]));
                                    switch (config( 'app.client')) {
                                        case 'globalstore_mk': {
                                                if ($import == 'Бугарија - Rapido') {
                                                    /* IF ( platena kolona polna )*/
                                                    if (is_null($value[$config_data[$import]['paid_status']['name']])) {
                                                        $our_doc->naracka_platena_na   = date('Y-m-d H:i:s', strtotime($value[$config_data[$import]['date_ispratena']]));
                                                        $our_doc->paid = 'neplatena';
                                                    } else {
                                                        $our_doc->naracka_platena_na   = date('Y-m-d H:i:s', strtotime($value[$config_data[$import]['date_ispratena']]));
                                                        $our_doc->paid = 'platena';
                                                    }
                                                } else {
                                                    $our_doc->naracka_platena_na   = date('Y-m-d H:i:s', strtotime($value[$config_data[$import]['date_ispratena']]));
                                                    $our_doc->paid = 'platena';
                                                }
                                            }
                                            break;
                                        default:
                                            $our_doc->naracka_platena_na   = date('Y-m-d H:i:s', strtotime($value[$config_data[$import]['date_ispratena']]));
                                            $our_doc->paid = 'platena';
                                            break;
                                    }
                                }

                                if ($our_status == 'Vratena') {
                                    $our_doc->paid = 'neplatena';
                                    if (isset($value[$config_data[$import]['date_vratena']]) && !empty($value[$config_data[$import]['date_vratena']]))
                                        $our_doc->naracka_ispratena_na = date('Y-m-d H:i:s', strtotime($value[$config_data[$import]['date_vratena']]));
                                    //$our_doc->naracka_vratena_na = date('Y-m-d H:i:s',strtotime($value[$config_data[$import]['date_vratena']]));
                                }
                            }
                            echo " | Доставена : $our_doc->naracka_ispratena_na   |   Вратена : $our_doc->naracka_vratena_na ";
                            $our_doc->save();
                            echo "</p>";
                        }
                    });
                });
            });

            return ''; //redirect('admin/document/narachka')->withSuccess('Нарачките се успешно едитирани');
        } else {
            return redirect('admin/document/narachka')->withSuccess('Проблем со конфигурацијата за импорт');
        }
    }


    public function oldimportExcel(Request $req)
    {
        // Get import name and excel file
        $import = $req->get('import_name');
        $file   = $req->file('excel_file');
        // get from config maping columns
        $config_data = config( 'clients.' . config( 'app.client') . '.order.import_columns');
        if (isset($config_data[$import])) {
            Excel::load($file, function ($reader) use ($config_data, $import) {

                if (!empty($config_data[$import]['offset'])) {
                    $results = $reader->skip($config_data[$import]['offset']);
                } else
                    $results = $reader->get();

                $results->each(function ($sheet) use ($config_data, $import) {
                    $sheet->each(function ($value) use ($config_data, $import) {
                        $document_number    = $value[$config_data[$import]['document_number']];

                        /*
                    if($import != 'Србија') {
                        $explode            = explode(' -', $document_number);
                        if(isset($explode[1]))
                            $document_number    = $explode[0];
                    }
*/
                        // status
                        if (isset($value[$config_data[$import]['status']['name']])) {
                            $excel_status       = $value[$config_data[$import]['status']['name']];
                            $excel_status       = strip_tags($excel_status, '\p');
                            if (isset($config_data[$import]['status']['mapping'][$excel_status]))
                                $our_status         = $config_data[$import]['status']['mapping'][$excel_status];
                            else
                                $our_status         = null;
                        } else {
                            $our_status         = null;
                        }
                        // tracking 
                        if (isset($value[$config_data[$import]['tracking_code']]))
                            $tracking           = (int) $value[$config_data[$import]['tracking_code']];
                        else
                            $tracking = null;

                        // FIND OUR DOC AND UPDATE IT 
                        $our_doc            = Document::where('document_number', $document_number)->where('type', 'narachka')->first();

                        if ($our_doc) {
                            echo "<p>$document_number";
                            if (!empty($our_status)) {
                                echo " | Статус: $our_status";
                                $our_doc->status                = $our_status;

                                if (!empty($our_doc->status_log)) {
                                    $status_log = (array) json_decode($our_doc->status_log);
                                    $status_log[] = ['name' => Auth::user()->first_name . ' ' . Auth::user()->last_name, 'status' => $our_status, 'date' => date('Y-m-d H:i:s')];
                                    $our_doc->status_log = json_encode($status_log);
                                } else {
                                    $status_log         = [];
                                    $status_log[]       = ['name' => Auth::user()->first_name . ' ' . Auth::user()->last_name, 'status' => $our_status, 'date' => date('Y-m-d H:i:s')];
                                    $our_doc->status_log    = json_encode($status_log);
                                }

                                if (isset($config_data[$import]['paid_status']['mapping'][$excel_status])) {
                                    if ($config_data[$import]['status']['mapping'][$excel_status] == 'Dostavena' && empty($our_doc->naracka_ispratena_na)) {
                                        $our_doc->naracka_ispratena_na  = date('Y-m-d H:i:s');
                                    }
                                    if ($config_data[$import]['paid_status']['mapping'][$excel_status] == 'platena') {
                                        $our_doc->paid  = 'platena';
                                        $our_doc->naracka_platena_na  = date('Y-m-d H:i:s');
                                        echo " | platena";
                                    }
                                }
                            }
                            if (!empty($tracking)) {
                                $our_doc->tracking_code     = (int) $tracking;
                                echo " | Tracking code: $tracking";
                            }
                            $our_doc->save();
                            echo "</p>";
                        }
                    });
                });
            });

            return ''; //redirect('admin/document/narachka')->withSuccess('Нарачките се успешно едитирани');
        } else {
            return redirect('admin/document/narachka')->withSuccess('Проблем со конфигурацијата за импорт');
        }
    }

    public function splitDocumentView($document_id)
    {
        // Document data
        $document = 'narachka';
        $data['document_type'] = $document;
        $data['document_type_show'] = $this->transliterate(null, $document);
        $data['document_id'] = $document_id;
        $data['document_id_ajax'] = $document_id;
        $data['document_data'] = Document::where('id', $document_id)->first();
        // Company data
        if ($document == 'priemnica') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
            $company = Suppliers::where('id', $data['document_data']->supplier_id)->first();
            $data['companies'] = Suppliers::all();
        } elseif ($document == 'izlez') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
            $data['hide_docinfo'] = 1;
        } elseif ($document == 'vlez') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
            $data['hide_docinfo'] = 1;
            $data['document_id_ajax'] = $data['document_data']->warehouse_docid;
        } elseif ($document == 'narachka') {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генерирана');
            $data['companies'] = User::all();
            $company = User::where('id', $data['document_data']->user_id)->first();
        } else {
            $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генерирана');
            $company = User::where('id', $data['document_data']->user_id)->first();
            $data['companies'] = User::all();
        }

        $data['warehouses'] = Warehouse::all();
        $data['company'] = !empty($company) ? $company : new User();
        $data['city'] = City::all();
        $data['country'] = Country::all();
        if (empty($data['company']->country_id)) {
            $data['company']->country_id = 1;
        }
        if (empty($data['company']->country_id_shipping)) {
            $data['company']->country_id_shipping = 1;
        }

        if ($document == 'ispratnica') {
            $products = WarehouseProduct::where('warehouse_id', Auth::user()->warehouse_id)
                ->join('products', 'product_warehouse.product_id', '=', 'products.id')
                ->select('products.id', 'products.title')
                ->groupBy('product_warehouse.product_id')
                ->get();

            if (!count($products)) {

                return redirect('admin/document/priemnica')->withError("Сеуште немате внесено артикли на залиха");
            }

            $date = date('Y-m-d H:i:s');
            foreach ($products as $prod) {
                $productid_temp = $prod->id;
                $prod->discount = Discount::select('*')->whereRaw(" product_id = $productid_temp  and '$date' between start and end")->count();
                $data['products'][] = $prod;
            }
        } else
            $data['products'] = Product::all();

        $data['document_status_show'] = $this->transliterate(null, $data['document_data']['status']);
        return View::make('admin.documents.split', $data);
    }

    public function deleteFiskalna($id)
    {
        if (!Auth::user()->hasRole('admin'))
            return redirect('/');

        $dr = DocumentsRelated::where('fiskalna_id', $id)->first();
        if (!empty($dr) && !empty($fiskalna)) {
            if (!empty($dr->ispratnica_id)) {
                Document::where('id', $dr->ispratnica_id)->update(['status' => 'stornirana']);
                $doc = Document::where('id', $dr->ispratnica_id)->first();
                $this->updateProductsInWarehouse($doc, $doc->warehouse_id);
                $this->updateProductsTotal($doc, null, $doc->warehouse_id);
            }

            if (!empty($dr->povratnica_id)) {
                Document::where('id', $dr->povratnica_id)->update(['status' => 'stornirana']);
                $doc = Document::where('id', $dr->povratnica_id)->first();
                $this->updateProductsInWarehouse($doc, $doc->warehouse_id);
                $this->updateProductsTotal($doc, null, $doc->warehouse_id);
            }
        }
        DocumentsRelated::where('fiskalna_id', $id)->delete();
        DocumentsFiskalnaItems::where('document_id', $id)->delete();
        DocumentsFiskalna::where('id', $id)->delete();

        return ['success' => 1];
    }

    private function updateProductsInWarehouse($document, $my_warehouse = 1)
    {
        if ($document->type == 'vlez') {
            $doc_items = DocumentItems::where('document_id', $document->id)->get();
            WarehouseProduct::where('document_id', $document->id)->delete();
            foreach ($doc_items as $key => $di) {
                $wp = new WarehouseProduct();
                $wp->product_id = $di->product_id;
                $wp->warehouse_id = $my_warehouse;
                $wp->quantity = $di->quantity;
                $wp->document_id = $document->id;
                $wp->document_type = $document->type;
                $wp->variation_id = $di->variation_id;
                $wp->save();
            }
        }
    }

    private function updateProductsTotal($document_id, $wp = null, $my_warehouse = null, $skip_variation = null)
    {
        if (empty($wp)) {
            $wp = WarehouseProduct::where('document_id', $document_id)->get();
        }

        foreach ($wp as $key => $value) {
            $product_id = $value['product_id'];
            if (!empty($value['variation_id'])) {

                $product_in = WarehouseProduct::where('product_id', $product_id)
                    ->where('variation_id', $value['variation_id'])
                    ->where('warehouse_id', $my_warehouse)
                    ->where(function ($query) {
                        $query->where('document_type', 'vlez')
                            ->orWhere('document_type', 'povratnica')
                            ->orWhere('document_type', 'priemnica');
                    })->sum('quantity');

                $product_out = WarehouseProduct::where('product_id', $product_id)
                    ->where('variation_id', $value['variation_id'])
                    ->where('warehouse_id', $my_warehouse)
                    ->where(function ($query) {
                        $query->where('document_type', 'ispratnica')
                            ->orWhere('document_type', 'izlez');
                    })->sum('quantity');

                $product_in = (int) $product_in;
                $product_out = (int) $product_out;
                $total = $product_in - $product_out;

                if (empty($my_warehouse))
                    $my_warehouse = Auth::user()->warehouse_id;
                if (empty($skip_variation)) {
                    $product = VariationQuantity::where('product_id', $product_id)->where('variation_id', $value['variation_id'])->where('warehouse_id', $my_warehouse)->first();


                    if (empty($product)) {
                        $product = new VariationQuantity();
                        $product->variation_id = $value['variation_id'];
                        $product->product_id = $product_id;
                    }
                    $product->warehouse_id = $my_warehouse;
                    $product->quantity = $total;
                    $product->save();
                }
            }


            $product_in = WarehouseProduct::where('product_id', $product_id)
                ->where(function ($query) {
                    $query->where('document_type', 'priemnica')
                        ->orWhere('document_type', 'vlez')
                        ->orWhere('document_type', 'povratnica');
                })->sum('quantity');

            $product_out = WarehouseProduct::where('product_id', $product_id)
                ->where(function ($query) {
                    $query->orwhere('document_type', 'ispratnica')
                        ->orWhere('document_type', 'izlez');
                })->sum('quantity');

            $product_in = (int) $product_in;
            $product_out = (int) $product_out;
            $total = $product_in - $product_out;

            $product = Product::where('id', $product_id)->first();
            $product->total_stock = $total;
            $product->save();
        }
    }

    /**
     * @param null $textcyr
     * @param null $textlat
     * @return mixed|null
     */
    private function transliterate($textcyr = null, $textlat = null)
    {
        $cyr = array(
            'ж', 'ч', 'щ', 'ш', 'ю', 'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'j', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж', 'Ч', 'Щ', 'Ш', 'Ю', 'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'J', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я'
        );
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
            'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q'
        );
        if ($textcyr) return str_replace($cyr, $lat, $textcyr);
        else if ($textlat) {
            $text = str_replace($lat, $cyr, $textlat);
            if ($text == 'фактура_онлине' || $text == 'Фактура_онлине')
                $text = 'Фактура Online';
            return $text;
        } else return null;
    }

    private function copyClientAddressToDocument($doc, $client)
    {
        $temp_array = [];
        if (!empty($doc) && !empty($client)) {

            $setings = Settings::first();
            if (empty($setings)) {
                $temp_array['company'] = [
                    'company_name' => '', 'company_address' => '', 'company_city' => '',
                    'company_country' => '', 'company_vat_number' => '', 'company_bank_account' => '', 'company_bank_name' => ''
                ];
            } else {
                $temp_array['company']['company_name']              = $setings['company_name'];
                $temp_array['company']['company_address']           = $setings['company_address'];
                $temp_array['company']['company_city']              = $setings['company_city'];
                $temp_array['company']['company_country']           = $setings['company_country'];
                $temp_array['company']['company_vat_number']        = $setings['company_vat_number'];
                $temp_array['company']['company_bank_account']      = $setings['company_bank_account'];
                $temp_array['company']['company_bank_name']         = $setings['company_bank_name'];
            }

            if (isset($client->company_name))
                $temp_array['userBilling']['company_name']              =  $client->company_name;

            if (isset($client->company))
                $temp_array['userBilling']['company_name']              =  $client->company;

            $temp_array['userBilling']['first_name']                =  $client->first_name;
            $temp_array['userBilling']['last_name']                 =  $client->last_name;
            $temp_array['userBilling']['phone']                     =  $client->phone;
            $temp_array['userBilling']['phone2']                    =  $client->phone2;
            $temp_array['userBilling']['email']                     =  $client->email;
            $temp_array['userBilling']['city_id']                   =  $client->city_id;
            $temp_array['userBilling']['country_id']                =  $client->country_id;
            $temp_array['userBilling']['city_other']                =  $client->city_other;
            $temp_array['userBilling']['zip_other']                 =  $client->zip_other;
            $temp_array['userBilling']['country_other']             =  $client->country_other;
            $temp_array['userBilling']['address']                   =  $client->address;
            if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
                $temp_array['userBilling']['loyalty_code']          =  $client->loyalty_code;
            }
            $temp_array['userShipping']['city_id_shipping']         =  $client->city_id_shipping;
            $temp_array['userShipping']['country_id_shipping']      =  $client->country_id_shipping;
            $temp_array['userShipping']['city_other_shipping']      =  $client->city_other_shipping;
            $temp_array['userShipping']['zip_other_shipping']       =  $client->zip_other_shipping;
            $temp_array['userShipping']['country_other_shipping']   =  $client->country_other_shipping;
            $temp_array['userShipping']['address_shiping']          =  $client->address_shiping;
            $doc->document_json = json_encode($temp_array);
            $doc->save();
        }
    }

    public function nabavniceniFix($document_id)
    {
        $check = Document::where('id', $document_id)->where('type', 'priemnica')->count();
        if ($check) {
            $di = DocumentItems::where('document_id', $document_id)
                ->join('products', 'document_items.product_id', '=', 'products.id')
                ->select('document_items.*', 'products.unit_code', 'products.price_nabavna')
                ->get();
            $data = ['documentItems' => $di];
            return View::make('admin.documents.nabavniceniFix', $data);
        } else {
            return redirect()->back();
        }
    }
    public function storeNabavniceniFix(Request $req)
    {
        $from_date  = $req->get('from_date');
        $to_date    = $req->get('to_date');
        if (empty($from_date) || empty($to_date)) {
            return redirect()->back();
        } else {
            $from_date  = date('Y-m-d 00:00:00', strtotime($from_date));
            $to_date    = date('Y-m-d 23:59:59', strtotime($to_date));
            $documents_array = Document::where('type', 'izlez')
                ->where('document_date', '>=', $from_date)
                ->where('document_date', '<', $to_date)
                ->where('status', 'generirana')
                ->pluck('id', 'document_number')
                ->toArray();
        }

        if ($req->has('items')) {
            $items = $req->get('items');
            foreach ($items as $product_id) {

                if ($req->has('nabavna_' . $product_id)) {
                    $temp_nabavna = $req->get('nabavna_' . $product_id);
                    if (!empty($temp_nabavna))
                        Product::where('id', $product_id)->update(['price_nabavna' => $temp_nabavna]);
                }

                if ($req->has('plt_' . $product_id)) {
                    $temp_nabavna = $req->get('plt_' . $product_id);
                    if (!empty($temp_nabavna)) {
                        $di = DocumentItems::where('product_id', $product_id)
                            ->whereIn('document_id', $documents_array)
                            ->select('document_id', 'price', 'vat', 'price_no_vat', 'sum_no_vat', 'sum_vat', 'item_name', 'quantity')
                            ->get();

                        foreach ($di as $d) {
                            $temp_izlez_num =  array_search($d->document_id, $documents_array);
                            $danok = \EasyShop\Helpers\ArticleHelper::getVATMultiplier($d->vat);

                            $cena_bez_danok = round($temp_nabavna / $danok);
                            $sum_bez_danok  = round($cena_bez_danok * $d->quantity);
                            $sum_so_danok   = round($temp_nabavna * $d->quantity);

                            $izlez_string = "<span style='font-weight:bold'>";
                            $izlez_string .= "<br/> Излез $temp_izlez_num продукт $d->item_name </span>";
                            $izlez_string .= "<br/>стара цена <span style='color:red'>($d->price)</span> нова цена <span style='color:blue'>($temp_nabavna)</span>";
                            $izlez_string .= "<br/>стара цена без данок <span style='color:red'>($d->price_no_vat)</span> нова цена без данок <span style='color:blue'>(" . $cena_bez_danok . ".00)</span>";
                            $izlez_string .= "<br/>стара sum без данок <span style='color:red'>($d->sum_no_vat)</span> нова sum без данок <span style='color:blue'>(" . $sum_bez_danok . ".00)</span>";
                            $izlez_string .= "<br/>стара sum со данок <span style='color:red'>($d->sum_vat)</span> нова sum со данок <span style='color:blue'>(" . $sum_so_danok . '.00)</span><br/>';

                            $d->price           = $temp_nabavna;
                            $d->price_no_vat    = $cena_bez_danok;
                            $d->sum_no_vat      = $sum_bez_danok;
                            $d->sum_vat         = $sum_so_danok;
                            $d->save();
                            echo $izlez_string;
                        }
                    }
                }
            }
            echo "<br/><br/><a href='/admin/document/priemnica'> Назад до листа на приемници </a>";
        } else
            redirect()->back();
    }

    public function najdiRazlikaRelatedDocuments()
    {
        $razlika_fiskalna       = [];
        // FIND ALL FISKALNI FIRST
        $all_documents_count    = DocumentsRelated::whereNotNull('fiskalna_id')->count();
        $razlika_fiskalna       = $this->diffRelatedDocs($all_documents_count, 'fiskalna_id');
        // FIND ALL FAKTURI
        $all_documents_count    = DocumentsRelated::whereNotNull('faktura_id')->count();
        $razlika_faktura        = $this->diffRelatedDocs($all_documents_count, 'faktura_id');

        return View::make('admin.documents.findDiff', compact('razlika_fiskalna', 'razlika_faktura'));
    }

    public function fixProductQtyView(Request $req)
    {

        $limit = 20;
        $data['limit'] = $limit;
        if ($req->has('soglasnost') || $req->has('session_id')) {

            if ($req->has('soglasnost')) {
                \DB::table('product_warehouse')->truncate();
                \DB::table('variation_quantity')->truncate();
                \DB::table('products')->update(['total_stock' => 0]);
            }


            if ($req->has('page'))
                $page = $req->get('page');


            $data['soglasnost'] = true;
            $data['session_id'] = $req->get('session_id');
            $data['all']        = $req->get('all');
            $offset = $page * $limit;

            if ($data['all'] - $offset > 0 && !$req->has('soglasnost')) {
                $doc_ids = Document::whereIn('type', ['priemnica', 'ispratnica', 'povratnica', 'vlez', 'izlez', 'povratnica_dobavuvac', 'rezervacija'])
                    ->where('status', 'generirana')
                    ->limit($limit)
                    ->offset($offset)
                    ->pluck('id');

                foreach ($doc_ids as $doc_id) {
                    $doc_items = DocumentItems::where('document_id', $doc_id)
                        ->join('documents', 'documents.id', '=', 'document_items.document_id')
                        ->select('documents.id as document_id', 'documents.type as document_type', 'product_id', 'warehouse_id', 'quantity', 'variation_id', 'document_items.created_at')
                        ->get()
                        ->toArray();

                    if (empty($doc_items)) { // AKO E VLEZ VO OVOJ IF ZATOA STO ZA VLEZ NEMA DOC ITEMS => SE ZEMMAT OD IZLEZ
                        $rd = DocumentsRelated::where('vlez_id', $doc_id)->first();
                        if ($rd) {
                            $doc_items = DocumentItems::where('document_id', $rd->izlez_id)
                                ->join('documents', 'documents.id', '=', 'document_items.document_id')
                                ->select('documents.id as document_id', 'documents.type as document_type', 'product_id', 'warehouse_id', 'quantity', 'variation_id', 'document_items.created_at')
                                ->get()
                                ->toArray();
                            $i = 0;
                            for ($i = 0; $i < count($doc_items); $i++) {
                                $doc_items[$i]['document_type'] = 'vlez';
                                $doc_items[$i]['document_id']   = $doc_id;
                            }
                        }
                    }

                    if (!empty($doc_items)) {
                        WarehouseProduct::insert($doc_items);
                        $this->updateProductsTotal($doc_id, null, $doc_items[0]['warehouse_id']);
                    }
                }
                $data['page']       = $page + 1;
            } else {
                if (!$req->has('soglasnost')) {
                    $data['zavrseno']   = true;
                }
                $data['page']       = $page;
            }
        } else {

            $data['zavrseno']   = false;
            $data['soglasnost'] = false;
            $data['session_id'] = md5(time());
            $data['page']       = 0;
            $data['all']        = Document::whereIn('type', ['priemnica', 'ispratnica', 'povratnica', 'vlez', 'izlez', 'povratnica_dobavuvac', 'rezervacija'])
                ->where('status', 'generirana')
                ->count();
        }

        return View::make('admin.documents.recalculateProducts', $data);
    }

    private function diffRelatedDocs($all_documents_count, $document_key)
    {
        $limit = 5;
        $offset = 0;
        $razlika_fiskalna = [];
        $razlika_faktura = [];
        while ($all_documents_count - $offset > 0) {
            $documents = DocumentsRelated::whereNotNull("$document_key")->limit($limit)->offset($offset)->get();
            $offset = $offset + $limit;

            foreach ($documents as $document) {
                if ($document_key == 'fiskalna_id') {

                    $select = ['item_name', 'product_id', 'quantity', 'price', 'vat', 'price_no_vat', 'sum_no_vat', 'sum_vat', 'variation_id', 'original_price', 'original_price_no_vat', 'original_sum_vat', 'original_sum_no_vat', 'discount_type', 'discount_type_value', 'discount_value'];
                    $fiskalna_items     = DocumentsFiskalnaItems::where('document_id', $document->fiskalna_id)->select($select)->get()->toArray();
                    $ispratnica_items   = DocumentItems::where('document_id', $document->ispratnica_id)->select($select)->get()->toArray();
                    $naracka_items      = DocumentItems::where('document_id', $document->naracka_id)->select($select)->get()->toArray();
                    // Compare all values by a json_encode
                    $diff1 = array_diff(array_map('json_encode', $fiskalna_items), array_map('json_encode', $ispratnica_items));
                    // Json decode the result
                    $diff1 = array_map('json_decode', $diff1);
                    // Compare all values by a json_encode
                    $diff2 = array_diff(array_map('json_encode', $ispratnica_items), array_map('json_encode', $naracka_items));
                    // Json decode the result
                    $diff2 = array_map('json_decode', $diff2);

                    if (count($diff1) || count($diff2)) {
                        //$this->info("Za fiskalna_id - $document->fiskalna_id pronajdena e razlika vo ispratnica ($document->ispratnica_id) / naracka ($document->naracka_id) ");
                        $fiskalna_doc_number     = DocumentsFiskalna::where('id', $document->fiskalna_id)->select('document_number')->first();
                        $ispratnica_doc_number  = Document::where('id', $document->ispratnica_id)->select('document_number')->first();
                        $naracka_doc_number     = Document::where('id', $document->naracka_id)->select('document_number')->first();
                        //$razlika_fiskalna[] = $document->fiskalna_id; 
                        $temp = [];
                        $temp["fiskalna"]  = ['id' => $document->fiskalna_id, 'doc_number' =>   $fiskalna_doc_number->document_number, 'doc_items' => $fiskalna_items];
                        if (!empty($ispratnica_doc_number))
                            $temp["ispratnica"] = ['id' => $document->ispratnica_id, 'doc_number' =>   $ispratnica_doc_number->document_number, 'doc_items' => $ispratnica_items];
                        if (!empty($naracka_doc_number))
                            $temp["naracka"]    = ['id' => $document->naracka_id, 'doc_number' =>   $naracka_doc_number->document_number, 'doc_items' => $naracka_items];

                        $razlika_fiskalna[] = $temp;
                    }
                }

                if ($document_key == 'faktura_id') {

                    $select = ['product_id', 'item_name', 'quantity', 'price', 'vat', 'price_no_vat', 'sum_no_vat', 'sum_vat', 'variation_id', 'original_price', 'original_price_no_vat', 'original_sum_vat', 'original_sum_no_vat', 'discount_type', 'discount_type_value', 'discount_value'];
                    $faktura_items      = DocumentItems::where('document_id', $document->faktura_id)->select($select)->get()->toArray();
                    $ispratnica_items   = DocumentItems::where('document_id', $document->ispratnica_id)->select($select)->get()->toArray();
                    $naracka_items      = DocumentItems::where('document_id', $document->naracka_id)->select($select)->get()->toArray();
                    // Compare all values by a json_encode
                    $diff1 = array_diff(array_map('json_encode', $faktura_items), array_map('json_encode', $ispratnica_items));
                    // Json decode the result
                    $diff1 = array_map('json_decode', $diff1);
                    // Compare all values by a json_encode
                    $diff2 = array_diff(array_map('json_encode', $ispratnica_items), array_map('json_encode', $naracka_items));
                    // Json decode the result
                    $diff2 = array_map('json_decode', $diff2);
                    if (count($diff1) || count($diff2)) {
                        $faktura_doc_number     = Document::where('id', $document->faktura_id)->select('document_number')->first();
                        $ispratnica_doc_number  = Document::where('id', $document->ispratnica_id)->select('document_number')->first();
                        $naracka_doc_number     = Document::where('id', $document->naracka_id)->select('document_number')->first();
                        $razlika_faktura[]      =
                            [
                                "faktura"   => ['id' => $document->faktura_id, 'doc_number' =>   $faktura_doc_number->document_number, 'doc_items' => $faktura_items],
                                "ispratnica" => ['id' => $document->ispratnica_id, 'doc_number' =>   $ispratnica_doc_number->document_number, 'doc_items' => $ispratnica_items],
                                "naracka"   => ['id' => $document->naracka_id, 'doc_number' =>   $naracka_doc_number->document_number, 'doc_items' => $naracka_items],
                            ];
                    }
                }
            }
        }
        if ($document_key == 'fiskalna_id')
            return ($razlika_fiskalna);
        if ($document_key == 'faktura_id')
            return ($razlika_faktura);
    }

    public function fixRazlikaRelatedDocuments(Request $req)
    {
        $doc_type   = $req->get('doc_type');
        $doc_id     = $req->get('doc_id');
        $doc_items  = [];

        if ($doc_type == 'fiskalna') {
            $document = DocumentsRelated::where("fiskalna_id", $doc_id)->first();
            $ispratnica_doc_number  = Document::where('id', $document->ispratnica_id)->select('document_number')->first();
            $naracka_doc_number     = Document::where('id', $document->naracka_id)->select('document_number')->first();

            $doc_items     = DocumentsFiskalnaItems::where('document_id', $document->fiskalna_id)->get();
            DocumentItems::where('document_id', $document->ispratnica_id)->delete();
            DocumentItems::where('document_id', $document->naracka_id)->delete();
        }

        if ($doc_type == 'faktura') {
            $document = DocumentsRelated::where("faktura_id", $doc_id)->first();
            $ispratnica_doc_number  = Document::where('id', $document->ispratnica_id)->first();
            $naracka_doc_number     = Document::where('id', $document->naracka_id)->first();

            $doc_items     = DocumentItems::where('document_id', $document->faktura_id)->get();
            DocumentItems::where('document_id', $document->ispratnica_id)->delete();
            DocumentItems::where('document_id', $document->naracka_id)->delete();
        }

        foreach ($doc_items as $items) {
            $ispratnica_items   = new DocumentItems();
            $naracka_items      = new DocumentItems();

            $ispratnica_items->document_id              = $document->ispratnica_id;
            $ispratnica_items->document_number          = $ispratnica_doc_number->document_number;
            $naracka_items->document_number             = $naracka_doc_number->document_number;
            $naracka_items->document_id                 = $document->naracka_id;

            $ispratnica_items->product_id               = $naracka_items->product_id             = $items->product_id;
            $ispratnica_items->item_name                = $naracka_items->item_name              = $items->item_name;
            $ispratnica_items->quantity                 = $naracka_items->quantity               = $items->quantity;
            $ispratnica_items->price                    = $naracka_items->price                  = $items->price;
            $ispratnica_items->vat                      = $naracka_items->vat                    = $items->vat;
            $ispratnica_items->price_no_vat             = $naracka_items->price_no_vat           = $items->price_no_vat;
            $ispratnica_items->sum_no_vat               = $naracka_items->sum_no_vat             = $items->sum_no_vat;
            $ispratnica_items->sum_vat                  = $naracka_items->sum_vat                = $items->sum_vat;
            $ispratnica_items->variation_id             = $naracka_items->variation_id           = $items->variation_id;
            $ispratnica_items->original_price           = $naracka_items->original_price         = $items->original_price;
            $ispratnica_items->original_price_no_vat    = $naracka_items->original_price_no_vat  = $items->original_price_no_vat;
            $ispratnica_items->original_sum_vat         = $naracka_items->original_sum_vat       = $items->original_sum_vat;
            $ispratnica_items->original_sum_no_vat      = $naracka_items->original_sum_no_vat    = $items->original_sum_no_vat;
            $ispratnica_items->discount_type            = $naracka_items->discount_type          = $items->discount_type;
            $ispratnica_items->discount_type_value      = $naracka_items->discount_type_value    = $items->discount_type_value;
            $ispratnica_items->discount_value           = $naracka_items->discount_value         = $items->discount_value;
            $ispratnica_items->unit_code                = $naracka_items->unit_code              = $items->unit_code;
            $ispratnica_items->proizvod_usluga          = $naracka_items->proizvod_usluga        = $items->proizvod_usluga;
            $ispratnica_items->stranski_domasen         = $naracka_items->stranski_domasen       = $items->stranski_domasen;

            $ispratnica_items->save();
            $naracka_items->save();

            $this->updateProductsInWarehouse($ispratnica_doc_number, $ispratnica_doc_number->warehouse_id);
            $this->updateProductsTotal($ispratnica_doc_number, null, $ispratnica_doc_number->warehouse_id);
        }

        return ['success' => 1, 'doc_type' => $doc_type, 'doc_id' => $doc_id];
    }


    /**
     * Show documents table
     *
     * @param $document
     * @return mixed
     */
    public function indexCallCenter($document)
    {

        $data['my_warehouse'] = Auth::user()->warehouse_id;
        $data['document_type'] = $document;
        $data['document_type_show'] = $this->transliterate(null, $document);
        $data['documentWarehouse_select'] = Warehouse::all();
        $data['documentProducts_select'] = Product::all();
        $data['documentStatus_select'] = array('podgotovka' => 'Подготовка', 'generirana' => 'Генериранa');
        $data['documentOrderType_select'] = array('inbound' => 'InBan', 'outbound' => 'OutBan', 'web' => 'Web', 'Социјални мрежи' => 'Социјални мрежи', 'Продавници' => 'Продавници');
        $data['documentClient_select'] = User::all();
        $data['documentCreatedBy_select'] = Document::whereNotNull("documents.created_by")->join('users', 'documents.created_by', '=', 'users.id')->join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->select('users.*')->distinct()->get();
        return View::make('admin.documents.showTableCallCenter', $data);
    }
}
