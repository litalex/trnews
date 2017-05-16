<?php

namespace Litalex\Component\TagsList;

use Litalex\Component\Widget\Interfaces\WidgetDataInterface;

/**
 * Class TagsListWidgetData.
 */
class TagsListWidgetData implements WidgetDataInterface
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
     * NewsFeedWidgetData constructor.
     *
     * @param string $view
     * @param array  $data
     */
    public function __construct(string $view, array $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    /**
     * {@inheritdoc}
     */
    public function getView() : string
    {
        return $this->view;
    }

    /**
     * {@inheritdoc}
     */
    public function getData() : array
    {
        return $this->data;
    }
}
