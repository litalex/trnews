<?php

namespace Litalex\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Litalex\Models\Comment;
use Litalex\Models\News;
use Litalex\Models\Tags;

/**
 * Class CommentRepository
 *
 * @package Litalex\Repositories
 */
class CommentRepository
{
    /**
     * The Tag instance.
     *
     * @var News
     */
    protected $tag;

    /**
     * NewsRepository constructor.
     *
     * @param Comment $comment
     * @param Tags    $tag
     * @internal param News $news
     */
    public function __construct(Comment $comment, Tags $tag)
    {
        $this->model = $comment;
        $this->tag = $tag;
    }

    /**
     * Get all enabled news with tags.
     *
     * @return Collection
     */
    public function getAllEnabledWithTags()
    {
        return $this->findByEnabled()
            ->with('tags')
            ->orderBy('updated_at', 'DESC');
    }

    /**
     * Get all news with tags.
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->model
            ->with('tags')
            ->get();
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
     * @param $slug
     * @return mixed
     */
    public function getOneEnabledBySlugWithTags($name)
    {
        return $this->findByEnabled()
            ->whereName($name)
            ->with('tags')
            ->first();
    }

    /**
     * Find enabled
     *
     * @return mixed
     */
    private function findByEnabled()
    {
        return $this->model
            ->whereEnabled(true);
    }

    /**
     * Find enabled by ID
     *
     * @param $id
     * @return mixed
     */
    private function findById($id)
    {
        return $this->findByEnabled()
            ->where('id', $id);
    }

    public function getAllEnabledByTagId($id)
    {
        return $this->model->tags()->where('tags.slug', $id);
    }

    public function saveFromArray($attributes)
    {
        foreach ($attributes as $attribute) {

            $model = new Comment();
            $model->name = strtolower(str_replace(' ', '-', $this->rus2translit($attribute['text'])));
            $model->text = $attribute['text'];
            $model->user_id = $attribute['userId'];
            $model->news_id = $attribute['newsId'];
            $model->save();
        }

        return true;
    }

    private function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
}
