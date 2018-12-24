<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use app\home\model\HomeIndex;
class Index extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data['blog'] = HomeIndex::where('state','0')->paginate(4);
        $data['img'] = HomeIndex::where('state','1')->paginate(5);
        $data['right'] = HomeIndex::right();
        foreach($data['blog'] as $v){
            $data['blog']->column_id = $v->getCat->column_name;
        }
        return view('',[
            'data_i'=>$data,
            'data_t'=>$data['img'],
            'data_h'=>$data['right']
            ]);
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
        //
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

    
    public function label(Request $req){
        $labels = base64_decode($req->label);
        $data['label'] = HomeIndex::where('label',$labels)->select();
        $data['right'] = HomeIndex::right();
        // dump($data);
        return view('label/label',[
            'data'=>$data['label'],
            'data_h'=>$data['right']
            ]);
        
    }
}
