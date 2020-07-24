<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

	protected $table = 'Cnf_Courses';

    protected $primaryKey = 'IdCourse';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category', 'IdCourseCategory', 'IdCourseCategory');
    }

    public function language()
    {
        return $this->belongsTo('App\Language', 'IdLanguage', 'IdLanguage');
    }

    public function competencies()
    {
        return $this->belongsToMany('App\Competency','Cnf_Courses_has_Cnf_Competencies','IdCourse','IdCompetency');
    }
}
