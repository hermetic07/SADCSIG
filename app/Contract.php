<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable =  [
    	'id','clients_id'
    ];
}
