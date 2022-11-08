<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;
use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use EasyShop\Models\Settings;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Repositories\ManufacturerRepository\ManufacturerRepositoryInterface;
use EasyShop\Models\Product;

class SearchController extends FrontController
{
    /**
     * @var
     */
    protected $categoryService;

    /**
     * @var
     */
    protected $articleRepository;

    /**
     * @var
     */
    protected $manufacturerRepository;

    /**
     * @var
     */
    protected $user;

    /**
     * @param CategoryService $categoryService
     * @param ArticleRepositoryInterface $articleRepository
     * @param ArticleRepositoryInterface $manufacturerRepository
     */
    public function __construct(
        CategoryService $categoryService,
        ArticleRepositoryInterface $articleRepository,
        ManufacturerRepositoryInterface $manufacturerRepository
    ) {
        parent::__construct($categoryService);
        $this->manufacturerRepository = $manufacturerRepository;
    }

    public function index(Request $request)
    {
        $manufacturers = $this->manufacturerRepository->getAll('name');
        $data['order_by'] = 'default';
        $query = $request->input('search') === '' ? null : $request->input('search');

        //        $keyword = $query;
        // If the search query is empty return empty page


        switch (config( 'app.client')) {
            case \EasyShop\Models\Settings::CLIENT_MATICA:
                $data['results_limit'] = 96;
                break;
            default:
                $data['results_limit'] = 60;
                break;
        }
        $locale = $this->locale;

        $lang = $this->lang;

        $show_results = $data['results_limit'];
        // if (is_null($query)) {
        //     $data['products'] = [];
        //     $data['search'] = '';
        //     return view('clients.' . config( 'app.theme') . '.search_results', $data);
        // }


        if ($request->has('results_limit')) {
            $show_results = $request->get('results_limit');
            if ($show_results > 100) {
                $show_results = 100;
            }
            $data['results_limit'] = $show_results;
        }

        $search_manufacturer = null;
        if ($request->has('search_manufacturer')) {
            $search_manufacturer = $request->input('search_manufacturer');
        }

        $products = Product::where('active', 1)->where('show_on_web', 1);


        if ($search_manufacturer) {
            $products = $products->where('manufacturer_id', $search_manufacturer);
        }

        switch (config( 'app.client')) {
            case 'betajewels':
                $query_cyrilic = self::latin_to_cyrillic($query);
                $query_latin = self::cyrillic_to_latin($query);
                $products = $products->where(function ($row) use ($query_cyrilic, $query_latin) {
                    $row->where('title', 'like', '%' . addslashes($query_cyrilic) . '%')
                        ->orWhere('title', 'like', '%' . addslashes($query_latin) . '%');
                });
                break;
            case 'herline':
                $query_cyrilic = self::latin_to_cyrillic($query);
                $query_latin = self::cyrillic_to_latin($query);
                $products = $products->where(function ($row) use ($query_cyrilic, $query_latin) {
                    $row->where('title', 'like', '%' . addslashes($query_cyrilic) . '%')
                        ->orWhere('title', 'like', '%' . addslashes($query_latin) . '%');
                });
                break;
            default:
                $keywords = explode(' ', $query);
                $firstWord = array_shift($keywords);

                $products = $products->where('title', 'like', '%' . addslashes($firstWord) . '%');

                $products = $products->where(function ($query) use ($firstWord, $keywords) {
                    $query->where('title', 'like', '%' . addslashes($firstWord) . '%');

                    foreach ($keywords as $word) {
                        $query->orWhere('title', 'like', '%' . addslashes($word) . '%');
                    }
                });
                break;
        }

        // Needed for clients that use same database - differentiate products by category
        // e.g. Top produkti
        if (is_array($this->categoriesLastChildIds)) {
            $products->join('product_category', 'product_category.product_id', '=', 'products.id')
                ->whereIn('product_category.category_id', $this->categoriesLastChildIds);
        }

        if ($lang == "lang1") {

            $products->select('products.*');
        } else {
            $products->select(

                'products.*',

                'products.title_' . $lang . ' as title',

                'products.url_' . $lang . ' as url',

                'products.short_description_' . $lang . ' as short_description'
            );
        }


        if ($request->has('sort_by')) {
            $sort_by_array = ['title_asc', 'title_desc', 'price_asc', 'price_desc']; // zemi od config vo idnina
            if (in_array($request->get('sort_by'), $sort_by_array)) {
                $data['order_by'] = $request->get('sort_by');
                $temp = explode('_', $request->get('sort_by'));
                if ($temp[0] == 'price') {
                    if (\Auth::check()) {
                        $temp[0] = \Auth::user()->cenovna_grupa;
                    } else {
                        $temp[0] = 'price_retail_1';
                    }
                }

                $products->orderBy($temp[0], $temp[1]);
            } else {
                $products->orderBy('products.title', 'asc');
                $data['order_by'] = 'default';
            }
        } else {
            $products->orderBy('products.title', 'asc');
        }


        $data['products'] = $products->paginate($show_results);
        $i = 0;
        foreach ($data['products'] as $key => $value) {
            if (\Auth::check()) {
                $cg = \Auth::user()->cenovna_grupa;
                $data['products'][$i]->price = $data['products'][$i]->$cg;
            } else {
                $data['products'][$i]->price = $data['products'][$i]->price_retail_1;
            }
            $i++;
        }
        $data['search'] = $query;
        $data['pageName'] = 'page-search';
        $data['manufacturers'] = $manufacturers;
        $data['search_manufacturer'] = $search_manufacturer;

        return view('clients.' . config( 'app.theme') . '.search_results', $data);
    }

