<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantBill extends Model
{
    protected $table = 'restaurant_bills';

    protected $fillable = [
        'bill_from','total','room_id','bill_id'
    ];
}
