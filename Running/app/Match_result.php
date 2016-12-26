<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match_result extends Model
{
    //
    protected $table = 'match_results';
    protected $fillable = ['match_id','email','created_at'];
    public $timestamps = false;
}
