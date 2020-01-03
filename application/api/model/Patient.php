<?php

namespace app\api\model;

use think\Model;

class Patient extends Model
{
    protected $pk = 'id';
    public static function getPatient($id){
        $data = Patient::where('u_id',$id)->order('id desc')->select();
        return $data;
    }
    public static function addPatient($data){
        $pa = new Patient();
        $pa->save($data);
        $id = $pa->id;
        $row = $pa->where("id",$id)->find();
        return $row;
    }
}
