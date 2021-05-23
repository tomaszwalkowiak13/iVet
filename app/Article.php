<?php

namespace App;

use App\iVet\Presenters\ArticlePresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $guarded = [];

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'likeable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
