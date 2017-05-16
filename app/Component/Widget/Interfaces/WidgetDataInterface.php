<?php

namespace Litalex\Component\Widget\Interfaces;

/**
 * Class WidgetDataInterface
 */
interface WidgetDataInterface
{
    /**
     * Returns view for widget.
     *
     * @return string
     */
    public function getView() : string;

    /**
     * Returns data for widget.
     *
     * @return array
     */
    public function getData() : array;
}
