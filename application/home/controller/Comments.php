<?php

namespace app\Home\controller;

use think\Controller;
use think\Request;
use app\home\model\HomeIndex;
use app\home\model\HomeComments;

class Comments extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data['right'] = HomeIndex::right();
        return view('',['data_h'=>$data['right']]);
    }

    /**
     * 
     *
     * @return \think\Response
     */
    public function create(Request $req)
    {   
        
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $req)
    {
        $model = new HomeComments;
        $res = $model->setComments($req);
        if($res){
            return true;
        }
            return false;
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        return 1;
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
