<?php

namespace Litalex\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the news for the user.
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }

    /**
     * Get trainer info if user is trainer
     */
    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    /**
     * Get role
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
