<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
  protected $fillable =  [
    'id','name','username','password','address','areas_id','email','contactNo'];

  protected $primaryKey = 'id';
  public $incrementing = false; 
}
