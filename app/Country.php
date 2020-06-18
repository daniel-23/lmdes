<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $guarded = [];

    protected $table = 'Cnf_Countries';

    protected $primaryKey = 'IdCountry';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';
}
