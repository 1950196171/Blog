<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\AdminLogin;
class Login extends Controller
{
    /**
     * 登陆
     *
     * @return \think\Response
     */
    public function index()
    {   
        return $this->fetch('login/login');
    }

    /**
     * 登陆表单接收
     *
     * @return \think\Response
     */
    public function dologin(Request $req)
    {      
        $model = new AdminLogin;
        // var_dump($req);die;
        $data = $model->search($req->username,$req->userpwd);
        if($data){
            return $this->redirect('/a_index');
        }else{
            return $this->error('登陆失败，账号或密码错误！');
        }
        
    }

    /**
     * 退出登陆.
     *
     * @return \think\Response
     */
    public function logout()
    {
        session(null);
        return redirect('/');
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
}
