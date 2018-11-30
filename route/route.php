<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// Route::get('think', function () {
//     return 'hello,ThinkPHP5!';
// });

// Route::get('hello/:name', 'index/hello');

// return [

// ];
Route::get('/','home/Index/index');
// 后台
// 登陆
Route::rule('admin','admin/Login/index');
Route::rule('a_dologin','admin/Login/dologin','POST');
Route::rule('a_logout','admin/Login/logout');
// 首页显示
// // 文章链接
// Route::rule('admin_blog_create','admin/Blog/create');
// Route::rule('admin_blog_insert','admin/Blog/save','POST');
// Route::rule('admin_blog_edit/:id','admin/Blog/edit');
// Route::rule('admin_blog_update','admin/Blog/update','POST');
// Route::rule('admin_blog_del/:id','admin/Blog/del');
// 公告链接
// Route::rule('admin_notice','admin/Notice/index');
// // 评论
// Route::rule('admin_comments','admin/Comments/index');
// 文章栏目

Route::resource('a_:name','admin/:name')
        ->rest([
            'delete'=>['GET','/del/:id','del'],
            'update'=>['POST','/:id','update']
            ]);

// 前台
Route::resource('h_:name','home/:name');

