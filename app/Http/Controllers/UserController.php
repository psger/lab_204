<?php

namespace App\Http\Controllers;

use App\Cat;
use App\User;
use App\Post;
use App\Comment;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validate;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\InfoRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 用户首页包括个人信息，所有文章，所有评论
     * @param $id
     * @return view
     */
    public function show($id)
    {
        //$id = Auth::user()->id;//当前用户id
        $user = User::findOrFail($id);//获取当前用户信息
        $posts = $user->posts()->where('status',0)->orderBy('created_at', 'desc')->get();//获取用户可公开的文章
        //不加查询条件可以直接$posts->$user->posts;
        $comments = Comment::whose($user->id)->recent()->limit(20)->get();//获取用户的所有评论和评论所对应的的文章
        $follows = $user->followers()->get();//获取用户关注了谁、
        //$follows = User::findOrFail($id)->followers()->toSql();//获取用户关注了谁、转换为sql语句
        $following = $user->following()->get();//获取用户的粉丝
        return view('user.userpage',compact('posts','comments','user','follows','following'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
