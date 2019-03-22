<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    protected $table = 'purchases';
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
