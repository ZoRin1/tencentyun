<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment extends Model
{
    //
    protected $table = 'moments';
    protected $fillable = ['id','email','name','content','created_at'];
    public $timestamps = false;
}
