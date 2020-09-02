<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionReply extends Model
{
	protected $guarded = [];
    protected $table = 'Utl_Question_Replies';
    protected $primaryKey = 'IdQuestionReply';
}
