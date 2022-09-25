<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    protected $table = 'room_statuses';

    protected $fillable = [

        'status_name'

    ];
}
