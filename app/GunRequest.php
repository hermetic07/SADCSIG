<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunRequest extends Model
{
    protected $fillable =  [
    	'id','establishments_id','gun_for','guns_id','status','read'
    ];
}
