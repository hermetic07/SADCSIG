<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDeploymentNotif extends Model
{
	protected $table = "client_deployment_notifs";
    protected $fillable =  [
    	'client_deloyment_notif_id','client_id','notif_id','date_received','status'
    ];
    protected $primaryKey = 'client_deloyment_notif_id';
    public $incrementing = false; 
}
