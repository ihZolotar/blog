<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 */
class Post extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = ['title', 'alias', 'tag', 'user_id', 'intro', 'body'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'alias';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

}
