<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //import user.php
use Auth;
use Image;
use Session;
class ProfileController extends Controller
{
    public function profile(){
    	return view('user.profile', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('user.profile', array('user' => Auth::user()) );
    }
     public function myArticles(){
        $articles = Article::where('user_id', Auth::user()->id )->paginate(10);
        return View('articles.index', compact('articles'));
    }
}
