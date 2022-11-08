<?php

namespace EasyShop\Services;

use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Models\Category;

class CategoryService
{

    /**
     * @var $categoryRepository
     */
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Create nested list of categories
     *
     * @param $onlyActive - if the list should be created from only active categories
     * @param $onlyMainMenu
     * @return array
     */
    public function getNestedCategoryList($onlyActive = TRUE, $onlyMainMenu = TRUE, $lang = "lang1")
    {

        // TODO: Add to cache
        if ($onlyActive) {
            $categories = $this->categoryRepository->getAllActive($orderBy = 'order', $order = 'asc', $onlyMainMenu, $lang);
        } else {
            $categories = $this->categoryRepository->getAll($orderBy = 'order',  $order = 'asc', $onlyMainMenu, $lang);
        }

        return Category::formatTree($categories, NULL);
    }



    /**
     * Get category list in json format
     *
     * @param $onlyActive - if the list should be created from only active categories
     * @param $onlyMainMenu
     * @return array
     */
    public function getJsonCategoryList($onlyMainMenu = true)
    {
        $categories = $this->categoryRepository->getCategoriesForJson($orderBy = 'order', $order = 'asc', $onlyMainMenu);

        return Category::formatTree($categories, NULL);
    }


    /**
     * Get the ids of the categories child leafs
     *
     * @param $categories
     * @return array
     */
    public function getLastChildIds($categories)
    {
        $result = [];

        foreach ($categories as $category) {
            if (isset($category['children'])) {
                $result = array_merge($result, $this->getLastChildIds($category['children']));
            } else {
                $result = array_merge($result, [$category['id']]);
            }
        }

        return $result;
    }


    /**
     * Nest categories (parent => child)
     *
     * @return mixed
     */
    public function loadCategoryTreeData()
    {
        $tree = $this->categoryRepository->getAll('order');
        return Category::formatTree($tree, NULL);
    }

    /**
     * Format html with categories list for Categories menu
     *
     * @param $categoryList
     * @return string
     */
    public function nestedListForCategories($categoryList)
    {
        $html = '';
        foreach ($categoryList as $v) {

            if (isset($v['children'])) {
                $temp = '<li data-id="' . $v["id"] . '" class="dd-item dd3-item dd-nodrag">
                       <div class="dd-handle dd3-handle bg-green-meadow"> </div><div class="dd3-content">' . $v["title"] . '
                       <a dd-item-delete class="dd-item-delete" style="float:right;display:none" href="' . route('admin.category.delete', [$v["id"]]) . '"><i class="fa fa-remove "></i><span class="text-muted"></span></a>
                       <a style="float:right" href="' . route('admin.category.edit', [$v["id"]]) . '"><i class="fa fa-edit"></i><span class="text-muted"></span></a>
                       </div>';
                $temp .= '<ol class="dd-list">';
                $temp .=  $this->nestedListForCategories($v['children']);
                $temp .= '</ol></li>';
                $html .= $temp;
            } else {

                $temp = '<li data-id="' . $v["id"] . '" class="dd-item dd3-item dd-nodrag">
                      <div class="dd-handle dd3-handle bg-green-meadow"> </div>
                      <div class="dd3-content">' . $v["title"] . '
                      <a dd-item-delete class="dd-item-delete" style="float:right;" href="' . route('admin.category.delete', [$v["id"]]) . '"><i class="fa fa-remove "></i><span class="text-muted"></span></a>
                      <a style="float:right" href="' . route('admin.category.edit', [$v["id"]]) . '"><i class="fa fa-edit"></i><span class="text-muted"></span></a>
                      </div></li>';
                $html .= $temp;
            }
        }

        return $html;
    }

    /**
     * Format html with categories list for Attributes menu
     *
     * @param $categoryList
     * @return string
     */
    public function nestedListForAttributes($categoryList)
    {
        $html = '';

        foreach ($categoryList as $v) {

            if (isset($v['children'])) {
                if ($v['type'] == 'list_product')
                    $list_product = 'list_product';
                else
                    $list_product = '';

                $temp = '<li class="dd-item">
                            <div class="dd-handle disabled ' . $list_product . '" data-id="' . $v['id'] . '">' . $v["title"] . '</div>';
                $temp .= '<ol class="dd-list">';
                $temp .=  $this->nestedListForAttributes($v['children']);
                $temp .= '</ol>';
                $temp .= '</li>';
                $html .= $temp;
            } else {

                if ($v['type'] == 'list_product')
                    $list_product = 'list_product';
                else
                    $list_product = '';

                $temp = '<li class="dd-item">
                            <div class="dd-handle ' . $list_product . '" data-id="' . $v['id'] . '">' . $v["title"] . '</div>
                         </li>';
                $html .= $temp;
            }
        }

        return $html;
    }


    /**
     * @param $array
     * @param $selected_ids
     * @param $start - where to start the nesting with dashes
     * @return string
     */
    public function htmlOptionsFromArrayForArticles($array, $selected_ids, $start = 0, $parentsDisabled = true)
    {
        $html = '';
        foreach ($array as $v) {


            $selected = "";

            if (in_array($v['id'], $selected_ids)) {
                $selected = "selected";
            }
            $disabled_option  = '';
            if ($v['type'] == 'list_category')
                $disabled_option = 'disabled';

            $temp = "<option {$selected} $disabled_option value='{$v['id']}'>" . str_repeat('-', $start) . " {$v['title']} </option>";

            if (isset($v['children'])) {
                $temp = "<option {$selected}  value='{$v['id']} '
                    " . ($parentsDisabled ? 'disabled="disabled"' : '') . "
                >" . str_repeat('-', $start) . " {$v['title']}  </option>";

                $html .= $temp;
                $startNew = $start + 1;

                $html .= $this->htmlOptionsFromArrayForArticles($v['children'], $selected_ids, $startNew, $parentsDisabled);
            } else {
                $html .= $temp;
            }
        }

        return $html;
    }

