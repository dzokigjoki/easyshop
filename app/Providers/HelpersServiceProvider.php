<?php

namespace EasyShop\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    { }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('imagesHelper', function () {
            return new \EasyShop\Helpers\ImagesHelper();
        });

        $this->app->bind('bannerHelper', function () {
            return new \EasyShop\Helpers\BannerHelper();
        });

        $this->app->bind('articleHelper', function () {
            return new \EasyShop\Helpers\ArticleHelper();
        });

        $this->app->bind('socialHelper', function () {
            return new \EasyShop\Helpers\SocialHelper();
        });
    }
}
