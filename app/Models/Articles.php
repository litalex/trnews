<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Articles extends Model
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

    /**
     * Get route for view one news
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_news', $this->name);
    }

    public function scopeOfTagId($query, $id)
    {
        return $query->with('tags')
            ->whereHas(
                'tags',
                function ($query) use ($id) {
                    $query
                        ->find($id);
                }
            );
    }
}
