<?php

namespace app\api\controller\v1;

use think\Controller;
use think\Request;
use think\Validate;
use app\api\model\Prescribe as pr;

class Prescribe extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->param();
        $validate = new Validate();
        $validate->rule([
            "dsname"=>"require",
            "liver"=>"require|between:1,3|number",
            "kidney"=>"require|between:1,3|number",
            "allergy"=>"require|between:1,3|number",
            "pregnancy"=>"require|between:1,4|number"
        ]);
        $validate->message([
            'liver.number' => 'liver值必须是整数',
            'kidney.number' => 'kidney值必须是整数',
            'allergy.number' => 'allergy值必须是整数',
            'pregnancy.number' => 'pregnancy值必须是整数',
        ]);
        if($data["allergy"]==2){
            if(empty($data["all_details"])){
                return json(["error_code"=>10002,"msg"=>"all_details没有值"],400);
            }
        }
        if (!$validate->check($data)) {
            return json(["error_code"=>10002,"msg"=>$validate->getError()],400);
        }
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('chufang_proof');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->validate(['size'=>1567800,'ext'=>'jpg,png,gif'])->move( '../uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $data["chufang_proof"] = "uploads/".$info->getSaveName();
        }else{
            // 上传失败获取错误信息
            return json(["error_code"=>"10009","msg"=>$file->getError()],400);
        }
        $row = pr::insertInfo($data);
        return json(["error_code"=>"0","data"=>$row],200);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {

    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
        $data = $request->param();
        $validate = new Validate();
        $validate->rule([
            "id"=>"require",
            "arid"=>"require"
        ]);
        if (!$validate->check($data)) {
            return json(["error_code"=>10002,"msg"=>$validate->getError()],400);
        }
        $row = pr::updateInfo($data);
        return json(["error_code"=>0,"date"=>$row],200);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
