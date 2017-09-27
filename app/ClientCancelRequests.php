<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCancelRequests extends Model
{
	protected $table = 'client_canceled_requests';
    protected $fillable =  [
    	'canceled_requests_id',
		'trans_type',
		'requestID',
		'client_id',
		'reasons'
    ];
    protected $primaryKey = 'canceled_requests_id';
    public $incrementing = false; 
}
