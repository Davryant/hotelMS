<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarItem extends Model
{
    protected $table = 'bar_items';

    protected $fillable = [

        'item_name','item_purchase_price','item_sale_price','item_quantity','item_category_id','status_id','status_id'

    ];
}
