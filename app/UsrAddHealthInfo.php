<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsrAddHealthInfo extends Model
{
    protected $guarded = [];
    protected $table = 'Usr_Add_Health_Info';
    protected $primaryKey = 'IdAddHealthInfo';

    public function user()
    {
        return $this->belongsTo('App\User','IdUser','IdUser');
    }
}
