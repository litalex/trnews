<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Car extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get route for view one news
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_route', $this->slug);
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
