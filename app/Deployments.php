<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deployments extends Model
{
    protected $fillable =  [
    	'id','service_requests_id','num_guards','created_at','updated_at'
    ];
}
