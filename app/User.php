<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
Use DB;

class User extends Authenticatable
{
    protected $connection = 'mysql2';
    use Notifiable;
    protected $table = 'mcarduser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'myusername',
        'idhomepage',
         'mypassword',
         'islogin',
         'lastlogin',
         'lastaction',
         'lastactionurl',
         'lastipaddress',
         'lastnotif',
         'lasttask',
         'lastinbox',
         'lastsms',
         'groupuser',
         'securitylevel',
         'profilepic',
         'thumbnailpic',
         'backgroundpic',
         'idcreate',
         'docreate',
         'idupdate',
         'lastupdate',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mypassword',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public static  function getAll()
    {
      $users = DB::table('mcarduser')
                    ->whereIn('menulevel', [1, 2])
                    ->where('isactive',1)
                    ->where('ispublic',1)
                    ->get();
      return $users;
    //   $names = array('1', '2');
    // $this->db->where_in('menulevel', $names);
    // $this->db->where("isactive = 1");
    // $this->db->where("ispublic = 1");
    }
}
