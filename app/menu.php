<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    public function reserve()
    {
        return $this->belongsToMany('App\reserve')->withTimestamps();
    }
}
