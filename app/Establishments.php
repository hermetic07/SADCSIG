<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{
    protected $fillable =  [
    	'id','name','person_in_charge','username','password','areas_id','email','contactNo'
    ];
}
