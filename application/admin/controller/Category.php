<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\AdminCategory;
class Category extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = AdminCategory::select();
        return view('',['data'=>$data]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $data = AdminCategory::select();
        return view('',['data'=>$data]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $req)
    {
        $model =  AdminCategory::create([
            'column_name'=>$req->uname,
            'alias_name'=>$req->alias,
            'parent_id'=>$req->fid,
            'description'=>$req->describe
        ]);
        if($model){
            return redirect('/a_category');
        }else{
            return $this->error('新增失败');
        }
    
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
