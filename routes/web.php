<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::get('/logout','Auth\LoginController@logout');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>['admin']],function(){


Route::get('/admin',function(){
    return view('admin.index');
});

Route::resource('/admin/users','AdminUsersController',['names'=>[

  'index'=>'admin.users.index',
  'store'=>'admin.users.store',
  'create'=>'admin.users.create',
  'edit'=>'admin.users.edit'

  ]]);
Route::resource('/admin/posts','AdminPostsController',['names'=>[

  'index'=>'admin.posts.index',
  'store'=>'admin.posts.store',
  'create'=>'admin.posts.create',
  'edit'=>'admin.posts.edit'

  ]]);
Route::resource('/admin/categories','AdminCategoriesController',['names'=>[

  'index'=>'admin.categories.index',
  'store'=>'admin.categories.store',
  'create'=>'admin.categories.create',
  'edit'=>'admin.categories.edit'

  ]]);
Route::resource('/admin/media','AdminMediasController',['names'=>[

  'index'=>'admin.media.index',
  'store'=>'admin.media.store',
  'create'=>'admin.media.create',
  'edit'=>'admin.media.edit'

  ]]);
Route::delete('admin/delete/media','AdminMediasController@deleteMedia');

Route::resource('/admin/comments','PostCommentsController',['names'=>[

  'index'=>'admin.comments.index',
  'store'=>'admin.comments.store',
  'create'=>'admin.comments.create',
  'edit'=>'admin.comments.edit',
  'show'=>'admin.comments.show'

  ]]);
Route::resource('/admin/comments/replies','CommentRepliesController',['names'=>[

  'index'=>'admin.comments.replies.index',
  'store'=>'admin.comments.replies.store',
  'create'=>'admin.comments.replies.create',
  'edit'=>'admin.comments.replies.edit',
  'show'=>'admin.comments.replies.show'

  ]]);


Route::post('comment/reply','CommentRepliesController@commentReply');

});
