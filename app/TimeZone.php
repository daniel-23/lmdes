<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    protected $guarded = [];

	protected $table = 'Cnf_TimeZones';

    protected $primaryKey = 'IdTimeZone';
    public $timestamps = false;
}
