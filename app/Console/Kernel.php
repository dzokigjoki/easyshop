<?php

namespace EasyShop\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use EasyShop\Models\Settings;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\CreateUser::class,
        Commands\ExportEmails::class,
        Commands\GetProductsAPI::class,
        Commands\GetCourierStatus::class,
        Commands\CheckProductsDiscount::class,
        Commands\GetFalconCourierStatus::class,
        Commands\FixProductsInRelatedDocuments::class,
        Commands\FillFinalPriceRetailField::class,
        Commands\updateProductOrderField::class,
        Commands\DeleteExpiredDiscounts::class,
        Commands\enterCustomerName::class,
        Commands\MakeSoldOutCategoriesHerline::class,
        Commands\FillLocationFieldKopkompani::class,
        Commands\PostaxiTest::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        switch (config( 'app.client')) {
            case Settings::CLIENT_NATURATHERAPYSHOP_AL:
            case Settings::CLIENT_NATURATHERAPYSHOP_ALB:
                $schedule->command('expired-discounts:delete')->hourly();
                break;
            case Settings::CLIENT_HERLINE:
                $schedule->command('expired-discounts:delete')->hourly();
                $schedule->command('documents:get-falcon-courier-status')->dailyAt("05:00");
                break;
            case Settings::CLIENT_NATURATHERAPYSHOP:
                $schedule->command('expired-discounts:delete')->hourly();
                $schedule->command('documents:get-courier-status')->dailyAt("05:00");
                break;
        }
    }
}
