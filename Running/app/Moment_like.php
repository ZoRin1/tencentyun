<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moment_like extends Model
{
    //
    protected $table = 'moment_likes';
    protected $fillable = ['moment_id','like_email','created_at'];
    public $timestamps = false;
}
