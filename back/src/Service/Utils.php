<?php
namespace App\Service;
class Utils{

    public function cleanInput($value){
        return htmlspecialchars(strip_tags(trim($value)));
    }

    /**
    * @param string $value
    * @return null|string
    */
    public static function cleanInputStatic(string $value):?string{
        return htmlspecialchars(strip_tags(trim($value)));
    }

}