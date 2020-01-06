<?php

namespace app\api\model;

use think\Model;

class Section extends Model
{
    public static function getSection($arr){
        $row = Section::where(["id"=>$arr])->column("sename","id");
        return $row;
    }
}
