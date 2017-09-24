<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientSentRequests extends Model
{
    protected $fillable =  [
    	'id',
		'changeType',
		'changeTime',
		'requestType',
		'trans_status',
		'requestID'
    ];
}
