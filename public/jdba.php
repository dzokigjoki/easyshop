<?php

if(isset($_GET['pravi_pull']) && $_GET['pravi_pull'] == 'moze')
{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $output = '';
    echo "<pre>";

    exec("cd .. && git pull 2>&1 && php artisan cache:clear && php artisan clear-compiled && composer dump-autoload", $output);
    //exec("git pull 2>&1", $output);

    print_r($output);
    echo "</pre>";
}

?>