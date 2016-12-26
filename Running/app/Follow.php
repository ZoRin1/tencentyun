<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //
    protected $table = 'follows';
    protected $fillable = ['following_email','follower_email','created_at'];
    public $timestamps = false;
}
