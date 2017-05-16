<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

/**
 * Class Tags
 *
 * @package Litalex
 */
class Category extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    /**
     * Get route for view one news
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_category', $this->name);
    }

    public function scopeOfIds($query, $ids)
    {
        return $query->whereIn('tags.id', $ids);
    }
}
