<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
   protected $table = 'attendance';
   public $fillable = ['secu_id','estab_id','description','date'];

}
