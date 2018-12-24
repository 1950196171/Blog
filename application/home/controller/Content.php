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
        $id = (int)$id;
        $data['data'] = HomeIndex::find($id);
        $data['xgwz'] = DB::table('think_article')->where('column_id',$data['data']['column_id'])->select();
        $data['label'] = explode(',',$data['data']['label']);
//        dump($data['xgwz']);
        $data['data']['column_id'] = $data['data']->getCat->column_name;
        // 判断相关文章是否是自己本篇文章  如果是 就删除  不向页面输出
         foreach($data['xgwz'] as $k=>$v){
//             dump($v);

            if($data['xgwz'][$k]){
                if($data['xgwz'][$k]['id'] == $data['data']['id']){
                    unset($data['xgwz'][$k]);
                }

            }else{
                return redirect()->error('请求错误！');
            }

        }
        $data['arr'] = HomeIndex::right();
//        dump($data['xgwz']);
//        $data['xgwz'] =$v;
        return view('content/index',[
            'data'=>$data,
            'data_h'=>$data['arr']
        ]);

//        $data['arr'] = HomeIndex::right();
////         dump($data['arr']);
//        return view('content/index',[
//            'data'=>$data,
//            'data_h'=>$data['arr']
//        ]);

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