    /**
     * @param $array
     * @param $selected_ids
     * @return string
     */
    public function htmlOptionsFromArrayForPosts($array, $selected_ids, $type = null)
    {
        $html = '';
        foreach ($array as $v) {
            $selected = "";

            if ($v['type'] == $type) {

                if (in_array($v['id'], $selected_ids)) {
                    $selected = "selected";
                }

                $temp = "<option {$selected} value='{$v['id']}'>{$v['title']}</option>";
                if (isset($v['children'])) {
                    $temp = "<option {$selected}  value='{$v['id']}' disabled>{$v['title']}</option>";
                    $html .= $temp;
                    $html .= $this->htmlOptionsFromArrayForArticles($v['children'], $selected_ids);
                } else {
                    $html .= $temp;
                }
            }
        }

        return $html;
    }

    public function listCategoryCategories($array, $selected_ids = [], $i = 0)
    {

        $parent_i = $i;
        foreach ($array as $cat) {
            if ($cat['type'] == 'list_category') {
                $cat['title'] =  str_repeat('-', $i) . ' ' . $cat['title'];
                $selected_ids[] = $cat;
                if (isset($cat['children'])) {
                    foreach ($cat['children'] as $ch) {
                        if ($ch['type'] == 'list_category') {
                            $i = $i + 1;
                            $selected_ids = $this->listCategoryCategories([$ch], $selected_ids, $i);
                        }
                        $i = $parent_i;
                    }
                }
            }
            $i = $parent_i;
        }

        return $selected_ids;
    }


    /**
     * Get all filters for category list of products
     *
     * @param $inputs - Request inputs
     * @param $priceGroup - User's price group
     * @return \stdClass
     */
    public function getFilters($inputs, $priceGroup)
    {
        # Sort
        $sortList = ['created_at', 'order-ASC', 'purchases-DESC', 'visits-DESC', 'price-ASC', 'price-DESC', 'title-ASC', 'title-DESC'];
        $sort = 'created_at';

        if (isset($inputs['sort']) && in_array($inputs['sort'], $sortList)) {
            $sort = $inputs['sort'];
        } else {
            switch(config('app.client')) {
                case 'naturatherapyshop':
                case 'naturatherapyshop_alb':
                case 'naturatherapyshop_al':
                    $sort = 'order-ASC';
                    break;
                default:
                    $sort = 'created_at';
            }
        }
        $selectedSort = $sort;

        if ($sort == 'created_at') {
            switch (config( 'app.client')) {
                case 'naturatherapy':
                    $order = 'ASC';
                    break;
                default:
                    $order = 'DESC';
            }
        } else {
            list($sort, $order) = explode('-', $sort);

            // Get the price for right price group
            if ($sort === 'price') {
                $sort = $priceGroup;
            }
        }
        # Page
        $page = isset($inputs['page']) && is_numeric($inputs['page']) && $inputs['page'] >= 1
            ? $inputs['page'] : 1;

        # Price
        $currencyDivider = \Session::get('selectedCurrencyDivider');
        $currencyDivider = !is_null($currencyDivider) && $currencyDivider !== 0 ? $currencyDivider : 1;
        
        $priceFrom = isset($inputs['priceFrom']) && is_numeric($inputs['priceFrom']) && $inputs['priceFrom'] >= 0
            ? ((int)$inputs['priceFrom'] * $currencyDivider) : null;
        $priceTo =   isset($inputs['priceTo']) && is_numeric($inputs['priceTo']) && $inputs['priceTo'] >= 0
            ? ((int)$inputs['priceTo'] * $currencyDivider) : null;

        # Limit
        switch (config( 'app.client')) {
            case 'hotspot':
                $limit = isset($inputs['limit']) && in_array($inputs['limit'], [1000])
                    ? $inputs['limit'] : 1000;
                break;
            case 'matica':
                $limit = isset($inputs['limit']) && in_array($inputs['limit'], [24, 48, 72, 96])
                    ? $inputs['limit'] : 24;
                break;
            case 'expressbook':
                $limit = isset($inputs['limit']) && in_array($inputs['limit'], [12, 36, 99])
                    ? $inputs['limit'] : 99;
                break;
            default:
                $limit = isset($inputs['limit']) && in_array($inputs['limit'], [12, 36, 99])
                    ? $inputs['limit'] : 12;
        }

        # Filter Attributes
        $filterAttributes = [];
        $pairs = [];
        if (isset($inputs['attr'])) {
            $filterPairs = explode(',', $inputs['attr']);
            foreach ($filterPairs as $filterPair) {
                $pair = explode('_', $filterPair);
                if (count($pair) > 1) {
                    if (isset($filterAttributes[$pair[0]])) {
                        $filterAttributes[$pair[0]][] = $pair[1];
                    } else {
                        $filterAttributes[$pair[0]] = [$pair[1]];
                    }
                }
            }
        } else {
            $filterAttributes = null;
        }

        $filters = new \stdClass();
        $filters->page = $page;
        $filters->selectedSort = $selectedSort;
        $filters->sort = $sort;
        $filters->order = $order;
        $filters->priceFrom = $priceFrom;
        $filters->priceTo = $priceTo;
        $filters->limit = (int)$limit;
        $filters->attributes = $filterAttributes;

        return $filters;
    }
}
