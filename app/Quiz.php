<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Quizzes';

    protected $primaryKey = 'IdQuiz';

    public function module()
    {
        return $this->belongsTo('App\Module','IdModule','IdModule');
    }
}
