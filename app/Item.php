<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }
}
