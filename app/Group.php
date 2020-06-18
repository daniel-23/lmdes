<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    protected $table = 'Sec_Groups';

    protected $primaryKey = 'IdGroup';
    
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function courses()
    {
        return $this->belongsToMany('App\Course','Cnf_Courses_has_Sec_Groups','IdGroup','IdCourse')->withPivot('IdCnf_Courses_has_Sec_Groups');
    }
}
