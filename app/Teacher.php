<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function rating()
    {
        return $this->hasMany('App\Rating', 'rating');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
