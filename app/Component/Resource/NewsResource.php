<?php

namespace Litalex\Component\Resource;

use Litalex\Component\Resource\Interfaces\ResourceInterface;

/**
 * Class NewsResource.
 */
class NewsResource implements ResourceInterface
{
    private $url;
    private $name;
    private $title;
    private $description;
    private $text;
    private $list;
    private $source;
    private $tags;
    private $date;
    private $image;
    private $fullPostLink;

    public function setData($resource)
    {
        $this->name = $resource->name;
        $this->url = $resource->url;
        $this->title = $resource->title;
        $this->description = $resource->description;
        $this->text = $resource->text;
        $this->source = $resource->source;
        $this->list = $resource->list;
        $this->image = $resource->image;
        $this->tags = $resource->tags;
        $this->date = $resource->date;
        $this->fullPostLink = $resource->full_post_link;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getFullPostLink()
    {
        return $this->fullPostLink;
    }
}
