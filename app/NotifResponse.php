<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifResponse extends Model
{
    protected $table = "notif_response";
    protected $fillable =  [
    	'client_deployment_notif_id','guard_id','status'
    ];
    protected $primaryKey = 'client_deployment_notif_id';
    public $incrementing = false; 
}
