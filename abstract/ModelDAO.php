<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 04.10.12
 * Time: 2:11
 * To change this template use File | Settings | File Templates.
 */
abstract class ModelDAO
{
    abstract function loadModel();
    abstract function saveModel(Model $model);
}
