<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         
        
        $posts=post::where('id_user',Auth::user()->id)->orderBy('created_at','desc')->get();
        $count=post::where('id_user',Auth::user()->id)->count();
        return view('home',compact('posts','count'));
    }
}
