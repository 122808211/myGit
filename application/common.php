<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

function gettree($arr,$row)
{
//    $tree = array();
//    foreach ($arr as $val) {
//        if (isset($arr[$val->pid])){
//            $arr[$val->pid]->son[] = &$arr[$val->$id]; //非顶级分类
//        } else {
//            $tree[] = &$arr[$val->$id];
//        }
//    }
//    return $tree;
    $tree = array();
    foreach ($arr as $k=>$v){
        $tree[$k]["section"] = $arr[$k];
        foreach ($row as $r){
            if ($r["seid"]==$k){
                unset($r["seid"]);
                $tree[$k]["disease"][] = $r;
            }
        }
    }
    return $tree;
}
