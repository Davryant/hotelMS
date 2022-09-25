<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarOrder extends Model
{
    protected $table = "bar_orders";

    protected $fillable = [
        'item_name','quantity','price','table','customer','status','prepared_by'
    ];
}
