<?php

namespace app\api\controller\v1;

use app\api\model\DrugCart;
use app\api\model\DrugDetail;
use think\Controller;
use think\Db;
use think\Request;
use think\Validate;
use app\api\model\Drug as dr;

class Drug extends Controller
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
            "id"=>"require",
        ]);
        if(!$validate->check($data)){
            return json(["error_code"=>10004,"msg"=>$validate->getError()],400);
        }
        $row = Db::table("yy_disease_drug")->where("yy_disease_drug.dsid",$data["id"])->join("yy_drug","yy_disease_drug.drid=yy_drug.id")->join("yy_drug_detail","yy_drug_detail.drid=yy_drug.id")->column("yy_drug.id,yy_drug.drname,yy_drug.manufacturer,yy_drug.price,yy_drug_detail.specifications");
        return json(["error_code"=>0,"data"=>$row],200);
    }

    public function drugDetail(){
        $data = $this->request->param();
        $validate = new Validate();
        $validate->rule([
            "id"=>"require",
        ]);
        if(!$validate->check($data)){
            return json(["error_code"=>10004,"msg"=>$validate->getError()],400);
        }
        $row = DrugDetail::getDrugDetail($data["id"]);
        return json(["error_code"=>0,"data"=>$row],200);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {

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
