<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KotOrder extends Model
{
    protected $table = "kot_orders";

    protected $fillable = [
        'item_name','quantity','price','table','customer','status','prepared_by'
    ];
}
