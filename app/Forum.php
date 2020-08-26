<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $guarded = [];

    protected $table = 'Utl_Forums';
    protected $primaryKey = 'IdForum';
    public function replies()
    {
        return $this->hasMany('App\ForumReply','IdForum','IdForum');
    }
}
