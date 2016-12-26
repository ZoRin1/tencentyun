<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_relate extends Model
{
    //
    protected $table = 'match_relates';
    protected $fillable = ['match_id','email','created_at'];
    public $timestamps = false;
}
