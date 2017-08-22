<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GunRequest extends Model
{
	protected $table = "tblGunRequests";
    protected $fillable =  [
    	'strGunReqID','strAdmin','strClientID','establishments_id','status','isRead'
    ];
    protected $primaryKey = 'strGunReqID';
    public $incrementing = false; 
}
