<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    protected $table = 'Cnf_Cities';

    protected $primaryKey = 'IdCity';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function state()
    {
        return $this->belongsTo('App\State','IdState','IdState');
    }
}
