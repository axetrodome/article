<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
    'user_id','content','live','post_on'
    ];
    public function setLiveAttribute($value){
    	$this->attributes['live'] = (boolean)($value); 
    }
    public function getShortContentAttribute(){
    	return substr($this->content, 0, random_int(60,150)).'...';
    }
    protected $dates = [
    'post_on',
    'deleted_at'
    ];
    public function setPostOnAttribute($value){
    	$this->attributes['post_on'] = Carbon::parse($value);
    }
}
