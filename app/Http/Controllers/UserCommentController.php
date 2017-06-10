<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Redirect;
class UserCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    // $comments = Comment::all();
    // return view('articles.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('articles');
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
        // $this->validate($request,[
        //         'body' => 'required',
        //     ]);
         // $id = $request->commentable_id;
         // $comment = Comment::find($id);
        // if($request->ajax()){
        //     return response($request->all());
        // }
         $comment = new Comment;
         $comment->body = $request->body;
         $comment->commentable_id = $request->commentable_id;
         $comment->user_id = $request->user_id;
         $comment->save();
         // return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
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
        $comment = Comment::findOrFail($id);
        return view('articles.edit_comment',compact('comment'));
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
        //
        $this->validate($request,['body' => 'required']);
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return Redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    //     $comment = Comment::findOrFail($id);
    //     $comment->forceDelete();
    //     return Redirect::back();
    // }
    public function delete(Request $request){
        Comment::where('id',$request->id)->forceDelete();
    }

}
