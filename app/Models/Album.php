<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Album extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = ['name', 'user_id', 'uuid', 'album_id', 'status', 'biliner', 'slug'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('cover')
            ->width(1000)
            ->height(1250);

        $this->addMediaConversion('fullscreen')
            ->width(1900)
            ->height(800);

        $this->addMediaConversion('thumb')
        ->width(800)
        ->height(800);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function child()
    {
        return $this->hasMany('App\Models\Album');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Album');
    }

    public function image()
    {
        return $this->hasMany('App\Models\Image');
    }
}
