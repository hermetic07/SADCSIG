<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeploymentNotifForClient extends Model
{
	protected $table = "deployment_notif_for_clients";
    protected $fillable =  [
    	'notif_id','trans_id','sender','receiver','subject','status'
    ];
    protected $primaryKey = 'notif_id';
    public $incrementing = false; 
}
