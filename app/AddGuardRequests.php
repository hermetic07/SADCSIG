<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddGuardRequests extends Model
{
    protected $fillable =  [
    	'id','client_id','establishments_id','no_guards','shift_start','shift_end','date_needed','status','guardDeployed','contract'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false; 
}
