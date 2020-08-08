<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrsResource extends Model
{
	protected $guarded = [];
	protected $table = 'Crs_Resources';
	protected $primaryKey = 'IdCrsResource';


    public function cnfResource()
    {
        return $this->belongsTo('App\Resource','IdResource');
    }
}
