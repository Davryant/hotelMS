<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{
    protected $table = 'dish_categories';

    protected $fillable = [

        'food_category_name'

    ];
}
