<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';
    public $primaryKey = 'id';

    public function posts() 
    {
        return $this->hasMany('App\TopicPost');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
