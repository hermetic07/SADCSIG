<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuardReplacement extends Model
{
    protected $table = "guard_replacement_requests";
    protected $fillable =  [
    	'requestID',
		'clients_id',
		'contractID',
		'status',
		'read',
		'no_guards',
		'guardds_deployed',
		'created_at',
		'updated_at'
    ];
    protected $primaryKey = 'requestID';
    public $incrementing = false; 
}
