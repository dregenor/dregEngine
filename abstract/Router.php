<?php
 require_once('abstract/Request.php');
 require_once('abstract/Response.php');
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 21:14
 * To change this template use File | Settings | File Templates.
 */


//TODO: ADD methods routing PUT POST GET DEL

class Router
{
    private $routes = array();

    function addRoute($route='/',$controller='index',$action='index'){
        $this->routes[$route]['controller']=$controller;
        $this->routes[$route]['action']=$action;
    }


    function route($uri,$get,$post){
        $args = array();
        if (array_key_exists($uri,$this->routes))
        {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];
        } else {
            $args = explode('/',$uri);
            list($controller,$action) = array_splice($args,0,2);
        }

        $classfile = $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$controller.'.php';
        if (file_exists($classfile)){
            require_once($_SERVER['DOCUMENT_ROOT'].'/controllers/'.$controller.'.php');
            if (class_exists($controller)){
                $exemplar = new $controller;
                $method= 'method_'.$action;
                if (method_exists($exemplar,$method)){
                    $request = new Request($args,$get,$post);
                    $response = new Response(''.$controller.'/'.$action.'.tpl');

                    $exemplar->$method($request,$response);
                } else {
                    Response::return404();
                }
            } else {
                Response::return404();
            }
        } else {
            Response::return404();
        }
    }

}
