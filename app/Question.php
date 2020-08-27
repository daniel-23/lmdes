<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Questions';

    protected $primaryKey = 'IdQuestion';
}
