<?php

namespace app\api\model;

use think\Model;

class Know extends Model
{
    protected $pk = 'id';
    public static function getKnow(){
        $user = Know::get(1);
        return $user;
    }
}
