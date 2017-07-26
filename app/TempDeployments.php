<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempDeployments extends Model
{
    protected $fillable =  [
    	'temp_deployment_id','messages_ID','admin','clients_id','contract_ID','establishment_id','num_guards'
    ];
    public function tempDeploymentDetails(){
    	return $this->hasMany('App\TempDeploymentDetails');
    }
    protected $primaryKey = 'temp_deployment_id';
    public $incrementing = false; 
}
