<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 23:14
 * To change this template use File | Settings | File Templates.
 */

require_once ('smarty/libs/Smarty.class.php');

class View
{
    private $template;

    /**
     * @var Smarty smarty
     */
    private $smarty;

    function __construct($template){
        $this->template = $template;
    }

    function prepare(){
        $this->smarty = new Smarty;
        $this->smarty->caching = true;
        $this->smarty->setTemplateDir('templates');
    }

    function apply($data){
        $this->smarty->assign($data);
        return $this->smarty->fetch($this->template);
    }

    function render($data){
        //и собственно вот тут мы будем использовать шаблонизатор
        $this->prepare();

        return $this->apply($data);
    }

}
