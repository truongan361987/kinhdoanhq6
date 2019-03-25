<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/6/2016
 * Time: 9:17 PM
 */

namespace app\services;

use DOMStringExtend;
use yii\helpers\VarDumper;

class UtilityService {

    public static function alert($content){
        \Yii::$app->session->addFlash($content,true);
        return true;
    }

    public static  function paramValidate($id){
        if (!isset($id) || $id == null ||is_numeric($id) == false) {
            return false;
        } else {
            return true;
        }

    }

}