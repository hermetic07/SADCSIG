<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeploymentDetails extends Model
{
    protected $fillable =  [
    	'id','deployments_id','employees_id','shift_from','shift_to','role','status'
    ];
}
