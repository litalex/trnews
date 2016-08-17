<?php

namespace Litalex;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'text', 'enabled'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Get the user that owns the news.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShortTextAttribute()
    {
        return substr($this->text, 1, 150);
    }

    public function getViewRouteAttribute()
    {
        return URL::route('view_news', $this->id);
    }
}
