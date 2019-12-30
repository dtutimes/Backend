<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['name', 'description', 'completed_at', 'for', 'user_id', 'completed_by'];

    public function user()
    {
        $this->belongsTo('App\User');
    }

}
