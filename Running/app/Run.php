<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Run extends Model
{
    //
    protected $table = 'runs';
    protected $fillable = ['id','email','distance','steps','start_time','end_time','created_at'];
    public $timestamps = false;
}
