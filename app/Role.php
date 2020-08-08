<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
        'Name', 'Description',
    ];

    protected $casts = [
        'CreatedAt' => 'datetime',
        'UpdateAt' => 'datetime',
    ];

    protected $table = 'Sec_Roles';

    protected $primaryKey = 'IdRole';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function permissions()
    {
        return $this->belongsToMany('App\Permission','Sec_RolePermComponents','IdRole','IdPermission')->withPivot('IdComponent');
    }

    public function components()
    {
        return $this->belongsToMany('App\Component','Sec_RolePermComponents','IdRole','IdComponent')->withPivot('IdPermission');
    }
}
