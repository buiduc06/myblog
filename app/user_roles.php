<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    public $table='user_roles';
    protected $fillable = [
        'id_user', 'id_roles',
    ];
    public function user()
    {
    	return $this->hasMany('App\User','id_user','id');
    }
    public function roles()
    {
    	return $this->belongsTo('App\roles','id_roles','id');

    }
    public function thanhvien()
    {
    	return $thanhvien=User::find($this->id_user);
    }
    public function phanquyen()
    {
    	return $phanquyen=roles::find($this->id_roles);
    }
    public function getIDquaEmail()
    {
        return User::where('email',$this->email)->first();
    }


    public function countroles()
    {
       return user_roles::where('id_roles',$this->id)->first();
    }
}
