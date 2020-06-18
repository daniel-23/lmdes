<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    protected $table = 'Cnf_States';

    protected $primaryKey = 'IdState';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function country()
    {
        return $this->belongsTo('App\Country','IdCountry','IdCountry');
    }
}
