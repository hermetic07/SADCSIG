<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempDeploymentDetails extends Model
{
    protected $fillable =  [
    	'temp_deployment_details_id','temp_deployments_id','employees_id','shift_from','shift_to','role','status'
    ];
    public function tempDeployment(){
    	return $this->belongsTo('App\TempDeployments');
    }
}
