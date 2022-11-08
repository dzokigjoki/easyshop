<?php

namespace EasyShop\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        # REPOSITORIES

        $this->app->bind('\EasyShop\Repositories\ArticleRepository\ArticleRepositoryInterface', function () {
            return new \EasyShop\Repositories\ArticleRepository\DBArticleRepository();
        });

        $this->app->bind('\EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface', function () {
            return new \EasyShop\Repositories\CategoryRepository\DBCategoryRepository();
        });

        $this->app->bind('\EasyShop\Repositories\ManufacturerRepository\ManufacturerRepositoryInterface', function () {
            return new \EasyShop\Repositories\ManufacturerRepository\DBManufacturerRepository();
        });

        $this->app->bind('\EasyShop\Repositories\DocumentRepository\DocumentRepositoryInterface', function () {
            return new \EasyShop\Repositories\DocumentRepository\DBDocumentRepository();
        });

        $this->app->bind('\EasyShop\Repositories\CartRepository\CartRepositoryInterface', function () {
            return new \EasyShop\Repositories\CartRepository\DBCartRepository();
        });

        $this->app->bind('\EasyShop\Repositories\BlogRepository\BlogRepositoryInterface', function () {
            return new \EasyShop\Repositories\BlogRepository\DBBlogRepository();
        });

        $this->app->bind('\EasyShop\Repositories\BannerRepository\BannerRepositoryInterface', function () {
            return new \EasyShop\Repositories\BannerRepository\DBBannerRepository();
        });

        $this->app->bind('\EasyShop\Repositories\OptionsRepository\ProductOptionsRepositoryInterface', function () {
            return new \EasyShop\Repositories\OptionsRepository\DBProductOptionsRepository();
        });
    }
}
