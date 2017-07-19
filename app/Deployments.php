<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deployments extends Model
{
    protected $fillable =  [
    	'id','clients_id','establishment_id','num_guards','created_at','updated_at'
    ];
}
