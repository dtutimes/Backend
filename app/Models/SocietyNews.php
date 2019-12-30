<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Traits\Uuids;

class SocietyNews extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = [
        'id', 
        'title', 
        'uuid', 
        'society_id', 
        'status', 
        'description', 
        'view'
    ];

    public function society()
    {
        return $this->belongsTo('App\Models\Society');
    }
    
}
