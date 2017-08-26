<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimedDelivery extends Model
{
    protected $table = "tblClaimedDelivery";
    protected $fillable = ['strClaimedDelID','strGunDeliveryID','strGunID','serialNo'];
    protected $primaryKey = 'strClaimedDelID';
    public $incrementing = false;
}
