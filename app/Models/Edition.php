<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\Uuids;

class Edition extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    protected $fillable = [
        'name', 'link', 'ajax'
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('cover')
            ->width(800)
            ->height(800);
    }
}