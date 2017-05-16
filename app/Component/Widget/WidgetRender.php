<?php

namespace Litalex\Component\Widget;

use Litalex\Component\Widget\Interfaces\WidgetDataInterface;
use Litalex\Component\Widget\Interfaces\WidgetRenderInterface;
use Illuminate\View\View;

class WidgetRender implements WidgetRenderInterface
{
    /**
     * @var string
     */
    private $view;

    /**
     * @var array
     */
    private $data;

    /**
     * {@inheritdoc}
     */
    public function create(WidgetDataInterface $widgetData) : WidgetRenderInterface
    {
        $this->view = $widgetData->getView();
        $this->data = $widgetData->getData();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function render() : View
    {
        return view(
            $this->view,
            $this->data
        );
    }
}
