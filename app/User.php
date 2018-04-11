<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function posts()
    {
       return $this->hasMany('App\posts','id','create_by');
   }
   public function user_roles()
   {
       return $this->belongsTo('App\user_roles','id','id_user');
   }
   public function chatlog()
    {
      return $this->hasMany('App\chatlog','id','user_id');
    }


   public function getIDquaEmail()
    {
        return User::where('email',$this->email)->first();
    }

    public function getchatimg()
    {
      return User::find($this->user_id);
    }
   

}
