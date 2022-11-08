<?php

$client = 'easyshop';

// if(isset($_SERVER['HTTP_HOST'])) {
//     $domain = $_SERVER['HTTP_HOST'];
// } else {
//     $domain = '';
// }

//CLIENT mora da bide prazno vo .env za globalmarket i topprodukti za da go vlece od tuka
// switch ($domain) {

//     // Global Store
//     case "global-store.co":
//         $client = 'globalstore_mk';
//         break;
//     case "bg.global-store.co":
//         $client = 'globalstore_bg';
//         break;
//     case "ro.global-store.co":
//         $client = 'globalstore_ro';
//         break;

//     // Top Produkti
//     case "topprodukti.mk":
//         $client = 'topprodukti_mk';
//         break;
//     case "bg.smart-topstore.com":
//         $client = 'topprodukti_bg';
//         break;
//     case "rs.smart-topstore.com":
//         $client = 'topprodukti_rs';
//         break;
//     case "hu.smart-topstore.com":
//         $client = 'topprodukti_hu';
//         break;
//     case "hr.smart-topstore.com":
//         $client = 'topprodukti_hr';
//         break;
//     case "pl.smart-topstore.com":
//         $client = 'topprodukti_pl';
//         break;
//     case "sk.smart-topstore.com":
//         $client = 'topprodukti_sk';
//         break;
//     case "cz.smart-topstore.com":
//         $client = 'topprodukti_cz';
//         break;
//     case "si.smart-topstore.com":
//         $client = 'topprodukti_si';
//         break;
//     case "ro.smart-topstore.com":
//         $client = 'topprodukti_ro';
//         break;
// }

return [

    /*
   |--------------------------------------------------------------------------
   | Client Environment
   |--------------------------------------------------------------------------
   |
   | This value determines the client your application is currently
   | running.
   |
   */

    'client' => env('CLIENT', 'easyshop'),

    /*
   |--------------------------------------------------------------------------
   | Client Environment
   |--------------------------------------------------------------------------
   |
   | This value determines the client your application is currently
   | running.
   |
   */

    'theme' => env('THEME', 'easyshop'),

    // Domain where the image is loaded from
    'imageDomain' => env('IMAGE_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => 'http://localhost',




    'assets' => env('ASSETS_URL', '//assets-easyshop.generadevelopment.com'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'Europe/Skopje',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'mk',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'mk',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'daily'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,
        Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
        \Torann\GeoIP\GeoIPServiceProvider::class,
        Spatie\Newsletter\NewsletterServiceProvider::class,
        SimpleSoftwareIO\QrCode\QrCodeServiceProvider::class,
        // Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class,

        /*
         * Application Service Providers...
         */
        EasyShop\Providers\AppServiceProvider::class,
        EasyShop\Providers\AuthServiceProvider::class,
        EasyShop\Providers\EventServiceProvider::class,
        EasyShop\Providers\RouteServiceProvider::class,
        Yajra\Datatables\DatatablesServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class, 
        Collective\Html\HtmlServiceProvider::class,
        EasyShop\Providers\ComposerServiceProvider::class,

        EasyShop\Providers\HelpersServiceProvider::class,
        Barryvdh\DomPDF\ServiceProvider::class,
        Maatwebsite\Excel\ExcelServiceProvider::class,
        Zizaco\Entrust\EntrustServiceProvider::class,
        Jenssegers\Agent\AgentServiceProvider::class,
        Ixudra\Curl\CurlServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App'       => Illuminate\Support\Facades\App::class,
        'Artisan'   => Illuminate\Support\Facades\Artisan::class,
        'Auth'      => Illuminate\Support\Facades\Auth::class,
        'Blade'     => Illuminate\Support\Facades\Blade::class,
        'Cache'     => Illuminate\Support\Facades\Cache::class,
        'Config'    => Illuminate\Support\Facades\Config::class,
        'Cookie'    => Illuminate\Support\Facades\Cookie::class,
        'Crypt'     => Illuminate\Support\Facades\Crypt::class,
        'DB'        => Illuminate\Support\Facades\DB::class,
        'Eloquent'  => Illuminate\Database\Eloquent\Model::class,
        'Event'     => Illuminate\Support\Facades\Event::class,
        'File'      => Illuminate\Support\Facades\File::class,
        'Gate'      => Illuminate\Support\Facades\Gate::class,
        'Hash'      => Illuminate\Support\Facades\Hash::class,
        'Lang'      => Illuminate\Support\Facades\Lang::class,
        'Log'       => Illuminate\Support\Facades\Log::class,
        'Mail'      => Illuminate\Support\Facades\Mail::class,
        'Password'  => Illuminate\Support\Facades\Password::class,
        'Queue'     => Illuminate\Support\Facades\Queue::class,
        'Redirect'  => Illuminate\Support\Facades\Redirect::class,
        'Redis'     => Illuminate\Support\Facades\Redis::class,
        'Request'   => Illuminate\Support\Facades\Request::class,
        'Response'  => Illuminate\Support\Facades\Response::class,
        'Route'     => Illuminate\Support\Facades\Route::class,
        'Schema'    => Illuminate\Support\Facades\Schema::class,
        'Session'   => Illuminate\Support\Facades\Session::class,
        'Storage'   => Illuminate\Support\Facades\Storage::class,
        'URL'       => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View'      => Illuminate\Support\Facades\View::class,
        'Image'     => Intervention\Image\Facades\Image::class,


        'Datatables'     => Yajra\Datatables\Facades\Datatables::class,
        'Form'      => 'Collective\Html\FormFacade',
        'HTML'      => 'Collective\Html\HtmlFacade',
        'PDF'       => 'Barryvdh\DomPDF\Facade',
        'Agent'     => Jenssegers\Agent\Facades\Agent::class,

        // Helpers
        'ImagesHelper' => EasyShop\Helpers\ImagesHelperFacade::class,
        'SocialHelper' => EasyShop\Helpers\SocialHelperFacade::class,
        'BannerHelper' => EasyShop\Helpers\BannerHelperFacade::class,
        'ArticleHelper' => EasyShop\Helpers\ArticleHelperFacade::class,
        'Excel'     => 'Maatwebsite\Excel\Facades\Excel',
        'Entrust'   => Zizaco\Entrust\EntrustFacade::class,
        'Curl'          => Ixudra\Curl\Facades\Curl::class,
        'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
        'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,
        'GeoIP' => \Torann\GeoIP\Facades\GeoIP::class,
        'Newsletter' => Spatie\Newsletter\NewsletterFacade::class,
        'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class
    ],

];
