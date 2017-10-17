<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class swapestab extends Model
{
  public $incrementing = false;
   protected $primaryKey = 'strEstablishmentID';
   protected $table = "tblestabguards";
}
