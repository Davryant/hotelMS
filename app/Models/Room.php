<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [

        'room_name','room_number','room_category_id','room_price','room_status_id'

    ];
}
