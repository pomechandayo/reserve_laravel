<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{
    protected $fillable = [
        'user_id','reserve_date','number_reservations',
    ];

    public function menu()
    {
        return $this->belongsToMany('App\menu')->withTimestamps();
    }
}
