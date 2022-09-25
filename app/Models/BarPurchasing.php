<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarPurchasing extends Model
{
    protected $table = 'bar_purchasings';

    protected $fillable = [
        'item_number','item_name','item_unit','unit_price','measurement','total_value'
    ];
}
