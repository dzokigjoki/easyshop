<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

# SITE
Route::group(['middleware' => ['web', 'language']], function () {

    Route::post('keep-token-alive', function () {
        return 'Token must have been valid, and the session expiration has been extended.'; //https://stackoverflow.com/q/31449434/470749
    });

    # For testing
    Route::get('test', ['uses' => 'HomeController@test']);

    # Product feed for facebook pixel
    if (in_array(config('app.client'), ['topprodukti_mk', 'topprodukti_bg', 'topprodukti_rs', 'topprodukti_hr', 'topprodukti_si', 'topprodukti_sk', 'topprodukti_hu', 'topprodukti_pl', 'topprodukti_cz', 'topprodukti_ro'])) {
        Route::get('products/topprodukti/feed/xml/{country?}', ['uses' => 'ProductController@getTopproduktiXmlFeed']);
    }

    if (config('app.client') == 'torti') {
        Route::get('products/torti-attributes-json/{id}/{shape}', ['uses' => 'ProductController@productJsonAttributesTorti']);
        Route::post('products/upload-plugin-design', ['as' => 'upload.custom.design', 'uses' => 'ProductController@uploadPluginDesign']);
    }

    # Product feed for facebook pixel
    if (in_array(config('app.client'), ['globalstore_bg', 'globalstore_mk', 'globalstore_ro'])) {
        Route::get('products/global-store/feed/xml/{country?}', ['uses' => 'ProductController@getGlobalStoreXmlFeed']);
    }


    Route::get('products/feed/xml', ['uses' => 'ProductController@getXmlFeed']);


    Route::get('/thank-you', ['as' => 'thankyou', 'uses' => 'CheckoutController@getThankYou']);
    Route::get('{lang?}/thank-you', ['as' => '{lang?}.thankyou', 'uses' => 'CheckoutController@getThankYou']);
    Route::get('/cart', ['as' => 'cart', 'uses' => 'CartController@getIndex']);
    Route::get('{lang?}/cart', ['as' => '{lang?}.cart', 'uses' => 'CartController@getIndex']);
    Route::post('/cart/get/{id}', ['as' => 'cart.get.single', 'uses' => 'CartController@getCartProducts']);
    Route::post('/cart/add', ['as' => 'cart.add', 'uses' => 'CartController@addCartProduct']);
    Route::post('{lang?}/cart/add', ['as' => '{lang?}.cart.add', 'uses' => 'CartController@addCartProduct']);

    Route::get('/cart/remove/{id}/{variation?}', ['as' => 'cart.remove', 'uses' => 'CartController@removeCartProduct']);
    Route::get('{lang?}/cart/remove/{id}/{variation?}', ['as' => '{lang?}.cart.remove', 'uses' => 'CartController@removeCartProduct']);
    Route::post('/cart/update', ['as' => 'cart.update', 'uses' => 'CartController@updateProductQuantity']);
    Route::post('{lang?}/cart/update', ['as' => '{lang?}.cart.update', 'uses' => 'CartController@updateProductQuantity']);
    Route::post('{lang?}/cart/update', ['as' => '{lang?}.cart.update', 'uses' => 'CartController@updateProductQuantity']);
    Route::get('/user/history', ['as' => 'order.history', 'uses' => 'CartController@orderHistory']);
    Route::post('/wishlist/add', ['as' => 'wishlist.add', 'uses' => 'Admin\ArticlesController@addProductToWishlist']);
    Route::post('{lang?}/wishlist/add', ['as' => '{lang?}.wishlist.add', 'uses' => 'Admin\ArticlesController@addProductToWishlist']);
    Route::delete('/wishlist/remove', ['as' => 'wishlist.remove', 'uses' => 'Admin\ArticlesController@removeProductFromWishlist']);
    Route::delete('{lang?}/wishlist/remove', ['as' => '{lang?}.wishlist.remove', 'uses' => 'Admin\ArticlesController@removeProductFromWishlist']);
    Route::post('checkout/generate', ['as' => 'checksum.generate', 'uses' => 'CheckoutController@generate'])->middleware(['trim']);
    Route::post('/checkout/generate', ['as' => 'checksum.generate', 'uses' => 'CheckoutController@generate'])->middleware(['trim']);
    Route::post('{lang?}/checkout/generate', ['as' => '{lang?}.checksum.generate', 'uses' => 'CheckoutController@generate'])->middleware(['trim']);
    Route::post('checkout/generateTorti', ['as' => 'checksum.generateTorti', 'uses' => 'CheckoutController@generateTorti'])->middleware(['trim']);
    Route::post('checkout/success', ['as' => 'checkout.success', 'uses' => 'CheckoutController@success']);
    Route::post('{lang?}/checkout/success', ['as' => '{lang?}.checkout.success', 'uses' => 'CheckoutController@success']);
    Route::post('checkout/fail', ['as' => 'checkout.fail', 'uses' => 'CheckoutController@fail']);
    Route::post('{lang?}/checkout/fail', ['as' => '{lang?}.checkout.fail', 'uses' => 'CheckoutController@fail']);



    Route::post('checkout/halk-success', ['as' => 'halk.success', 'uses' => 'CheckoutController@halkSuccess']);
    Route::post('{lang?}/checkout/halk-success', ['as' => '{lang?}.halk.success', 'uses' => 'CheckoutController@halkSuccess']);
    Route::post('checkout/halk-fail', ['as' => 'halk.fail', 'uses' => 'CheckoutController@halkFail']);
    Route::post('{lang?}/checkout/halk-fail', ['as' => '{lang?}.halk.fail', 'uses' => 'CheckoutController@halkFail']);
    Route::post('halk-check-status', ['as' => 'halk.status', 'uses' => 'CheckoutController@halkCheckStatus']);
    Route::post('{lang?}/halk-check-status', ['as' => '{lang?}.halk.status', 'uses' => 'CheckoutController@halkCheckStatus']);

    Route::get('/products/recently-viewed', ['as' => 'recently.viewed.products', 'uses' => 'ProductController@recentlyViewedProducts']);


    if (in_array(config('app.client'), ['peletcentar', 'shopathome', 'accessories', 'clothes', 'barber_shop', 'mymoda', 'torti', 'herline'])) {
        Route::get('/contact', ['as' => 'page.contact', 'uses' => 'PagesController@getContact']);
        Route::get('{lang?}/contact', ['as' => '{lang?}.page.contact', 'uses' => 'PagesController@getContact']);
        Route::post('/contact', ['as' => 'page.contact.post', 'uses' => 'PagesController@postContact']);
        Route::post('{lang?}/contact', ['as' => '{lang?}.page.contact.post', 'uses' => 'PagesController@postContact']);
        Route::get('/contact-peleti', ['as' => 'page.contact-peleti', 'uses' => 'PagesController@getContactPeleti']);
        Route::get('{lang?}/contact-peleti', ['as' => '{lang?}.page.contact-peleti', 'uses' => 'PagesController@getContactPeleti']);
    }

    $config = config( 'clients.' . config(('app.client')));

    Route::post('/kontact', 'ContactController@mailToAdmin')->name('kontakt-forma');
    Route::post('{lang?}/kontact', 'ContactController@mailToAdmin')->name('{lang?}.kontakt-forma');

    if (isset($config['routes'])) {
        foreach ($config['routes'] as $routeName => $routes) {

            $locale = detectLocale();

            foreach ($routes as $key => $value) {

                if ($locale == $key) {

                    Route::get($value, 'HomeController@pages')->name($routeName);
                }
            }
        }
    }
    Route::get('/en', 'HomeController@index');
    Route::get('/mk', 'HomeController@index');
    Route::get('/al', 'HomeController@index');
    Route::get('/de', 'HomeController@index');
    Route::get('/bg', 'HomeController@index');

    Route::post('/cart/promocode', ['as' => 'cart.checkpromocode', 'uses' => 'CartController@checkPromoCode']);
    Route::post('{lang?}/cart/promocode', ['as' => '{lang?}.cart.checkpromocode', 'uses' => 'CartController@checkPromoCode']);

    Route::get('/sitemap', ['as' => 'sitemap.index', 'uses' => 'SitemapController@index']);

    Route::post('/newsletter/check', ['as' => 'newsletter.check', 'uses' => 'NewsletterController@checkNewsletter']);
    Route::post('/newsletter/subscribe', ['as' => 'newsletter.subscribe', 'uses' => 'NewsletterController@NewsletterSubscribe']);


    # Authentication

    Route::get('logout', ['as' => 'auth.logout.get', 'uses' => 'Auth\AuthController@getLogout'])->where('lang', '^(?!.*admin).*$');
    Route::get('{lang?}/logout', ['as' => '{lang?}.auth.logout.get', 'uses' => 'Auth\AuthController@getLogout'])->where('lang', '^(?!.*admin).*$');

    Route::get('password/reset/{token}', ['as' => 'auth.reset_password.get', 'uses' => 'Auth\PasswordController@showResetForm']);
    Route::get('password/email', ['as' => 'auth.email_password.get', 'uses' => 'Auth\PasswordController@getEmail']);
    Route::get('{lang?}/password/email', ['as' => 'auth.email_password.get', 'uses' => 'Auth\PasswordController@getEmail']);
    Route::post('password/email', ['as' => 'auth.email_password.post', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
    Route::post('password/reset', ['as' => 'auth.reset_password.post', 'uses' => 'Auth\PasswordController@reset']);

    # List categories
    Route::get('/c/{id}/{slug}', ['as' => 'category', 'uses' => 'CategoryController@getIndex']);
    Route::get('{lang?}/c/{id}/{slug}', ['as' => '{lang?}.category', 'uses' => 'CategoryController@getIndex']);
    Route::post('/c-filters', ['as' => 'categoryFilters', 'uses' => 'CategoryController@getPartialArticles']);
    Route::get('/allCategories', ['as' => 'allCategories', 'uses' => 'CategoryController@allSubCategories']);
    Route::get('/mobile-categories', ['as' => 'mobileCategories', 'uses' => 'CategoryController@getMobilePage']);

    Route::post('/{lang?}/c-filters', ['as' => '{lang?}.categoryFilters', 'uses' => 'CategoryController@getPartialArticles']);
    # List manufacturers
    Route::get('/m/{id}', ['as' => 'manufacturer', 'uses' => 'ManufacturerController@getIndex']);
    Route::get('{lang?}/m/{id}', ['as' => '{lang?}.manufacturer', 'uses' => 'ManufacturerController@getIndex']);

    # Show article
    Route::get('/p/{id}/{slug}', ['as' => 'product', 'uses' => 'ProductController@getIndex']);
    Route::get('/{lang?}/p/{id}/{url}', ['as' => '{lang?}.product', 'uses' => 'ProductController@getIndex']);
    Route::get('/allProducts', ['as' => 'allProducts', 'uses' => 'ProductController@allProducts']);

    # Wishlist
    Route::get('/wishlist', ['as' => 'wishlist', 'uses' => 'ProductController@getWishlist']);
    Route::get('{lang?}/wishlist', ['as' => '{lang?}.wishlist', 'uses' => 'ProductController@getWishlist']);

    # Show blog
    Route::get('/blog', ['as' => 'blog.all', 'uses' => 'BlogController@index']);
    Route::get('/b/{id}/{slug}', ['as' => 'blog', 'uses' => 'BlogController@show']);
    Route::get('/{lang?}/b/{id}/{slug}', ['as' => '{lang?}.blog', 'uses' => 'BlogController@show']);

    # Search articles
    Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@index']);
    Route::get('{lang?}/search', ['as' => '{lang?}.search', 'uses' => 'SearchController@index']);

    Route::get('/change-currency', ['as' => 'change.currency', 'uses' => 'SettingsController@changeCurrency']);

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


    Route::get('/onesignal-test', ['as' => 'onesignal-test', 'uses' => 'CheckoutController@purchaseTest']);

    # Confirm email
    Route::get('profile/confirm/{code}', ['as' => 'profile.confirm', 'uses' => 'ProfileController@getConfirmation']);


    Route::get('profile/register-success', ['as' => 'profile.RegisterSuccess', 'uses' => 'ProfileController@registrationSuccess']);

    Route::post('coupon/wheel-of-fortune/generate', ['as' => 'coupon.wheel-of-fortune.generate', 'uses' => 'Admin\PromoCodesController@generateWheelOfFortuneCode']);
    Route::get('coupon/wheel-set-cookie', ['as' => 'coupon.wheel-set-cookie', 'uses' => 'Admin\PromoCodesController@wheelSetCookie']);

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', ['as' => 'auth.login.get', 'uses' => 'Auth\AuthController@showLoginForm']);
        Route::get('{lang?}/login', ['as' => '{lang?}.auth.login.get', 'uses' => 'Auth\AuthController@showLoginForm'])->where('lang', '^(?!.*admin).*$');
        Route::post('login', ['as' => 'auth.login.post', 'uses' => 'Auth\AuthController@login']);
        Route::post('{lang?}/login', ['as' => '{lang?}.auth.login.post', 'uses' => 'Auth\AuthController@login'])->where('lang', '^(?!.*admin).*$');
        Route::get('register4', ['as' => 'auth.register.get', 'uses' => 'Auth\AuthController@showRegistrationForm']);
        Route::get('{lang?}/register', ['as' => '{lang?}.auth.register.get', 'uses' => 'Auth\AuthController@showRegistrationForm'])->where('lang', '^(?!.*admin).*$');
        Route::post('register', ['as' => 'auth.register.post', 'uses' => 'Auth\AuthController@register']);
        Route::post('{lang?}/register', ['as' => '{lang?}.auth.register.post', 'uses' => 'Auth\AuthController@register'])->where('lang', '^(?!.*admin).*$');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('profile', ['as' => 'profiles.get', 'uses' => 'ProfileController@showProfile']);
        Route::get('{lang?}/profile', ['as' => '{lang?}.profiles.get', 'uses' => 'ProfileController@showProfile']);
        Route::post('profile', ['as' => 'profiles.store', 'uses' => 'ProfileController@store']);
        Route::get('profile/orders', ['as' => 'profiles.orders.get', 'uses' => 'ProfileController@getShowOrders']);
    });
});




# ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {


    # Authentication
    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/', ['as' => 'admin.login', 'uses' => 'Admin\AuthenticationController@getLogin']);
        Route::get('login', ['as' => 'admin.login', 'uses' => 'Admin\AuthenticationController@getLogin']);
        Route::post('login', ['as' => 'admin.login.post', 'uses' => 'Admin\AuthenticationController@postLogin']);
    });

    # For authenticated users - admins
    Route::group(['middleware' => 'auth.admin'], function () {

        # Logout
        Route::get('logout', ['as' => 'admin.logout', 'uses' => 'Admin\AuthenticationController@getLogout']);

        # Dashboard
        Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@getIndex']);
        Route::get('dashboard/filterbestsellerproducts', ['as' => 'admin.dashboard.filterBestsellerProducts', 'uses' => 'Admin\DashboardController@filterBestsellerProducts']);

        # Catalog
        Route::get('articles', ['as' => 'admin.articles', 'uses' => 'Admin\ArticlesController@getIndex']);

        Route::post('articles/upload', ['as' => 'admin.upload_article_image', 'uses' => 'Admin\ArticlesController@uploadGalleryImage']);
        Route::get('articles/new', ['as' => 'admin.article.new', 'uses' => 'Admin\ArticlesController@show']);
        Route::get('articles/excel', ['as' => 'admin.articles.excel', 'uses' => 'Admin\ArticlesController@generateExcel']);
        Route::get('articles/show/{id}', ['as' => 'admin.article.show', 'uses' => 'Admin\ArticlesController@show']);
        Route::post('articles/save', ['as' => 'admin.article.save', 'uses' => 'Admin\ArticlesController@store']);
        Route::get('articles/delete/{id}', ['as' => 'admin.article.delete', 'uses' => 'Admin\ArticlesController@getDelete']);
        Route::post('articles/datatable', ['as' => 'admin.article.datatables', 'uses' => 'Admin\ArticlesController@getProductsDatatable']);
        Route::post('articles/uploadRedactor', ['as' => 'admin.articleuploadRedactor', 'uses' => 'Admin\ArticlesController@uploadRedactor']);
        Route::post('articles/removeRedactor', ['as' => 'admin.articleremoveRedactor', 'uses' => 'Admin\ArticlesController@removeRedactor']);
        Route::get('articles/attributes', ['as' => 'admin.articleAttributes', 'uses' => 'Admin\AttributesController@getByCategory']);
        Route::get('articles/removeImage', ['as' => 'admin.articleremoveImage', 'uses' => 'Admin\ArticlesController@removeImage']);
        Route::get('articles/instock', ['as' => 'admin.article.instock', 'uses' => 'Admin\ArticlesController@getInStock']);
        Route::post('articles/instock-datatable', ['as' => 'admin.article.instock.datatables', 'uses' => 'Admin\ArticlesController@getInStockDatatable']);
        Route::get('articles/instock-prices', ['as' => 'admin.article.instock.print', 'uses' => 'Admin\ArticlesController@printInStockPrices']);
        Route::get('articles/karta-datatable', ['as' => 'admin.article.karta.datatables', 'uses' => 'Admin\ArticlesController@kartaArtikal']);
        Route::get('articles/karta-artikl', ['as' => 'admin.article.showKartaArtikal', 'uses' => 'Admin\ArticlesController@showKartaArtikal']);
        Route::get('articles/getFromApi', ['as' => 'admin.article.getFromApi', 'uses' => 'Admin\ArticlesController@getFromApi']);
        Route::get('articles/clone/{product_id}', ['as' => 'admin.clone', 'uses' => 'Admin\ArticlesController@cloneProduct']);
        Route::get('delete_pdf/{product_id}', ['as' => 'admin.deletepdf', 'uses' => 'Admin\ArticlesController@deletePdf']);


        # Attributes
        Route::get('attributes', ['as' => 'admin.attributes', 'uses' => 'Admin\AttributesController@getIndex']);
        Route::get('attribute/{id}', ['as' => 'admin.attributes.get', 'uses' => 'Admin\AttributesController@show']);
        Route::post('attributes/delete', ['as' => 'admin.attributes.delete', 'uses' => 'Admin\AttributesController@delete']);
        Route::get('attributes/filter', ['as' => 'admin.attributesFiltered', 'uses' => 'Admin\AttributesController@getAtributes']);
        Route::post('attributes', ['as' => 'admin.newattributes', 'uses' => 'Admin\AttributesController@store']);


        # Filters
        Route::get('filters', ['as' => 'admin.filters', 'uses' => 'Admin\FilterController@getFilters']);
        Route::get('filter/{id}', ['as' => 'admin.filter', 'uses' => 'Admin\FilterController@show']);
        Route::post('filter', ['as' => 'admin.newfilter', 'uses' => 'Admin\FilterController@store']);
        Route::post('filter/delete', ['as' => 'admin.deletefilter', 'uses' => 'Admin\FilterController@deleteFilter']);
        Route::post('filter/storeToCategory', ['as' => 'admin.storeToCategory', 'uses' => 'Admin\FilterController@storeFiltersCategory']);
        Route::post('filter/deleteFromCategory', ['as' => 'admin.deleteFromCategory', 'uses' => 'Admin\FilterController@deleteFiltersCategory']);
        Route::get('filters/category/{category_id}', ['as' => 'admin.filtersCategory', 'uses' => 'Admin\FilterController@getFiltersCategory']);

        # Manufacturers
        Route::get('manufacturers', ['as' => 'admin.manufacturers', 'uses' => 'Admin\ManufacturerController@getIndex']);
        Route::get('manufacturers/show/{id}', ['as' => 'admin.manufacturers.show', 'uses' => 'Admin\ManufacturerController@show']);
        Route::get('manufacturers/create', ['as' => 'admin.manufacturers.new', 'uses' => 'Admin\ManufacturerController@show']);
        Route::get('manufacturers/delete/{id}', ['as' => 'admin.manufacturers.delete', 'uses' => 'Admin\ManufacturerController@delete']);
        Route::post('manufacturers/store', ['as' => 'admin.manufacturers.store', 'uses' => 'Admin\ManufacturerController@store']);
        Route::post('manufacturers/datatable', ['as' => 'admin.manufacturers.datatables', 'uses' => 'Admin\ManufacturerController@getManufacturerDatatable']);

        # Categories
        Route::get('categories', ['as' => 'admin.categories', 'uses' => 'Admin\CategoriesController@getIndex']);
        Route::post('categories/save', ['as' => 'admin.categories.save', 'uses' => 'Admin\CategoriesController@store']);
        Route::get('categories/{id}', ['as' => 'admin.category.edit', 'uses' => 'Admin\CategoriesController@show']);
        Route::get('categories/delete/{id}', ['as' => 'admin.category.delete', 'uses' => 'Admin\CategoriesController@delete']);
        Route::get('categories/load', ['as' => 'admin.categories_load', 'uses' => 'Admin\CategoriesController@loadCategoryTreedata']);
        Route::post('categories/reorder', ['as' => 'admin.categories.reorder', 'uses' => 'Admin\CategoriesController@postReorder']);
        Route::post('categories/uploadRedactor', ['as' => 'admin.categoriesuploadRedactor', 'uses' => 'Admin\CategoriesController@uploadRedactor']);
        Route::post('categories/removeRedactor', ['as' => 'admin.categoriesremoveRedactor', 'uses' => 'Admin\CategoriesController@removeRedactor']);

        # Discount
        Route::get('discount', ['as' => 'admin.discount', 'uses' => 'Admin\DiscountController@index']);
        Route::get('discount/new', ['as' => 'admin.newdiscount', 'uses' => 'Admin\DiscountController@create']);
        Route::post('discount/store', ['as' => 'admin.storediscount', 'uses' => 'Admin\DiscountController@store']);
        Route::get('discount/list', ['as' => 'admin.listdiscount', 'uses' => 'Admin\DiscountController@getDiscounts']);
        Route::get('discount/delete/{id}', ['as' => 'admin.deletediscount', 'uses' => 'Admin\DiscountController@removeArticle']);
        Route::post('discount/delete', ['as' => 'admin.deleteDiscounts', 'uses' => 'Admin\DiscountController@deleteDicsounts']);
        Route::post('discount/products', ['as' => 'admin.listdiscountDatatable', 'uses' => 'Admin\DiscountController@getProductsDatatable']);

        # Gradual Discounts
        Route::get('gradual-discounts', ['as' => 'admin.gradual-discounts', 'uses' => 'Admin\GradualDiscountsController@index']);
        Route::get('gradual-discounts/new', ['as' => 'admin.gradual-discounts.new', 'uses' => 'Admin\GradualDiscountsController@create']);
        Route::post('gradual-discounts/store', ['as' => 'admin.gradual-discounts.store', 'uses' => 'Admin\GradualDiscountsController@store']);
        Route::post('gradual-discounts/update', ['as' => 'admin.gradual-discounts.update', 'uses' => 'Admin\GradualDiscountsController@update']);
        Route::post('gradual-discounts-items/store', ['as' => 'admin.gradual-discount-items.store', 'uses' => 'Admin\GradualDiscountsController@storeItem']);
        Route::post('gradual-discounts-products/store', ['as' => 'admin.gradual-discount-products.store', 'uses' => 'Admin\GradualDiscountsController@storeProduct']);
        Route::get('gradual-discounts/list', ['as' => 'admin.gradual-discounts.list', 'uses' => 'Admin\GradualDiscountsController@list']);
        Route::delete('gradual-discounts/{id}', ['as' => 'admin.gradual-discounts.delete', 'uses' => 'Admin\GradualDiscountsController@delete']);
        Route::get('gradual-discounts/{id}', ['as' => 'admin.gradual-discounts.show', 'uses' => 'Admin\GradualDiscountsController@edit']);
        Route::delete('gradual-discount-items/delete/{id}', ['as' => 'admin.gradual-discount-items.delete', 'uses' => 'Admin\GradualDiscountsController@deleteItem']);
        Route::delete('gradual-discount-products/delete/{gradual_discount_id}/{product_id}', ['as' => 'admin.gradual-discount-products.delete', 'uses' => 'Admin\GradualDiscountsController@deleteProduct']);
        Route::post('gradual-discounts/products', ['as' => 'admin.gradual-discount.datatable.list', 'uses' => 'Admin\GradualDiscountsController@getProductsDatatable']);

        # Stickers
        Route::get('stickers', ['as' => 'admin.stickers', 'uses' => 'Admin\StickerController@index']);
        Route::get('stickers/new', ['as' => 'admin.stickers.new', 'uses' => 'Admin\StickerController@create']);
        Route::post('stickers/store', ['as' => 'admin.stickers.store', 'uses' => 'Admin\StickerController@store']);
        Route::get('stickers/list', ['as' => 'admin.stickers.list', 'uses' => 'Admin\StickerController@list']);
        Route::delete('stickers/{id}', ['as' => 'admin.stickers.delete', 'uses' => 'Admin\StickerController@delete']);
        Route::get('stickers/{id}', ['as' => 'admin.stickers.show', 'uses' => 'Admin\StickerController@edit']);

        # Banner Module        
        Route::get('banners', ['as' => 'admin.banners', 'uses' => 'Admin\BannerController@index']);
        Route::post('banners/new', ['as' => 'admin.banners.store', 'uses' => 'Admin\BannerController@store']);
        Route::get('banners/new', ['as' => 'admin.banners.new', 'uses' => 'Admin\BannerController@show']);
        Route::get('banners/ajax', ['as' => 'admin.banners.ajax', 'uses' => 'Admin\BannerController@getBannersAjax']);
        Route::get('banners/position/{categoryId}/{bannerId}/{type}', ['as' => 'admin.banners.position', 'uses' => 'Admin\BannerController@getBannerPositionByCategory']);
        Route::get('category/title/{categoryId}', ['as' => 'admin.banners.category.title', 'uses' => 'Admin\BannerController@getBannerDimensions']);
        Route::get('banners/{id}', ['as' => 'admin.banners.edit', 'uses' => 'Admin\BannerController@edit']);
        Route::get('banners/delete/{id}', ['as' => 'admin.banners.delete', 'uses' => 'Admin\BannerController@getDelete']);

        # Coupon
        Route::get('coupon', ['as' => 'admin.coupon', 'uses' => 'Admin\CouponController@index']);
        Route::get('coupon/new', ['as' => 'admin.newcoupon', 'uses' => 'Admin\CouponController@create']);
        Route::post('coupon/store', ['as' => 'admin.storecoupon', 'uses' => 'Admin\CouponController@store']);
        Route::post('coupon/delete', ['as' => 'admin.deleteCoupon', 'uses' => 'Admin\CouponController@delete']);
        Route::get('coupon/list', ['as' => 'admin.listcoupon', 'uses' => 'Admin\CouponController@getCoupons']);
        Route::get('coupon/name', ['as' => 'admin.copunname', 'uses' => 'Admin\CouponController@generateName']);
        Route::post('coupon/products', ['as' => 'admin.listcouponDatatable', 'uses' => 'Admin\CouponController@getProductsDatatable']);


        # Promo codes
        Route::get('promo-codes', ['as' => 'admin.promo-codes', 'uses' => 'Admin\PromoCodesController@index']);
        Route::get('promo-code/new', ['as' => 'admin.promo-codes.new', 'uses' => 'Admin\PromoCodesController@show']);
        Route::get('promo-code/show/{id}', ['as' => 'admin.promo-codes.show', 'uses' => 'Admin\PromoCodesController@show']);
        Route::post('promo-code/store', ['as' => 'admin.promo-codes.store', 'uses' => 'Admin\PromoCodesController@store']);
        Route::get('promo-code/delete/{id}', ['as' => 'admin.promo-codes.delete', 'uses' => 'Admin\PromoCodesController@delete']);
        Route::get('promo-code/list', ['as' => 'admin.promo-codes.get', 'uses' => 'Admin\PromoCodesController@getPromoCodes']);



        // if (\EasyShop\Models\AdminSettings::isSetTrue('bundle', 'modules')) {
            Route::post('bundle-add-product', ['as' => 'admin.bundle.product', 'uses' => 'Admin\ArticlesController@addProductToBundle']);
            Route::delete('bundle-remove-product', ['as' => 'admin.bundle.delete-product', 'uses' => 'Admin\ArticlesController@deleteProductFromBundle']);
        // }

        # Popup Modal On Load
        Route::get('popup-modal/{id?}', 'Admin\PopupModalController@find')->name('admin.popup_modal');
        Route::post('popup-modal', 'Admin\PopupModalController@store')->name('admin.popup_modal.store');
        Route::delete('popup-modal/{id}', 'Admin\PopupModalController@delete')->name('admin.popup_modal.delete');

        # Blog
        Route::get('blog', ['as' => 'admin.blog', 'uses' => 'Admin\BlogController@index']);
        Route::get('blog/new', ['as' => 'admin.newblog', 'uses' => 'Admin\BlogController@create']);
        Route::get('blog/show/{post_id}', ['as' => 'admin.blogshow', 'uses' => 'Admin\BlogController@show']);
        Route::post('blog/store', ['as' => 'admin.storeblog', 'uses' => 'Admin\BlogController@store']);
        Route::get('blog/list', ['as' => 'admin.listblog', 'uses' => 'Admin\BlogController@getPosts']);
        Route::post('blog/uploadRedactor', ['as' => 'admin.blogUploadRedactor', 'uses' => 'Admin\BlogController@uploadRedactor']);
        Route::post('blog/removeRedactor', ['as' => 'admin.blogremoveRedactor', 'uses' => 'Admin\BlogController@removeRedactor']);
        Route::get('blog/delete/{id}', ['as' => 'admin.blog.delete', 'uses' => 'Admin\BlogController@delete']);

        # Warehouses
        Route::get('warehouses', ['as' => 'admin.warehouses.all', 'uses' => 'Admin\WarehousesController@getIndex']);
        Route::get('warehouses/edit/{id}', ['as' => 'admin.warehouses.edit', 'uses' => 'Admin\WarehousesController@edit']);
        Route::get('warehouses/new', ['as' => 'admin.warehouses.new', 'uses' => 'Admin\WarehousesController@create']);
        Route::post('warehouses/store', ['as' => 'admin.warehouses', 'uses' => 'Admin\WarehousesController@store']);
        Route::get('warehouses/ispratnici', ['as' => 'admin.warehouses.ispratnici', 'uses' => 'Admin\WarehousesController@getIspratnici']);
        Route::get('warehouses/priemnici', ['as' => 'admin.warehouses.priemnici', 'uses' => 'Admin\WarehousesController@getPriemnici']);
        Route::post('warehouses/datatables', ['as' => 'admin.warehouses.datatable', 'uses' => 'Admin\WarehousesController@getWarehouses']);

        # Sales
        Route::get('sales/orders', ['as' => 'admin.sales.orders', 'uses' => 'Admin\SalesController@getOrders']);
        Route::get('sales/payments', ['as' => 'admin.sales.payments', 'uses' => 'Admin\SalesController@getPayments']);
        Route::get('sales/payments/create', ['as' => 'admin.sales.createPayment', 'uses' => 'Admin\SalesController@createPayment']);
        Route::get('sales/payments/{idPayment}', ['as' => 'admin.sales.showPayment', 'uses' => 'Admin\SalesController@showPayment']);
        Route::get('sales/payments/datatable/get', ['as' => 'admin.payments.getPayments', 'uses' => 'Admin\SalesController@paymentsDatatable']);
        Route::get('sales/payments/details/getPaymentsForDocument', ['as' => 'admin.payments.getPaymentsForDocument', 'uses' => 'Admin\SalesController@getPaymentsForDocument']);
        Route::post('sales/storePayment', ['as' => 'admin.sales.storepayments', 'uses' => 'Admin\SalesController@storePayment']);
        Route::get('sales/invoices', ['as' => 'admin.sales.invoices', 'uses' => 'Admin\SalesController@getInvoices']);
        Route::get('sales/pro-invoices', ['as' => 'admin.sales.proinvoices', 'uses' => 'Admin\SalesController@getProInvoices']);

        # Customers
        Route::get('customers', ['as' => 'admin.customers', 'uses' => 'Admin\CustomersController@getIndex']);
        Route::get('customers/create', ['as' => 'admin.customers.create', 'uses' => 'Admin\CustomersController@getCreate']);
        Route::post('customers/store', ['as' => 'admin.customers.store', 'uses' => 'Admin\CustomersController@store']);
        Route::get('customers/getCustomers', ['as' => 'admin.customers.getCustomers', 'uses' => 'Admin\CustomersController@getCustomers']);
        Route::get('customers/delete/{id}', ['as' => 'admin.customers.delete', 'uses' => 'Admin\CustomersController@delete']);
        Route::get('customers/show/{id}', ['as' => 'admin.customers.show', 'uses' => 'Admin\CustomersController@getShow']);
        Route::get('customers/checkCustomerNumber', ['as' => 'admin.customers.checkCustomerNumberShow', 'uses' => 'Admin\CustomersController@checkCustomerNumberShow']);
        Route::post('customers/checkCustomerNumber', ['as' => 'admin.customers.checkCustomerNumber', 'uses' => 'Admin\CustomersController@checkCustomerNumber']);

        Route::get('customers/searchCustomers', ['as' => 'admin.customers.searchCustomers', 'uses' => 'Admin\CustomersController@searchCustomers']);
        #Partner
        Route::get('partner-review', ['as' => 'admin.partner-review.index', 'uses' => 'Admin\CustomersController@partnerReviewIndex']);

        # Suppliers

        Route::get('suppliers', ['as' => 'admin.suppliers', 'uses' => 'Admin\SuppliersController@getIndex']);
        Route::post('suppliers/getSuppliers', ['as' => 'admin.suppliers.datatable', 'uses' => 'Admin\SuppliersController@getSuppliers']);
        Route::post('suppliers/store', ['as' => 'admin.suppliers.store', 'uses' => 'Admin\SuppliersController@store']);
        Route::get('suppliers/create', ['as' => 'admin.suppliers.create', 'uses' => 'Admin\SuppliersController@create']);
        Route::get('suppliers/delete/{id}', ['as' => 'admin.suppliers.delete', 'uses' => 'Admin\SuppliersController@delete']);
        Route::get('suppliers/edit/{id}', ['as' => 'admin.suppliers.edit', 'uses' => 'Admin\SuppliersController@edit']);

        # Suppliers
        Route::get('importers', ['as' => 'admin.importers', 'uses' => 'Admin\ImportersController@getIndex']);
        Route::post('importers/getSuppliers', ['as' => 'admin.importers.datatable', 'uses' => 'Admin\ImportersController@getImporters']);
        Route::post('importers/store', ['as' => 'admin.importers.store', 'uses' => 'Admin\ImportersController@store']);
        Route::get('importers/create', ['as' => 'admin.importers.create', 'uses' => 'Admin\ImportersController@create']);
        Route::get('importers/delete/{id}', ['as' => 'admin.importers.delete', 'uses' => 'Admin\ImportersController@delete']);
        Route::get('importers/edit/{id}', ['as' => 'admin.importers.edit', 'uses' => 'Admin\ImportersController@edit']);

        # Documents
        Route::get('document/{document}', ['as' => 'admin.document.index', 'uses' => 'Admin\DocumentsController@index']);
        Route::get('document/{document}/new', ['as' => 'admin.document.create', 'uses' => 'Admin\DocumentsController@create']);
        Route::post('document/store', ['as' => 'admin.document.store', 'uses' => 'Admin\DocumentsController@store']);
        Route::get('document/{document}/edit/{document_id}', ['as' => 'admin.document.edit', 'uses' => 'Admin\DocumentsController@show']);
        Route::get('document/{name}/print/{id}', ['as' => 'admin.document.print', 'uses' => 'Admin\DocumentsController@printDocument']);
        Route::get('document/addresslists/{id}/{courier_id}', ['as' => 'admin.document.addresslists', 'uses' => 'Admin\DocumentsController@addresslists']);
        Route::post('document/store/userdata', ['as' => 'admin.document.userdata', 'uses' => 'Admin\DocumentsController@storeuserdata']);
        Route::get('documents/split/{document_id}', ['as' => 'admin.document.splitDocumentView', 'uses' => 'Admin\DocumentsController@splitDocumentView']);
        Route::post('document/narachka/split/{document_id}', ['as' => 'admin.document.splitDocument', 'uses' => 'Admin\DocumentsController@splitDocument']);
        Route::post('document/generate/excel', ['as' => 'admin.document.createExcelFromOrder', 'uses' => 'Admin\DocumentsController@createExcelFromOrder']);
        Route::get('document/generate/excel/downloadfile/{file}', ['as' => 'admin.document.generate.excel.downloadfile', 'uses' => 'Admin\DocumentsController@downloadExcelFile']);
        Route::get('document/generate/excelKnigovodstvo', ['as' => 'admin.document.excelKnigovodstvo', 'uses' => 'Admin\DocumentsController@excelKnigovodstvo']);
        Route::post('document/import/excel', ['as' => 'admin.document.importExcel', 'uses' => 'Admin\DocumentsController@importExcel']);
        Route::get('document/multiple/changeDocumentPayment', ['as' => 'admin.document.changeDocumentsPayment', 'uses' => 'Admin\DocumentAjaxController@changePaymentStatusOnDocuments']);
        // kreiraj naracka od servise
        Route::get('document/narachka/new/service/{service_id}', ['as' => 'admin.document.createFromService', 'uses' => 'Admin\DocumentsController@createFromService']);

        Route::get('call-center/{document}', ['as' => 'admin.call-center.document.index', 'uses' => 'Admin\DocumentsController@indexCallCenter']);
        Route::get('call-center/{document}/datatable', ['as' => 'admin.call-center.document.products', 'uses' => 'Admin\DocumentAjaxController@getCallCenterOrders']);

        #Couriers
        Route::get('couriers', ['as' => 'admin.couriers', 'uses' => 'Admin\CourierController@get']);
        Route::get('couriers/datatable', ['as' => 'admin.couriers.getDataTable', 'uses' => 'Admin\CourierController@getDataTable']);
        Route::get('couriers/new', ['as' => 'admin.couriers.new', 'uses' => 'Admin\CourierController@create']);
        Route::get('couriers/{id}', ['as' => 'admin.couriers.edit', 'uses' => 'Admin\CourierController@show']);
        Route::post('couriers', ['as' => 'admin.couriers.store', 'uses' => 'Admin\CourierController@store']);
        Route::get('couriers/delete/{id}', ['as' => 'admin.couriers.delete', 'uses' => 'Admin\CourierController@delete']);

        #Documents ajax
        Route::get('document/{id}/products', ['as' => 'admin.document.products', 'uses' => 'Admin\DocumentAjaxController@getDocumentProducts']);
        Route::get('document/{id}/productsSplit', ['as' => 'admin.document.productsSplit', 'uses' => 'Admin\DocumentAjaxController@getDocumentProductsNarachkaSplit']);

        Route::post('document/changePostaOnDocuments', ['as' => 'admin.document.changePostaOnDocuments', 'uses' => 'Admin\DocumentAjaxController@changePostaOnDocuments']);

        Route::post('document/{id}/products/add', ['as' => 'admin.document.addproducts', 'uses' => 'Admin\DocumentAjaxController@addProductToDocument']);
        Route::get('document/{doc_id}/products/{id}/remove', ['as' => 'admin.document.removeProductFromDocument', 'uses' => 'Admin\DocumentAjaxController@removeProductFromDocument']);
        Route::get('document/{document}/datatable', ['as' => 'admin.document.products', 'uses' => 'Admin\DocumentAjaxController@getDocuments']);
        Route::get('document/{document}/changeDocumentStatus', ['as' => 'admin.document.changeDocumentStatus', 'uses' => 'Admin\DocumentAjaxController@changeDocumentStatus']);
        Route::get('document/{document}/changeDocumentPartner', ['as' => 'admin.document.changeDocumentPartner', 'uses' => 'Admin\DocumentAjaxController@changeDocumentPartner']);
        Route::get('document/note/addNote', ['as' => 'admin.document.note', 'uses' => 'Admin\DocumentAjaxController@addNote']);
        Route::post('document/changeProductName', ['as' => 'admin.document.changeProductName', 'uses' => 'Admin\DocumentAjaxController@changeDocumentProductName']);
        Route::post('document/changeTypeDelivery', ['as' => 'admin.document.changeTypeDelivery', 'uses' => 'Admin\DocumentAjaxController@changeTypeDelivery']);
        Route::post('document/changeTypeOfOrder', ['as' => 'admin.document.changeTypeOfOrder', 'uses' => 'Admin\DocumentAjaxController@changeTypeOfOrder']);
        Route::post('document/changeCourier', ['as' => 'admin.document.changeCourier', 'uses' => 'Admin\DocumentAjaxController@changeCourier']);
        Route::post('document/changeDocumentDate', ['as' => 'admin.document.changeDocumentDate', 'uses' => 'Admin\DocumentAjaxController@changeDocumentDate']);
        Route::post('document/changeWarehouse', ['as' => 'admin.document.changeWarehouse', 'uses' => 'Admin\DocumentAjaxController@changeWarehouse']);
        Route::post('document/changeToWarehouse', ['as' => 'admin.document.changeToWarehouse', 'uses' => 'Admin\DocumentAjaxController@changeToWarehouse']);
        Route::post('document/changeDocumentDeliveredDate', ['as' => 'admin.document.changeDocumentDeliveredDate', 'uses' => 'Admin\DocumentAjaxController@changeDocumentDeliveredDate']);
        Route::post('document/getDocumentsForWarehouse', ['as' => 'admin.document.getDocumentsForWarehouse', 'uses' => 'Admin\DocumentAjaxController@getDocumentsForWarehouse']);
        Route::post('document/changeCurrency', ['as' => 'admin.document.changeCurrency', 'uses' => 'Admin\DocumentAjaxController@changeCurrency']);
        Route::post('document/change_document_field', ['as' => 'admin.document.changeDocumentField', 'uses' => 'Admin\DocumentAjaxController@changeDocumentField']);

        Route::get('document/nabavniceniFix/{id}', ['as' => 'admin.document.nabavniceniFix', 'uses' => 'Admin\DocumentsController@nabavniceniFix']);
        Route::post('document/nabavniceniFix', ['as' => 'admin.document.stroreNabavniceniFix', 'uses' => 'Admin\DocumentsController@storeNabavniceniFix']);

        Route::get('documentOperation/findDiff', ['as' => 'admin.document.findDiff', 'uses' => 'Admin\DocumentsController@najdiRazlikaRelatedDocuments']);
        Route::get('documentOperation/fixDiff', ['as' => 'admin.document.fixDiff', 'uses' => 'Admin\DocumentsController@fixRazlikaRelatedDocuments']);

        Route::get('documentOperation/fixProductQtyView', ['as' => 'admin.document.fixProductQtyView', 'uses' => 'Admin\DocumentsController@fixProductQtyView']);


        Route::get('reports/fiskalna/promet-vo-period', ['as' => 'admin.report.fiskalna.prometVoPeriod', 'uses' => 'Admin\ReportController@getFiskalnaPrometVoPeriodReport']);
        Route::get('reports/fiskalna/promet-vo-period-datatable', ['as' => 'admin.report.fiskalna.prometVoPeriodDatatable', 'uses' => 'Admin\ReportController@getFiskalnaPrometVoPeriodReportDatatable']);


        # KONTAKT - tiket
        Route::get('/contact-prijavi-problem', ['as' => 'admin.contact', 'uses' => 'Admin\ContactController@getIndex']);
        Route::post('/contact-prijavi-problem', ['as' => 'admin.contant.send', 'uses' => 'Admin\ContactController@mailToAdmin']);


        # PRODAZBA

        # Prodazba po artikli
        Route::get('reports/prodazba/artikli', ['as' => 'admin.report.prodazba.artikli', 'uses' => 'Admin\Reports\ProdazbaController@prodazbaPoArtikli']);
        Route::post('reports/prodazba/artikli-datatable', ['as' => 'admin.report.prodazba.artikliDatatable', 'uses' => 'Admin\Reports\ProdazbaController@prodazbaPoArtikliDatatable']);

        Route::get('product/variationSum', ['as' => 'admin.document.countVariations', 'uses' => 'Admin\DocumentAjaxController@countVariationsInWarehouse']);
        Route::get('product/warehouseCount', ['as' => 'admin.document.warehouseCount', 'uses' => 'Admin\DocumentAjaxController@getTotalProductInWarehouse']);
        Route::get('product/warehouseCountDatatable', ['as' => 'admin.document.warehouseCountDatatable', 'uses' => 'Admin\DocumentAjaxController@getTotalProductInWarehouseDatatable']);

        Route::get('product/lagerLista', ['as' => 'admin.document.lagerLista', 'uses' => 'Admin\DocumentAjaxController@lagerLista']);
        Route::get('/mediaplan/{name}', ['as' => 'admin.document.mediaplanshow', 'uses' => 'Admin\DocumentAjaxController@showMediaPlan']);
        Route::post('/mediaplan/{name}', ['as' => 'admin.document.mediaplanstore', 'uses' => 'Admin\DocumentAjaxController@storeMediaPlan']);

        Route::get('employee', ['as' => 'admin.employee', 'uses' => 'Admin\EmployeeController@index']);
        Route::get('employee/getEmployee', ['as' => 'admin.employee.getEmployee', 'uses' => 'Admin\EmployeeController@getEmployee']);
        Route::get('employee/new', ['as' => 'admin.employee.new', 'uses' => 'Admin\EmployeeController@create']);
        Route::get('employee/delete/{id}', ['as' => 'admin.employee.delete', 'uses' => 'Admin\EmployeeController@delete']);
        Route::get('employee/show/{id}', ['as' => 'admin.employee.show', 'uses' => 'Admin\EmployeeController@show']);
        Route::post('employee/store', ['as' => 'admin.employee.store', 'uses' => 'Admin\EmployeeController@store']);


        Route::get('service', ['as' => 'admin.services', 'uses' => 'Admin\ServiceController@index']);
        Route::get('service/new', ['as' => 'admin.services.new', 'uses' => 'Admin\ServiceController@create']);
        Route::get('service/show/{service_id}', ['as' => 'admin.services.show', 'uses' => 'Admin\ServiceController@show']);
        Route::post('service/store', ['as' => 'admin.services.store', 'uses' => 'Admin\ServiceController@store']);
        Route::get('service/datatable', ['as' => 'admin.services.datatable', 'uses' => 'Admin\ServiceController@servicesDatatable']);
        Route::get('service/products/{type}', ['as' => 'admin.service.products', 'uses' => 'Admin\ServiceController@getDocumentProducts']);
        Route::get('service/pdf/{id}', ['as' => 'admin.service.pdf', 'uses' => 'Admin\ServiceController@createPdf']);
        Route::get('service/updateServiceNumber', ['as' => 'admin.service.updateServiceNumber', 'uses' => 'Admin\ServiceController@updateServiceNumber']);
        Route::get('service/updatePhoneNumber', ['as' => 'admin.service.updatePhoneNumber', 'uses' => 'Admin\ServiceController@updatePhoneNumber']);

        Route::post('generate/{type}', ['as' => 'admin.generate.fromExisting', 'uses' => 'Admin\DocumentAjaxController@createDocumentFromExisting']);
        Route::post('generate/docs/multiple', ['as' => 'admin.generate.fromExistingDocs', 'uses' => 'Admin\DocumentAjaxController@createDocumentsFromExistingDocumentsBunch']);

        Route::get('roles', ['as' => 'admin.roles', 'uses' => 'Admin\RolesController@index']);
        Route::get('roles/datatable', ['as' => 'admin.roles.getRoles', 'uses' => 'Admin\RolesController@datatableRoles']);
        Route::get('roles/show/{id}', ['as' => 'admin.roles.show', 'uses' => 'Admin\RolesController@show']);
        Route::get('roles/create', ['as' => 'admin.roles.create', 'uses' => 'Admin\RolesController@create']);
        Route::post('roles/store', ['as' => 'admin.roles.store', 'uses' => 'Admin\RolesController@store']);
        # Settings
        Route::get('settings', ['as' => 'admin.settings', 'uses' => 'Admin\SettingsController@index']);
        Route::post('settings/store', ['as' => 'admin.settings.store', 'uses' => 'Admin\SettingsController@store']);
        # Settings
        Route::get('adminSettings', ['as' => 'admin.adminSettings', 'uses' => 'Admin\AdminSettingsController@index']);
        Route::post('adminSettings/store', ['as' => 'admin.adminSettings.store', 'uses' => 'Admin\AdminSettingsController@store']);
        Route::post('adminSettings/addNewCurrencies', ['as' => 'admin.adminSettings.addNewCurrencies', 'uses' => 'Admin\AdminSettingsController@addNewCurrencies']);
        Route::post('adminSettings/addNewPayments', ['as' => 'admin.adminSettings.addNewPayments', 'uses' => 'Admin\AdminSettingsController@addNewPayments']);
        Route::post('adminSettings/addNewPosti', ['as' => 'admin.adminSettings.addNewPosti', 'uses' => 'Admin\AdminSettingsController@addNewPosti']);
        Route::post('adminSettings/addNewDelivery', ['as' => 'admin.adminSettings.addNewDelivery', 'uses' => 'Admin\AdminSettingsController@addNewDelivery']);
        Route::post('adminSettings/addExcelColumns', ['as' => 'admin.adminSettings.addExcelColumns', 'uses' => 'Admin\AdminSettingsController@addExcelColumns']);
        Route::post('adminSettings/deleteField', ['as' => 'admin.adminSettings.deleteField', 'uses' => 'Admin\AdminSettingsController@deleteField']);
        

        Route::get('report/salesbyproduct', ['as' => 'admin.report.salesbyproductView', 'uses' => 'Admin\ReportController@salesByProducts']);
        Route::post('report/salesbyproduct/datatable', ['as' => 'admin.report.salesbyproduct', 'uses' => 'Admin\ReportController@getsalesByProductsDatatable']);

        Route::get('report/ordersStatByDates', ['as' => 'admin.report.ordersStatByDates', 'uses' => 'Admin\ReportController@ordersStatByDates']);
        Route::get('report/ordersStatByDates/datatable', ['as' => 'admin.report.ordersStatByDatesDatatable', 'uses' => 'Admin\ReportController@ordersReport']);

        if (config('app.client') == 'naturatherapyshop_al'
            || config('app.client') == 'naturatherapyshop' 
            || config('app.client') == 'naturatherapyshop_alb') {
            Route::get('report/operatorStatistics', ['as' => 'admin.report.operatorStatistics', 'uses' => 'Admin\ReportController@operatorStatistics']);
            Route::get('report/operatorStatistics/datatable', ['as' => 'admin.report.operatorStatisticsDatatable', 'uses' => 'Admin\ReportController@operatorStatisticsDatatable']);
        }
    });
});





