<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRegistration extends Model
{
    protected $fillable =  [
    	'admin','contract_id','client_id'
    ];

    protected $primaryKey = 'id';
    public $incrementing = false; 
}
