<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 22:10
 * To change this template use File | Settings | File Templates.
 */
require_once('abstract/Router.php');

$router = new Router();
$uri = str_replace('?'.$_SERVER['QUERY_STRING'],'',$_SERVER['REQUEST_URI']);
$uri = ltrim($uri,'/');

$router->addRoute('');
$router->addRoute('index');

$router->route($uri,$_GET,$_POST);
header('_debug:'.json_encode($uri));