<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class web_settings extends Model
{
    public $table='web_settings';
    protected $fillable = [
        'name', 'status',
    ];
}
