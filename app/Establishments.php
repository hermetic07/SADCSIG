<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{
    protected $fillable =  [
    	'id','contract_id','name','address','areas_id'
    ];
}
