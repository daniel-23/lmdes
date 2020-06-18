<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudEvent extends Model
{
    protected $fillable = [
        'Description',
    ];

    protected $table = 'Aud_Events';

    protected $primaryKey = 'IdEvent';
    public $timestamps = false;

}
