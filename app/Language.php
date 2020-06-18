<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

	protected $table = 'Cnf_Languages';

    protected $primaryKey = 'IdLanguage';
    public $timestamps = false;
}
