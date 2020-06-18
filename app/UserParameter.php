<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserParameter extends Model
{
	protected $guarded = [];

	protected $table = 'Sec_User_Parameters';

    protected $primaryKey = 'IdUserParamater';
    public $timestamps = false;
}
