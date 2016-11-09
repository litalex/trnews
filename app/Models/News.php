<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class News extends Model
{
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
        return URL::route('view_news', $this->slug);
    }

    /**
     * Set slug
     *
     * @param $slug
     * @return $this
     */
    public function setSlugAttribute($slug)
    {
        if (empty($slug)) {
            $slug = str_replace(' ', '-', $this->title);
        }

        $this->slug = $slug;

        return $this;
    }
}
