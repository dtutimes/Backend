<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name', 'slug'
    ];
    /**
     * Category has many stories
     */
    public function story()
    {
        return $this->hasMany('App\Models\Story');
    }
}
