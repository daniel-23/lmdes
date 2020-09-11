<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Files';
    protected $primaryKey = 'IdFile';
}
