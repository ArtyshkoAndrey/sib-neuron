<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Photo;
use App\Albums;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Получить комментарии статьи блога.
    */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    /**
    * Получить комментарии статьи блога.
    */
    public function photos_dog()
    {
        $albums = Albums::where('category_id', 1)->where('user_id', Auth::id())->get();
        return $albums;
    }
    /*
    * Получить комментарии статьи блога.
    */
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
