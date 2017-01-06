<?php

namespace Litalex\Parsers;

use Litalex\Repositories\NewsRepository;
use Symfony\Component\DomCrawler\Crawler;

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
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Parse news on football.ua
     *
     * @return bool
     */
    public function parseFootballUa()
    {
        $crawler = new Crawler(file_get_contents('http://football.ua/newsarc/'));
        $listNews = $crawler->filter('.main-left .archive-list li');

        $result = [];
        foreach ($listNews as $news) {
            $post = new Crawler($news);
            $fullTextLink = $post->filter('h4 a')->attr('href');
            $title = $post->filter('h4 a')->text() ?: null;
            $description = $post->filter('a.intro-text')->text() ?: null;
            $type = trim($post->filter('p.type')->text()) ?: null;
            $articleSelector = '.article-text';
            if ($type == 'Лига Чемпионов. Новость') {
                $articleSelector = '.article_text';
            }
            $text = (new Crawler(file_get_contents($fullTextLink)))->filter($articleSelector)->html() ?: null;

            if (!empty($title) && !empty($type) && !empty($text)) {
                $result[] = [
                    'title' => $title,
                    'type'  => $type,
                    'description'  => $description,
                    'text'  => $text,
                    'source'  => 'football.ua',
                ];
            }
        }

        return $this->newsRepository->saveFromArray($result);
    }

    /**
     * Parse news on football.ua
     *
     * @return bool
     */
    public function parseFootballTransferComUa()
    {
        // TODO Fix it
        $crawler = new Crawler(file_get_contents('http://footballtransfer.com.ua/all/'));
        $listNews = $crawler->filter('#content > div.content-inner');

        $result = [];
        foreach ($listNews as $news) {
            $post = new Crawler($news);
            $fullTextLink = 'http://footballtransfer.com.ua'.$post->filter('a')->attr('href');

            $title = $post->filter('a')->text() ?: null;
            $description = $post->filter('a')->text() ?: null;

            $articleSelector = '._ga1_on_';
            $fullNews = new Crawler(file_get_contents($fullTextLink));

            foreach ($fullNews->filter('.list-unstyled') as $items) {
                $tag = new Crawler($items);
                $type = trim($tag->filter('a')->text()) ?: null;
            }

            $text = trim($fullNews->filter($articleSelector)->text()) ?: null;

            if (!empty($title) && !empty($type) && !empty($text)) {
                $result[] = [
                    'title' => $title,
                    'type'  => $type,
                    'description'  => $description,
                    'text'  => $text,
                    'source'  => 'footballtransfer.com.ua',
                ];
            }
        }

        $this->newsRepository->saveFromArray($result);
    }
}