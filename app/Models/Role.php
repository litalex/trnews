<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
