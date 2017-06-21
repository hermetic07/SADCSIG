<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddGuardRequests extends Model
{
    protected $fillable =  [
    	'id','establishments_id','no_guards','guard_for','dateRequested','status','read'
    ];
}
