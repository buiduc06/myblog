<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatlog extends Model
{
    public $table ='chatlog';

    protected $fillable = [
        'user_id', 'from_user_id', 'title','content'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
     public function getchatimg()
    {
      return User::find($this->user_id);
    }
}
