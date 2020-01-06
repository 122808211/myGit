<?php

namespace app\api\controller\v1;

use app\api\model\DrugCart;
use app\api\model\Medchufang;
use think\Controller;
use think\Request;
use think\Validate;

class Cart extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = $this->request->param();
        $validate = new Validate();
        $validate->rule([
            "id"=>"require"
        ]);
        if(!$validate->check($data)){
            return json(["error_code"=>10004,"msg"=>$validate->getError()],400);
        }
        $row = DrugCart::getInfo($data["id"]);
        return json(["error_code"=>0,"data"=>$row],200);
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
            "emplog"=>"require|between:1,2|number",
            "drug_id"=>"require",
            "frequency"=>"require",
            "eatnum"=>"require",
            "unit"=>"require",
            "eattype"=>"require",
            "eatday"=>"require",
            "supplement"=>"require",
            "prid"=>"require",
            "arid"=>"require"
        ]);
        if(!$validate->check($data)){
            return json(["error_code"=>10004,"msg"=>$validate->getError()],400);
        }
        $info["prid"] = $data["prid"];
        $info["arid"] = $data["arid"];
        $info["drid"] = $data["drug_id"];
        $row = DrugCart::addCart($info);
        $data["cart_id"] = $row["id"];
        Medchufang::addInfo($data);
        return json(["error_code"=>0,"data"=>$row],200);
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
