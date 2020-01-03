<?php

namespace app\api\model;

use think\Model;

class User extends Model
{
    public static function getInfo($data){
        $user = new User();
        $info = $user->where("uname",$data["uname"])->where("pass",$data["pass"])->find();
        return $info;
    }
}
