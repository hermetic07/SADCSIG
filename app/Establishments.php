<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{
    protected $fillable =  [
    	'id','contract_id','name','person_in_charge','pic_fname','pic_mname','pic_lname','pic_image','image','loc_image','contactNo','email','address','natures_id','areas_id','province_id','operating_hrs','area_size','population'
    ];
    public function contracts(){
    	return $this->hasMany('App\Contracts');
    }
    protected $primaryKey = 'id';
    public $incrementing = false; 
}
