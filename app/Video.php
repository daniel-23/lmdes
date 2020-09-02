<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];
    protected $table = 'Utl_Videos';
    protected $primaryKey = 'IdVideo';

    public function youtube_id()
    {
    	preg_match(
    		'/[\\?\\&]v=([^\\?\\&]+)/',
    		$this->Url,
    		$matches
    	);
    	return $matches[1];
    }
}
