<?php

namespace Litalex\Component\Parser\Interfaces;

/**
 * Interface for ParserProvider.
 */
interface ParserProviderInterface
{
    public function add($node);
    public function filter($selector);
    public function attr($attribute);
    public function html();
    public function text();
}
