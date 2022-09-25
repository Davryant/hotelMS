<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $table = 'bars';

    protected $fillable = [

        'bar_name','status_id'

    ];
}
