<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Code', 'Name', 'LastName', 'Email','Status', 'password',
    ];

            
            


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'CreatedAt' => 'datetime',
        'UpdateAt' => 'datetime',
    ];

    protected $table = 'Sec_Users';
    protected $primaryKey = 'IdUser';

    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';



    public function roles()
    {
        return $this->belongsToMany('App\Role','Sec_Users_has_Sec_Roles','IdUser','IdRole');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group','Sec_Users_has_Sec_Groups','IdUser','IdGroup')->withPivot('Enabled','CreatedAt','UpdateAt');
    }

    public function add_info()
    {
        return $this->hasOne('App\UsrAddInfo','IdUser');
    }

    public function health_info()
    {
        return $this->hasMany('App\UsrAddHealthInfo','IdUser');
    }

}
