<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Photo;
use App\Role;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Requests\PostsCreateRequest;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input=$request->all();
        if($file=$request->file('photo_id')){
          $name=time().$file->getClientOriginalName();
          $file->move('images',$name);
          $photo=Photo::create(['file'=>$name]);
          $input['photo_id']=$photo->id;
        }

        $user=Auth::User();
        $user->posts()->create($input);
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post=Post::findorFail($id);
        $categories=Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
       $post=Post::findOrFail($id);
       $input=$request->all();

       if($file=$request->file('photo_id')){
         $name=time().$file->getClientOriginalName();
         $file->move('images',$name);
         $photo=Photo::create(['file'=>$name]);
         $input['photo_id']=$photo->id;
       }

       $user=Auth::User();
       $user->posts()->whereId($id)->first()->update($input);
      // Auth::user()->posts()->whereId($id)->first()->update($input);
      // $post->update($input);
       return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post=Post::findOrFail($id);
      $name=$post->title;
      if($post->photo){
      unlink(public_path() . $post->photo->file);
     }
      $post->delete();
      Session::flash('deleted_post','Post '.$name.' is Deleted');
      return redirect('/admin/posts');

    }

    public function post($slug){
      $categories=Category::all();
      $post=Post::where('slug', $slug)->firstOrFail();;
      return view('post',compact('post','categories'));
    }
}
