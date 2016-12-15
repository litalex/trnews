<?php

namespace Litalex\Helpers;

use Litalex\Models\Brand;
use Litalex\Models\Car;
use Litalex\Models\City;

/**
 * Class Helpers
 *
 * @package Litalex\Helpers
 */
class Helpers
{
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