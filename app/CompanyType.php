<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyType extends Model
{
    protected $guarded = [];

	protected $table = 'Cnf_CompanyTypes';

    protected $primaryKey = 'IdCompanyType';
    public $timestamps = false;
}
