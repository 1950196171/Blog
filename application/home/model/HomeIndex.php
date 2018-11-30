<?php

namespace app\home\model;

use think\Model;
use think\DB;
class HomeIndex extends Model
{
    protected $table = 'think_article';

    // public function getAll_Blog(){
    //     return $this->all();
    // }
        public function getCat(){
            return $this->HasOne('HomeColumn','id','column_id');
        }
   static public function right(){
        // 首页最新文章
        $newArticle = HomeIndex::order('created_at','desc')->paginate(5);
        // 首页站长推荐
        $tui = HomeIndex::order('tui','desc')->paginate(5);
        // 首页点击
        $zhan = HomeIndex::order('top','desc')->paginate(5);
        // 首页关注
        $guan = HomeIndex::order('guanzhu','desc')->paginate(5);
        // 首页标签
        $label = HomeIndex::order('look','desc')->paginate(10);
        $label_arr = [];
        foreach($label as $v){
            $label_arr[] = $v->id;
        }
        $label_data = HomeIndex::whereIn('id',$label_arr)->select();
        $column = HomeColumn::select();

        return [
            'newArticle'=>$newArticle,
            'tui'=>$tui,
            'zhan'=>$zhan,
            'guan'=>$guan,
            'label_data'=>$label_data,
            'column'=>$column
        ];
   }

   public function update_zan($id){
        $blog = $this->get($id);
        $blog->top = ['inc',1];
        if($blog->save()){
            $blog = $this->get($id);
            return $blog->top;
        }else{
            return false;
        }
   }

   public function getLabel($req){
           $res = DB::table('think_article')->where([
                         ['label','like',base64_decode($req->label)]
                        ])->select();
            return $res;
   }
}
