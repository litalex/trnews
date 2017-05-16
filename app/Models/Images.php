<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image.
 */
class Images extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
