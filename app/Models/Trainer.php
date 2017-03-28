<?php

namespace Litalex\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Trainer extends Model
{
    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get role
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get all of the cars for the user.
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
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
    public function getShortAboutMeAttribute()
    {
        return substr($this->aboutMe, 1, 100);
    }

    /**
     * Get route for view one news
     *
     * @return mixed
     */
    public function getViewRouteAttribute()
    {
        return URL::route('view_trainer', $this->slug);
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

    public function scopeOfGender($query, $gender)
    {
        if (!empty($gender)) {
            return $query->whereGender($gender);
        }
    }

    public function scopeOfStudentCar($query, $studentCar)
    {
        if (!empty($studentCar)) {
            return $query->where('StudentCar', '=', $studentCar);
        }
    }

    public function scopeOfTrainerExperience($query, $minTrainerExperience, $maxTrainerExperience)
    {
        return $query->whereBetween('trainerExperience', [(int)$minTrainerExperience, (int)$maxTrainerExperience]);
    }

    public function scopeOfPayByHour($query, $minPayByHour, $maxPayByHour)
    {
        return $query->whereBetween('payByHour', [(float)$minPayByHour, (float)$maxPayByHour]);
    }

    public function scopeOfPayByDistance($query, $minPayByDistance, $maxPayByDistance)
    {
        return $query->whereBetween('payByDistance', [(float)$minPayByDistance, (float)$maxPayByDistance]);
    }

    public function scopeOfCarBrand($query, $brand)
    {
        if (!empty($brand)) {
            return $query->with('cars')
                ->whereHas(
                    'cars',
                    function ($query) use ($brand) {
                        $query
                            ->ofBrand($brand);
                    }
                );
        }
    }

    public function scopeOfCarTransmission($query, $transmission)
    {
        if (!empty($transmission)) {
            return $query->with('cars')
                ->whereHas(
                    'cars',
                    function ($query) use ($transmission) {
                        $query
                            ->ofTransmission($transmission);
                    }
                );
        }
    }

    public function scopeOfCity($query, $city)
    {
        if (!empty($city)) {
            return $query->with('city')
                ->whereHas(
                    'city',
                    function ($query) use ($city) {
                        $query
                            ->ofId($city);
                    }
                );
        }
    }
}
