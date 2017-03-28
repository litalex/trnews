<?php

namespace Litalex\Traits;

use Illuminate\Support\Facades\Lang;
use Spatie\Menu\Laravel\Menu;

/**
 * Class MenuGenerator
 *
 * @package Litalex\Traits
 */
trait MenuGenerator
{
    /**
     * Generate Menu
     *
     * @return Menu
     */
    public static function generateMenu()
    {
        return Menu::new()
            ->addClass('nav navbar-nav')
            ->action('NewsController@index', Lang::get('base.news'))->addItemParentClass('nav-item')->addItemClass('nav-link')
            ->action('TagsController@index', Lang::get('base.tags'))->addItemParentClass('nav-item')->addItemClass('nav-link')
            ->setActiveFromRequest();
    }
}
