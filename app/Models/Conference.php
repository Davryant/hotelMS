<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    protected $table = 'conferences';

    protected $fillable = [

        'conference_name','room_status_id','conference_price','slug'

    ];
}
