<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
use App\User;
class Comment extends Model
{
    //
    protected $fillable = ['user_id','body','commentable_id','commentable_type'];
	// make relationship to the article and a User
    public function commentable(){
    	return $this->morphTo();
    }
     public function user(){
        return $this->belongsTo('App\User');
    }
    public function replies(){
    	return $this->morphMany('App\Reply','parent');
    }

    
}
