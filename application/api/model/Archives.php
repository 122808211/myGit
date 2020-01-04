<?php

namespace app\api\model;

use think\Model;

class Archives extends Model
{
    protected $pk = 'id';
    public static function getArchives($id){
        $info = "idcard,sex,date,isdefault";
        $data = Archives::where('mid',$id)->order('id desc')->column("arname",$info);
        return $data;
    }
    public static function addArchives($data){
        $pa = new Archives();
        $pa->save($data);
        $id = $pa->id;
        $row = $pa->where("id",$id)->find();
        return $row;
    }
}
