<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    protected $guarded = [];
    protected $table = 'Cnf_Competencies';
    protected $primaryKey = 'IdCompetency';
    const CREATED_AT = 'CreatedAt';
    const UPDATED_AT = 'UpdateAt';
}
