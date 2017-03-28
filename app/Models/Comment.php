<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const NEWS_PER_PAGE = 20;
    const NEWS_PER_NEWS_LIST = 40;

    /**
     * Get the user that owns the news.
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
