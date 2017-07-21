<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMessages extends Model
{
    protected $fillable =  [
    	'message_ID','trans_id','sender','receiver','message_type','status'
    ];
}
