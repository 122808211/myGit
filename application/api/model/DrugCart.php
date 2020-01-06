<?php

namespace app\api\model;

use think\Model;

class DrugCart extends Model
{
    public static function addCart($data){
        $cart = new DrugCart();
        $cart->save($data);
        $id = $cart->id;
        $row = $cart->where("id",$id)->find();
        return $row;
    }
    public static function getInfo($id){
        return DrugCart::with(["drug","drugDetail"])->select();
    }
    public static function getInfoDetail($id){
        return DrugCart::where("id",$id)->with(["drug","drugDetail","medchufang"])->select();
    }
    public function drug(){
        return $this->hasOne("Drug","id","drid");
    }
    public function drugDetail(){
        return $this->hasOne("DrugDetail","drid","drid");
    }
    public function medchufang(){
        return $this->hasOne("Medchufang","cart_id","id");
    }
}
