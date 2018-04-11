<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class password_resets extends Model
{
    public $table='password_resets';

     protected $fillable = [
        'email', 'token'
    ];
}
