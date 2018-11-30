<?php

namespace app\Home\model;
use DB;

use think\Model;

class HomeComments extends Model
{
    protected $table = 'think_comments';

    public function setComments($req){
        
        return $this->save([
            'name'=>$req->randName,
            'face' => $req->face_num,
            'content'=>$req->txt
        ]);
    }
}
