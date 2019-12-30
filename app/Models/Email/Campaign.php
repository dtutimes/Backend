<?php

namespace App\Models\Email;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Campaign extends Model
{
    use Uuids;

    protected $fillable = [ 'name', 'uuid', 'subject', 'html', 'recipents_count', 'sent_count', 'status' ];
}
