<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
Use DB;

class Widget extends Model
{
  use Notifiable;
  protected $connection = 'mysql';
  protected $table = 'cmswidget';
}
