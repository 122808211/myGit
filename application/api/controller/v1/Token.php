<?php

namespace app\api\controller\v1;

use app\api\model\User;
use think\Controller;
use think\Request;
use think\Validate;

class Token extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function getToken()
    {
        //获取参数
        $data = $this->request->get();
        $validate = new Validate();
        $validate->rule([
            "username" =>"require",
            "password"=>"require"
        ]);
        if(!$validate->check($data)){
            return json(["error_code"=>"10001","msg"=>$validate->getError()],402);
        }
        $userInfo = User::getInfo($data);
        if($userInfo){
            $token = md5(uniqid(time()));
            cache($token,$userInfo,7200);
            return json(["error_code"=>"0","data"=>["token"=>$token]],200);
        }else{
            return json(["error_code"=>"10004","msg"=>"用户名密码错误"],400);
        }
    }

}
