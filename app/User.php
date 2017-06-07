<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Comment;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //mutators
    // for capitalization of name 
    public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function setDobAttribute($value){
        $this->attributes['dob'] = Carbon::parse($value);
    }
}
