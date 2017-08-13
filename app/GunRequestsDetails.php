<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunRequestsDetails extends Model
{
	protected $table = "tblGunReqDetails";
    protected $fillable =  [
    	'strGunReqDetailsID','strGunReqID','strGunID','quantity','status'
    ];
    protected $primaryKey = 'strGunReqDetailsID';
    public $incrementing = false; 
}
