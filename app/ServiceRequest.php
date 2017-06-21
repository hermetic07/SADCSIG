<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable =  [
    	'id','clients_id','establishments_id','services_id','data_start','meetingPlace','meetingSchedule','status','read'
    ];
}
