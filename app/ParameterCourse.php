<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterCourse extends Model
{
    protected $guarded = [];

	protected $table = 'Par_Courses';

    protected $primaryKey = 'IdParCourse';
    public $timestamps = false;
}
