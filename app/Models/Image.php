<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Image extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = ['user_id', 'album_id', 'name', 'biliner', 'status', 'slug'];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('fullscreen')
            ->width(1900)
            ->height(800);
    }

    public function album()
    { 
        return $this->belongsTo('App\Models\Album');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
