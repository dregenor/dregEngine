<?php
$strt = microtime(true);
require_once('configs/WinnieConfig.php');
require_once('lib/ErrorsCollections.php');
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 22:10
 * To change this template use File | Settings | File Templates.
 */
require_once('abstract/Router.php');



$router = new Router();

//default routes
$router->addRoute('');
$router->addRoute('index');
$router->addRoute('index/rus','index');
$router->addRoute('index/eng');
$router->route();

$diff = microtime(true) - $strt;
if ($diff > 1){
    error_log($diff);
}
