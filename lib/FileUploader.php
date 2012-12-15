<?php
/**
 * Created by JetBrains PhpStorm.
 * User: drege_000
 * Date: 06.10.12
 * Time: 22:30
 * To change this template use File | Settings | File Templates.
 */
class FileUploader
{



    public function takeImage(){
        $responce = array('errCode' => $_FILES['f']['error']);

        switch ($_FILES['f']['error']){
            case UPLOAD_ERR_INI_SIZE:
                $responce['errMsg'] =  'Размер принятого файла превысил максимально допустимый размер,
                                        который задан директивой upload_max_filesize
                                        конфигурационного файла php.ini';
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $responce['errMsg'] =  'Размер загружаемого файла превысил значение MAX_FILE_SIZE,
                                        указанное в HTML-форме.';
                break;
            case UPLOAD_ERR_PARTIAL:
                $responce['errMsg'] =  'Загружаемый файл был получен только частично.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $responce['errMsg'] =  'Файл не был загружен.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $responce['errMsg'] =  'Отсутствует временная папка.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $responce['errMsg'] =  'Не удалось записать файл на диск.';
                break;
            case UPLOAD_ERR_EXTENSION:
                $responce['errMsg'] =  'PHP-расширение остановило загрузку файла.';
                break;
        }

        $hash = $this->genPrimaryHash($_FILES['f']['tmp_name']);

    }

    private function genPrimaryHash($fname){
        return md5($fname.microtime());
    }
}
