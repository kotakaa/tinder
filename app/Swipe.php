<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    protected $fillable = [
        'is_like', 'to_user_id', 'from_user_id'
    ];

    public function toUser()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }
}
