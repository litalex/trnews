<?php

namespace Litalex\Component\Widget\Interfaces;

use Illuminate\View\View;

/**
 * Interface for render Widget Data.
 */
interface WidgetRenderInterface
{
    /**
     * Create widget for render.
     *
     * @param WidgetDataInterface $widgetData
     *
     * @return WidgetRenderInterface
     */
    public function create(WidgetDataInterface $widgetData) : WidgetRenderInterface;

    /**
     * Render widget.
     *
     * @return View
     */
    public function render() : View;
}
