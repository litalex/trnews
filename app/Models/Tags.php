<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 * Class Tags
 *
 * @package Litalex
 */
class Tags extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    /**
     * Get the user that owns the news.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    /**
     * Get route for view one tag
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_tag', $this->slug);
    }

    public function scopeOfIds($query, $ids)
    {
        return $query->whereIn('tags.id', $ids);
    }
}
