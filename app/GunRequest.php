<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunRequest extends Model
{
    protected $fillable =  [
    	'id','client_id','establishment_id','status'
    ];
}
