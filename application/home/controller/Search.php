<?php

namespace app\Home\controller;

use think\Controller;
use think\Request;
use app\home\model\HomeIndex;
use think\DB;
class Search extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
        {
        
        
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function show($id)
    {
        
    }

    public function zan($id){
        // return $id;
        $model = new HomeIndex;
        $res = $model->update_zan((int)$id);
        if($res != false){
            return $res;
        }else{
            return false;
        }
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
        if($id != 'a'){
            $data['data'] = HomeIndex::where('column_id',$id)->paginate(5);
            $data['right'] = HomeIndex::right();
            return view('',[
                'model'=>$data['data'],
                'data_h'=>$data['right']    
            ]);
        }else{
            $data['data'] = HomeIndex::paginate(5);
            $data['right'] = HomeIndex::right();
            return view('',[
                'model'=>$data['data'],
                'data_h'=>$data['right']
            ]);
        }
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
