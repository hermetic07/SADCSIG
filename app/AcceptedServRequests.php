<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedServRequests extends Model
{
    protected $table = 'tblservicerequestsnotif';

    protected $fillable =  [
    	'strServiceRequestsNotif',
		'strAdmin',
		'strServiceRequestID',
		'created_at',
		'updated_at',
    ];
    protected $primaryKey = 'id';
    public $incrementing = false; 
}
