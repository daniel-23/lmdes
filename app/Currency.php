<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = [];

	protected $table = 'Cnf_Currencies';

    protected $primaryKey = 'IdCurrency';
    public $timestamps = false;
}
