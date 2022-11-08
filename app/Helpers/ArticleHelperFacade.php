<?php namespace EasyShop\Helpers;

use Illuminate\Support\Facades\Facade;

class ArticleHelperFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'articleHelper';
    }
}