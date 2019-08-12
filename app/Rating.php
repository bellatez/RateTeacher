<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id','rating','review','language', 'user_name', 'lessoncount'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
