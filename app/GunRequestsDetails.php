<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunRequestsDetails extends Model
{
    protected $fillable =  [
    	'id','gun_requests_id','guns_id','quantity','status'
    ];
}
