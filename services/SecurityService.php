<?php

namespace app\services;


class SecurityService {
    public static function checkUserCanAccess($actioname, $userid) {
        return true;
    }
    
    public static function checkCurrentUserCanAccess($actioname) {
        return self::checkUserCanAccess($actioname);
    }
    
    public static function checkUserCanAccessGeojson($userid) {
        return true;
    }
    
    public static function checkCurrentUserCanAccessGeojson() {
        return self::checkUserCanAccessGeojson(\Yii::$app->user->id);
    }
    
    public static function checkCurrentUserCanAccessList() {
        return true;
    }
}