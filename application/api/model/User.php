<?php

namespace app\api\model;

use think\Model;

class User extends Model
{
    public static function getInfo($data){
        $user = new User();
        $password = md5("yy_".md5($data["password"]));
        $info = $user->where("username",$data["username"])->where("password",$password)->find();
        return $info;
    }
}
