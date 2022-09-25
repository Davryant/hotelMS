<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishMenu extends Model
{
    protected $table = 'dish_menus';

    protected $fillable = [

        'food_item_name','food_item_price','item_category','dish_cover'

    ];
}
