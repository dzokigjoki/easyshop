<?php

namespace EasyShop\Http\ViewComposers;

use Illuminate\View\View;
use EasyShop\Services\CategoryService;

class DefaultComposer
{

    protected $categoryService;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
//        $this->categoryService = $categoryService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $categories = $this->categoryService->getNestedCategoryList($onlyActive = TRUE);
//
//        $view->with('allCategories', $categories);
    }
}