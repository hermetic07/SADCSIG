<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shifts extends Model
{
    //protected $table = "shifts";

    protected $fillable =  [
    	'id','estab_id','start','end'
    ];
}
