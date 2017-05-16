<?php

namespace Litalex\Component\Parser;

use Intervention\Image\Facades\Image;
use Litalex\Component\Resource\Interfaces\ResourceInterface;
use Litalex\Component\Resource\Interfaces\ResourceProviderInterface;
use Litalex\Component\Parser\Interfaces\ParserInterface;
use Litalex\Component\Parser\Interfaces\ParserProviderInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class NewsParser.
 */
class NewsParser implements ParserInterface
{
    /**
     * @var ParserProviderInterface
     */
    private $parser;

    /**
     * @var ResourceProviderInterface
     */
    private $resourceProvider;

    /**
     * @var ResourceInterface
     */
    private $resource;

    private $tags;

    private $text;

    private $allowTags = [
        'Україна',
        'Англія',
        'Іспанія',
        'Німеччина',
        'Італія',
        'Франція',
        'Ліга Чемпіонів',
        'Ліга Європи',
        'ЧС-2018',
        'Нідерланди',
        'Португалія',
        'Туреччина',
        'Америка',
        'Африка',
        'Азія',
        'Інше',
    ];

    /**
     * @param ParserProviderInterface $parser
     * @param ResourceProviderInterface $resource
     */
    public function __construct(ParserProviderInterface $parser, ResourceProviderInterface $resource)
    {
        $this->parser = $parser;
        $this->resourceProvider = $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function parse(string $resourceName) : array
    {
        $this->resource = $this->resourceProvider->getResource($resourceName);
        $this->createCrawler(file_get_contents($this->resource->getUrl()));
        $list = $this->parseList();

        $resourceData = [];
        foreach ($list as $news) {
            $this->createCrawler($news);

            $tags = trim($this->parseTags());
            $title = trim($this->parseTitle());
            $description = $this->parseDescription() ?: $title;
            $fullPost = $this->parseFullPostLink();

            $this->createCrawler(file_get_contents($fullPost));

            $text = trim($this->parseText());
            $imgSrc = $this->parseImage();

            if ($imgSrc === false) {
                continue;
            }

            /*
             * Todo. Create Image Component.
             * Images resize and upload.
             */
            $ext = explode('.', parse_url($imgSrc)['path']);
            $today = (new \DateTime())->format('Y-m-d');
            $rootDir = env('APP_NEWS_IMAGES_DIR', 'public/images/news/');

            $rootDir .= $today;

            if (!is_dir($rootDir)) {
                mkdir($rootDir);
            }

            $uuid = uniqid();
            $imageName = $uuid . '.' . $ext[1];
            $imageUrl = $rootDir . '/' . $imageName;
            $previewImageUrl = $rootDir . '/preview-' . $imageName;
            $imageFeatureUrl = $rootDir . '/feature-' . $imageName;

            if (!is_file($imageUrl)) {
                $image = Image::make($imgSrc)->resize('400', '237');
                $image->save($imageUrl);
                $imagePreview = Image::make($imgSrc)->resize('170', '101');
                $imagePreview->save($previewImageUrl);
                $imageFeature = Image::make($imgSrc)->resize('443', '242');
                $imageFeature->save($imageFeatureUrl);
            }

            $image = '';
            if (file_exists($imageUrl)) {
                $image = $imageName;
            }

            if (!empty($title) && !empty($tags) && !empty($text)) {
                $resourceData[] = [
                    'title' => $title,
                    'tags' => $tags,
                    'description' => $description,
                    'text' => $text,
                    'image' => $image,
                    'source' => $fullPost,
                ];
            }
        }

        return $resourceData;
    }

    /**
     * @param $node
     */
    public function createCrawler($node)
    {
        $this->parser = new Crawler($node);
    }

    private function parseList()
    {
        return $this->parser->filter($this->resource->getList());
    }

    private function parseTitle()
    {
        return $this->parser->filter($this->resource->getTitle())->text();
    }

    private function parseDescription()
    {
        $selector = $this->resource->getDescription();

        if (trim($this->tags) == 'Лига Чемпионов. Новость') {
            $selector = 'p strong';
        }
        return $this->parser->filter($selector)->text();
    }

    private function parseTags()
    {
        $this->tags = $this->parser->filter($this->resource->getTags())->text();

        return $this->tags;
    }

    private function parseText()
    {
        $selector = $this->resource->getText();

        if (trim($this->tags) == 'Лига Чемпионов. Новость') {
            $selector = str_replace('-', '_', $this->resource->getText());
        }

        $this->text = $this->parser->filter($selector)->html();

        return $this->text;
    }

    private function parseImage()
    {
        $selector = $this->resource->getImage();

        if (trim($this->tags) == 'Лига Чемпионов. Новость') {
            $selector = str_replace('-', '_', $this->resource->getImage());
        }

        $imageSrc = $this->parser->filter($selector)->attr('src');

        /*
         * TODO.
         * Delete all image expect first.
         */
        $this->createCrawler($this->text);
        $nodes = $this->parser->filter('p');

        if (count($nodes) > 0) {
            foreach ($nodes as $node) {
                $this->createCrawler($node);

                $textPhoto = $this->parser->filter('.TextPhoto');
                if (count($textPhoto) > 0) {
                    return false;
                }
            }
        }

        return $imageSrc;
    }

    private function parseFullPostLink()
    {
        return $this->parser->filter($this->resource->getFullPostLink())->attr('href');
    }
}
