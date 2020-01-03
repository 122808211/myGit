<?php

namespace app\api\controller\v1;

use app\api\model\Patient as pa;
use think\Controller;
use think\facade\Session;
use think\Request;
use think\Validate;

class Patient extends Controller
{
    /**
     * 查询患者信息
     *
     * @return \think\Response
     */
    public function index()
    {
        $id = $this->request->param("id");
        if($id){
            $row["error_code"] = 0;
            $row["data"] = pa::getPatient($id);
        }else{
            $row["error"] = "10001";
            $row["msg"] = "参数错误";
        }
        return json($row,200);
    }

    /**
     * 新增患者信息
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->param();
        unset($data["/v1/patient"]);
        unset($data["version"]);
        //验证请求参数是否正确
        $validate = new Validate();
        $validate->rule([
           "name"=>"require",
           "idcard"=>"require",
           "sex"=>"require|between:0,1|number",
           "date"=>"require",
           "site"=>"require",
           "patient"=>"require|between:0,1|number",
           "token"=>"require",
        ]);
        $validate->message( [
            'sex.number' => 'sex值必须是整数',
            'patient.number' => 'patient值必须是整数',
        ]);
        if (!$validate->check($data)) {
            return json(["error_code"=>10001,"msg"=>$validate->getError()],400);
        }
        $data["u_id"] = Session::get("id");
        $row["error_code"] = 0;
        $row["data"] = pa::addPatient($data);
        return json($row,200);
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
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
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
