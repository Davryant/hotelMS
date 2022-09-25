<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantRequest extends Model
{
    protected $table = 'restaurant_requests';

    protected $fillable = [
        'item_id','measurement','quantity','requester_id','request_no','item_u_no'
    ];
}
