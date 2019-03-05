<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicPost extends Model
{
    protected $table = 'topic_posts';
    public $primaryKey = 'id';
    
    public function topics() 
    {
        return $this->belongsTo('App\Topic');
    }

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
