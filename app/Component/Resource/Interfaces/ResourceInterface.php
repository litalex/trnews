<?php

namespace Litalex\Component\Resource\Interfaces;

/**
 * Interface Resource.
 */
interface ResourceInterface
{
    public function getName();
    public function getUrl();
    public function getList();
    public function getTitle();
    public function getDescription();
    public function getText();
    public function getImage();
    public function getTags();
    public function getDate();
    public function getSource();
    public function getFullPostLink();
    public function setData($resource);
}
