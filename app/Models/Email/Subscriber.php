<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Subscriber extends Model
{
    use Uuids;

    protected $fillable = [
        'email'
    ];
}
