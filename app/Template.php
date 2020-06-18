<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $guarded = [];
    protected $table = 'Cnf_Templates';
    protected $primaryKey = 'IdTemplate';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';

    public function competencies()
    {
        return $this->belongsToMany('App\Competency','Cnf_Templates_has_Cnf_Compentencies','IdTemplate','IdCompetency')->withPivot('IdCnf_Templates_has_Cnf_Compentencies','Description');
    }

    public function limit_date()
    {
    	return str_replace(' ', 'T', trim($this->LimitDate)); 
    }
}
