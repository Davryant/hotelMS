<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarItemCategory extends Model
{
    protected $table = 'bar_item_categories';

    protected $fillable = [

        'item_category_name','cat_slug'

    ];
}
