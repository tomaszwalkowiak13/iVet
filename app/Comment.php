<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
