<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use App\Traits\Uuids;


class Society extends Model implements HasMedia
{
    use Uuids;
    use HasMediaTrait;

    protected $fillable = [
        'id', 'name', 'category', 'slug', 'uuid',
        'user_id', 'status', 'description', 
        'linkedin', 'facebook', 'instagram', 
        'contact_mail', 'head_incharge', 'pr_incharge', 'pr_contact_number',
        'head_contact_number', 'website', 'referrals', 'views'        
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function news()
    {
        return $this->hasMany('App\Models\SocietyNews');
    }
}
