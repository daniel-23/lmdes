<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $guarded = [];

    protected $table = 'Cnf_Resources';

    protected $primaryKey = 'IdResource';
}
