<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
  protected $fillable =  [
    'id','first_name','middle_name','last_name','username','password','address','areas_id','email','contactNo','cellphoneNo'];

  protected $primaryKey = 'id';
  public $incrementing = false; 
}