# API
Route::group(['prefix' => 'api/v1/'], function () { //'middleware' => 'authApi' dodaj otposle

    Route::post('login', ['uses' => 'Api\AuthenticationController@postLogin']);
    Route::post('register', ['uses' => 'Api\AuthenticationController@postRegister']);
    Route::get('category', ['uses' => 'Api\CategoryController@getAll']);
    Route::get('category/{id}', ['uses' => 'Api\CategoryController@getCategory']);
    Route::get('category/{id}/products', ['uses' => 'Api\CategoryController@getCategoryProducts']);
    Route::get('banner', ['uses' => 'Api\BannerController@getAll']);
    Route::get('banner/{category}', ['uses' => 'Api\BannerController@getByCategory']);
    Route::get('product', ['uses' => 'Api\ProductController@getHomeProducts']);
    Route::get('product/list', ['uses' => 'Api\ProductController@getProductsByIds']);
    Route::get('product/{id}', ['uses' => 'Api\ProductController@getProduct']);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/wishlist', ['as' => 'api.wishlist', 'uses' => 'Api\ProductController@getWishlist']);
        Route::get('/wishlist/store/{id}', ['as' => 'api.wishlist.store', 'uses' => 'Api\ProductController@putWishlistItem']);
        Route::post('/wishlist/delete', ['as' => 'api.wishlist.delete', 'uses' => 'Api\ProductController@deleteWishlistItem']);
    });

    Route::post('checkout/generate', ['as' => 'api.checkout', 'uses' => 'Api\CheckoutController@generateOrder'])->middleware(['trim']);
});
