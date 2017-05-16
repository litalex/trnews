<?php

namespace Litalex\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\App;
use Litalex\Component\Features\Interfaces\FeaturesRepositoryInterface;
use Litalex\Component\NewsFeed\Interfaces\NewsFeedRepositoryInterface;
use Litalex\Models\Image;
use Litalex\Models\Images;
use Litalex\Models\News;
use Litalex\Models\Tags;

/**
 * Class NewsRepository.
 */
class NewsRepository extends AbstractEloquentRepository implements NewsFeedRepositoryInterface, FeaturesRepositoryInterface
{
    /**
     * NewsRepository constructor.
     *
     * @param News $news
     */
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    /**
     * Get all enabled news with tags.
     *
     * @param int $limit
     *
     * @return Collection
     */
    public function getAllEnabledWithTags(int $limit)
    {
        return $this->enabled()
            ->with('tags')
            ->limit($limit)
            ->orderBy('updated_at', 'DESC');
    }

    /**
     * Get all news with tags.
     *
     * @param int $limit
     *
     * @return Collection
     */
    public function getAll(int $limit = 20)
    {
        return $this
            ->enabled()
            ->limit($limit)
            ->orderBy('updated_at', 'DESC');
    }

    public function findAllByUserId($userId)
    {
        return $this->model
            ->with('tags')
            ->where('user_id', $userId);
    }

    /**
     * Get one enabled news by $slug
     *
     * @param string $name
     * @param int    $limit
     *
     * @return mixed
     */
    public function getOneEnabledBySlugWithTags(string $name, int $limit = 20)
    {
        return $this->enabled()
            ->whereName($name)
            ->with('tags')
            ->with('comments')
            ->limit($limit);
    }

    /**
     * Returns enabled.
     *
     * @return mixed
     */
    private function enabled()
    {
        return $this->model->whereEnabled(true);
    }

    /**
     * Find enabled by ID
     *
     * @param $id
     *
     * @return mixed
     */
    private function findById($id)
    {
        return $this->enabled()
            ->where('id', $id);
    }

    public function getAllEnabledByTagId($id)
    {
        return $this->model->tags()->where('tags.slug', $id);
    }

    public function saveFromArray($attributes)
    {
        foreach ($attributes as $attribute) {
            $tagName = $this->urlGenerator($attribute['tags']);
            $newsName = $this->urlGenerator($attribute['title']);

            $tag = Tags::where('name', $tagName)->first();
            if (empty($tag->id)) {
                $tag = new Tags();
                $tag->name = $tagName;
                $tag->title = $attribute['tags'];
                $tag->enabled = true;

                $tag->save();
            }

            $image = Images::where('name', $attribute['image'])->first();
            if (empty($image->id)) {
                $image = new Images();
                $image->name = $attribute['image'];
                $image->title = $attribute['title'];
                $image->enabled = true;

                $image->save();
            }

            $model = News::where('name', $newsName)->first();
            if (empty($model->id)) {
                $model = new News();
                $model->user_Id = 1;
                $model->enabled = true;
                $model->name = $newsName;
                $model->title = $attribute['title'];
                $model->description = $attribute['description'];
                $model->source = $attribute['source'];
                $model->text = $attribute['text'];
                $updateOn = '-' . random_int(0, 30) . ' minutes';
                $date = new \DateTime();
                $date->add(\DateInterval::createFromDateString($updateOn));
                $model->setUpdatedAt($date->format('Y-m-d H:i:s'));
                $model->setCreatedAt($date->format('Y-m-d H:i:s'));

                $model->save();
                $model->tags()->save($tag);
                $model->images()->save($image);
            }
        }

        return true;
    }

    /**
     * Url generator from Ru string.
     *
     * @param string $string
     * @param bool   $unique
     *
     * @return string
     */
    private function urlGenerator(string $string, $unique = false) : string
    {
        $search = [' ', '?', '!', ':', ',', '.'];
        $replace = ['-', '', '', '-', '', '-', ''];

        $en = $this->ru2en($string);

        $url = str_replace($search, $replace, $en);

        if ($unique) {
            $url .= '-' . uniqid();
        }

        return strtolower($url);
    }

    /**
     * Ru to En converter.
     *
     * @param $string
     *
     * @return string
     */
    private function ru2en($string)
    {
        $converter = [
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        ];

        return strtr($string, $converter);
    }

    /**
     * Returns news for feed.
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function getNewsFeed(int $limit)
    {
        return $this
            ->enabled()
            ->whereFeature(false)
            ->limit($limit)
            ->orderBy('updated_at', 'DESC');
    }

    /**
     * Returns news for features.
     *
     * @param int $limit
     *
     * @return mixed
     */
    public function getFeatures(int $limit)
    {
        return $this
            ->enabled()
            ->whereFeature(true)
            ->limit($limit)
            ->orderBy('updated_at', 'DESC');
    }
}
