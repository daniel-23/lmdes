<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];

	protected $table = 'Cnf_Courses';

    protected $primaryKey = 'IdCourse';

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

    public function groups()
    {
        return $this->belongsToMany('App\Group','Cnf_Courses_has_Sec_Groups','IdCourse','IdGroup');
    }

    public function resources()
    {
        return $this->belongsToMany('App\Resource','Crs_Resources','IdCourse','IdResource')
            ->withPivot([
                    'IdCrsResource',
                    'Enabled',
                    'StartDate',
                    'StartDate'
                ]);
    }

    public function modules()
    {
        return $this->hasMany('App\Module', 'IdCourse', 'IdCourse');
    }

    




    

    public function duration()
    {

        $startDate = explode(' ', $this->StartDate)[0];
        $endDate = explode(' ', $this->EndDate)[0];
        $interval = date_diff(date_create($startDate),date_create($endDate));
        $resp ='';
        if ($interval->y > 0) {
            $resp .= $interval->y.' años';
        }
        if ($interval->m > 0) {
            if ($resp == '') {
                $resp .= $interval->m.' meses';
            }else{
                $resp .= ', '.$interval->m.' meses';
            }
            
        }
        if ($interval->d > 0) {
            if ($resp == '') {
                $resp .= $interval->d.' días';
            }else{
                $resp .= ', '. $interval->d.' días';
            }
            
        }
        return $resp;
    }
}
