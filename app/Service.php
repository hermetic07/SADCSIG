<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	protected $fillable =  [
    	'id','name','description','status','servicerate'
    ];
   protected $table = "services";

}
