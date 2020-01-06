<?php

namespace app\api\model;

use think\Model;

class Disease extends Model
{
    public static function getDisease(){
        $row = Disease::column("dsname,seid","id");
        return $row;
    }
    public static function getSeid(){
        $arr = Disease::group("seid")->column("seid");
        return $arr;
    }
}
