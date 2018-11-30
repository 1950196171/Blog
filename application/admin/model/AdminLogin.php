<?php

namespace app\admin\model;

use think\Model;

class AdminLogin extends Model
{
    protected $table = 'think_admins';
    public function search($name,$pwd){
        $res = $this->where('username',$name)
                    ->where('password',$pwd)            
                    ->find();
        if($res){
            return true;
        }else{
            return false;
        }
    }
}