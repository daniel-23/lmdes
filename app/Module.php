<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $guarded = [];

	protected $table = 'Crs_Modules';
	protected $primaryKey = 'IdModule';

	public function crsResources()
    {
        return $this->belongsToMany('App\CrsResource','Crs_Modules_has_Crs_Resources','IdModule','IdCrsResource');
    }

    public function course()
    {
    	return $this->belongsTo('App\Course', 'IdCourse', 'IdCourse');
    }

    public function forums()
    {
        return $this->hasMany('App\Forum','IdModule','IdModule');
    }

    public function quizzes()
    {
        return $this->hasMany('App\Quiz','IdModule','IdModule');
    }
}
