<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
   protected $table = "employees";
   protected $guard = 'employee';
   
   protected $fillable =  [
    	'deployed'
    ];

   public $incrementing = false;
}
