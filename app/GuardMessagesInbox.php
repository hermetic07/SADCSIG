<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuardMessagesInbox extends Model
{
    protected $table = "guard_messages_inbox";
    protected $fillable =  [
    	'guard_messages_ID',
		'guard_id',
		'subject',
		'content',
		'created_at',
		'updated_at'
    ];
    protected $primaryKey = 'guard_messages_ID';
    public $incrementing = false; 
}
