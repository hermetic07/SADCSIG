<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractGuns extends Model
{
    protected $table = 'contract_guns';

    protected $fillable =  [
    	'contract_guns_ID',
		'contract_id',
		'gun_id',
		'quantity'
    ];
    protected $primaryKey = 'contract_guns_ID';
    public $incrementing = false; 
}
