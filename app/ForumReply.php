<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Forum_Replies';
    protected $primaryKey = 'IdForumReply';

    public function user()
    {
        return $this->belongsTo('App\User','IdUser');
    }
}
