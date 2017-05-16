<?php

namespace Litalex\Parsers;

use Litalex\Component\Parser\Interfaces\ParserInterface;
use Litalex\Repositories\NewsRepository;

/**
 * Class NewsParser
 *
 * @package Litalex\Parsers
 */
class NewsParser
{
    /**
     * NewsParser constructor.
     *
     * @param ParserInterface $parser
     * @param NewsRepository $newsRepository
     */
    public function __construct(ParserInterface $parser, NewsRepository $newsRepository)
    {
        $this->parser = $parser;
        $this->newsRepository = $newsRepository;
    }

    /**
     * Parse news on football.ua
     *
     * @return bool
     */
    public function parseFootballUa()
    {
        return $this->newsRepository->saveFromArray($this->parser->parse('footballuaNewsArchive'));
    }
}
