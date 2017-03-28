<?php

namespace Litalex\Helpers;

use Litalex\Models\News;
use Litalex\Models\Tags;

/**
 * Class Widget
 *
 * @package Litalex\Widget
 */
class Widget
{
    /**
     * Tags list widget
     *
     * @return mixed
     */
    public static function tagsList()
    {
        return Tags::whereEnabled(true)->get();
    }

    /**
     * List of articles
     *
     * @return mixed
     */
    public static function articles()
    {
        $ids = [16, 18, 19, 20];
        return News::whereEnabled(true)->OfTagIds($ids)->limit(5)->get();
    }

    /**
     * List of interview
     *
     * @return mixed
     */
    public static function interviews()
    {
        $ids = [10];
        return News::whereEnabled(true)->OfTagIds($ids)->limit(5)->get();
    }
}
