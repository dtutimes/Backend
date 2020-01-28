<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'name', 'user_id', 'view_count', 'category', 'description' 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