    public function latin_to_cyrillic($latinString)
    {
        $cyr_special = [
            'ѓ', 'Ѓ', 'њ', 'Њ', 'џ', 'Џ', 'љ', 'Љ', 'ч', 'Ч', 'ќ', 'Ќ', 'ш', 'Ш', 'ж', 'Ж'
        ];
        $lat_special = [
            'gj', 'GJ', 'nj', 'NJ', 'dz', 'DZ', 'lj', 'LJ', 'ch', 'CH', 'kj', 'KJ', 'sh', 'SH', 'zh', 'ZH'
        ];

        $replaced_special = str_replace($lat_special, $cyr_special, $latinString);
        $cyr = [
            'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'j', 'к', 'л', 'м', 'н', 'о', 'п',
            'р', 'с', 'т', 'у', 'ф', 'х', 'ц',
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'J', 'К', 'Л', 'М', 'Н', 'О', 'П',
            'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц'
        ];
        $lat = [
            'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'c',
            'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P',
            'R', 'S', 'T', 'U', 'F', 'H', 'c'
        ];
        return str_replace($lat, $cyr, $replaced_special);
    }

    public function cyrillic_to_latin($cyrillicString)
    {
        $cyr_special = [
            'ѓ', 'Ѓ', 'њ', 'Њ', 'џ', 'Џ', 'љ', 'Љ', 'ч', 'Ч', 'ќ', 'Ќ', 'ш', 'Ш', 'ж', 'Ж'
        ];
        $lat_special = [
            'gj', 'GJ', 'nj', 'NJ', 'dz', 'DZ', 'lj', 'LJ', 'ch', 'CH', 'kj', 'KJ', 'sh', 'SH', 'zh', 'ZH'
        ];

        $replaced_special = str_replace($cyr_special, $lat_special, $cyrillicString);

        $cyr = [
            'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'j', 'к', 'л', 'м', 'н', 'о', 'п',
            'р', 'с', 'т', 'у', 'ф', 'х', 'ц',
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'J', 'К', 'Л', 'М', 'Н', 'О', 'П',
            'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц'
        ];
        $lat = [
            'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
            'r', 's', 't', 'u', 'f', 'h', 'c',
            'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'Y', 'K', 'L', 'M', 'N', 'O', 'P',
            'R', 'S', 'T', 'U', 'F', 'H', 'c'
        ];
        return str_replace($cyr, $lat, $replaced_special);
    }
}
