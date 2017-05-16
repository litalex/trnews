<?php

namespace Litalex\Component\Parser\Interfaces;

/**
 * Interface for Parser.
 */
interface ParserInterface
{
    public function createCrawler($node);
    public function parse(string $resourceName) : array;
}
