<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
Use DB;

class Departement extends Model
{
  use Notifiable;
  public $timestamps = false;
  protected $connection = 'mysql2';
  protected $table = 'genmdepartment';

  public function company() {
      return $this->hasOne('App\Company');
}

}
