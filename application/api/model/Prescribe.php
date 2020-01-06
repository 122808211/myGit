<?php

namespace app\api\model;

use think\Model;

class Prescribe extends Model
{
    public static function insertInfo($data){
        $prescribe = new Prescribe();
        $prescribe->save($data);
        $id = $prescribe->id;
        $row = $prescribe->where("id",$id)->find();
        return $row;
    }
    public static function updateInfo($data){
        $id = $data["id"];
        $arid = $data["arid"];
        Prescribe::where("id",$id)->update(["arid"=>$arid]);
        $row = Prescribe::where("id",$id)->find();
        return $row;
    }
}
