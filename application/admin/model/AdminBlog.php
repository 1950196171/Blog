<?php

namespace app\admin\model;

use think\Model;

class AdminBlog extends Model
{
    protected $table = 'think_article';
    protected $pk = 'id';

    public function getCat(){
       return $this->hasOne('AdminCategory','id','column_id');
    }
    public function insert($res){
        // dump('public'.$res->titlepic);
        // public\Uploads\image\20181115\1542276644682931.jpg
        $image = \think\Image::open('E:\cz\3ziliao\BlogGoo\public'.$res->titlepic);
        $ImageName = trim(strrchr($res->titlepic, '/'),'/');
        // dump($ImageName);
        $image->thumb(784,313)->save('E:\cz\3ziliao\BlogGoo\public/Uploads/image/'.date('Ymd').'/big-'.$ImageName);
        $image->thumb(208,150)->save('E:\cz\3ziliao\BlogGoo\public/Uploads/image/'.date('Ymd').'/mid-'.$ImageName);
        $image->thumb(131,75)->save('E:\cz\3ziliao\BlogGoo\public/Uploads/image/'.date('Ymd').'/sml-'.$ImageName);
        $sml = '/Uploads/image/'.date('Ymd').'/sml-'.$ImageName;
        $big = '/Uploads/image/'.date('Ymd').'/big-'.$ImageName;
        $mid = '/Uploads/image/'.date('Ymd').'/mid-'.$ImageName;
        return $this->save([
            'title'=>$res->title,
            'content'=>$res->content,
            'column_id'=>$res->category,
            'logo'=>$res->titlepic,
            'sml'=>$sml,
            'mid'=>$mid,
            'big'=>$big,
            'label'=>$res->tags,
            'state'=>$res->visibility,
            'description'=>$res->describe
        ]);
    }

    public function updateer($id){
        return $this->get($id);   
    }
    public function Blogupdate($req){
        if($req->titlepic){
            $blog = $this->get($req->blog_id);
            if($blog->logo != $req->titlepic){
                @unlink(\Env::get('root_path').'public/'.$blog->logo);
                @unlink(\Env::get('root_path').'public/'.$blog->sml);
                @unlink(\Env::get('root_path').'public/'.$blog->mid);
                @unlink(\Env::get('root_path').'public/'.$blog->big);
            }else{
                return $blog->save([
                    $blog->title = $req->title,
                    $blog->content = $req->content,
                    $blog->column_id = $req->category,
                    $blog->label = $req->tags,
                    $blog->state = $req->visibility,
                    $blog->description = $req->describe
                ]);
            }
            $image = \think\Image::open(\Env::get('root_path').'public'.$req->titlepic);
            $ImageName = trim(strrchr($req->titlepic, '/'),'/');
            $image->thumb(784,313)->save(\Env::get('root_path').'public/'.'Uploads/image/'.date('Ymd').'/big-'.$ImageName);
            $image->thumb(208,150)->save(\Env::get('root_path').'public/'.'Uploads/image/'.date('Ymd').'/mid-'.$ImageName);
            $image->thumb(131,75)->save(\Env::get('root_path').'public/'.'Uploads/image/'.date('Ymd').'/sml-'.$ImageName);
            $sml = '/Uploads/image/'.date('Ymd').'/sml-'.$ImageName;
            $big = '/Uploads/image/'.date('Ymd').'/big-'.$ImageName;
            $mid = '/Uploads/image/'.date('Ymd').'/mid-'.$ImageName;
        }else{
            $sml = '';
            $mid = '';
            $big = '';
        }
        return $blog->save([
            $blog->title = $req->title,
            $blog->content = $req->content,
            $blog->column_id = $req->category,
            $blog->logo = isset($req->titlepic)?$req->titlepic:'',
            $blog->sml = $sml,
            $blog->mid = $mid,
            $blog->big = $big,
            $blog->label = $req->tags,
            $blog->state = $req->visibility,
            $blog->description = $req->describe
        ]);
    }
}
