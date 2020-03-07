<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Petugas extends Authenticatable
{
    use Notifiable;
     /**
   * Users' roles
   *
   * @var array
   */

    protected $table = "petugas";

    protected $primaryKey = "id";

    public const ROLES = [
    'admin'     => 1,
    'petugas'    => 2
    ];


    protected $fillable = [
        'name','username','telp'
    ];

    protected $hidden = [
        'password','remember_token'
    ];

    /**
   * returns the id of a given role
   *
   * @param string $role  user's role
   * @return int roleID
   */


   public function level()
   {
       return $this->belongsToMany(Level::class);
   }

    public static function getRoleId($role)
    {
        return array_search($role,self::ROLES);
    }


}
