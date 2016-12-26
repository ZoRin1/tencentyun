<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person_information extends Model
{
    //
    protected $fillable = ['name', 'email', 'sex','birth','city','interest','message','headimg','created_at'];
    public $timestamps = false;
}
