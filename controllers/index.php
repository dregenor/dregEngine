<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 22:12
 * To change this template use File | Settings | File Templates.
 */

require_once('abstract/Controller.php');
require_once('abstract/Response.php');
require_once('abstract/Request.php');

class index extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     */

    function method_index(Request $request, Response $response){
        $response->set('test',$request->any('test'));
        $response->set('test2',$request->args('0'));

        $table = array(1,2,3,4,5,6,7,8,9,10);
        $response->set('table',$table);

        $response->returnOk();
    }
}
