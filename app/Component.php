<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'Name', 'Description', 'IdComponent1',
    ];

    protected $casts = [
        'CreatedAt' => 'datetime',
        'UpdateAt' => 'datetime',
    ];

    protected $table = 'Sec_Components';

    protected $primaryKey = 'IdComponent';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function roles()
    {
        return $this->belongsToMany('App\Role','Sec_RolePermComponents','IdComponent','IdRole')->withPivot('IdPermission');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission','Sec_RolePermComponents','IdComponent','IdPermission')->withPivot('IdRole');
    }
}
