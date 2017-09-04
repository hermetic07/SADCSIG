<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clients extends Authenticatable
{
  protected $fillable =  [
    'id','first_name','middle_name','last_name','username','password','address','areas_id','email','contactNo','cellphoneNo'];

  protected $primaryKey = 'id';
  public $incrementing = false; 
}
