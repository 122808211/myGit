<?php

namespace app\api\model;

use think\Model;

class DrugDetail extends Model
{
    public static function getDrugDetail($id){
        $row = DrugDetail::where("drid",$id)->find();
        return $row;
    }
}
