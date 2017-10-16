<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    
    public $incrementing = false;
    protected $fillable =  [
    	'status'
    ];
}
