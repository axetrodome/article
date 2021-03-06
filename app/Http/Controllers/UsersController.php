<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;
use Image;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
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
        //

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
        //
        $user = User::findOrFail($id);
        return View('user.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request , 
            [
            'name' =>'required|min:1' ,
            'email' =>'required' ,
            'dob' =>'required' ,
            'avatar' => 'mimes:jpeg,bmp,png',   
            ],[
            'name.required' => 'The name must contain atleast 1 character',
            'avatar.mimes' => 'The File must be an Image']);
        if($request->hasFile('avatar'))
        {
             $avatar = $request->file('avatar');
             $filename = time() . '.' . $avatar->getClientOriginalExtension();
             Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
             $user = Auth::user();
             $user->avatar = $filename;
             $user->save();
        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        \Session::flash('success','Your profile has been success fuly Updated!');

        return Redirect()->route('profile.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // public function update_avatar(Request $request){
    //  // Handle the user upload of avatar

    //  return view('user.profile', array('user' => Auth::user()) );
    // }
        public function myArticles(){
        $articles = Article::where('user_id', Auth::user()->id )->orderBy('id','DESC')->paginate(10);
        return View('articles.index', compact('articles'));
    }
    
}
