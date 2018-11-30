<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\AdminBlog;
use app\admin\model\AdminCategory;
class Blog extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $req)
    {
        $px = isset($req->px)?$req->px:'asc';
        $model = AdminBlog::order('created_at',$px)->paginate(2);
        // dump($model);
        foreach($model as $v){
           $v['column_id'] = $v->getCat->column_name;
        }
        // dump($model);
            return view('',['data'=>$model]);
        
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $model = AdminCategory::select();
        return view('',['data'=>$model]);       
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $req)
    {
        $model = new AdminBlog;
        $res = $model->insert($req);
        if($res){
            return redirect('/a_blog');
        }else{
            return $this->error('新增文章失败');
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
        // dump($id);
        $model = new AdminBlog; 
        $data = $model->updateer($id);
        // dump($data);
        $cat = AdminCategory::select();
        // dump($data);
        return view('',[
            'data'=>$data,
            'cate'=>$cat
            ]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $req)
    {
        $model = new AdminBlog;
        $data = $model->Blogupdate($req);
        if($data){
            return redirect('/a_blog');
        }else{
            return $this->error('修改失败');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function del($id)
    {
        $data_img = AdminBlog::select(['logo','sml','mid','big'])->where('id',$id);
        @unlink(\Env::get('root_path').'public/'.$data_img->logo);
        @unlink(\Env::get('root_path').'public/'.$data_img->sml);
        @unlink(\Env::get('root_path').'public/'.$data_img->mid);
        @unlink(\Env::get('root_path').'public/'.$data_img->big);
        $data = $model = AdminBlog::destroy($id);
        if($data){
            return redirect('/a_blog');
        }else{
            return $this->error('删除失败');
        }
    }
}
