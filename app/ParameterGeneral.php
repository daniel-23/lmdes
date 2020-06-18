<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterGeneral extends Model
{
    protected $guarded = [];

	protected $table = 'Par_General';

    protected $primaryKey = 'IdGenCompany';
    public $timestamps = false;
}
