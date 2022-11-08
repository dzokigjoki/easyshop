#!/bin/bash

echo '************************************';
echo '         Assets';
echo '************************************';
#cd /var/www/assets.smartsoft.mk/web/;
#git pull;
echo 'Го рипаме сега за сега';
echo '************************************';


echo '************************************';
echo '         Tehnopolis MK';
echo '************************************';
cd /var/www/tehnopolis.mk/web/mk/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         iButik';
echo '************************************';
cd /var/www/ibutik.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Klikni Kupi MK';
echo '************************************';
cd /var/www/kliknikupi.mk/web/mk/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Mobi In';
echo '************************************';
cd /var/www/mobi-in.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Moj Outlet';
echo '************************************';
cd /var/www/mojoutlet.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Pekabesko Shop';
echo '************************************';
cd /var/www/pekabesko/web/shop;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Pekabesko Site';
echo '************************************';
cd /var/www/pekabesko/web/site/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Pelet Centar';
echo '************************************';
cd /var/www/peletcentar.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Perla';
echo '************************************';
cd /var/www/perla.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Top Market';
echo '************************************';
cd /var/www/topmarket.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         ExpressBook';
echo '************************************';
cd /var/www/expressbook.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Dori Kele';
echo '************************************';
cd /var/www/dorikele.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Dr Browns';
echo '************************************';
cd /var/www/drbrowns.mk/web/;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';


echo '************************************';
echo '         Topprodukti MK';
echo '************************************';
cd /var/www/topprodukti/web/mk;
git pull;
composer dump-autoload;
composer install;
php artisan cache:clear;
php artisan config:clear;
php artisan migrate --force;
echo '************************************';