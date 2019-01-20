<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = ['title', 'alias', 'tag', 'intro', 'body'];

    public function getRouteKeyName()
    {
        return 'alias';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }


}
