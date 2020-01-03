<?php

namespace app\http\middleware;

use think\Validate;

class CheckToken
{
    public function handle($request, \Closure $next)
    {
        $data["token"] = $request->param('token');
        $validate = new Validate();
        $validate->rule([
            "token"=>"request",
        ]);
        $validate->message( [
            'token' => 'token参数缺失',
        ]);
        //没传
        if(!$validate->check($data)){
            return json(["error_code"=>10001,"msg"=>$validate->getError()],400);
        }
        //传了,不对
        if(!cache($data["token"])){
            return json(["error_code"=>10001,"msg"=>"token参数错误"],402);
        }
        return $next($request);
    }
}
