<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function scopeOfId($query, $brand)
    {
        if (!empty($brand)) {
            return $query->whereId($brand);
        }
    }
}