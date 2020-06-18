<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    protected $table = 'Sec_Companies';

    protected $primaryKey = 'IdCompany';
    protected $connection = 'mysql';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function type()
    {
        return $this->belongsTo('App\CompanyType','IdCompanyType','IdCompanyType');
    }

    public function regionals()
    {
        return $this->hasMany('App\Regional','IdCompany','IdCompany');
    }
}
