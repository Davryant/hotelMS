<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenPurchasing extends Model
{
    protected $table = 'kitchen_purchasings';

    protected $fillable = [
        'item_number','item_name','item_unit','unit_price','measurement','total_value'
    ];
}
