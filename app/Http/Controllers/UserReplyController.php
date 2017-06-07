<?php

namespace App\Http\Controllers;
use App\Reply;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class UserReplyController extends Controller
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
        // return view('articles');
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
        $reply = new Reply;
        $reply->parent_id = $request->parent_id;
        $reply->user_id = $request->user_id;
        $reply->reply = $request->reply;
        $reply->save();
        return Redirect::back();
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
        $reply = Reply::findOrFail($id);
        return view('articles.reply_edit',compact('reply'));
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
        $reply = new Reply;
        $reply->parent_id = $request->parent_id;
        $reply->user_id = $request->user_id;
        $reply->reply = $request->reply;
        $reply->save();
        return Redirect::back();

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
        $reply = Reply::findOrFail($id);
        $reply->forceDelete();
        return Redirect::back();
    }
}
