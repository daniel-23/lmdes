<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudUser extends Model
{
    protected $guarded = [];

	protected $table = 'Aud_Users';

    protected $primaryKey = 'IdAuditUser';
    public $timestamps = false;

    

    public function event()
    {
        return $this->belongsTo('App\AudEvent', 'IdEvent', 'IdEvent');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'IdUser', 'IdUser');
    }
}
