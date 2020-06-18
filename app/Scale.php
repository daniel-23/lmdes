<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    protected $guarded = [];
	protected $table = 'Cnf_Scales';
    protected $primaryKey = 'IdScale';
    public $timestamps = false;
}