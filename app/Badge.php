<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $guarded = [];

    protected $table = 'Cnf_Badges';
    protected $primaryKey = 'IdBadge';
}
