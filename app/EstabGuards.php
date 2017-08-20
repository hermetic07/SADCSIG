<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstabGuards extends Model
{
    protected $table = "tblEstabGuards";
    protected $fillable = [
    	'strEstablishmentID','strGuardID','dtmDateDeployed','status','shiftFrom','shiftTo','contractID'
    ];


}
