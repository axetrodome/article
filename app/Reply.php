<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Reply extends Model
{
    //
    protected $fillable = ['user_id','reply','parent_id','parent_type'];
    public function parent(){
    	return $this->morphTo();
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
