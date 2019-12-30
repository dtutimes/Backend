<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;    
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\Uuids;

class User extends Authenticatable implements HasMedia
{
    use Uuids;
    use Notifiable;
    use HasMediaTrait;
    use LaratrustUserTrait; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 
        'username', 'avatar',
        'activated', 'bio',
        'data_of_birth', 'linkedin',
        'facebook', 'instagram',
        'display_mail',
        'medium', 'password',
        'avatar', 'blocked'
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    /**
     * User has many stories
     */
    public function story()
    {
        return $this->hasMany('App\Models\Story');
    }

    public function album() 
    {
        return $this->hasMany('App\Models\Album');
    }

    public function image() 
    {
        return $this->hasMany('App\Models\Image');
    }

    public function todo() 
    {
        return $this->hasMany('App\Models\Todo');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notification');
    }
    
    public function society()
    {
        return $this->hasOne('App\Models\Society');
    }

}

