<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Topic extends Model
{
    protected $table = 'topics';
    public $primaryKey = 'id';

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'topics.title' => 10,
            'topics.body' => 8,
            'topic_posts.body' => 6,
        ],
        'joins' => [
            'topic_posts' => ['topics.id','topic_posts.topic_id'],
        ],
    ];


    public function posts() 
    {
        return $this->hasMany('App\TopicPost');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
