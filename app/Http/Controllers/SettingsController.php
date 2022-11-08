<?php

namespace EasyShop\Http\Controllers;

use Illuminate\Http\Request;
use EasyShop\Http\Requests;
use EasyShop\Services\CategoryService;
use EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface;
use EasyShop\Models\Product;

class SettingsController extends FrontController
{
    /**
     * @param CategoryService $categoryService
     * @param ArticleRepositoryInterface $articleRepository
     */
    public function __construct(CategoryService $categoryService)
    {
        parent::__construct($categoryService);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeCurrency(Request $request)
    {
        $currency = $request->input('currency');

        $defaultCurrency = \EasyShop\Models\AdminSettings::getField('currency');
        $allCurrencies = \EasyShop\Models\AdminSettings::getField('currencies');

        if (!in_array($currency, array_keys($allCurrencies))) {
            $currency = $defaultCurrency;
        }
        \Session::put('selectedCurrency', $currency);
        \Session::put('selectedCurrencyDivider', $allCurrencies[$currency]);

        $previous = app('url')->previous();

        // category page
        if (preg_match('/\/c\//', $previous)) {
            $index = strrpos($previous, '?');
            if ($index) {
                return redirect()->to(substr($previous, 0, $index));
            } else {
                return redirect()->back();
            }
        }

        return redirect()->back();
    }
    
}
