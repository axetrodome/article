<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //import user.php
use Auth;
use Image;
use Session;
use App\Article;
class ProfileController extends Controller
{
    public function profile(){
    	return view('user.profile', array('user' => Auth::user()) );
    }
    public function myArticles(){
        $articles = Article::where('user_id', Auth::user()->id )->orderBy('id','DESC')->paginate(10);
        return View('articles.index', compact('articles'));
    }

}
