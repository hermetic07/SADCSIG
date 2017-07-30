<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedGuards extends Model
{
    protected $fillable =  [
    	'client_deployment_notif_id','guard_id','guard_reponse','reasons'
    ];
}
