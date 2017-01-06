<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->hasMany(Trainer::class);
    }

    public function scopeOfId($query, $city)
    {
        if (!empty($city)) {
            return $query->whereId($city);
        }
    }

    /**
     * Get all city`s choices
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getCityChoices()
    {
        $cities = City::all(
            [
                'id',
                'title',
            ]
        )->toArray();

        $choices = [];
        foreach ($cities as $city) {
            $choices[$city['id']] = $city['title'];
        }

        return $choices;
    }
}
