<?php

namespace app\api\controller\v1;

use app\api\model\Archives as pa;
use think\Controller;
use think\facade\Session;
use think\Request;
use think\Validate;

class Archives extends Controller
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
            $row["data"] = pa::getArchives($id);
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
        //验证请求参数是否正确
        $validate = new Validate();
        $validate->rule([
           "arname"=>"require",
           "idcard"=>"require",
           "sex"=>"require|between:1,2|number",
           "date"=>"require",
           "province"=>"require",
           "city"=>"require",
           "isdefault"=>"require|between:1,2|number",
           "token"=>"require",
        ]);
        $validate->message( [
            'sex.number' => 'sex值必须是整数',
            'isdefault.number' => 'isdefault值必须是整数',
        ]);
        if (!$validate->check($data)) {
            return json(["error_code"=>10002,"msg"=>$validate->getError()],400);
        }
        $data["mid"] = Session::get("id");
        $row["error_code"] = 0;
        $row["data"] = pa::addArchives($data);
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
        dump(11111);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int
     * @return \think\Response
     */
    public function edit($id)
    {
        dump($id);
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
        dump(11111);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        dump(11111);
    }
}
