<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuardReplacementDetails extends Model
{
    protected $table = "replacement_requests_details";
    protected $fillable =  [
		'replacement_requests_details_ID',
		'replacement_requests_id',
		'employees_id',
		'reasons',
		'created_at',
		'updated_at'
    ];
    protected $primaryKey = 'replacement_requests_details_ID';
    public $incrementing = false; 
}
