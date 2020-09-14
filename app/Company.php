<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
Use DB;

class Company extends Model
{
  use Notifiable;
  public $timestamps = false;
  protected $connection = 'mysql2';
  protected $table = 'genmcompany';

  public function departement()
    {
    	return $this->belongsTo('App\Departement');
    }

}
