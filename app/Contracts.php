<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    protected $fillable =  [
    	'id','pic_fname','pic_mname','pic_lname','establishment_name','services_id','address','areas_id','guard_count','status','year_span','start_date','end_date','exp_date'
    ];

    protected $primaryKey = 'id';
    public $incrementing = false; 
}
