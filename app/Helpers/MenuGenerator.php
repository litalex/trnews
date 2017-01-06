<?php

namespace Litalex\Helpers;

use Illuminate\Support\Facades\Lang;
use Spatie\Menu\Laravel\Menu;

/**
 * Class MenuGenerator
 *
 * @package Litalex\Traits
 */
class MenuGenerator
{
    /**
     * Generate Menu
     *
     * @return Menu
     */
    public static function generateMainMenu()
    {
        return Menu::new()
            ->addClass('nav navbar-nav')
//            ->action('NewsController@index', Lang::get('base.news'))->addItemParentClass('nav-item')->addItemClass('nav-link')
//            ->action('TagsController@index', Lang::get('base.tags'))->addItemParentClass('nav-item')->addItemClass('nav-link')
            ->setActiveFromRequest();
    }

    /**
     * Generate Admin Sidebar Menu
     *
     * @return Menu
     */
    public static function generateAdminSidebarMenu()
    {
        return Menu::new()
            ->addClass('sidebar-menu')
            ->html('<li class="header">РАЗДЕЛЫ</li>')
            ->action('UserController@profile', Lang::get('base.news'))
//            ->action('TagsController@index', Lang::get('base.tags'))->addItemParentClass('nav-item')->addItemClass('nav-link')
            ->setActiveFromRequest();
    }
}
