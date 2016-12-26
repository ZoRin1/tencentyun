<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    protected $table = 'matches';
    protected $fillable = ['id','type','steps','content','maxNum','start_time','end_time','created_at'];
    public $timestamps = false;
}
