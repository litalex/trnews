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
     * Get the brand that owns the news.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get route for view one news
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_car', $this->slug);
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
            $slug = str_replace(' ', '-', strtolower($this->name));
        }

        $this->slug = $slug;

        return $this;
    }

    public function scopeOfBrand($query, $brand)
    {
        if (!empty($brand)) {
            return $query->whereHas(
                'brand',
                function ($query) use ($brand) {
                    $query->ofId($brand);
                }
            );
        }
    }

    public function scopeOfTransmission($query, $transmission)
    {
        if (!empty($transmission)) {
            return $query->whereTransmission($transmission);
        }
    }

    /**
     * Get all car`s brand choices
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getCarBrandChoices()
    {
        $brands = Brand::all(
            [
                'id',
                'title',
            ]
        )->toArray();

        $choices = [];
        foreach ($brands as $brand) {
            $choices[$brand['id']] = $brand['title'];
        }

        return $choices;
    }
}
