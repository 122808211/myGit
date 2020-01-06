<?php

namespace app\api\model;

use think\Model;

class Drug extends Model
{
    public static function getDiseaseDrug($id){

    }
    public static function addDrugCart($data){
        $drug = new Drug();
        $drug->save($data);
        $id = $drug->id;
        $row = $drug->where("id",$id)->find();
        return $row;
    }
}
