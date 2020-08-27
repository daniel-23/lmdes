<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Options';

    protected $primaryKey = 'IdOption';
}
