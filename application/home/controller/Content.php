<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use app\home\model\HomeIndex;
use think\DB;
class Content extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $req)
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
        $data['data'] = HomeIndex::find($id);
        $data['data']['column_id'] = $data['data']->getCat->column_name;
        $data['label'] = explode(',',$data['data']['label']);
        $data['xgwz'] = [];
        // 循环标签查询文章
        foreach($data['label'] as $v){
            $data['xgwz'][] = DB::table('think_article')->where([
                                         ['content','like',$v],
                                         ['title','like',$v]
                                    ])->select();
        }
        // 判断相关文章是否是自己本篇文章  如果是 就删除  不向页面输出
         foreach($data['xgwz'] as $v){
            if(empty($v)){
                $data['arr'] = HomeIndex::right();
                    return view('content/index',[
                        'data'=>$data,
                        'data_h'=>$data['arr']
                    ]);
            }else{
                if($v['id']== $id){
                    unset($v);
                }
            }
        }
        $data['arr'] = HomeIndex::right();
        return view('content/index',[
            'data'=>$data,
            'data_h'=>$data['arr']
        ]);
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
