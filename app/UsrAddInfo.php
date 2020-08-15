<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsrAddInfo extends Model
{
    protected $guarded = [];
    protected $table = 'Usr_Add_Info';
    protected $primaryKey = 'IdAddInfo';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User','IdUser','IdUser');
    }


}
