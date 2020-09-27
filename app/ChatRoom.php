<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{

    protected $fillable = ['user_id', 'seller_id'];

    public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function seller()
    {
        return $this->belongsTo('App\User', 'seller_id');
    }
}
