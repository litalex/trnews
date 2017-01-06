<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class News extends Model
{
    const NEWS_PER_PAGE = 20;
    const NEWS_PER_NEWS_LIST = 40;

    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get tags for news.
     */
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get part of text for show in list
     *
     * @return string
     */
    public function getShortTextAttribute()
    {
        return substr($this->text, 1, 150);
    }

    /**
     * Get route for view one news
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_news', $this->name);
    }

    public function scopeOfTagIds($query, $ids)
    {
        return $query->with('tags')
            ->whereHas(
                'tags',
                function ($query) use ($ids) {
                    $query
                        ->ofIds($ids);
                }
            );
    }
}
