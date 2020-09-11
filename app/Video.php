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
    	$patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
        $array = preg_match($patron, $this->Url, $parte);
        if (false !== $array) {
            return $parte[1];
        }
        return false;
        
    }
}