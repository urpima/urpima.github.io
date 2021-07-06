<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    'title', 'body'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::Class)->orderBy('created_at');
    }

    public function category()
    {
        return $this->belongsTo(Category::Class);
    }

}
