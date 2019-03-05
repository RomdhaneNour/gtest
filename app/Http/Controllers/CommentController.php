<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\post;
use App\user;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::orderBy('created_at','desc')->get();
        return view('comment',compact('posts'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment=new comment();
        $comment->id_post=$request['id_post'];
        $comment->comment=$request["comment"];
        $comment->id_user=Auth::user()->id;
        $comment->save();
       
        return back()->withmessage('CommentAdded');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post, comment $comment)
    {
        $post=post::where('id',$request['id'])->first();
        $comment=comment::where('id_post',$post['id'])->orderBy('created_at','desc')->get();
        $name=user::where('id',Auth::user()->id)->first();
        
         if($post==null)
        {
            return back();
        }
        else{
           
        return view('tocomment',compact('post','comment','name'));
        }
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
