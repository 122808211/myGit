<?php

namespace app\api\model;

use think\Model;

class Medchufang extends Model
{
    public static function addInfo($data){
        $med =new Medchufang();
        $med->save($data);
    }
    public static function getInfo($id){
        $row = Medchufang::where("id",$id)->find();
        return $row;
    }
}
