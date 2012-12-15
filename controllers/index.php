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
require_once('models/VoteModelDAO.php');

class index extends Controller
{
    /**
     * @param Request $request
     * @param Response $response
     */

    function method_index(Request $request, Response $response){
        $response->returnOk();
    }

    function method_GETindex(Request $request, Response $response){
        $dao = new VoteModelDAO();
        $model = $dao->getModel();

        if (isset($_COOKIE['medved'])){
            $response->set('medved',$_COOKIE['medved']);
        }
        $response->set('left',$model->getVote('left'));
        $response->set('right',$model->getVote('right'));

        $response->returnOk();
    }

    function method_GETvote(Request $request, Response $response){
        $medved = $request->args(0);
        $dao = new VoteModelDAO();
        if (
             !isset($_COOKIE['medved']) &&
             in_array( $medved, array( 'left', 'right' ) )
            ){
            setcookie('medved',$medved,time()+3600,'/','.winnie-vs-winnie.ru');
            $model = $dao->getModel();
            $model->setVote($medved);
            $dao->postModel($model);
        }

        $model = $dao->getModel();
        $votes = array(
            'left' => $model->getVote('left'),
            'right'=> $model->getVote('right')
        );

        $response->set('votes',$votes);
        $response->set('vote','rus');
        $response->returnJSON();
    }

    function method_GETvinnieeng(Request $request, Response $response){
        $response->returnOk();
    }


    function method_GETengwinnie(Request $request, Response $response){
        $response->set('isAjax', $request->isAjax());
        $response->returnOk();
    }

    function method_GETruswinnie(Request $request, Response $response){
        $response->set('isAjax', $request->isAjax());
        $response->returnOk();
    }
}
