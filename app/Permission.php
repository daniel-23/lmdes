<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'Name', 'Description',
    ];

    protected $casts = [
        'CreatedAt' => 'datetime',
        'UpdateAt' => 'datetime',
    ];

    protected $table = 'Sec_Permissions';

    protected $primaryKey = 'IdPermission';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function roles()
    {
        return $this->belongsToMany('App\Role','Sec_RolePermComponents','IdPermission','IdRole')->withPivot('IdComponent');
    }

    public function components()
    {
        return $this->belongsToMany('App\Component','Sec_RolePermComponents','IdPermission','IdComponent')->withPivot('IdRole');
    }
}
