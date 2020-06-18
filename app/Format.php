<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $guarded = [];

    protected $table = 'Cnf_Courses_Format';
    protected $primaryKey = 'IdCourseFormat';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';
}
