<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractTerminations extends Model
{
    protected $table = 'contract_terminations';
    protected $fillable =  [
    	 'termination_id',
		 'contract_id',
		 'created_at',
		 'updated_at',
		 'status'
    ];
    protected $primaryKey = 'termination_id';
    public $incrementing = false; 
}
