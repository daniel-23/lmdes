<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    protected $guarded = [];

    protected $table = 'Cnf_Regional';

    protected $primaryKey = 'IdRegional';
    
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('App\City','IdCity','IdCity');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency','IdCurrency','IdCurrency');
    }

    public function timezone()
    {
        return $this->belongsTo('App\TimeZone','IdTimeZone','IdTimeZone');
    }

    public function language()
    {
        return $this->belongsTo('App\Language','IdLanguage','IdLanguage');
    }
}
