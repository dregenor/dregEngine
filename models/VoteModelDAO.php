<?php

require_once('abstract/ModelDAO.php');
require_once('models/VoteModel.php');

/**
 * Created by JetBrains PhpStorm.
 * User: drege_000
 * Date: 07.10.12
 * Time: 21:17
 * To change this template use File | Settings | File Templates.
 */
class VoteModelDAO
{
    /**
     * @var PDO
     */
    private $dbh;
    function __construct(){
       //подключение к базе надо бы глобализовать
            try {
                $this->dbh = new PDO(
                    WinnieConfig::get('dsn'),
                    WinnieConfig::get('user'),
                    WinnieConfig::get('password')
                );
            } catch (PDOException $e) {
                ErrorsCollections::Add('Подключение не удалось: ' . $e->getMessage());
                echo ErrorsCollections::out();
                die;
            }
    }

    /**
     * @return VoteModel
     */
    function getModel(){
        $sql = 'Select * from votes limit 1';
        /**
         * @var PDOStatement $statment
         */
        $statment = $this->dbh->query($sql);
        $row = $statment->fetch(PDO::FETCH_ASSOC);
        $model = new VoteModel($row);
        return $model;
    }

    /**
     * @param VoteModel $model
     */
    function postModel($model){
        $field = $model->getPost();
        $query = "update votes
                  set `$field` = `$field` + 1
                  where id = 1 ";
        $rslt = $this->dbh->exec($query);
        return $rslt;
    }
}
