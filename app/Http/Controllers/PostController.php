<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('post');
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
    { $validation=$request->validate([
        'title'=>'required |string | min:6   ',
        'content'=>'required |string | min:10 '
    ]);
        $post=new post();
        $post->title=$request["title"];
        $post->content=$request["content"];
        $post->id_user=Auth::user()->id;
        $post->save();
        return back()->withmessage('PostAdded');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        $data=[
            'title'=>$request->title,
            'content'=>$request->content
        ];
        DB::table('posts')->where('id',$request['id'])->update($data);
        return back()->withmessage('updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)

    { $post=post::where('id',$request['id'])->first();
        
         if($post==null)
        {
            return back();
        }
        else{
           
        return view('update',compact('post'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {

       
        $post=post::where('id',$request['id'])->first();
        if($post->delete()) { 
            return back()->with('message', 'Post deleted.'); 
        }
    }

    
}
