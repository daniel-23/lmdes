<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Questions';

    protected $primaryKey = 'IdQuestion';

    public function replies()
    {
    	return $this->hasMany('App\QuestionReply','IdQuestion','IdQuestion');
    }

    public function options()
    {
    	return $this->hasMany('App\Option','IdQuestion','IdQuestion');
    }
}
