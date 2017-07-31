<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsPic extends Model
{
   protected $table = "tbl_clientspics";
   protected $fillable =  [
    	'id','stringContractId','stringestablishment','stringlocation'
    ];

}
