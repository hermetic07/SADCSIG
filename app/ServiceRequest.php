<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable =  [
    	'id','client_id','services_id','desc_of_service','data_start','meetingPlace','meetingSchedule','status','read'
    ];
}
