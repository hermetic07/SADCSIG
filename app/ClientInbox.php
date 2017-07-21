<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientInbox extends Model
{
	protected $table = "client_inbox";
    protected $fillable =  [
    	'client_inbox_id','client_id','admin_messages_ID','date_received'
    ];
    protected $primaryKey = 'client_inbox_id';
    public $incrementing = false; 
}
